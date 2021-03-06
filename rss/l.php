<?php
/**
 * @package Helios Calendar
 * @license GNU General Public License version 2 or later; see LICENSE
 */
	define('isHC',true);
	define('isAction',true);
	include_once('../loader.php');
	include_once(HCLANG.'/public/rss.php');
	
	if($hc_cfg[106] == 0)
		go_home();
	
	$lID = (isset($_GET['lID']) && is_numeric($_GET['lID'])) ? cIn(strip_tags($_GET['lID'])) : -1;
	$tzRSS = str_replace(':','',HCTZ);
	$result = doQuery("SELECT * FROM " . HC_TblPrefix . "locations WHERE PkID = '" . $lID . "' AND IsActive = 1");
	$locName = (hasRows($result)) ? hc_mysql_result($result,0,1) : '';
	$feedName = $locName.' : '.$hc_lang_rss['Location'];
	$query = "SELECT e.PkID, e.Title, e.Description, e.StartDate, e.StartTime, e.SeriesID
				FROM " . HC_TblPrefix . "events e
					LEFT JOIN " . HC_TblPrefix . "eventcategories ec ON (e.PkID = ec.EventID)
					LEFT JOIN " . HC_TblPrefix . "categories c ON (ec.CategoryID = c.PkID)
				WHERE e.IsActive = 1 AND e.IsApproved = 1 AND e.StartDate >= '" . cIn(SYSDATE) . "' AND e.LocID = '" . $lID . "' AND
					c.IsActive = 1
				GROUP BY e.PkID, e.Title, e.Description, e.StartDate, e.StartTime, e.SeriesID
				ORDER BY e.StartDate, e.StartTime
				LIMIT ".$hc_cfg[2];
	
	header('Content-Type:application/rss+xml; charset=' . $hc_lang_config['CharSet']);
	echo '<?xml version="1.0" encoding="'.$hc_lang_config['CharSet'].'"?>
<!-- Generated by Helios Calendar '.$hc_cfg[49].' '.date("\\o\\n Y-m-d \\a\\t H:i:s").' local time. -->
<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
	<link>'.CalRoot.'/</link>
	<atom:link href="'.CalRoot.'/rss/l.php?lID='.$lID.'" rel="self" type="application/rss+xml" />
	<generator>Helios Calendar</generator>
	<docs>'.CalRoot.'&#47;index.php&#63;com=tools</docs>
	<description>'.cleanXMLChars($hc_lang_rss['Upcoming']).'</description>';
	
	$result = doQuery($query);
	if(hasRows($result)){
		echo '
	<title>'.cleanXMLChars($feedName.' - '.CalName).'</title>';
		$cnt = 0;
		while($row = hc_mysql_fetch_row($result)){
			$description = ($hc_cfg[107] > 0) ? clean_truncate($row[2],$hc_cfg[107]) : $row[2];
			$comment = ($hc_cfg[25] != '') ? '<comments><![CDATA['.CalRoot.'/index.php?eID='.$row[0].'#disqus_thread'.']]></comments>' : '';
			echo '
	<item>
		<title>'.cleanXMLChars(stampToDate(cOut($row[3]), $hc_cfg[24]))." - ".cleanXMLChars(cOut($row[1])).'</title>
		<link><![CDATA['.CalRoot.'/index.php?eID='.$row[0].']]></link>
		<description>'.cleanXMLChars(cOut($description)).'</description>
		'.$comment.'
		<guid>'.CalRoot.'/index.php&#63;eID='.$row[0].'</guid>
		<pubDate>'.cleanXMLChars(stampToDate($row[3].' '.$row[4], "%a, %d %b %Y %H:%M:%S").' '.$tzRSS).'</pubDate>
	</item>';
			++$cnt;
		}
	} else {
		echo '
	<title>'.$hc_lang_rss['RSSSorry'].'</title>
	<item>
		<title>'.$hc_lang_rss['RSSNoEvents'].'</title>
		<link>'.CalRoot.'/</link>
		<description>'.$hc_lang_rss['RSSNoLink'].'</description>
		<guid>' . CalRoot . '/</guid>
	</item>';
	}
	echo '
</channel>
</rss>';
?>