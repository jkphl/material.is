{
  "theme":"blue",
  "background": {"red":200, "green":200, "blue":200, "alpha":1.0},
  "highlight": {"red":0, "green":0, "blue":0, "alpha":0.5},
  "text": {"red":0, "green":0, "blue":0, "alpha":1.0},
  "positive": {"red":0, "green":200, "blue":0, "alpha":1.0},
  "negative": {"red":200, "green":0, "blue":0, "alpha":1.0},
  "boxes":[
     {
       "zoomed": "true",
       "type": "Simple",
       "line1": "",
	   "row":0,
       "column":0
     },
     {
       "type": "Stack",
       "line1": "WEEK",
       "line2": "<?=date("W")?>",
       "highlightLine2": "true",
	   "row":0,
       "column":2
     },
     {
       "type": "Stack",
       "line1": "TICKETS SOLD",
       "line2": "?",
       "highlightLine2": "true",
	   "row":2,
       "column":2
     },
     {
       "type": "Stack",
       "line1": "MAILING LIST",
       "line2": "<?=getMailingListSubscriberCount()?>",
       "highlightLine2": "true",
	   "row":0,
       "column":3
     },
     {
       "type": "Stack",
       "line1": "🎂",
       "line2": "<?=daysToConference()?> DAYS",
       "highlightLine2": "true",
	   "row":1,
       "column":3
     },
     {
       "type": "Stack",
       "line1": "DAYS OLD",
       "line2": "<?=dateDiff("2011-02-17",date("Y-m-d"))?>",
       "highlightLine2": "true",
	   "row":1,
       "column":2
     },

     {
       "type": "Simple",
       "zoomed": "true",
       "line1": "<?=getQuarter(date("m"))?>",
	   "row":2,
       "column":0
     },
	{
       "type": "Stack",
       "line1": "THEME",
       "line2": "blue",
       "highlightLine2": "true",
	   "row":2,
       "column":3
     },
     {
       "type": "Stack",
       "line1": "📞👨🏻🐳",
       "line2": "1",
       "highlightLine2": "true",
	   "row":8,
       "column":2
     },
     {
       "type": "Stack",
       "line1": "Hilmir 🎂",
       "line2": "<?=dateDiff("2013-04-27",date("Y-m-d"))?>",
       "highlightLine2": "true",
	   "row":5,
       "column":0
     },
     {
       "type": "Stack",
       "line1": "5",
       "line2": "1",
       "highlightLine2": "true",
	   "row":5,
       "column":1
     },
     {
       "type": "Stack",
       "line1": "4",
       "line2": "2",
       "highlightLine2": "true",
	   "row":4,
       "column":2
     },
     {
       "type": "Stack",
       "line1": "4",
       "line2": "0",
       "highlightLine2": "true",
	   "row":4,
       "column":0
     },
     {
       "type": "Stack",
       "line1": "4",
       "line2": "1",
       "highlightLine2": "true",
	   "row":4,
       "column":1
     },
     {
       "type": "Stack",
       "line1": "4",
       "line2": "3",
       "highlightLine2": "true",
	   "row":4,
       "column":3
     },
     {
       "type": "Stack",
       "line1": "5",
       "line2": "2",
       "highlightLine2": "true",
	   "row":5,
       "column":2
     },
     {
       "type": "Stack",
       "line1": "5",
       "line2": "3",
       "highlightLine2": "true",
	   "row":5,
       "column":3
     },
	{
       "type": "Stack",
       "line1": "6",
       "line2": "0",
       "highlightLine2": "true",
	   "row":6,
       "column":0
     },
     {
       "type": "Stack",
       "line1": "6",
       "line2": "1",
       "highlightLine2": "true",
	   "row":6,
       "column":1
     },
     {
       "type": "Stack",
       "line1": "7",
       "line2": "0",
       "highlightLine2": "true",
	   "row":7,
       "column":0
     },
     {
       "type": "Stack",
       "line1": "7",
       "line2": "1",
       "highlightLine2": "true",
	   "row":7,
       "column":1
     },
     {
       "type": "Stack",
       "line1": "6",
       "line2": "2",
       "highlightLine2": "true",
	   "row":6,
       "column":2
     },
     {
       "type": "Stack",
       "line1": "6",
       "line2": "3",
       "highlightLine2": "true",
	   "row":6,
       "column":3
     },
     {
       "type": "Stack",
       "line1": "7",
       "line2": "2",
       "highlightLine2": "true",
	   "row":7,
       "column":2
     },
     {
       "type": "Table",
       "line1": "7",
       "line2": "3",
       "header1": "HI",
       "header2": "LO",
       "highlightHeader2": "true",
	   "row":7,
       "column":3
     },
     {
       "type": "Delta",
       "line1": "REVENUE",
       "line2": "$12,345",
	   "delta":"+5.5%",
	   "deltaPositive":"true",
       "highlightLine2": "true",
	   "row":8,
       "column":0
     },
     {
       "type": "Delta",
       "line1": "SIGNUPS",
       "line2": "32,456",
	   "delta":"-1%",
	   "deltaPositive":"false",
       "highlightLine2": "true",
	   "row":3,
       "column":2
     },
  ]
} 
<?php

