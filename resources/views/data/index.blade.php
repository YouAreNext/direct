@extends('layouts.app')

@section('content')

        <div class="col-md-8">
            <!-- general form elements -->
            <h2>
                Заказы по дням
            </h2>
            <div class="card-body">
                <div class="chart">
                    <canvas id="areaChart" style="height:300px" width="500"></canvas>
                </div>
            </div>



        </div>
        <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fa fa-tag"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Покупки</span>
                    <span class="info-box-number">
                       {{ $count_convert }}
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="fas fa-percent"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">ROI</span>
                    <span class="info-box-number">
                      @if(!empty($sum_profit))
                            {{ number_format(($sum_profit/$sum_click)*100,0) }}
                        @else
                            0
                        @endif
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fas fas fa-dollar-sign"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Прибыль</span>
                    <span class="info-box-number">{{ $sum_profit }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="fas fa-donate"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Расходы</span>
                    <span class="info-box-number">{{ $sum_click }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->


            <!-- /.card -->


        </div>
    <div class="col-md-12">
        <h2>
            График прибыли за месяц
        </h2>
        <div class="card-body col-md-12">
            <div class="chart">
                <canvas id="lineChart" style="height:400px" width="300px"></canvas>
            </div>
        </div>
    </div>

@endsection

@section('bottom_script')
    <script>
        $(function () {
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
            // This will get the first returned node in the jQuery collection.
            var areaChart       = new Chart(areaChartCanvas)

            var areaChartData = {
                labels  : [
                    @foreach($keywords as $keyword)
                    '{{ date('d-m-Y',strtotime($keyword->click_date)) }}',
                    @endforeach

                ],
                datasets: [
                    {
                        label               : 'Конверсия в заявку',
                        fillColor           : 'rgba(60,141,188,0.9)',
                        strokeColor         : 'rgba(60,141,188,0.8)',
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [
                            @foreach($keywords as $keyword)
                                @if($keyword->convert == 1)
                                1,
                                @else
                                0,
                                @endif
                            @endforeach
                        ]
                    }

                ]
            }

            var areaChartOptions = {
                //Boolean - If we should show the scale at all
                showScale               : true,
                //Boolean - Whether grid lines are shown across the chart
                scaleShowGridLines      : false,
                //String - Colour of the grid lines
                scaleGridLineColor      : 'rgba(0,0,0,.05)',
                //Number - Width of the grid lines
                scaleGridLineWidth      : 1,
                //Boolean - Whether to show horizontal lines (except X axis)
                scaleShowHorizontalLines: true,
                //Boolean - Whether to show vertical lines (except Y axis)
                scaleShowVerticalLines  : true,
                //Boolean - Whether the line is curved between points
                bezierCurve             : true,
                //Number - Tension of the bezier curve between points
                bezierCurveTension      : 0.3,
                //Boolean - Whether to show a dot for each point
                pointDot                : false,
                //Number - Radius of each point dot in pixels
                pointDotRadius          : 4,
                //Number - Pixel width of point dot stroke
                pointDotStrokeWidth     : 1,
                //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
                pointHitDetectionRadius : 20,
                //Boolean - Whether to show a stroke for datasets
                datasetStroke           : true,
                //Number - Pixel width of dataset stroke
                datasetStrokeWidth      : 2,
                //Boolean - Whether to fill the dataset with a color
                datasetFill             : true
                //String - A legend te
            };

            //Create the line chart
            areaChart.Line(areaChartData, areaChartOptions)

            var lineChartData= {
                labels  : [
                    @foreach($profits as $profit)
                        '{{ $profit->click_date }}',
                    @endforeach

                ],
                datasets: [
                    {
                        label               : 'Конверсия в заявку',
                        fillColor           : 'rgba(60,141,188,0.9)',
                        strokeColor         : 'rgba(60,141,188,0.8)',
                        pointColor          : '#3b8bba',
                        pointStrokeColor    : 'rgba(60,141,188,1)',
                        pointHighlightFill  : '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data                : [
                            @foreach($profits as $profit)
                            {{ $profit->total }},

                            @endforeach
                        ]
                    }

                ]
            }

            var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
            var lineChart                = new Chart(lineChartCanvas)
            var lineChartOptions         = areaChartOptions
            lineChartOptions.datasetFill = false
            lineChart.Line(lineChartData, lineChartOptions)
        });
    </script>
@stop