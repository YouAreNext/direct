@extends('layouts.app')

@section('content')
    <section class="col-lg-12 connectedSortable">
        <div class="col-md-10">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.projects.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="card-body">
                        {{--<div class="form-group">--}}
                            {{--<label for="status">Статус</label>--}}

                            {{--<select class="form-control" name="published">--}}
                                {{--@if (isset($project->id))--}}
                                    {{--<option value="0" @if ($project->published == 0) selected="" @endif>Не опубликовано</option>--}}
                                    {{--<option value="1" @if ($project->published == 1) selected="" @endif>Опубликовано</option>--}}
                                {{--@else--}}
                                    {{--<option value="0">Не опубликовано</option>--}}
                                    {{--<option value="1">Опубликовано</option>--}}
                                {{--@endif--}}
                            {{--</select>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label for="name_project">Название проекта</label>
                            <input type="text" class="form-control" id="name_project" name="title" placeholder="Заголовок категории" value="{{$project->title or ""}}" required>
                        </div>
                        <div class="form-group">
                            <label for="link_project">Ссылка на сайт</label>
                            <input type="text" class="form-control" id="link_project" name="link" placeholder="Ссылка на сайт" value="{{$project->link or ""}}" required>
                        </div>
                        <div class="form-group">
                            <label for="budget_project">Месячный бюджет</label>
                            <input type="text" class="form-control" id="budget_project" name="budget" placeholder="Месячный бюджет" value="{{$project->budget or ""}}">
                        </div>

                        <input type="text" hidden value="{{ Auth::id() }}" name="user_id">
                        {{--<div class="form-check">--}}
                            {{--<input type="checkbox" class="form-check-input" id="exampleCheck1">--}}
                            {{--<label class="form-check-label" for="exampleCheck1">Check me out</label>--}}
                        {{--</div>--}}

                        {{--<label for="">Родительская категория</label>--}}
                        {{--<select class="form-control" name="parent_id">--}}
                            {{--<option value="0">-- без родительской категории --</option>--}}
                            {{--@include('projects.partials.projects', ['projects' => $projects])--}}
                        {{--</select>--}}
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        {{--<input class="btn btn-primary" type="submit" value="Сохранить">--}}
                        <input type="submit" class="btn btn-primary" value="Сохранить">
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
    </section>
@endsection