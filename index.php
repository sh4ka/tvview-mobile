<?php
require_once('services/ApiController.php');

$controller = new ApiController();
$todayShowsData = $controller->getScheduleSmall();

var_dump($todayShowsData);

?>