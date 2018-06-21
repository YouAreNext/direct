@extends('layouts.app')

@section('content')
    <section class="col-lg-12 connectedSortable">
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Проект {{ $project->title }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{route('admin.projects.update',$project)}}" method="post">
                    <input type="hidden" name="_method" value="put">
                    {{csrf_field()}}
                    <div class="card-body">
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


            @if(!empty($keywords))

                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $count_convert }}</h3>

                                <p>Количество заказов</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>
                                    @if(!empty($sum_profit))
                                    {{ number_format(($sum_profit/$sum_click)*100,0) }}<sup style="font-size: 20px">%</sup>
                                    @else
                                    0
                                    @endif
                                </h3>

                                <p>Общее ROI</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $sum_profit }}</h3>

                                <p>Прибыль</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-social-usd"></i>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $sum_click }}</h3>

                                <p>Расходы на клики</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-arrow-graph-down-right"></i>
                            </div>
                        </div>
                    </div>
                </div>



            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Запросы</h3>
                </div>

                    <!-- /.card-header -->



                <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>

                            <tr>
                                <th width="250">Запрос</th>
                                <th width="100">Цена клика, руб.</th>
                                <th>Заявка</th>
                                <th>Дата визита</th>
                                <th width="160">Прибыль</th>
                                <th>ROI</th>
                            </tr>

                            </thead>
                            <tbody>
                                @foreach($keywords as $keyword)
                                    <tr>
                                        <td>
                                            {{ $keyword->keyword }}
                                        </td>
                                        <td>
                                            {{ $keyword->click_price }}
                                        </td>
                                        <td>
                                            @if($keyword->convert == 1)
                                                <span class="badge-success badge">Целевое действие</span>
                                            @else
                                                <span class="badge badge-warning">Посещение</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $keyword->click_date }}
                                        </td>
                                        <td>
                                            {{ $keyword->profit }}

                                        </td>
                                        <td>
                                            {{ $keyword->roi }}%
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>

                    <!-- /.card-body -->

            </div>
            <!-- /.card -->
            @endif
        </div>
    </section>
@endsection

