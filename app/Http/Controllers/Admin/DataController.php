<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Project;
use App\ProjectData;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    public function index()
    {


        $profits = DB::table('project_data')
            ->select(DB::raw('DATE(click_date) as click_date'), DB::raw('sum(profit) as total'))
            ->groupBy(DB::raw('DATE(click_date)') )
            ->get();

        $sum_profit = DB::table('project_data')->sum('profit');
        $sum_click = DB::table('project_data')->sum('click_price');
        $count_convert = DB::table('project_data')->where('convert','=',1)->count();

        $keywords = ProjectData::select(array('click_date','convert', DB::raw('COUNT(click_date) AS count')))->groupBy('click_date','convert')->get();

//        $keywords = DB::table('project_data')
//            ->selectRaw('day(click_date) click_date')
//            ->groupBy('click_date')
//            ->get();

        return view('data.index',[
            'keywords'=>$keywords,
            'sum_click' => $sum_click,
                'sum_profit' => $sum_profit,
                'count_convert' => $count_convert,
            'profits'=>$profits
//            'projects' => Project::where('user_id',Auth::id())->paginate(10)
        ]);
    }
}
