<?php 

include 'events.php';

$weekStart = $_REQUEST['dateStart'];
$weekEnd = $_REQUEST['dateEnd'];

// set current date
$date = $weekStart;
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

$weekdaybody_html = array();

for ($i = 0; $i < 7; $i++) {
    $weekday_year        = date("Y", $ts + $i * 86400) . "\n";
    $weekday_month       = date("m", $ts + $i * 86400) . "\n";
    $weekday_day         = date("l", $ts + $i * 86400) . "\n";
    $weekday_day_number  = date("j", $ts + $i * 86400) . "\n";
    $weekday_date        = date("d", $ts + $i * 86400) . "\n";
    $currentDateValidate = intval($weekday_year).intval($weekday_month).intval($weekday_day_number);

    $events = new events();

    $jsonDecode = $events->getCBSCal();
 
    $weekdaybody_html_var = "<div class='weekdaybody'>";
    
    
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

            $eventTitleCssClass = substr(str_replace(' ', '', $eventTitle), 0, -4);

            

            $jsonDateValidate = $dateYearStart.$dateMonthStart.$dateDayStart;
                if($jsonDateValidate == $currentDateValidate){
                    
                    $weekdaybody_html_var.="<div class='event ".dkRemove($eventTitleCssClass)."' style='top:". $startPos . "px; height: ". $duration . "'>
                        <div class='event-header'>". str_pad($dateTimeStartHour, 2, '0', STR_PAD_LEFT) . ":". str_pad($dateTimeStartMin, 2, '0', STR_PAD_LEFT) . " - ". str_pad($dateTimeEndHour, 2, '0', STR_PAD_LEFT) .":". str_pad($dateTimeEndMin, 2, '0', STR_PAD_LEFT) . "</div>

                        <span class='event-course'>" .$eventTitle. "</span><br>
                        <span class='event-type'>" . $eventType . "</span><br>
                        <span class='event-location'>" . $eventLocation . "</span><br>
                    </div>";
                    
                }
            }
        
    $weekdaybody_html_var.="<div class='weekday no-bg'>". $weekday_day."<br><span class='date'>". $weekday_date ."</span></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
        <div class='weekday'></div>
    </div>";

    array_push($weekdaybody_html, $weekdaybody_html_var);

    //echo($weekdaybody_html_var);
    json_encode($weekdaybody_html, JSON_HEX_QUOT | JSON_HEX_TAG);
}

?>

<?php foreach($weekdaybody_html as $weekdaybody_html_output){ 
        echo $weekdaybody_html_output;
    }
    //echo "weekStart:" . $weekStart . " Weekend:" .$weekEnd . "Date: " .$date;

    //echo $_REQUEST['number'];
?>



