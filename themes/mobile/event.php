<?php
/**
 * @package Helios Calendar
 * @subpackage Default Theme
 */
	if(!defined('isHC')){exit(-1);}
	
	$myEvnt = event_fetch();
	$myLnks = event_location_links($myEvnt['EventID'], $myEvnt['VenueID']);
	
	get_header();?>
	
</head>
<body>
	<?php my_menu(0);?>
	
	<nav class="sub">
		<ul>
			<li><a href="<?php echo cal_url();?>/index.php?com=search" class="">Search</a></li>
			<li><a href="<?php echo cal_url();?>/index.php?com=submit" class="">Submit</a></li>
		</ul>
	</nav>
	
	<section>
		<article itemscope itemtype="http://data-vocabulary.org/Event">
			<header>
				<h1 itemprop="summary">
				<?php 
					echo '
					<div id="cmnt_cnt"><a href="#disqus_thread" data-disqus-identifier="'.$myEvnt['DisqusID'].'">'.event_lang('Comments').'</a><span class="arrow"><span>&nbsp;</span></span></div>
					<script>
						var disqus_shortname = \''.$hc_cfg[25].'\';
						(function () {var s = document.createElement(\'script\'); s.async = true;s.type = \'text/javascript\';s.src = \'http://\' + disqus_shortname + \'.disqus.com/count.js\';(document.getElementsByTagName(\'HEAD\')[0] || document.getElementsByTagName(\'BODY\')[0]).appendChild(s);}());
					</script>';
				
				echo $myEvnt['Title'];?></h1>
			</header>
			<div id="evernote" itemprop="description">
				<div id="location" itemprop="location" itemscope itemtype="http://data-vocabulary.org/Organization">
					<h2 class="location">&nbsp;
					<?php echo ($myEvnt['VenueID'] > 0) ? '
					<a href="'.$myLnks['Venue_Directions'].'" target="_blank" itemprop="geo" itemscope="itemscope" itemtype="http://data-vocabulary.org/Geo">
						<img src="img/icons/car.png" width="16" height="16" alt="" />
						<meta itemprop="latitude" content="'.$myEvnt['Venue_Lat'].'" />
						<meta itemprop="longitude" content="'.$myEvnt['Venue_Lon'].'" /></a>' : '';?>
					<?php echo ($myEvnt['VenueID'] > 0) ? '
					<a href="'.$myLnks['Venue_Weather'].'" target="_blank"><img src="img/icons/weather.png" width="16" height="16" alt="" /></a>' : '';?>
					<?php echo ($myEvnt['VenueID'] > 0) ? '
					<a href="'.$myLnks['Venue_Profile'].'"><img src="img/icons/card.png" width="16" height="16" alt="" /></a>' : '';?>

					</h2>
					<div itemprop="address" itemscope="itemscope" itemtype="http://data-vocabulary.org/Address">
						<span itemprop="name"><b><?php echo $myEvnt['Venue_Name'];?></b><br /></span>
						<span itemprop="street-address"><?php echo $myEvnt['Venue_Address'];?></span><br/>
						<?php echo ($myEvnt['Venue_Address2'] != '') ? $myEvnt['Venue_Address2'].'<br />':'';?>
						<span itemprop="locality"><?php echo $myEvnt['Venue_City'];?></span>, <span itemprop="region"><?php echo $myEvnt['Venue_Region'];?></span>
						<span itemprop="postal-code"><?php echo $myEvnt['Venue_Postal'];?></span><br/>
						<span itemprop="country-name"><?php echo $myEvnt['Venue_Country'];?></span>
					</div>
					<br />
					<?php echo ($myEvnt['Venue_Email'] != '') ? cleanEmailLink($myEvnt['Venue_Email'],' ',event_lang('Email').' ').'<br />' : '';?>
					<?php echo ($myEvnt['Venue_Phone'] != '') ? event_lang('Phone').' '.$myEvnt['Venue_Phone'].'<br />' : '';?>
					<?php echo ($myEvnt['Venue_URL'] != '') ? event_lang('Website').' <a href="'.$myLnks['Venue_URL'].'" target="_blank">'.event_lang('ClickToVisit').'</a><br />' : '';?>
				</div>
				<?php echo $myEvnt['Description'];?>
			
			</div>
			
			<h2 class="date"><?php echo $myEvnt['Date'];?></h2>
			<time itemprop="startDate" datetime="<?php echo $myEvnt['Timestamp'];?>"><?php echo $myEvnt['Time'];?></time>

	<?php	if($myEvnt['SeriesID'] != ''){?>
			<h2><?php echo event_lang('OtherDates');?></h2>
			<?php event_series($myEvnt['SeriesID'],$myEvnt['Date']);?><br />
	<?php	}

			if($myEvnt['Contact'].$myEvnt['Contact_Email'].$myEvnt['Contact_Phone'].$myEvnt['Contact_URL'] != ''){?>
			<h2><?php echo event_lang('Contact');?></h2>
			<?php echo ($myEvnt['Contact'] != '') ? $myEvnt['Contact'].'<br />' : '';?>
			<?php echo ($myEvnt['Contact_Email'] != '') ? cleanEmailLink($myEvnt['Contact_Email'],$myEvnt['Title'],event_lang('Email').' ').'<br />' : '';?>
			<?php echo ($myEvnt['Contact_Phone'] != '') ? event_lang('Phone').' '.$myEvnt['Contact_Phone'].'<br />' : '';?>
			<?php echo ($myEvnt['Contact_URL'] != '') ? event_lang('Website').' <a href="'.$myLnks['Event_URL'].'" target="_blank">'.event_lang('ClickToVisit').'</a><br />' : '';?>

	<?php	}

			if($myEvnt['Cost'] != ''){?>
			<h2><?php echo event_lang('Cost');?></h2>
			<?php echo $myEvnt['Cost'];?>
	<?php	}

			if($myEvnt['RSVP'] == 1){?>
			<h2><?php echo event_lang('RSVP');?></h2>
	<?php	event_rsvp_meter($myEvnt['RSVP_Spaces'],$myEvnt['RSVP_Taken'],250);?><br />
			<b><?php echo $myEvnt['RSVP_Taken'];?></b> of <b><?php echo $myEvnt['RSVP_Spaces'];?></b> Spaces Requested<br /><br />
			<?php event_rsvp_link($myEvnt['RSVP_Spaces'],$myEvnt['RSVP_Taken']);?>
	<?php	}?>

			<h2><?php echo event_lang('Save');?></h2>
			<a href="<?php echo $myLnks['Event_GoogleCal'];?>" class="icon google_cal" target="_blank"><?php echo event_lang('CalendarG');?></a><br />
			<a href="<?php echo $myLnks['Event_YahooCal'];?>" class="icon yahoo" target="_blank"><?php echo event_lang('CalendarY');?></a><br />
			<a href="<?php echo $myLnks['Event_LiveCal'];?>" class="icon live" target="_blank"><?php echo event_lang('CalendarW');?></a><br />

		<?php
			$link = urlencode($myLnks['This']);
			$title = urlencode($myEvnt['Title']);?>
			<h2><?php echo event_lang('Share');?></h2>
			<a href="<?php echo cal_url() . '/index.php?com=send&amp;eID='.$myEvnt['EventID'];?>" class="icon email"><?php echo event_lang('EmailToFriend');?></a><br />
			<?php echo ($myEvnt['Bitly'] != '') ? '
			<a href="'.$myEvnt['Bitly'].'.qrcode" target="_blank" rel="nofollow" class="icon qr">'.event_lang('QRCode').'</a><br />' : '';?>
			
			<h2><?php echo event_lang('Social');?></h2>
			
			<div class="socialT">
				<a href="http://twitter.com/share" class="twitter-share-button" data-url="<?php echo $myLnks['This'];?>" data-text="<?php build_tweet($myEvnt['Title'].' @ '.$myEvnt['Venue_Name'].' - '.$myEvnt['Time'].' '.event_lang('On').' '.stampToDate($myEvnt['DateRaw'],$hc_cfg[24]));?>" data-count="horizontal">Tweet</a>
				<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
			</div>
			<div class="socialG">
				<g:plusone size="medium" count="true" href="<?php echo $myLnks['This'];?>"></g:plusone>
				<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
			</div>
			<div class="socialF">
				<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode($myLnks['This']);?>&amp;layout=button_count&amp;show_faces=false&amp;width=80&amp;action=like&amp;font=verdana&amp;colorscheme=light&amp;height=20" frameborder="0" background="transparent" class="fb_iFrame"></iframe>
			</div>
			<div class="socialL">
				<script type="text/javascript" src="http://platform.linkedin.com/in.js"></script>
				<script type="in/share" data-url="<?php echo urlencode($myLnks['This']);?>" data-counter="right"></script>
			</div>
			
			<h2><?php echo event_lang('Categories');?></h2>
			<div id="categories">
				<?php event_categories($myEvnt['EventID']);?>
			</div>
			
			<?php get_comments($myEvnt['DisqusID'],$myEvnt['DisqusURL'],$myEvnt['Title'],0);?>
		</article>
	</section>
	
	<?php get_footer(); ?>