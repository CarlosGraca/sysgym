
$('.daterange').daterangepicker({
  locale: {
      format: 'DD-MM-YYYY'
    },
  ranges: {
    'Today': [moment(), moment()],
    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
    'This Month': [moment().startOf('month'), moment().endOf('month')],
    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')],
    'This Year': [moment().startOf('year'), moment().endOf('year')]
  },
  start_time: moment().startOf('year'),
  endDate: moment().endOf('year')
}, function (start, end) {
    $('.range-date').text('Start: '+start.format('DD/MM/YYYY')+' - End: '+end.format('DD/MM/YYYY'));
    getDashboardData(start,end);
});

function bar_chart(label, dataAgenda, dataSheets) {
  var areaChartData = {
    labels: label,
    datasets: [
      {
        label: "Consult Agenda",
        fillColor: "#00c0ef",
        strokeColor: "rgba(210, 214, 222, 1)",
        pointColor: "rgba(210, 214, 222, 1)",
        pointStrokeColor: "#c1c7d1",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(220,220,220,1)",
        data: dataAgenda
      }
      /*{
        label: "Sheets",
        fillColor: "#00a65a",
        strokeColor: "rgba(60,141,188,0.8)",
        pointColor: "#3b8bba",
        pointStrokeColor: "rgba(60,141,188,1)",
        pointHighlightFill: "#fff",
        pointHighlightStroke: "rgba(60,141,188,1)",
        data: dataSheets
      }*/
    ]
  };

  //-------------
  //- BAR CHART -
  //-------------
  if($("#barChart").get(0) !=  undefined){
  var barChartCanvas = $("#barChart").get(0).getContext("2d");
  var barChart = new Chart(barChartCanvas);
  var barChartData = areaChartData;
  barChartData.datasets[0].fillColor = "#00a65a";
  barChartData.datasets[0].strokeColor = "#00a65a";
  barChartData.datasets[0].pointColor = "#00a65a";
  var barChartOptions = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero: true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines: true,
    //String - Colour of the grid lines
    scaleGridLineColor: "rgba(0,0,0,.05)",
    //Number - Width of the grid lines
    scaleGridLineWidth: 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,
    //Boolean - If there is a stroke on each bar
    barShowStroke: true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth: 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing: 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing: 1,
    //String - A legend template
    legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].fillColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
    //Boolean - whether to make the chart responsive
    responsive: true,
    maintainAspectRatio: true
  };

  barChartOptions.datasetFill = false;
  barChart.Bar(barChartData, barChartOptions);
}
  //-------------
  //- LINE CHART -
  //--------------
  if($("#lineChart").get(0)!= undefined){
    var lineChartCanvas = $("#lineChart").get(0).getContext("2d");
    var lineChart = new Chart(lineChartCanvas);
    var lineChartOptions = {
      //Boolean - If we should show the scale at all
      showScale: true,
      //Boolean - Whether grid lines are shown across the chart
      scaleShowGridLines: false,
      //String - Colour of the grid lines
      scaleGridLineColor: "rgba(0,0,0,.05)",
      //Number - Width of the grid lines
      scaleGridLineWidth: 1,
      //Boolean - Whether to show horizontal lines (except X axis)
      scaleShowHorizontalLines: true,
      //Boolean - Whether to show vertical lines (except Y axis)
      scaleShowVerticalLines: true,
      //Boolean - Whether the line is curved between points
      bezierCurve: true,
      //Number - Tension of the bezier curve between points
      bezierCurveTension: 0.3,
      //Boolean - Whether to show a dot for each point
      pointDot: false,
      //Number - Radius of each point dot in pixels
      pointDotRadius: 4,
      //Number - Pixel width of point dot stroke
      pointDotStrokeWidth: 1,
      //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
      pointHitDetectionRadius: 20,
      //Boolean - Whether to show a stroke for datasets
      datasetStroke: true,
      //Number - Pixel width of dataset stroke
      datasetStrokeWidth: 2,
      //Boolean - Whether to fill the dataset with a color
      datasetFill: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].lineColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
      //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true
    };
    lineChartOptions.datasetFill = false;
    lineChart.Line(areaChartData, lineChartOptions);
  }
}

function getDashboardData(start, end) {
  var url = 'dashboard/graphic';

  var start_time = start.format('YYYY-MM-DD'),
  endDate = end.format('YYYY-MM-DD'),
  params = {'start_time':start_time, 'endDate':endDate};

  $.ajax({
        url: url,
        data: params,
        type: 'POST',
        dataType: 'json',
        success: function (result) {
            var labels = [], dataAgenda=[], dataSheets=[];

            if( (result['consult_agenda'].length == 0) ){ //&& (result['sheets'].length == 0) ){
              var infoHtml = "No data to show. Please choose another Date.";
              toastr.info(infoHtml,{timeOut: 5000} ).css("width","300px");
            }

            /*if(result['tests'].length > result['sheets'].length){*/

                for (var i = 0; i < result['consult_agenda'].length; i++) {
                  /*
                  if((result['sheets'].length > 0)){
                    for(var j = 0; j < result['sheets'].length; j++  ){
                      if ( (result['tests'][i].month == result['sheets'][j].month)) {
                          labels.push(months_pt[result['tests'][i].month]);
                          dataAgenda.push(result['tests'][i].test_count);
                          dataSheets.push(result['sheets'][j].sheet_count);
                      }else{
                        labels.push(months_pt[result['tests'][i].month]);
                        dataAgenda.push(result['tests'][i].test_count);
                        dataSheets.push(0);
                      }
                    }*/
                 // }else{

                    labels.push(months[result['consult_agenda'][i].month]);
                    dataAgenda.push(result['consult_agenda'][i].agenda_count);

                 // }

                }

            /*}else{

              for (var i = 0; i < result['sheets'].length; i++) {
                if( (result['tests'].length > 0) ){
                    for(var j = 0; j < result['tests'].length; j++  ){
                      if (result['tests'][j].month == result['sheets'][i].month) {
                          labels.push(months_pt[result['sheets'][i].month]);
                          dataSheets.push(result['sheets'][i].sheet_count);
                          dataAgenda.push(result['tests'][j].test_count);
                      }else{
                        labels.push(months_pt[result['sheets'][i].month]);
                        dataSheets.push(result['sheets'][i].sheet_count);
                        dataAgenda.push(0);
                      }
                    }
                  }else{
                    labels.push(months_pt[result['sheets'][i].month]);
                    dataSheets.push(result['sheets'][i].sheet_count);
                    dataAgenda.push(0);
                  }
              }

            }*/

            bar_chart(labels, dataAgenda);

        },
        error: function (data) {
            console.log('Error:', data);
        }
  });
}

$(function () {
  startDashboard();
});

function startDashboard() {

  var start = moment().startOf('year');
  var end = moment().endOf('year');

  $('.range-date').text('Start: '+start.format('DD/MM/YYYY')+' - End: '+end.format('DD/MM/YYYY'));
  var chart = $('#barChart').get(0);
  if(chart !== undefined)
    getDashboardData(start,end);
}

//CHANGE GRAPHIC SHOW!
$(document).on('click','#line',function() {
  $('#barChart').remove();
  $('.chart').html('<canvas id="lineChart" style="height:230px"></canvas>');
  $('#chart-title').text($(this).text());
  startDashboard();
});

$(document).on('click','#bar', function() {
  $('#barChart').remove();
  $('.chart').html('<canvas id="barChart" style="height:230px"></canvas>');
  $('#chart-title').text($(this).text());
  startDashboard();
});
