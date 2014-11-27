<html>
<head>
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600,700,800&subset=latin,greek-ext' rel='stylesheet' type='text/css'>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="js/main.js" type="text/javascript"></script>
    <script src="js/dateSelector.js" type="text/javascript"></script>
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<meta charset="UTF-8">
</head>

<body class="cbp-spmenu-push">

	<!-- SETTINGS START-->
	<nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
    <div class="settings-button-back only-phone" id="showLeftBack"></div>
		<div class="cbp-spmenu-top">Settings</div>

		<div class="menu-inner-left">

            <h2>Show Weather</h2>
            <input type="checkbox" name="toggle" id="toggle">
            <label for="toggle"></label>

            <h2>Show Quote of the Day</h2>
            <input type="checkbox" name="toggle2" id="toggle2">
            <label for="toggle2"></label>
		
		</div>
	</nav>

    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
        <div class="addEvent-button-back only-phone" id="showRightBack"></div>
        <div class="cbp-spmenu-top" style="margin-left: -1px;">Add Event:</div>

        <div class="menu-inner-right">
                <form class="add-event" action="action_page.php">
                    <input type="text" value="Title" onfocus="if (this.value=='Title') this.value='';" onblur="if (this.value=='') this.value='Title';"/>
                    <div class="seperator"></div>
                    <input type="text" value="Location" onfocus="if (this.value=='Location') this.value='';" onblur="if (this.value=='') this.value='Location';"/>

                    <br><br>

                    <span>Start Time</span><input class="date" type="date" name="startDate" value="<?php echo date("Y-n-d"); ?>"><input class="time" type="time" name="startTime" value="<?php echo date("G:00"); ?>">
                    <div class="seperator"></div>
                    <span>End Time</span><input class="date" type="date" name="endDate" value="<?php echo date("Y-n-d"); ?>"><input class="time" type="time" name="endTime" value="<?php echo date("G")+1; ?>:00">

                    <br><br>

                    <input type="text" value="Share With: (comma separated)" onfocus="if (this.value=='Share With: (comma separated)') this.value='';" onblur="if (this.value=='') this.value='Share With: (comma separated)';"/>

                    <br><br>

                    <span>Calendar:</span>
                    <select class="select">
                        <option value="1">Personal</option>
                        <option value="2">Study Group</option>
                        <option value="3">Custom Group 1</option>
                        <option value="4">Custom Group 2</option>
                    </select><br><br>

                    <script type="text/javascript">

                    </script>

                    <input type="submit" class="submit" value="Add Event"> 
                </form>
        </div>
    </nav>    
	
	<!-- SETTINGS END-->	
<div class="settings-button" id="showLeftPush"></div>
<div class="addEvent-button" id="showRightPush"></div>
<!-- Header med ugenummer  -->
<div class="header">
  CBS Calendar
</div>

<div class="sidebar">
	<h1>Sidebar</h1>

	<h2>Select Date:</h2>    
	  	<center>
            <div class="week-picker"></div>
            <br /><br />
            <label>Week :</label> <span id="startDate"></span> - <span id="endDate"></span>
			<!-- <div style="font-size: 85%;" id="datepicker"></div> -->
		</center>
</div>

<!-- indeholde kalendarmodul -->
<div class="calendarbody">
  <div class="timebody">
    <div class="time">&nbsp;</div>
    <div class="time">8:00</div>
    <div class="time">9:00</div>
    <div class="time">10:00</div>
    <div class="time">11:00</div>
    <div class="time">12:00</div>
    <div class="time">13:00</div>
    <div class="time">14:00</div>
    <div class="time">15:00</div>
    <div class="time">16:00</div>
    <div class="time">17:00</div>
    <div class="time">18:00</div>
    <div class="time">19:00</div>
    <div class="time">20:00</div>
    <div class="time">21:00</div>
    <div class="time">22:00</div>
  </div>
