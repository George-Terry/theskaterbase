$(function () {


	var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July", "September", "October", "November", "December"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "#fff",
            strokeColor: "#00BCD4",
            pointColor: "#00BCD4",
            pointStrokeColor: "#B2EBF2",
            pointHighlightFill: "#FF8F00",
            pointHighlightStroke: "#FFECB3",
            data: [0, 2, 5, 6, 10, 11, 13]
        }
    ]
	};

	var options = {

    ///Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines : true,

    //String - Colour of the grid lines
    scaleGridLineColor : "rgba(0,0,0,.05)",

    //Number - Width of the grid lines
    scaleGridLineWidth : 1,

    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,

    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines: true,

    //Boolean - Whether the line is curved between points
    bezierCurve : true,

    //Number - Tension of the bezier curve between points
    bezierCurveTension : 0,

    //Boolean - Whether to show a dot for each point
    pointDot : true,

    //Number - Radius of each point dot in pixels
    pointDotRadius : 10,

    //Number - Pixel width of point dot stroke
    pointDotStrokeWidth : 5,

    //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
    pointHitDetectionRadius : 20,

    //Boolean - Whether to show a stroke for datasets
    datasetStroke : true,

    //Number - Pixel width of dataset stroke
    datasetStrokeWidth : 5,

    //Boolean - Whether to fill the dataset with a colour
    datasetFill : false,

    //String - A legend template
    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

};

	// Get context with jQuery - using jQuery's .get() method.
	var ctx = $("#myChart").get(0).getContext("2d");
	// This will get the first returned node in the jQuery collection.
	var myLineChart = new Chart(ctx).Line(data, options);



});