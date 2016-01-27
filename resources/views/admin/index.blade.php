@extends('layout')


@section('title', 'Admin')


@section('content')


    <div class="container">


            <div class="row">
                <div class="col-lg-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-inverse pull-left">
                            <i class="icon-lock text-inverse"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">{{ $disabledBlogsCount }}</b></h3>
                            <p class="text-muted">Blog désactivé{{ $disabledBlogsCount > 1 ? 's':'' }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-inverse pull-left">
                            <i class="ti-notepad text-inverse"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">{{ $articlesCount }}</b></h3>
                            <p class="text-muted">Article{{ $articlesCount > 1 ? 's':'' }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-inverse pull-left">
                            <i class="ti-user text-inverse"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">{{ $studentsCount }}</b></h3>
                            <p class="text-muted">Elève{{ $studentsCount > 1 ? 's':'' }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="widget-bg-color-icon card-box">
                        <div class="bg-icon bg-icon-inverse pull-left">
                            <i class="fa fa-user text-inverse"></i>
                        </div>
                        <div class="text-right">
                            <h3 class="text-dark"><b class="counter">{{ $teachersCount }}</b></h3>
                            <p class="text-muted">Prof{{ $teachersCount > 1 ? 's':'' }}</p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-box">
                        <h3 class="m-t-0 header-title"><b>Les utilisateurs les plus actifs par nombre d'articles</b></h3>
                        <canvas id="bar-single" height="400" width="1000"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-box">
                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark">
                                    Tags les plus fréquents
                                </h3>
                                <div class="portlet-widgets">
                                    <span class="divider"></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet4" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div id="pie-chart">
                                        <div id="tags-pie-chart-container" class="flot-chart" style="height: 320px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card-box">
                        <div class="portlet"><!-- /primary heading -->
                            <div class="portlet-heading">
                                <h3 class="portlet-title text-dark">
                                    Les blogs les plus visités
                                </h3>
                                <div class="portlet-widgets">
                                    <span class="divider"></span>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div id="portlet4" class="panel-collapse collapse in">
                                <div class="portlet-body">
                                    <div id="pie-chart">
                                        <div id="visitedblogs-pie-chart-container" class="flot-chart" style="height: 320px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </div> <!-- container -->
@endsection


@section('scripts')
    <script src="/plugins/flot-chart/jquery.flot.js"></script>
    <script src="/plugins/flot-chart/jquery.flot.pie.js"></script>

    <script src="/plugins/Chart.js/Chart.min.js"></script>

    <script>

        $(document).ready(function(){

            //========================== Most frequent Tags Pie Chart
            var tagsData = JSON.parse('{!! $frequentTags !!}');
            var tagsOptions = {
                series : {
                    pie : {
                        show : true
                    }
                },
                legend : {
                    show : false
                },
                grid : {
                    hoverable : true,
                    clickable : true
                },
                colors : ["#5fbeaa", "#6c85bd", "#34d3eb"],
                tooltip : false
            };

            $.plot('#tags-pie-chart-container',tagsData,tagsOptions);


            //========================== Most visited blogs Tags Pie Chart
            var mostVisitedBlogsdata = JSON.parse('{!! $mostVisitedBlogs !!}');
            var mostVisitedBlogsOptions = {
                series : {
                    pie : {
                        show : true
                    }
                },
                legend : {
                    show : true
                },
                grid : {
                    hoverable : true,
                    clickable : true
                },
                tooltip : true
            };

            $.plot('#visitedblogs-pie-chart-container',mostVisitedBlogsdata,mostVisitedBlogsOptions);



            //========================== Most Active Bloggers Bar chart
            var activeBloggers = JSON.parse('{!! $activeBloggers !!}');

            //barchart-Single
            var BarChartSingle = {
                labels : activeBloggers.map(function(blog){
                    return blog.username;
                }),
                datasets : [
                    {
                        fillColor: '#ebeff2',
                        strokeColor: '#ebeff2',
                        highlightFill: '#5fbeaa',
                        highlightStroke: '#ebeff2',
                        data : activeBloggers.map(function(blog){
                            return blog.articlesCount;
                        })
                    }
                ]
            };

            var ctx = $("#bar-single").get(0).getContext("2d");
            new Chart(ctx).Bar(BarChartSingle);

        });
    </script>
@endsection