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
	var $scheduleSmallURL = '/tools/quickschedule.php?country=';
	
	public function __construct()
	{
		
	}
	
	public function getScheduleSmall()
	{
		$sCharset = $this->defaultCharset;
		$sFilename = $this->baseUrl.$this->scheduleSmallURL.$this->region;
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
    	return $sData;
	}
	
	public function serializeData()
	{
		
	}
	
 }

?>