<?php
/*
	Helios Calendar - Professional Event Management System
	Copyright � 2007 Refresh Web Development [http://www.refreshwebdev.com]
	
	Developed By: Chris Carlevato <chris@refreshwebdev.com>
	
	For the most recent version, visit the Helios Calendar website:
	[http://www.helioscalendar.com]
	
	License Information is found in docs/license.html
*/
	
	if(!isset($_GET['mID'])){
		appInstructions(0, "Reports", "Most Popular Active Calendar Events", "The following events are the most viewed active events on the calendar.<br /><br /><img src=\"" . CalAdminRoot . "/images/icons/iconEdit.gif\" width=\"15\" height=\"15\" alt=\"\" border=\"0\" align=\"middle\" /> = Edit Event<br /><img src=\"" . CalAdminRoot . "/images/icons/iconBillboard.gif\" width=\"15\" height=\"15\" alt=\"\" border=\"0\" align=\"middle\" /> = Event Appears on Billboard (Click to Administer Billboard)");
		$result = doQuery("	SELECT * 
								FROM " . HC_TblPrefix . "events 
							WHERE StartDate >= NOW() 
								AND IsActive = 1 
								AND IsApproved = 1
								AND Views > 0
							ORDER BY Views DESC, StartDate
							LIMIT 50");
	} else {
		appInstructions(0, "Reports", "Most Popular Active Mobile Events", "The following events are the most viewed active events on the mobile calendar.<br /><br /><img src=\"" . CalAdminRoot . "/images/icons/iconEdit.gif\" width=\"15\" height=\"15\" alt=\"\" border=\"0\" align=\"middle\"> = Edit Event");
		$result = doQuery("	SELECT * 
								FROM " . HC_TblPrefix . "events 
							WHERE StartDate >= NOW() 
								AND IsActive = 1 
								AND IsApproved = 1 
								AND MViews > 0
							ORDER BY MViews DESC, StartDate
							LIMIT 50");
	}//end if
	
	if(hasRows($result)){	?>
		<div class="mostPopularList">
			<div class="mostPopularTitle"><b>Event</b></div>
			<div class="mostPopularDate"><b>Occurs</b></div>
			<div class="mostPopularViews"><b>Views</b></div>
			&nbsp;
		</div>
	<?	$cnt = 0;
		$curDate = "";
		while($row = mysql_fetch_row($result)){
			if(isset($_GET['mID'])){
				$viewCount = $row[34];
			} else {
				$viewCount = $row[28];
			}//end if
			
			if($viewCount == 0){
				break;
			}//end if	?>
			<div class="mostPopularTitle<?if($cnt % 2 == 1){echo "HL";}?>"><?echo $row[1];?></div>
			<div class="mostPopularDate<?if($cnt % 2 == 1){echo "HL";}?>"><?echo stampToDate($row[9], $hc_popDateFormat);?></div>
			<div class="mostPopularViews<?if($cnt % 2 == 1){echo "HL";}?>"><?echo cOut($viewCount);?></div>
		<?	if(!isset($_GET['mID'])){?>
			<div class="mostPopularTools<?if($cnt % 2 == 1){echo "HL";}?>">
				<a href="<?echo CalAdminRoot;?>/index.php?com=eventedit&amp;eID=<?echo $row[0];?>" class="main"><img src="<?echo CalAdminRoot;?>/images/icons/iconEdit.gif" width="15" height="15" alt="" border="0" align="middle" /></a>&nbsp;&nbsp;
			<?	if($row[18] == 1){	?>
				<a href="<?echo CalAdminRoot;?>/index.php?com=eventbillboard" class="main"><img src="<?echo CalAdminRoot;?>/images/icons/iconBillboard.gif" width="15" height="15" alt="" border="0" align="middle" /></a>
			<?	} else {	?>
				<img src="<?echo CalAdminRoot;?>/images/spacer.gif" width="15" height="15" alt="" border="0" align="middle" />
			<?	}//end if	?>
			</div>
		<?	}//end if
		$cnt = $cnt + 1;
		}//end while
	} else {	?>
		<br /><br />
		There are currently no events with views for this report.
<?	}//end if	?>