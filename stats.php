<?php 
$ptitle="Startisticks";
$psubtitle="Serveur";
@include('config.php');
@include('link_map.php');
?>
<!DOCTYPE HTML>
<html lang = "fr">
	<head>
            <?php @include_once("common/head.php"); ?>
            <?php @include_once("css/custom-style.html"); ?>
	</head>
	<body class="no-slider">
	<!-- <body class="has-top-menu"> -->
		<div id="top-layer">
		<div id="header-top">  
		<header id="header">
			                          	
				<div class="wrapper">					
								<?php include_once("includes/Menu_Bottom.php"); ?>									
				</div>
			
		</header>
		</div>
			<section id="content">
                            <div id="logo">
                                <a href="./"><div class="logo_hydra"></div></a>
                            </div>

				<div id="main-box">
				<div class="mainContent boxCenter">
					<div class="top_mainContent bg_mainContent"><h1 class="text-center title">STATS</h1></div>
					
					<div class="box_mainContent bg_mainContent">		
                                            <?php include_once("includes/statistics.php"); ?>
					</div>
					<div class="bottom_mainContent bg_mainContent "></div>
					</div>
					
					<div class="clear-float"></div>
					
				</div>
			</section>
		</div>
			
		<div class="clear-float"></div>
		
		<div class="wrapper">
			<!-- BEGIN .footer -->
                        <?php include_once("includes/footer.php"); ?>
		</div>
                <?php @include("includes/popups.php"); ?>
		<?php include_once("jscript/includes_noslider.php"); ?>
<script src="jscript/amcharts_3.21.1/amcharts/amcharts.js" type="text/javascript"></script>
<script src="jscript/amcharts_3.21.1/amcharts/pie.js" type="text/javascript"></script>
<script src="jscript/amcharts_3.21.1/amcharts/serial.js" type="text/javascript"></script>
<script src="jscript/amcharts_3.21.1/amcharts/themes/light.js"></script>
<script>
            AmCharts.makeChart("chartdiv", {
                "type": "pie",
				"theme": "light",
				"addClassNames": true,
                "dataProvider": [{
                    "country": "Dragon",
                        "litres": <?php echo $dragon ?>
                }, {
                    "country": "Destructeur",
                        "litres": <?php echo $destru ?>
                }, {
                    "country": "Oracle",
                        "litres": <?php echo $oracl ?>
                }, {
                    "country": "Arcaniste",
                        "litres": <?php echo $arcan ?>
                }, {
                    "country": "Sentinelle",
                        "litres": <?php echo $senti ?>
                }, {
                    "country": "Commando",
                        "litres": <?php echo $comma ?>
				}, {
                    "country": "Voltigeur",
                        "litres": <?php echo $volti ?>
                }, {
                    "country": "Ombre",
                        "litres": <?php echo $ombre ?>
				}, {
                    "country": "Elementaliste",
                        "litres": <?php echo $chaClass ?>
                }, {
                    "country": "Furie Dake",
                        "litres": <?php echo $furClass ?>
                }],
                "titleField": "country",
                "valueField": "litres",
                "balloonText": "[[title]]<br><span style='font-size:14px'><b>[[value]]</b> ([[percents]]%)</span>",
                "legend": {
                    "align": "center",
                    "markerType": "circle"
                }

            });

        </script>
        <script>
        var chart;
var legend;
var selected;

var types = [
    {type: "Guerriers",
  percent: <?php echo $warClassPer ?>,
  color: "#ff9e01",
  subs: [{
    type: "Dragons",
    percent: <?php echo $dragonPerToT ?>
  }, {
    type: "Destructeurs",
    percent: <?php echo $destruPerToT ?>
  }]},
    {type: "Magiciens",
  percent: <?php echo $magClassPer ?>,
  color: "#0080FF",
  subs: [{
    type: "Oracles",
    percent: <?php echo $oraclPerToT ?>
  }, {
    type: "Arcanistes",
    percent: <?php echo $arcanPerToT ?>
  }]},
  {type: "Archers",
  percent: <?php echo $arcClassPer ?>,
  color: "#04B404",
  subs: [{
    type: "Sentinelles",
    percent: <?php echo $sentiPerToT ?>
  }, {
    type: "Commandos",
    percent: <?php echo $commaPerToT ?>
  }]},
  {type: "Voleurs",
  percent: <?php echo $volClassPer ?>,
  color: "#6A0888",
  subs: [{
    type: "Voltigeurs",
    percent: <?php echo $voltiPerToT ?>
  }, {
    type: "Ombres",
    percent: <?php echo $ombrePerToT ?>
  }]},
  {type: "Drakans",
  percent: <?php echo $drakClassPer ?>,
  color: "#A9BCF5",
  subs: [{
    type: "Elementalistes",
    percent: <?php echo $chaClassPer ?>
  }, {
    type: "Furie Drake",
    percent: <?php echo $furClassPer ?>
  }]}
];

