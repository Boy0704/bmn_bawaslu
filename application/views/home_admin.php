
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-success">
			<h2>Selamat Datang kembali, <?php echo $this->session->userdata('username'); ?></h2>
		</div>
	</div>

</div>

<div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Rekap Tahunan</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-wrench"></i></button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </div>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <div class="row">
            <div class="col-md-12">
              <p class="text-center">
                <strong> 2021 - 2031</strong>
              </p>

              <div class="chart">
                <!-- Sales Chart Canvas -->
                <canvas id="salesChart" style="height: 180px;"></canvas>
              </div>
              <!-- /.chart-responsive -->
            </div>

          </div>
          <!-- /.row -->
        </div>
        <!-- ./box-body -->
        
        <!-- /.box-footer -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>

<div class="row">
	<div class="col-md-12">
	      <!-- USERS LIST -->
	      <div class="box box-danger">
	        <div class="box-header with-border">
	          <h3 class="box-title">User Aktif</h3>

	          <div class="box-tools pull-right">
	            <!-- <span class="label label-danger">8 New Members</span> -->
	            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
	            </button>
	            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
	            </button>
	          </div>
	        </div>
	        <!-- /.box-header -->
	        <div class="box-body no-padding">
	          <ul class="users-list clearfix">
	            <?php foreach ($this->db->get('a_user')->result() as $rw): ?>
	                <li>
	                  <img src="image/user/<?php echo $rw->foto ?>" alt="User Image" style="width: 50px;">
	                  <a class="users-list-name" href="#"><?php echo $rw->nama_lengkap ?></a>
	                  <!-- <span class="users-list-date">Today</span> -->
	                </li>
	            <?php endforeach ?>
	            
	            
	          </ul>
	          <!-- /.users-list -->
	        </div>
	        <!-- /.box-body -->
	        <div class="box-footer text-center">
	          <a href="a_user" class="uppercase">View All Users</a>
	        </div>
	        <!-- /.box-footer -->
	      </div>
	      <!--/.box -->
	    </div>
	    <!-- /.col -->
	</div>


<script src="assets/bower_components/chart.js/Chart.js"></script>
<script type="text/javascript">
	$(function () {

  'use strict';

  /* ChartJS
   * -------
   * Here we will create a few charts using ChartJS
   */

  // -----------------------
  // - MONTHLY SALES CHART -
  // -----------------------

  // Get context with jQuery - using jQuery's .get() method.
  var salesChartCanvas = $('#salesChart').get(0).getContext('2d');
  // This will get the first returned node in the jQuery collection.
  var salesChart       = new Chart(salesChartCanvas);

  var salesChartData = {
    labels  : ['2021', '2022', '2023', '2024', '2025', '2026', '2027','2028','2029','2030'],
    datasets: [
      {
        label               : 'Informasi Berkala',
        fillColor           : '#00c0ef',
        strokeColor         : '#00c0ef',
        pointColor          : '#00c0ef',
        pointStrokeColor    : '#00c0ef',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: '#00c0ef',
        data                : [
        						300,
        						200,
        						30,
        						300,
        						500,
        						100,
        						400,
        						330,
        						350,
        						380
        					  ]
      }
    ]
  };

  var salesChartOptions = {
    // Boolean - If we should show the scale at all
    showScale               : true,
    // Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : false,
    // String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    // Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    // Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    // Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    // Boolean - Whether the line is curved between points
    bezierCurve             : true,
    // Number - Tension of the bezier curve between points
    bezierCurveTension      : 0.3,
    // Boolean - Whether to show a dot for each point
    pointDot                : false,
    // Number - Radius of each point dot in pixels
    pointDotRadius          : 4,
    // Number - Pixel width of point dot stroke
    pointDotStrokeWidth     : 1,
    // Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,
    // Boolean - Whether to show a stroke for datasets
    datasetStroke           : true,
    // Number - Pixel width of dataset stroke
    datasetStrokeWidth      : 2,
    // Boolean - Whether to fill the dataset with a color
    datasetFill             : true,
    // String - A legend template
    legendTemplate          : '<ul class=\'<%=name.toLowerCase()%>-legend\'><% for (var i=0; i<datasets.length; i++){%><li><span style=\'background-color:<%=datasets[i].lineColor%>\'></span><%=datasets[i].label%></li><%}%></ul>',
    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    maintainAspectRatio     : true,
    // Boolean - whether to make the chart responsive to window resizing
    responsive              : true
  };

  // Create the line chart
  salesChart.Line(salesChartData, salesChartOptions);

  // ---------------------------
  // - END MONTHLY SALES CHART -
  // ---------------------------
});
</script>


