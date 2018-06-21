@extends('layouts.app')

@section('content')
    <section class="col-lg-12 connectedSortable">
        <!-- TO DO List -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="ion ion-clipboard mr-1"></i>
                    Проекты
                </h3>

                <div class="card-tools">
                    {{--<ul class="pagination pagination-sm">--}}
                        {{--<li class="page-item"><a href="#" class="page-link"></a></li>--}}
                    {{--</ul>--}}
                    <ul class="pagination pagination-sm">
                    {{$projects->links()}}
                    </ul>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <ul class="todo-list">
                    @forelse ($projects as $project)
                    <li>
                        <!-- drag handle -->
                        <span class="handle">
                      <i class="fa fa-ellipsis-v"></i>
                      <i class="fa fa-ellipsis-v"></i>
                    </span>
                        <!-- checkbox -->
                        <input type="checkbox" value="" name="">
                        <!-- todo text -->
                        <span class="text">{{$project->title}}</span>
                        <!-- Emphasis label -->

                        <!-- General tools such as edit or delete-->
                        <div class="tools">
                            {{--<form action="{{route('home..destroy',$project)}}" method="post">--}}
                                {{--<input type="hidden" name="_method" value="DELETE">--}}
                                {{--{{ csrf_field() }}--}}

                                {{--<a class="btn btn-default" href="{{route('home..edit',$project)}}"><i class="fa fa-edit"></i></a>--}}

                                {{--<button type="submit" class="btn"><i class="fas fa-trash"></i></button>--}}
                            {{--</form>--}}
                            <form action="{{route('admin.projects.destroy', $project)}}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                {{ csrf_field() }}

                                <a class="btn btn-default" href="{{route('admin.projects.edit', $project)}}"><i class="fa fa-edit"></i></a>

                                <button type="submit" class="btn"><i class="fa fa-trash"></i></button>
                            </form>

                            {{--<i class="fa fa-edit"></i>--}}
                            {{--<i class="fa fa-trash-o"></i>--}}
                        </div>
                    </li>
                    @empty
                    <p>Проектов не имеется</p>
                    @endforelse
                </ul>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
                <a class="btn btn-info float-right" href="{{route('admin.projects.create')}}"><i class="fa fa-plus"></i> Создать проект</a>
            </div>
        </div>
        <!-- /.card -->
    </section>
@endsection