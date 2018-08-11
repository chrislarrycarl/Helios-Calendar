<?php
/*
	Helios Calendar - Professional Event Management System
	Copyright � 2006 Refresh Web Development [http://www.refreshwebdev.com]
	
	Developed By: Chris Carlevato <chris@refreshwebdev.com>
	
	For the most recent version, visit the Helios Calendar website:
	[http://www.helioscalendar.com]
	
	License Information is found in docs/license.html
*/
	include('../../events/includes/include.php');
	//checkIt(1);
	
	$catID = $_POST['catID'];
	$catIDWhere = "0";
	$cnt = 0;
	foreach ($catID as $val){
		$catIDWhere = $catIDWhere . "," . $val;
		$cnt++;
	}//end while
	switch($_POST['eID']){
		case 1:	
			header ('Content-Type:text/plain; charset=utf-8');
			$result = doQuery("SELECT DISTINCT e.Title, c.CategoryName, MIN(e.StartDate), MAX(e.StartDate), e.Description, 
								e.LocationName, e.LocationAddress, e.LocationAddress2, e.LocationCity, e.LocationState, 
								e.LocationZip, e.ContactName, e.ContactEmail, e.ContactPhone, e.ContactURL, e.StartTime, e.EndTime
								FROM hc_events e
									LEFT JOIN hc_eventcategories ON (e.PkID = hc_eventcategories.EventID)
									LEFT JOIN hc_categories c ON (c.PkID = hc_eventcategories.CategoryID  AND c.PkID IN (" . $catIDWhere . "))
								WHERE e.IsActive = 1 AND
											e.IsApproved = 1 AND
											(e.StartDate BETWEEN '" . dateToMySQL($_POST['startDate'], "/", $_POST['dateFormat']) . "' AND '" . dateToMySQL($_POST['endDate'], "/", $_POST['dateFormat']) . "') AND
											c.IsActive = 1
								GROUP BY e.Title
								ORDER BY CategoryName, StartDate, Title");
			if(hasRows($result)){
				if($_POST['mID'] == 2){
					header('Content-Disposition:attachment; filename=' . date("Y-m-d") . 'HeliosOutput.rtf');
				}//end if
				echo "<Helios Output>" . chr(13) . chr(10);
				$curCat = "";
				while($row = mysql_fetch_row($result)){
					if($curCat != $row[1]){
						$curCat = $row[1];
						echo "@event head:" . $row[1] . chr(13) . chr(10);
					}//end if
					
					if($row[2] != $row[3]){
						echo "@date head:" . stampToDate($row[2], "F j") . " through " . stampToDate($row[3], "F j") . chr(13) . chr(10);
					} else {
						echo "@date head:" . stampToDate($row[2], "F j") . chr(13) . chr(10);
					}//end if
					
					$output = "@calendar copy:<B>" . unhtmlentities(preg_replace(array('/\r/', '/\n/'), "", strip_tags($row[0]))) . "</B>,";
					$output .= " Location: " . $row[5] . " " . $row[6] . " " . $row[7] . " " . $row[8] . " " . $row[9] . " " . $row[10];
					$output .= ". " . unhtmlentities(preg_replace(array('/\r/', '/\n/'), "", strip_tags($row[4])));
					if($row[15] != ''){
						$timepart = explode(":", $row[15]);
						$startTime = date($hc_timeFormat, mktime($timepart[0], $timepart[1], $timepart[2]));
						$output .= " Time: " .  $startTime;
						if($row[16] != ''){
							$timepart = explode(":", $row[16]);
							$endTime = date($hc_timeFormat, mktime($timepart[0], $timepart[1], $timepart[2]));
							$output .= " - " . $endTime;
						}//end if
					}//end if
					$output .= " Contact: " . $row[11] . " " . $row[12] . " " . $row[13] . " " . $row[14];
					echo str_replace("   ", "", $output);
					echo chr(13) . chr(10) . chr(13) . chr(10);
				}//end while
			} else {
				echo "There are no events available for that criteria.";
			}//end if
			break;
			
		case 2:
			header('Content-Type:text/plain; charset=utf-8');
			$result = doQuery("SELECT c.CategoryName, e.*
								FROM hc_events e
									LEFT JOIN hc_eventcategories ON (e.PkID = hc_eventcategories.EventID)
									LEFT JOIN hc_categories c ON (c.PkID = hc_eventcategories.CategoryID  AND c.PkID IN (" . $catIDWhere . "))
								WHERE e.IsActive = 1 AND
											e.IsApproved = 1 AND
											(e.StartDate BETWEEN '" . dateToMySQL($_POST['startDate'], "/", $_POST['dateFormat']) . "' AND '" . dateToMySQL($_POST['endDate'], "/", $_POST['dateFormat']) . "') AND
											c.IsActive = 1
								ORDER BY CategoryName, StartDate, Title, SeriesID");
			if(hasRows($result)){
				if($_POST['mID'] == 2){
					header('Content-Disposition:attachment; filename=' . date("Y-m-d") . 'HeliosOutput.csv');
				}//end if
				echo "title,eventdate,starttime,endtime,billboard,eventtext,location,address,address2,city," . strtolower(HC_StateLabel) . ",postalcode,url,contactname,contactemail,contactphone\n";
				while($row = mysql_fetch_row($result)){
					echo str_replace(",", "", $row[2]) . ",";
					echo str_replace(",", "", $row[10]) . ",";
					echo str_replace(",", "", $row[11]) . ",";
					echo str_replace(",", "", $row[13]) . ",";
					if($row[19] == 0){
						echo "no,";
					} else {
						echo "yes,";
					}//end if
					echo str_replace(",", "",strip_tags($row[9])) . ",";
					echo $row[3] . ",";
					echo $row[4] . ",";
					echo $row[5] . ",";
					echo $row[6] . ",";
					echo $row[7] . ",";
					echo $row[8] . ",";
					if($row[25] != 'http://' && $row[25] != ''){
						echo $row[25] . ",";
					} else {
						echo ",";
					}//end if
					echo str_replace(",", "", $row[14]) . ",";
					echo str_replace(",", "", $row[15]) . ",";
					echo str_replace(",", "", $row[16]);
					echo "\n";
				}//end while
			} else {
				echo "Their were no events found for that criteria.";
			}//end if
			break;
	}//end switch
	
	function unhtmlentities($text) {
	   $text= html_entity_decode($text,ENT_QUOTES,"ISO-8859-1"); #NOTE: UTF-8 does not work!
	   $text= preg_replace('/&#(\d+);/me',"chr(\\1)",$text); #decimal notation
	   $text= preg_replace('/&#x([a-f0-9]+);/mei',"chr(0x\\1)",$text);  #hex notation
	   return $text;
	}//end unhtmlentities()	?>