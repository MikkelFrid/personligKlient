<?php 

include 'events.php';
include 'getNote.php';
include 'getNewCalendarAjax.php';
include 'getQotdClass.php';

session_start();

if(!isset($_SESSION['user']['userLoggedIn'])){
    header("Location: login.php");
}

$allCalendars = getNewCalendars(); 

$allCalendarsContentJson = json_decode($allCalendars, true);
$allCalendarsContent = array();
$counter = 0;
foreach($allCalendarsContentJson as $singleCalendar){
    $calName = $singleCalendar['calenderName'];
    $calID   = $singleCalendar['CalendarID'];

    $allCalendarsContent[$counter]['calenderName'][] = $calName;
    $allCalendarsContent[$counter]['CalendarID'][]   = $calID;
    $counter++;
}

$allEvents = array();

$events = new events();

$counterEvents = 0;
foreach($allCalendarsContent as $singleCalendar2){
    $calID = (int)$singleCalendar2['CalendarID'][0];

    $dbevents   = json_decode($events->getDBCal($calID), true);

    foreach($dbevents as $event) { 
        $eventID      = $event["eventid"];
        $eventTitle     = $event["name"]; 

        $note = new getNote();
        $note->eventid = $eventID;
        $notes = json_decode(tcpConnect($note), true);

        foreach($notes as $noteVal){
            $id       = $noteVal['noteId'];
            $noteText = $noteVal['noteText'];

            $allEvents[$counterEvents]['notes'][$id]['noteText'] = $noteText;
            $allEvents[$counterEvents]['notes'][$id]['noteID']   = $id;
        }

        $allEvents[$counterEvents]['eventid'] = $eventID;
        $allEvents[$counterEvents]['name']    = $eventTitle;
        $counterEvents++;

    }
}
?>

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

<!--             <h2>Show Weather</h2>
            <input type="checkbox" name="toggle" id="toggle">
            <label for="toggle"></label> -->

            <h2>Show Quote of the Day</h2>
            <input type="checkbox" name="toggle2" id="toggle2">
            <label for="toggle2"></label>

            <br>
            <br>
            <a class="logout" href="logout.php">Log Out</a>		    
		</div>
	</nav>

    <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
        <div class="addEvent-button-back only-phone" id="showRightBack"></div>
        <div class="cbp-spmenu-top" style="margin-left: -1px;">Add Event:</div>

        <div class="menu-inner-right">

            <button id="createCalendar" class="add-event-button">Add / Delete Calendar</button>
                    <form class="add-event" action="action_page.php" id="add-event">
                        <br>
                        <input type="text" id="title" value="Title" onfocus="if (this.value=='Title') this.value='';" onblur="if (this.value=='') this.value='Title';"/>
                        <div class="seperator"></div>
                        <input type="text" id="location" value="Location" onfocus="if (this.value=='Location') this.value='';" onblur="if (this.value=='') this.value='Location';"/>

                        <br><br>

                        <span>Start Time</span><input class="date" id="dateStart" type="date" name="startDate" value="<?php echo date("Y-n-d"); ?>"><input class="time" id="startTime" type="time" name="startTime" value="<?php echo date("G:00"); ?>">
                        <div class="seperator"></div>
                        <span>End Time</span><input class="date" id="dateEnd" type="date" name="endDate" value="<?php echo date("Y-n-d"); ?>"><input class="time" id="endTime" type="time" name="endTime" value="<?php echo date("G")+1; ?>:00">

                        <br><br>

                        <textarea type="text" id="description" rows="3" value="Descrpition" onfocus="if (this.value=='Descrpition') this.value='';" onblur="if (this.value=='') this.value='Descrpition';"/></textarea>

                        <br><br>

                        <span>Type:</span>
                        <select class="select" id="type">
                            <option value="0">Lecture</option>
                            <option value="1">Exercise</option>
                            <option value="2">Other</option>
                        </select><br><br>                    

                        <span>Calendar:</span>
                        <select class="select" id="calendar">
                            <?php 

                            //print_r($allCalendarsContent);

                            foreach($allCalendarsContent as $singleCalendar1){
                                $calName1 = $singleCalendar1['calenderName'][0];
                                $calID1   = $singleCalendar1['CalendarID'][0];
                            ?>

                                <option value="<?= $calID; ?>"><?= $calName1; ?></option>
                            
                            <?php } ?>
                            </select><br><br>

                        <input type="submit" class="submit" value="Add Event" id="add-gif"> 
                
                        <center>
                            <div class="loading"></div>
                        </center>
                    </form>

                        <form class="delete-event" action="deleteEvent.php" method="POST">
                            <select class="select" id="event" name="deleteEvent">
                            <?php 
                       
                            foreach($allEvents as $singleEvent){
                                $eventName = $singleEvent['name'];
                                $eventID   = $singleEvent['eventid'];
                            ?>

                                <option value="<?= $eventID; ?>"><?= $eventName; ?></option>
                            
                            <?php } ?>
                            </select><br><br>

                            <input type="submit" class="submit" value="Delete Event" id="add-gif"> 
                        </form>   

                    <button id="createEvent" class="add-calendar-button">Add / Delete Event</button>
                    <form class="add-calendar" action="action_page.php" id="add-calendar">
                        <br>
                        <input type="text" id="title" value="Title" onfocus="if (this.value=='Title') this.value='';" onblur="if (this.value=='') this.value='Title';"/>

                        <br><br>                  

                        <input type="text" id="sharedto" value="Share With: (comma separated)" onfocus="if (this.value=='Share With: (comma separated)') this.value='';" onblur="if (this.value=='') this.value='Share With: (comma separated)';"/>   

                        <br><br>                   

                        <input type="submit" class="submit" value="Add Calendar"> 

                        <center>
                            <div class="loading"></div>
                        </center>
                    </form>      

                        <form class="delete-calendar" action="deleteCalendar.php" method="POST">
                            <select class="select" id="deleteCalendar" name="deleteCalendar">
                            <?php 

                            //print_r($allCalendarsContent);

                            
                            foreach($allCalendarsContent as $singleCalendar){
                                $calName = $singleCalendar['calenderName'][0];
                                $calID   = $singleCalendar['CalendarID'][0];
                            
                            ?>

                                <option value="<?= $calName; ?>"><?= $calName; ?></option>
                            
                            <?php } ?>
                            </select><br><br>

                            <input type="submit" class="submit" value="Delete Calendar"> 
                        </form>                                  

        </div>
    </nav>    
	
	<!-- SETTINGS END-->	
