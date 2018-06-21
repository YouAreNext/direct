@foreach($projects as $project_list)
    <option value="{{$project_list->id or ""}}"
            @isset($project->id)
            @if($project->parent_id==$project_list->id)
            selected=""
            @endif
            @if($project->id==$project_list->id)
            hidden=""
            @endif
            @endisset
    >
        {!!$delimiter or "" !!}{{$project_list->title or ""}}
    </option>
    @if(count($project_list->children)>0)
        @include('projects.partials.projects',[
            'projects'=>$project_list->children,
            'delimiter'=>' - '.$delimiter
        ])
    @endif
@endforeach