@extends('layouts.app')
@section('title')
@section('content')
<div class="main-container">
	<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
		<div class="row clearfix progress-box">
			@if(Auth::user()->role == 'admin')
			<div class="col-lg-4 col-md-8 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-blue text-white">
								<i class="fa fa-briefcase"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-blue weight-500 font-24">{!! App\User::count() !!}</span>
							<p class="weight-400 font-18">Users</p>
						</div>
					</div>
					<div class="project-info-progress">
						<div class="row clearfix">
							<div class="col-sm-6 text-muted weight-500">Target</div>
							<div class="col-sm-6 text-right weight-500 font-14 text-muted">40</div>
						</div>
						<div class="progress" style="height: 10px;">
							<div class="progress-bar bg-blue progress-bar-striped progress-bar-animated" role="progressbar" style="width: 40%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-8 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-light-green text-white">
								<i class="fa fa-handshake-o"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-light-green weight-500 font-24">{!! App\Project::count() !!}</span>
							<p class="weight-400 font-18">Projects</p>
						</div>
					</div>
					<div class="project-info-progress">
						<div class="row clearfix">
							<div class="col-sm-6 text-muted weight-500">Target</div>
							<div class="col-sm-6 text-right weight-500 font-14 text-muted">50</div>
						</div>
						<div class="progress" style="height: 10px;">
							<div class="progress-bar bg-light-green progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-8 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-light-orange text-white">
								<i class="fa fa-list-alt"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-light-orange weight-500 font-24">{!! App\Client::count() !!}</span>
							<p class="weight-400 font-18">Clients</p>
						</div>
					</div>
					<div class="project-info-progress">
						<div class="row clearfix">
							<div class="col-sm-6 text-muted weight-500">Review</div>
							<div class="col-sm-6 text-right weight-500 font-14 text-muted">Good</div>
						</div>
						<div class="progress" style="height: 10px;">
							<div class="progress-bar bg-light-orange progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			</div>
			@else
			<div class="col-lg-4 col-md-8 col-sm-12 mb-30">
				<div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
					<div class="project-info clearfix">
						<div class="project-info-left">
							<div class="icon box-shadow bg-light-orange text-white">
								<i class="fa fa-list-alt"></i>
							</div>
						</div>
						<div class="project-info-right">
							<span class="no text-light-orange weight-500 font-24">{!! App\Blog::count() !!}</span>
							<p class="weight-400 font-18">Blogs</p>
						</div>
					</div>
					<div class="project-info-progress">
						<div class="row clearfix">
							<div class="col-sm-6 text-muted weight-500">Review</div>
							<div class="col-sm-6 text-right weight-500 font-14 text-muted">Good</div>
						</div>
						<div class="progress" style="height: 10px;">
							<div class="progress-bar bg-light-orange progress-bar-striped progress-bar-animated" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</div>
			</div>
			@endif
        </div>
        @if(Auth::user()->role == 'admin')
        <div class="bg-white pd-20 box-shadow border-radius-5 mb-30">
            <div class="bg-white pd-20 box-shadow border-radius-5 height-100-p">
                <div id="chart4"></div>
            </div>
        </div>
        @endif
	</div>
</div>
@endsection
@section('scripts')
<script src="/src/plugins/highcharts-6.0.7/code/highcharts.js"></script>
 <script src="/src/plugins/highcharts-6.0.7/code/highcharts-more.js"></script>
    <script type="text/javascript">
        // chart 4
        Highcharts.chart('chart4', {
            chart: {
                type: 'column'
            },
            colors: ['#7cb5ec', '#f7a35c', '#90ee7e', '#7798BF', '#aaeeee', '#ff0066',
        '#eeaaee', '#55BF3B', '#DF5353', '#7798BF', '#aaeeee', '#7cb5ec' ],
        
            title: {
                text: 'Monthly Average Rainfall'
            },
            subtitle: {
                text: 'Source: WorldClimate.com'
            },
            xAxis: {
                categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
                ],
                crosshair: true
            },
            yAxis: {
            min: 0,
            title: {
                text: "Users"
            }
        },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: {!! $data !!}

           
        });
    </script>
@endsection