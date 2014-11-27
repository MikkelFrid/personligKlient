<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="main.js" type="text/javascript"></script>
<meta charset="UTF-8">
</head>
<body>
<!-- Header med ugenummer  -->
<div class="header">
  <h1>Week</h1>

  Vi skal have en time tirsdag fra 8:40 til 9:30

  900 min samlet

  for hver time er der en højde på 6.6667% / 60 px.
  Hvert enkelte mintur er i højden: 1px.

  {"activityid":"BINTO1067U_LA_E14","eventid":"BINTO1067U_LA_E14_714ff8c1a1d8f5e918829fef3ff92a0f_23e125dbca8f1d6655b7a40a77481a82","type":"Exercise","title":"BINTO1067U.LA_E14","description":"Distribuerede systemer (LA)","start":["2014",8,"15","8","00"],"end":["2014",8,"15","9","40"],"location":"SP213"},
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
    $jsonString = "{ \"events\": [{\"activityid\":\"BINTO1035U_XB_E14\",\"eventid\":\"BINTO1035U_XB_E14_7522cb9e2c47efa1e3ff6ac24002be36_99537c3adf3e04bc329ed38f0e58ce2e\",\"type\":\"Lecture\",\"title\":\"BINTO1035U.XB_E14\",\"description\":\"Makro\u00f8konomi (XB)\",\"start\":[\"2014\",11,\"19\",\"8\",\"00\"],\"end\":[\"2014\",11,\"19\",\"9\",\"40\"],\"location\":\"Ks71\"},
{\"activityid\":\"BINTO1035U_XB_E14\",\"eventid\":\"BINTO1035U_XB_E14_5eea61ae6c2d8824d340e3b57c52dc11_a48b708b5cdbd426b599420f90697a1f\",\"type\":\"Exercise\",\"title\":\"BINTO1035U.XB_E14\",\"description\":\"Makro\u00f8konomi (XB)\",\"start\":[\"2014\",10,\"27\",\"8\",\"00\"],\"end\":[\"2014\",10,\"27\",\"9\",\"40\"],\"location\":\"SP114\"},
{\"activityid\":\"BINTO1035U_XB_E14\",\"eventid\":\"BINTO1035U_XB_E14_e523a307e38d3b09094746c6d679e683_087a51abc6bd219e13e0351601e0e1aa\",\"type\":\"Lecture\",\"title\":\"BINTO1035U.XB_E14\",\"description\":\"Makro\u00f8konomi (XB)\",\"start\":[\"2014\",11,\"3\",\"8\",\"00\"],\"end\":[\"2014\",11,\"3\",\"9\",\"40\"],\"location\":\"Ks71\"}]}";


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
                        <span class="starttime"><?= $startPos; ?></span>
                        <span class="duration"><?= $duration; ?></span>
                    </div>
                    <?php
                }
            }
        ?>
        <div class="weekday no-bg"><?= $weekday_day; ?><br><?= $weekday_date; ?></div>
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
<!--
  <div class="weekdaybody">
    <div class="event" style="top: 120px; height: 120px;">
        <span class="starttime">60</span>
        <span class="duration">120</span>
    </div>
    <div class="weekday">Tirsdag</div>
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
  <div class="weekdaybody ">
    <div class="weekday">Onsdag</div>
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
  <div class="weekdaybody" >
    <div class="weekday">Torsdag</div>
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
  <div class="weekdaybody" >
    <div class="weekday">Fredag</div>
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
  <div class="weekdaybody" >
    <div class="weekday">Lørdag</div>
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
  <div class="weekdaybody" >
    <div class="weekday">Søndag</div>
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
-->
</div>
</body>
</html>