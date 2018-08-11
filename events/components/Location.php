<?php 
/*
	Helios Calendar
	Copyright (C) 2004-2010 Refresh Web Development, LLC. [www.RefreshMy.com]

	This file is part of Helios Calendar, it's usage is governed by
	the Helios Calendar SLA found at www.HeliosCalendar.com/license.html
*/
	include($hc_langPath . $_SESSION[$hc_cfg00 . 'LangSet'] . '/public/locations.php');
	
	$hourOffset = date("G") + ($hc_cfg35);
	$curCache = date("Ymd", mktime($hourOffset,0,0,date("m"),date("d"),date("Y")));
	$pastCache = date("Ymd", mktime($hourOffset,0,0,date("m"),date("d")-1,date("Y")));
	$curDate = date("Y-m-d", mktime($hourOffset,0,0,date("m"),date("d"),date("Y")));
	
	if(!file_exists(realpath('cache/lmap' . $curCache . '.php'))){
		foreach(glob('cache/lmap*.*') as $filename){
			unlink($filename);
		}//end foreach
		
		if(!is_numeric($hc_cfg42) || !is_numeric($hc_cfg43) || $hc_cfg42 == '' || $hc_cfg43 == ''){
	 		echo("<br />" . $hc_lang_locations['NoGeo']);
		} elseif(isset($hc_cfg26) && $hc_cfg26 != ''){
			ob_start();
			$fp = fopen('cache/lmap' . $curCache . '.js', 'w');?>

var markers = [];
var msgs = [];
var i = 0;
var map;
var marker;
function goHome(){map.setCenter(new GLatLng(<?php echo $hc_cfg42 . "," . $hc_cfg43;?>), <?php echo $hc_cfg41;?>);}//end goHome
function toggleLoc(show,hide){document.getElementById(show).style.display = 'block';document.getElementById(hide).style.display = 'none';return false;}//end toggleLoc()
function showLoc(i){map.setZoom(16);map.setMapType(G_NORMAL_MAP);markers[i].openInfoWindowHtml(msgs[i]);}//end showLoc()
function createMarker(i, point, msg){var marker = new GMarker(point);GEvent.addListener(marker, "click", function() {marker.openInfoWindowHtml(msg);});markers[i] = marker;msgs[i] = msg;return marker;}//end createMarker()
function buildGmap(){
	if (GBrowserIsCompatible()) {
		map = new GMap2(document.getElementById("hc_GmapLoc"));
		goHome();
		map.addControl(new GSmallMapControl());
		map.addControl(new GMapTypeControl());
<?php	$result = doQuery("SELECT l.*
							FROM " . HC_TblPrefix . "locations l
								LEFT JOIN " . HC_TblPrefix . "events e ON (e.LocID = l.PkID)
							WHERE l.Lat IS NOT NULL AND 
										l.Lon IS NOT NULL AND 
										l.Lat != '' AND 
										l.Lon != '' AND 
										l.IsActive = 1 AND
										e.IsActive = 1 AND
										e.IsApproved = 1 AND
										e.PkID IS NOT NULL AND
										e.StartDate >= '" . $curDate . "'
							GROUP BY l.PkID
							ORDER BY Name");
		$linkList = $hc_lang_locations['NoLocation'];
		if(hasRows($result)){
			$linkList = "";
			$x = 0;
			while($row = mysql_fetch_row($result)){
				$locID = cOut($row[0]);
				$resultLE = doQuery("SELECT * FROM " . HC_TblPrefix . "events WHERE IsActive = 1 AND IsApproved = 1 AND LocID = '" . $locID . "' AND StartDate >= '" . $curDate . "' ORDER BY StartDate LIMIT 15");
				if(hasRows($resultLE)){
					$locName = str_replace("'", "&#39;", cOut($row[1]));
					$locAddress = str_replace("'", "&#39;", cOut($row[2]));
					$locAddress2 = str_replace("'", "&#39;", cOut($row[3]));
					$locCity = str_replace("'", "&#39;", cOut($row[4]));
					$locState = str_replace("'", "&#39;", cOut($row[5]));
					$locZip = cOut($row[7]);
					$locURL = cOut($row[8]);
					$locPhone = str_replace("'", "&#39;", cOut($row[9]));
					$locEmail = cOut($row[10]);
					$locDesc = str_replace("'", "&#39;", cOut($row[11]));
					$locCountry = str_replace("'", "&#39;", cOut($row[6]));
					$locLat = cOut($row[15]);
					$locLon = cOut($row[16]);
					$locTag = '';
					$locEvents = '';
					$locLink = '<a href="' . CalRoot . '/link/index.php?tID=2&amp;oID=0&amp;lID=' . $row[0] . '" target="_blank" class="eventDetailLink">' . str_replace("'", "&#39;", htmlspecialchars($hc_lang_locations['Directions'])) . '</a>';
					if($locName != ''){
						$locTag .= '<b>' . $locName . '</b><br />';
					}//end if
					
					$locTag .= buildAddress($locAddress,$locAddress2,$locCity,$locState,$locZip,$locCountry,0,$hc_lang_config['AddressType']);

					if($locPhone != ''){
						$locTag .= '<br /><br />Phone: ' . $locPhone;
					}//end if
					if($locURL != '' && $locURL != 'http://'){
						$locTag .= '<br /><br />Website: <a href="' . CalRoot . '/link/index.php&#63;tID=4&amp;oID=' . $locID . '" target="_blank" class="eventMain">' . str_replace("'", "&#39;", htmlspecialchars($hc_lang_locations['Visit'])) . '</a>';
					}//end if
					$locTag .= '<br /><br />' . $locLink;
					$locTag .= '<br /><br />' . $locLat . ', ' . $locLon;
				
					$linkList .= '<li><a href="javascript:;" onclick="javascript:showLoc(' . $x . ');" class="locList">' . $locName . '</a></li>';
					while($rowLE = mysql_fetch_row($resultLE)){
						if($rowLE[11] == 0){
							$timeparts = explode(":", $rowLE[10]);
							$startTime = strftime($hc_cfg23, mktime($timeparts[0], $timeparts[1], $timeparts[2], 1, 1, 1971));
						} else {
							if($rowLE[11] == 1){
								$startTime = str_replace("'", "&#39;", htmlspecialchars($hc_lang_locations['AllDay']));
							} elseif($rowLE[11] == 2) {
								$startTime = str_replace("'", "&#39;", htmlspecialchars($hc_lang_locations['TBA']));
							}//end if
						}//end if
						$locEvents .= '<a href="' . CalRoot . '/index.php?com=detail&eID=' . $rowLE[0] . '" class="eventMain" target="_blank"><b>' . str_replace("'", "&#39;", htmlspecialchars($rowLE[1])) . '</b></a><br />' . stampToDate($rowLE[9], $hc_cfg14) . ' - ' . $startTime . '<br /><br />';
					}//end while
					$locOutput = '<div class="GmapLocMenu"><a href="javascript:;" onclick="toggleLoc(\\\'details' . $locID . '\\\',\\\'events' . $locID . '\\\');" class="locMenu">' . str_replace("'", "&#39;", htmlspecialchars($hc_lang_locations['Details'])) . '</a> | <a href="javascript:;" onclick="toggleLoc(\\\'events' . $locID . '\\\',\\\'details' . $locID . '\\\');" class="locMenu">' . str_replace("'", "&#39;", htmlspecialchars($hc_lang_locations['Events'])) . '</a>&nbsp;|&nbsp;<a href="' . CalRoot . '/index.php?lID=' . $locID . '" class="locMenu">' . str_replace("'", "&#39;", htmlspecialchars($hc_lang_locations['Browse'])) . '</a>&nbsp;|&nbsp;<a href="webcal://' . substr(CalRoot, 7) . '/link/SaveLocation.php?lID=' . $locID . '" class="locMenu">' . str_replace("'", "&#39;", htmlspecialchars($hc_lang_locations['Subscribe'])) . '</a>&nbsp;&nbsp;<a href="' . CalRoot . '/rss/l.php?lID=' . $locID . '" target="_blank"><img src="' . CalRoot . '/images/rss/feedIcon.gif" width="16" height="16" alt="' . $locName . ' ' . $hc_lang_locations['FeedAlt'] . '" style="vertical-align:middle;" /></a></div>';
					$locOutput .= '<div class="GmapLocPane">';
					$locOutput .= '<div id="details' . $locID . '">' . $locTag . '</div><div id="events' . $locID . '" style="display:none;">' . $locEvents . '</div>';
					$locOutput .= '</div>';
					
					echo "\n\t\tvar point = new GLatLng(" . $locLat . "," . $locLon . ");";
					echo "\n\t\tmap.addOverlay(createMarker(" . $x . ",point, '" . $locOutput . "'));";
					$x++;
				}//end if
			}//end while
			if($x == 0){
				$linkList = $hc_lang_locations['NoEvents'];
			}//end if
		}//end if	?>
	}//end if
}//end buildGmap()
function togList(){
	if(document.getElementById('locList').style.display == 'none'){
		document.getElementById('locList').style.display = 'block';
		document.getElementById('hc_GmapLoc').style.width = '75%';
		document.getElementById('locListLink').innerHTML = '<?php echo '<img src="' . CalRoot . '/images/icons/iconCollapse.png" width="16" height="16" alt="" border="0" style="vertical-align:middle;" /> ' . $hc_lang_locations['Hide']; ;?>';
	} else {
		document.getElementById('locList').style.display = 'none';
		document.getElementById('hc_GmapLoc').style.width = '100%';
		document.getElementById('locListLink').innerHTML = '<?php echo '<img src="' . CalRoot . '/images/icons/iconExpand.png" width="16" height="16" alt="" border="0" style="vertical-align:middle;" /> ' . $hc_lang_locations['Show']; ;?>';
	}//end if
}//end togList()
<?php		
			fwrite($fp, ob_get_contents());
			fclose($fp);
			if($hc_cfg69 == 1){
				$fp = fopen('cache/lmap_embed.js', 'w');
				fwrite($fp, ob_get_contents());
				fwrite($fp, "document.write('<div style=\"clear:both;padding:5px;\">" . $hc_lang_locations['Powered'] . " <a href=\"" . CalRoot . "/\" target=\"_blank\">" . CalName . "</a></div>');");
				fclose($fp);
			}//end if
			ob_end_clean();
			
			ob_start();
			$fp = fopen('cache/lmap' . $curCache . '.php', 'w');
			fwrite($fp, "<?php\n//\tHelios Location Map Cache - Delete this file (and it's associated .js file) when upgrading.?>\n\n");
			echo '<script language="JavaScript" type="text/JavaScript" src="' . CalRoot . '/cache/lmap' . $curCache . '.js"></script>';
			echo '<br />';

			if($linkList != ''){
				echo '<div style="padding-bottom:5px;">';
				echo "\n" . '<div id="locRest"><a href="javascript:;" onclick="goHome();" class="locListReset"><img src="' . CalRoot . '/images/icons/iconMap.png" width="16" height="16" alt="" border="0" style="vertical-align:middle;" /> ' . $hc_lang_locations['Reset'] . '</a></div>';
				echo '<a href="javascript:;" onclick="togList();" id="locListLink"><img src="' . CalRoot . '/images/icons/iconCollapse.png" width="16" height="16" alt="" border="0" style="vertical-align:middle;" /> ' . $hc_lang_locations['Hide'] . '</a>';
				echo '</div>';
				echo "\n" . '<div id="locList"><span class="locTitle">' . $hc_lang_locations['Locations'] . '</span><br /><ul class="locList">' . $linkList . '</ul></div>';
			}//end if
			echo "\n" . '<div id="hc_GmapLoc"></div>';


			fwrite($fp, ob_get_contents());
			fclose($fp);
			ob_end_clean();
		}//end if
	}//end if	
	
	if(file_exists('cache/lmap' . $curCache . '.php')){include('cache/lmap' . $curCache . '.php');}?>