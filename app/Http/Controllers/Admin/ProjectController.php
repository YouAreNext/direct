<?php

namespace App\Http\Controllers\Admin;

use App\Project;
use App\ProjectData;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{

    public function index()
    {
        return view('projects.index',[
            'projects' => Project::where('user_id',Auth::id())->paginate(10)
        ]);
    }


    public function create()
    {
        return view('projects.create', [
            'project'   => [],
            'projects' => Project::get(),
            'delimiter'  => ''
        ]);
    }

    public function store(Request $request)
    {
        Project::create($request->all());

        return redirect()->route('admin.projects.index');
    }

    public function show(Project $project)
    {
        //
    }

    public function edit(Project $project)
    {


        $sum_profit = DB::table('project_data')->where('project_id','=',$project->id)->sum('profit');
        $sum_click = DB::table('project_data')->where('project_id','=',$project->id)->sum('click_price');
        $count_convert = DB::table('project_data')->where('convert','=',1)->where('project_id','=',$project->id)->count();

        if($project->user_id == Auth::id()){
            return view('projects.edit', [
                'project'   => $project,
                'projects' => Project::get(),
                'keywords' => ProjectData::where('project_id','=',$project->id)->get(),
                'sum_click' => $sum_click,
                'sum_profit' => $sum_profit,
                'count_convert' => $count_convert,
                'delimiter'  => ''

            ]);
        }else{
            return response()->view('error.403');
        }
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->except('slug'));

        return redirect()->route('admin.projects.index');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}