function generateChartData() {
  var chartData = [];
  for (var i = 0; i < types.length; i++) {
    if (i == selected) {
      for (var x = 0; x < types[i].subs.length; x++) {
        chartData.push({
          type: types[i].subs[x].type,
          percent: types[i].subs[x].percent,
          color: types[i].color,
          pulled: true
        });
      }
    } else {
      chartData.push({
        type: types[i].type,
        percent: types[i].percent,
        color: types[i].color,
        id: i
      });
    }
  }
  return chartData;
}

AmCharts.makeChart("chartdiv2", {
  "type": "pie",
"theme": "light",

  "dataProvider": generateChartData(),
  "labelText": "[[title]]: [[value]]",
  "balloonText": "[[title]]: [[value]]",
  "titleField": "type",
  "valueField": "percent",
  "outlineColor": "#FFFFFF",
  "outlineAlpha": 0.8,
  "outlineThickness": 2,
  "colorField": "color",
  "pulledField": "pulled",
  "titles": [{
    "text": "Cliquez pour voir le détail"
  }],
  "listeners": [{
    "event": "clickSlice",
    "method": function(event) {
      var chart = event.chart;
      if (event.dataItem.dataContext.id != undefined) {
        selected = event.dataItem.dataContext.id;
      } else {
        selected = undefined;
      }
      chart.dataProvider = generateChartData();
      chart.validateData();
    }
  }],
  "export": {
    "enabled": true
  }
});
        </script>
        <script>
var chartData = generateChartData();

var chart = AmCharts.makeChart("chart2", {
    "type": "serial",
    "theme": "light",
    "marginRight": 80,
    "dataProvider": chartData,
    "valueAxes": [{
        "position": "left",
        "title": "Joueurs en ligne"
    }],
    "graphs": [{
        "id": "g1",
        "fillAlphas": 0.4,
        "valueField": "visits",
         "balloonText": "<div style='margin:5px; font-size:19px;'>Connectés:<b>[[value]]</b></div>"
    }],
    "chartScrollbar": {
        "graph": "g1",
        "scrollbarHeight": 80,
        "backgroundAlpha": 0,
        "selectedBackgroundAlpha": 0.1,
        "selectedBackgroundColor": "#888888",
        "graphFillAlpha": 0,
        "graphLineAlpha": 0.5,
        "selectedGraphFillAlpha": 0,
        "selectedGraphLineAlpha": 1,
        "autoGridCount": true,
        "color": "#AAAAAA"
    },
    "chartCursor": {
        "categoryBalloonDateFormat": "JJ:NN, DD MMMM",
        "cursorPosition": "mouse"
    },
    "categoryField": "date",
    "categoryAxis": {
        "minPeriod": "mm",
        "parseDates": true
    },
    "export": {
        "enabled": true,
         "dateFormat": "YYYY-MM-DD HH:NN:SS"
    }
});

chart.addListener("dataUpdated", zoomChart);
// when we apply theme, the dataUpdated event is fired even before we add listener, so
// we need to call zoomChart here
zoomChart();
// this method is called when chart is first inited as we listen for "dataUpdated" event
function zoomChart() {
    // different zoom methods can be used - zoomToIndexes, zoomToDates, zoomToCategoryValues
    chart.zoomToIndexes(chartData.length - 50, chartData.length - 0);//100
}


// generate some random data, quite different range
function generateChartData() {
    var chartData = [];
        chartData.push(
        <?php 
$dates_count=4320;//4320 - 3 mois
$statics_StartDate_iDX=237;//13976
$statics_cnt=CountOnlineStatics($statics_StartDate_iDX);
$cnt_res=$statics_cnt['lines'];
if($cnt_res>=4320){
    $dates_count=4320;
}else{
    $dates_count=$cnt_res;
}
$lcnt=0;
//
$query= $dbh3->prepare("{CALL [dbo].[up_LoginStatics] (?)}"); 
	$query->bindParam(1, $dates_count);
        $query->execute();
while ($LoadOnline= $query->fetch()) // On effectue une boucle des données récupérées plus haut grâce à la requête nommée "$requête".
{ 
$lcnt++;
$load_date=$LoadOnline['f_date'];  
$load_visits=$LoadOnline['online_count'];  
if($lcnt==$dates_count){
print "{
        date: '$load_date',
        visits: '$load_visits'
        }";  }
else{
print " {
        date: '$load_date',
        visits: '$load_visits'
        },";  }
}
$query->closeCursor();
        ?>                         
                );
    return chartData;
}    
        </script>
	</body>
</html>