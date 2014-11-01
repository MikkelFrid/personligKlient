<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="main.js" type="text/javascript"></script>
<meta charset="UTF-8">
</head>
<body>
<h1></h1>
<input type="button" id="prevWeekId" value="prevWeek" onClick="self.location='?name=prevWeek&week=<?= $_SESSION['cal_data']['weekLocation']; ?>'">
<input type="button" id="nextWeekId" value="nextWeek" onClick="self.location='?name=nextWeek&week=<?= $_SESSION['cal_data']['weekLocation']; ?>'">

<!-- Header med ugenummer  -->
<div class="header">
  <h1>Week</h1>
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
  <div class="weekdaybody">
    <div class="weekday">Mandag</div>
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
  <div class="weekdaybody">
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
</div>
</body>
</html>