function random_theme(){
	$themes = Array("red", "blue", "yellow", "light", "dark");
	$pos = rand(0,count($themes)-1);
	return $themes[$pos];
}


function getQuarter($month){
	$num = 0;
	switch((int)($month)){
		case 1: case 2: case 3: $num = 1; break;
		case 4: case 5: case 6: $num = 2; break;
		case 7: case 8: case 9: $num = 3; break;
		case 10: case 11: case 12: $num = 4; break;
	}

	return "Q".$num;
}

function getMailingListSubscriberCount(){
	$url = 'http://optional.us2.list-manage.com/subscriber-count?b=00&u=409837c4-c089-428b-8717-4f3f4318c017&id=4b11c60bdb';
	$js = file_get_contents ( $url );
	
	$js = substr($js,39,3);
	return $js;
}

function yearsOld($born){
	$yearsOld = 0;
	$now  = strtotime(date('Y-m-d'));
	$born = strtotime($born);
	
	// This will be off after 365 leap years
	$yearsOld = ceil(($now-$born)/60/60/24/365);
	$ordinal = 'th';
	switch((int)substr($yearsOld,-1)){
		case 1: $ordinal = 'st'; break;
		case 2: $ordinal = 'nd'; break;
		case 3: $ordinal = 'rd'; break;
	}
	
	return $yearsOld.$ordinal;
}

function daysToConference($month=09,$day=01){
	// Not yet had a birthday this year
	$now = strtotime(date('Y-m-d'));
	if(strtotime(date('Y').'-'.$month.'-'.$day) > $now){
		$year = date('Y');
	} else {
		// missed it! Next year please
		$year = date('Y')+1;
		
	}

	$microsecs = strtotime($year.'-'.$month.'-'.$day)-$now;
	return round($microsecs/60/60/24);

}

function weekDiff($dtStart, $dtEnd){
	$diff = 0;
	$dtStart = strtotime($dtStart);
	$dtEnd   = strtotime($dtEnd);
	
	$weekStart = date('W',$dtStart);
	$weekEnd   = date('W',$dtEnd);
		
	$weekCount = 0;
	for($i=date('Y',$dtStart);$i<date('Y',$dtEnd);$i++){
		if((date('N',strtotime($i.'-12-31')) == 4) || (date('N',strtotime($i.'-01-01')) == 4)){
			$weekCount += 53;
		} else {
			$weekCount += 52;			
		}
	}
	
	return $weekCount - (int)$weekStart + (int)$weekEnd;
}

function dateDiff($dtStart, $dtEnd){
	$diff = 0;
	$dtStart = strtotime($dtStart);
	$dtEnd   = strtotime($dtEnd);

	$i = 0;
	while ($i < abs(date('Y',$dtStart)-date('Y',$dtEnd))){
		$i++;
		$diff += (date('z',mktime(0,0,0,12,31,date('Y',$dtStart)-($i*(abs(date('Y',$dtStart)-date('Y',$dtEnd))/(date('Y',$dtStart)-date('Y',$dtEnd))))))+1)*(-1*(abs(date('Y',$dtStart)-date('Y',$dtEnd))/(date('Y',$dtStart)-date('Y',$dtEnd))));
	}

	if (date('Y',$dtStart) > date('Y',$dtEnd)){
		$diff -= date('z',$dtStart);
		$diff += date('z',$dtEnd);
	} else {
		$diff += date('z',$dtEnd);
		$diff -= date('z',$dtStart);
	}

	return $diff;
}
?>