<?php

/**
 * Class used to interact with the TVRage public API
 * created by J. Flores <apunta666@gmail.com>
 */

 Class ApiController
 {
 	var $defaultCharset = 'UTF-8';
 	var $region = 'US';
	var $baseUrl = 'http://services.tvrage.com';
	var $scheduleSmallURL = '/myfeeds/fullschedule.php?key=';
	var $apiKey = 'bwXYmVWSXakEq3E9rQD1';
	
	public function __construct()
	{
		
	}
	
	public function getScheduleSmall()
	{
		$sCharset = $this->defaultCharset;
		$sFilename = $this->baseUrl.$this->scheduleSmallURL.$this->apiKey;
		//$sFilename = 'services/data.example.txt';
		/*
		if (floatval(phpversion()) >= 4.3) {
			$sData = file_get_contents($sFilename);
    	} else {
	        if (!file_exists($sFilename)) return -3;
	        $rHandle = fopen($sFilename, 'r');
	        if (!$rHandle) return -2;
	
	        $sData = '';
	        while(!feof($rHandle))
	            $sData .= fread($rHandle, filesize($sFilename));
	        fclose($rHandle);
    	}
	    if ($sEncoding = mb_detect_encoding($sData, 'auto', true) != $sCharset)
	        $sData = mb_convert_encoding($sData, $sCharset, $sEncoding);
		 * */
		//$sxe = new SimpleXMLElement($this->baseUrl.$this->scheduleSmallURL.$this->apiKey, NULL, TRUE);
    	$sxe = new SimpleXMLElement('services/data.example.txt', NULL, TRUE);
    	return $sxe;
	}
	
	public function scheduleDataHandler($mainData)
	{
		/*
		 * Search parameters
		 */
		$explodeString = '] [';
		$daysStart = '[DAY]';
		$daysEnd= '[/DAY]';
		
		/*
		 * Data containers
		 */		
		$dataDays = array();
		
		/*
		 * Search procedures
		 */		
		 $found = true;
		 $currentPosition = 0;
		 $lastPosition = 0;
		while ($found == true) {
			$currentPosition = strpos($mainData, $explodeString, $lastPosition);
			//var_dump($currentPosition);
			if($currentPosition == false){$found = false;break;}
			$currentPosition++;
			$dataDays[] = substr($mainData, $lastPosition, $currentPosition);
			$lastPosition = $currentPosition+1;
			//var_dump($lastPosition);
		}
		return $dataDays;
	}
	
 }

?>