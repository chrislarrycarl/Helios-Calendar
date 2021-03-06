<?php
/**
 * @package Helios Calendar
 * @license GNU General Public License version 2 or later; see LICENSE
 */
	if(!defined('hcAdmin')){header("HTTP/1.1 403 No Direct Access");exit();}
	
	$errorMsg = '';
	$result = doQuery("SELECT * FROM " . HC_TblPrefix . "settings WHERE PkID IN(5,6);");
	if(!hasRows($result)){
		$apiFail = true;
		$errorMsg = 'Eventbrite API Settings Unavailable.';
	} else {
		$ebAPI = cOut(hc_mysql_result($result,0,1));
		$ebUser = cOut(hc_mysql_result($result,1,1));
		
		if($ebAPI == '' || $ebUser == ''){
			$apiFail = true;
			$errorMsg = 'Eventbrite API Settings Missing.';
		} else {
			if(!$fp = fsockopen("ssl://www.eventbrite.com", 443, $errno, $errstr, 10))
				$fp = fsockopen("www.eventbrite.com", 80, $errno, $errstr, 10);
			
			if(!$fp){
				$apiFail = true;
				$errorMsg = 'Connection to Eventbrite Service Failed.';
			} else {
				$data = '';
				$request = "GET /xml/venue_get?app_key=".$ebAPI."&user_key=".$ebUser."&id=".$ebID." HTTP/1.1\r\nHost: www.eventbrite.com\r\nConnection: Close\r\n\r\n";
				
				fwrite($fp, $request);
				while(!feof($fp)) {
					$data .= fread($fp,1024);
				}
				fclose($fp);
				
				$error = xml_elements('error_message',$data);
				if($error[0] != ''){
					$apiFail = true;
					$errorMsg = 'Error Msg From Eventbrite - <i>' . $error[0] . '</i>';
				} else {
					$ebID = xml_tag_value('id', $data);
					$iso_country = xml_tag_value('country_code', $data);
				}
			}
		}
	}
	echo ($errorMsg != '') ? $errorMsg : '';
?>