<?php 
// set current date
$date = date("m/d/y"); 
// parse about any English textual datetime description into a Unix timestamp
$ts = strtotime($date);
// calculate the number of days since Monday
$dow = date('w', $ts);
$offset = $dow - 1;
if ($offset < 0) {
    $offset = 6;
}
// calculate timestamp for the Monday
$ts = $ts - $offset*86400;
// print current week
for ($i = 0; $i < 7; $i++) {
    $weekday_year   = date("Y", $ts + $i * 86400) . "\n";
    $weekday_month  = date("m", $ts + $i * 86400) . "\n";
    $weekday_day    = date("l", $ts + $i * 86400) . "\n";
    $weekday_day_number    = date("j", $ts + $i * 86400) . "\n";
    $weekday_date   = date("d", $ts + $i * 86400) . "\n";
    $currentDateValidate = intval($weekday_year).intval($weekday_month).intval($weekday_day_number);


    // Tidskonvetering for event
    $jsonString = "
	    { \"events\": [
		    {\"activityid\":\"BINTO1035U_XB_E14\",\"eventid\":\"BINTO1035U_XB_E14_7522cb9e2c47efa1e3ff6ac24002be36_99537c3adf3e04bc329ed38f0e58ce2e\",\"type\":\"Lecture\",\"title\":\"BINTO1035U.XB_E14\",\"description\":\"Makro\u00f8konomi (XB)\",\"start\":[\"2014\",11,\"19\",\"8\",\"00\"],\"end\":[\"2014\",11,\"19\",\"9\",\"40\"],\"location\":\"Ks71\"},
			{\"activityid\":\"BINTO1035U_XB_E14\",\"eventid\":\"BINTO1035U_XB_E14_5eea61ae6c2d8824d340e3b57c52dc11_a48b708b5cdbd426b599420f90697a1f\",\"type\":\"Exercise\",\"title\":\"BINTO1035U.XB_E14\",\"description\":\"Makro\u00f8konomi (XB)\",\"start\":[\"2014\",11,\"19 \",\"11\",\"00\"],\"end\":[\"2014\",11,\"19\",\"12\",\"40\"],\"location\":\"SP114\"},
			{\"activityid\":\"BINTO1035U_XB_E14\",\"eventid\":\"BINTO1035U_XB_E14_e523a307e38d3b09094746c6d679e683_087a51abc6bd219e13e0351601e0e1aa\",\"type\":\"Lecture\",\"title\":\"BINTO1035U.XB_E14\",\"description\":\"Makro\u00f8konomi (XB)\",\"start\":[\"2014\",11,\"22\",\"8\",\"00\"],\"end\":[\"2014\",11,\"22\",\"9\",\"40\"],\"location\":\"Ks71\"}
		]}
	";


    //echo $startPos;
    //echo $endPos;
    //echo $duration;
    ?>
    <div class="weekdaybody">
        <?php 
            $jsonDecode = json_decode($jsonString, true);

            foreach ($jsonDecode['events'] as $event) { 

            $dateYearStart      = intval($event["start"][0]);
            $dateMonthStart     = intval($event["start"][1]);

            $dateDayStart       = intval($event["start"][2]);
            $dateTimeStartHour  = intval($event["start"][3]);
            $dateTimeStartMin   = intval($event["start"][4]);

            $dateDayEnd         = intval($event["end"][2]);
            $dateTimeEndHour    = intval($event["end"][3]);
            $dateTimeEndMin     = intval($event["end"][4]);

            $startPos = (($dateTimeStartHour-8) * 60) + $dateTimeStartMin+60;
            $endPos = (($dateTimeEndHour-8) * 60) + $dateTimeEndMin+60;
            $duration = $endPos-$startPos;


            $jsonDateValidate = $dateYearStart.$dateMonthStart.$dateDayStart;
                if($jsonDateValidate == $currentDateValidate){
                    ?>
                    <div class="event" style="top: <?= $startPos; ?>px; height: <?= $duration; ?>;">
                        <div class="event-header">8:00 - 9:40</div>

                        <span class="event-course">Makroøkonomi (XB)</span><br>
                        <span class="event-type">Lecture</span><br>
                        <span class="event-location">SP213</span><br>

                        <span class="starttime"><?= $startPos; ?></span>
                        <span class="duration"><?= $duration; ?></span>
                    </div>
                    <?php
                }
            }
        ?>
        <div class="weekday no-bg"><?= $weekday_day; ?><br><span class="date"><?= $weekday_date; ?></span></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
        <div class="weekday"></div>
    </div>
    <?php
}

?>
</div>

<div class="footer">
	Sidst redigeret d. 21-11-2014 af Mikkel
</div>

<script src="js/menu-left.js"></script>

</body>
</html>