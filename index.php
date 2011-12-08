<?php
require_once('class/dateclass.php');
require_once('services/ApiController.php');

$dateHandler = new DateClass();
$dateStringToday = $dateHandler->ToString('Y-m-d');
$tmpAr = explode('-', $dateStringToday);
if($tmpAr[2]<10){$tmpAr[2] = substr($tmpAr[2], 1);}
$dateStringToday = implode('-', $tmpAr);

$controller = new ApiController();
$yearShowsData = $controller->getScheduleSmall();


foreach ($yearShowsData as $day) {
	if($day['attr'] == $dateStringToday)
	{
		// we found today shows
		 $todayData = $day;
		 //var_dump($todayData);
	}
}
?>
<!doctype html>
<html manifest="index.appcache">
<?php
	include_once('includes/includes.php');
?>
</head> 

<body class="app">
    <!--
        First, you have to do is create a LungoJS Application instance in the file app.js.
        ...and use a Webkit browser as Chrome or Safari.
    -->
    <section id="section_tvview">
        <header data-title="tvview-mobile"></header>                
        <article id="articulo1" class="list">
        	<?php
        		foreach ($todayData as $time) {
        			$timeStep = $time;		
					foreach ($timeStep as $show) {
						echo '<li><strong>'.$show['name'].'</strong><small>'.$timeStep['attr'].'</small></li>';
					}					
				}
        	?>        	
        </article>        
    </section>   

    <!-- LungoJS (Production mode) -->
    <script src="lungo.js/lungo-1.0.2.packed.js"></script>
    <!-- LungoJS - Sandbox App -->    
    <script src="app/app.js"></script>
    <script src="app/data.js"></script>
    <script src="app/events.js"></script>
    <script src="app/services.js"></script>
    <script src="app/view.js"></script>
</body> 
</html>