<div class="settings-button" id="showLeftPush"></div>
<div class="addEvent-button" id="showRightPush"></div>
<!-- Header med ugenummer  -->
<div class="header">
	<!-- <button class="prev-day weekcontrol">&#8592;</button> -->
  	CBS Calendar
 	<!-- <button class="next-day weekcontrol">&#8594;</button> -->
</div>

<div class="sidebar">
	<h1>Sidebar</h1>

	<h2>Select Date:</h2>    
	  	<center>
            <div class="week-picker" id="picker"></div>
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
    $events = new events();

    $jsonDecode = $events->getCBSCal();

    ?>
    <div class="weekdaybody">
        <?php 
            foreach ($jsonDecode['events'] as $event) { 

            $dateYearStart      = intval($event["start"][0]);
            $dateMonthStart     = intval($event["start"][1]);

            $dateDayStart       = intval($event["start"][2]);
            $dateTimeStartHour  = intval($event["start"][3]);
            $dateTimeStartMin   = intval($event["start"][4]);

            $dateDayEnd         = intval($event["end"][2]);
            $dateTimeEndHour    = intval($event["end"][3]);
            $dateTimeEndMin     = intval($event["end"][4]);


            $eventType      = $event["type"];
            $eventTitle     = $event["description"];
            $eventLocation  = $event["location"]; 
            $startPos = (($dateTimeStartHour-8) * 60) + $dateTimeStartMin+60;
            $endPos = (($dateTimeEndHour-8) * 60) + $dateTimeEndMin+60;
            $duration = $endPos-$startPos;

            $eventTitleCssClass = str_replace(' ', '', $eventTitle);

            $jsonDateValidate = $dateYearStart.$dateMonthStart.$dateDayStart;
                if($jsonDateValidate == $currentDateValidate){
                    ?>
                    <div class="event <?php echo $eventTitleCssClass; ?>" style="top: <?= $startPos; ?>px; height: <?= $duration; ?>;">
                        <div class="event-header"><?= str_pad($dateTimeStartHour, 2, '0', STR_PAD_LEFT); ?>:<?= str_pad($dateTimeStartMin, 2, '0', STR_PAD_LEFT); ?> - <?= str_pad($dateTimeEndHour, 2, '0', STR_PAD_LEFT); ?>:<?= str_pad($dateTimeEndMin, 2, '0', STR_PAD_LEFT); ?></div>

                        <span class="event-course"><?= $eventTitle; ?></span><br>
                        <span class="event-type"><?= $eventType; ?></span><br>
                        <span class="event-location"><?= $eventLocation; ?></span><br>
                    </div>
                    <?php
                }
            }

            //print_r($allCalendarsContent);

            
            foreach($allCalendarsContent as $singleCalendar2){
                $calID = (int)$singleCalendar2['CalendarID'][0];

                $dbevents   = json_decode($events->getDBCal($calID), true);
                foreach($dbevents as $event) { 

                $dateYearStart      = intval($event["startTime"][0] . $event["startTime"][1] . $event["startTime"][2] . $event["startTime"][3]);
                $dateMonthStart     = intval($event["startTime"][5] . $event["startTime"][6]);

                $dateDayStart       = intval($event["startTime"][8] . $event["startTime"][9]);
                $dateTimeStartHour  = intval($event["startTime"][11] . $event["startTime"][12]);
                $dateTimeStartMin   = intval($event["startTime"][14] . $event["startTime"][15]);

                $dateDayEnd         = intval($event["endTime"][8] . $event["endTime"][9]);
                $dateTimeEndHour    = intval($event["endTime"][11] . $event["endTime"][12]);
                $dateTimeEndMin     = intval($event["endTime"][14] . $event["endTime"][15]);

                if($event['type'] == "0"){
                	$eventType = "Lecture";
                }elseif($event['type'] == "1"){
                	$eventType = "Exercise";
                }elseif($event['type'] == "2"){
                	$eventType = "Other";
                }
                //$eventType      = $event["type"];
                $eventTitle     = $event["name"];
                $eventLocation  = $event["location"]; 


                $startPos = (($dateTimeStartHour-8) * 60) + $dateTimeStartMin+60;
                $endPos = (($dateTimeEndHour-8) * 60) + $dateTimeEndMin+60;
                $duration = $endPos-$startPos;

                $eventTitleCssClass = substr(str_replace(' ', '', $eventTitle), 0, -4);

                $jsonDateValidate = $dateYearStart.$dateMonthStart.$dateDayStart;
                    if($jsonDateValidate == $currentDateValidate){
                        
                        echo "<div class='event ".dkRemove($eventTitleCssClass)."' style='top:". $startPos . "px; height: ". $duration . "'>
                            <div class='event-header'>". str_pad($dateTimeStartHour, 2, '0', STR_PAD_LEFT) . ":". str_pad($dateTimeStartMin, 2, '0', STR_PAD_LEFT) . " - ". str_pad($dateTimeEndHour, 2, '0', STR_PAD_LEFT) .":". str_pad($dateTimeEndMin, 2, '0', STR_PAD_LEFT) . "</div>
                            <span class='event-course'>" .$eventTitle. "</span><br>
                            <span class='event-type'>" . $eventType . "</span><br>
                            <span class='event-location'>" . $eventLocation . "</span>

                            <div class='note-form-event'>
                                <form class='note-form' action='saveNote.php' method='POST'>
                                    <textarea class='notebox' maxlength='50' name='note' placeholder='Insert Note (max 50 caracters)'></textarea>

                                    <input type='submit' class='note-button' value='create note' />
                                    <input type='hidden' value='".$event['eventid']."' name='eventid'/>
                                </form> 
                            </div>";
                            foreach($allEvents as $singleEvent){
                                $eventName = $singleEvent['name'];
                                $eventID   = $singleEvent['eventid'];


                                if($eventID == $event['eventid']){

                                    if(isset($singleEvent['notes'])){
                                    echo "<ol class='note-list'>";

                                        foreach($singleEvent['notes'] as $noteValOutput){
                                            $noteText = $noteValOutput['noteText'];
                                            $noteID   = $noteValOutput['noteID'];

                                            ?>

                                            <li>
                                                <span><?= $noteText; ?></span>

                                                <form action="deleteNote.php" method="POST" class="note-delete-form">
                                                    <input type="hidden" value="<?= $noteID; ?>" name="noteID" />
                                                    <input type="submit" value="x" class="note-delete-submit"/>
                                                </form>
                                            </li>

                                            <?php  
                                        }

                                        echo "</ol>";

                                    }

                                }
                            }
                            /*
                            foreach($event['notes'] as $eventNotes){
                                print_r($eventNotes);
                            }
                            */
                        echo "</div>";
                    
                    }
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

<div class="footer" style="color:#000">
<span class="qotd">
    <?php 
        $QOTD = new getQuote();

        $quote = json_decode(tcpConnect($QOTD->overallID), true);
        
        echo $quote['quote'] . " : " . $quote['author'] . " // " . $quote['topic'];
    ?>
    <br>
    </span>
    Copenhagen Business School &copy;  <?php echo date("Y") ?>     
</div>

<script src="js/menu-left.js"></script>

</body>
</html>