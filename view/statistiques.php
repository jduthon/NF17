<h1>
	Statistiques de l'Agence :
</h1>
<div class="panel panel-primary">
  <div class="panel-heading">Nombre de locations </div>


<canvas id="locCliProChart" width="1000" height="600"></canvas>
	<p style="color:rgba(220,220,220,1);"> Nombre de locations particuliers</p>
	<p style="color:rgba(151,187,205,1);"> Nombre de locations professionnels</p>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">Locations par type de véhicule </div>
	<div class="row">
	  <div class="col-md-8"> <canvas id="typeVoitChart" width="800" height="600"></canvas> </div>
	  <div class="col-md-4">	
							<div class="panel panel-default">
								<div class="panel-heading">Légende</div>
								<div class="panel-body"> 
									<ul>
										<li style="color:#F7464A;"> Berline </li>
										<li style="color:#E2EAE9;"> Citadine </li>
										<li style="color:#D4CCC5;"> Utilitaire </li>
										<li style="color:#949FB1;"> Tapin </li>
									</ul>
								</div>
							</div>
		</div>
</div>


<script src="<?php echo $_js; ?>/Chart.js"></script>
<script type="text/javascript"> 
//Get the context of the canvas element we want to select
var ctx = document.getElementById("locCliProChart").getContext("2d");
var myNewChart = new Chart(ctx);
var data = {
	labels : ["Janvier","Février","Mars","Avril","Mai","Juin","Juillet"],
	datasets : [
		{
			fillColor : "rgba(220,220,220,0.5)",
			strokeColor : "rgba(220,220,220,1)",
			pointColor : "rgba(220,220,220,1)",
			pointStrokeColor : "#fff",
			data : [65,59,90,81,56,55,40]
		},
		{
			fillColor : "rgba(151,187,205,0.5)",
			strokeColor : "rgba(151,187,205,1)",
			pointColor : "rgba(151,187,205,1)",
			pointStrokeColor : "#fff",
			data : [28,48,40,19,96,27,90]
		}
	]
};
var options = {	
	//Boolean - If we show the scale above the chart data			
	scaleOverlay : false,
	//Boolean - If we want to override with a hard coded scale
	scaleOverride : false,
	//** Required if scaleOverride is true **
	//Number - The number of steps in a hard coded scale
	scaleSteps : null,
	//Number - The value jump in the hard coded scale
	scaleStepWidth : null,
	//Number - The scale starting value
	scaleStartValue : null,
	//String - Colour of the scale line	
	scaleLineColor : "rgba(0,0,0,.1)",
	//Number - Pixel width of the scale line	
	scaleLineWidth : 1,
	//Boolean - Whether to show labels on the scale	
	scaleShowLabels : true,
	//Interpolated JS string - can access value
	scaleLabel : "<%=value%>",
	//String - Scale label font declaration for the scale label
	scaleFontFamily : "'Arial'",
	//Number - Scale label font size in pixels	
	scaleFontSize : 12,
	//String - Scale label font weight style	
	scaleFontStyle : "normal",
	//String - Scale label font colour	
	scaleFontColor : "#666",	
	///Boolean - Whether grid lines are shown across the chart
	scaleShowGridLines : true,
	//String - Colour of the grid lines
	scaleGridLineColor : "rgba(0,0,0,.05)",
	//Number - Width of the grid lines
	scaleGridLineWidth : 1,	
	//Boolean - Whether the line is curved between points
	bezierCurve : true,
	//Boolean - Whether to show a dot for each point
	pointDot : true,
	//Number - Radius of each point dot in pixels
	pointDotRadius : 3,
	//Number - Pixel width of point dot stroke
	pointDotStrokeWidth : 1,
	//Boolean - Whether to show a stroke for datasets
	datasetStroke : true,
	//Number - Pixel width of dataset stroke
	datasetStrokeWidth : 2,
	//Boolean - Whether to fill the dataset with a colour
	datasetFill : true,
	//Boolean - Whether to animate the chart
	animation : true,
	//Number - Number of animation steps
	animationSteps : 60,
	//String - Animation easing effect
	animationEasing : "easeOutQuart",
	//Function - Fires when the animation is complete
	onAnimationComplete : null
};
new myNewChart.Line(data,options);

var  typeVoitChart = document.getElementById("typeVoitChart").getContext("2d");
var data = [
	{value: 30,color:"#F7464A"},
	{value : 50,color : "#E2EAE9"},
	{value : 100,color : "#D4CCC5"},
	{value : 40,color : "#949FB1"},
	{value : 120,color : "#4D5360"}
];
options = {
	//Boolean - Whether we should show a stroke on each segment
	segmentShowStroke : true,
	//String - The colour of each segment stroke
	segmentStrokeColor : "#fff",
	//Number - The width of each segment stroke
	segmentStrokeWidth : 2,
	//The percentage of the chart that we cut out of the middle.
	percentageInnerCutout : 50,
	//Boolean - Whether we should animate the chart	
	animation : true,
	//Number - Amount of animation steps
	animationSteps : 100,
	//String - Animation easing effect
	animationEasing : "easeOutBounce",
	//Boolean - Whether we animate the rotation of the Doughnut
	animateRotate : true,
	//Boolean - Whether we animate scaling the Doughnut from the centre
	animateScale : false,
	//Function - Will fire on animation completion.
	onAnimationComplete : null
}
new Chart(typeVoitChart).Doughnut(data,options);
</script>