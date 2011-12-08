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
		 var_dump($todayData);
	}
    //printf("%s tiene %d hijos.\n", $day['attr'], $day->count());
}
?>