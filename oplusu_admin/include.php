<?php
	//date_default_timezone_set('Asia/Hong_Kong');
	$today = getdate();
	$month = $today['month'];
	$mday = $today['mday'];
	$year = $today['year'];
	$prevYear = $year-1;
	$nextYear = $year+1;
	$intMonth = 0;

	$strMonth = array("January"=>"1",
						"February"=>"2",
						"March"=>"3",
						"April"=>"4",
						"May"=>"5",
						"June"=>"6",
						"July"=>"7",
						"August"=>"8",
						"Septemeber"=>"9",
						"October"=>"10",
						"November"=>"11",
						"December"=>"12",
	);
	$intMonth = $strMonth[$month];

	$strDate = $year."-".$intMonth."-".$mday;
	$strYear = substr($year,2 , 4);

	function renewPath($path)
	{
		$path = str_replace("../", "./", $path);
		return $path;
	}

	function curPageURL() {
		$pageURL = 'http';
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		}
		else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}


?>
