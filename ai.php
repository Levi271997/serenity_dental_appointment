<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="css/calendar.css"> -->
</head>
<body>
    <style>
      table {
  width: 100%;
} 
      .calendar{
        background-color: #dddddd;
      }
      .thead{
        background-color:  #dddddd;
        font-family: monospace;
        font-size: 24px;
      }
      td, th {
  text-align: left;
}

      
        /* table {
  border-collapse: collapse;
  height: 50%;
  width: 100%;



}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;


}

tr{
  background-color: #dddddd;

} */


    </style>
</body>
</html>
<?php



// Connect to the database
$db = mysqli_connect("localhost", "root", "", "dcms");


$month = 1; // August
$year = 2023;

// Find the number of days in the month
$numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Create an array of the days of the week
$days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

// Find the day of the week that the first day of the month falls on
$startDay = date("w", mktime(0,0,0,$month,1,$year));

echo "<h2>" . $month . "&nbsp;" . "&nbsp;" . $year . "</h2/>";
// Create the calendar

echo "<div class='calendar'>";
echo "<table cellspacing='21' cellpadding='21'>";

echo "<thead class='thead'>";

// Create the calendar header
echo "<tr>";
foreach($days as $day) {
  echo "<th>" . $day . "</th>";
}
echo "</tr>";

echo "</thead>";

// Create the rest of the calendar
echo "<tr>";

echo "<tbody>";
for ($i=0; $i<$startDay; $i++) {
  echo "<td>&nbsp;</td>";
}
echo "<class='day_num'>";
for ($i=1; $i<=$numDays; $i++) {
  if (($i + $startDay - 1) % 7 == 0) {
    echo "</tr><tr>";
  }
  echo "</div>";
  // Retrieve events for this day from the database
  $date = $year . "-" . $month . "-" . $i;
  $result = mysqli_query($db, "SELECT * FROM tblappointment WHERE date='$date'");

  
  $events = "";
  while($row = mysqli_fetch_array($result)) {   
    echo "<br>";
    $events .= $row['time'] . "<br>";
  }
  // Display the day and any events for the day
  echo "<td>" .  $i . "<br>" . $events . "</td>";

}
echo "</tr>";

echo "</tbody>";

echo "</table>";


echo "</div>";

// Close the database connection
mysqli_close($db);

?>

<?php

// Connect to the database
$db = mysqli_connect("localhost", "root", "", "dcms");

$month = 8; // August
$year = 2022;

// Find the number of days in the month
$numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Create an array of the days of the week
$days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

// Find the day of the week that the first day of the month falls on
$startDay = date("w", mktime(0,0,0,$month,1,$year));

// Get the time slots for each day
$timeSlots = getTimeSlots($month, $year);

// Create the calendar
echo "<table>";

// Create the calendar header
echo "<tr>";
foreach($days as $day) {
  echo "<th>" . $day . "</th>";
}
echo "</tr>";

// Create the rest of the calendar
echo "<tr>";
for ($i=0; $i<$startDay; $i++) {
  echo "<td>&nbsp;</td>";
}
for ($i=1; $i<=$numDays; $i++) {
  if (($i + $startDay - 1) % 7 == 0) {
    echo "</tr><tr>";
  }
  // Display the time slots for this day
  echo "<td style='border: 1px solid black;'>";
  echo "<h3>" . $i . "</h3>";
  foreach ($timeSlots as $timeSlot) {
    $date = $year . "-" . $month . "-" . $i;
    if ($timeSlot['date'] == $date) {
      // Check if the time slot is available
      $result = mysqli_query($db, "SELECT * FROM tblappointments WHERE date='$date' AND time='$timeSlot[time]'");
      if (mysqli_num_rows($result) == 0) {
        // Time slot is available, show a form to book it
        echo "<form method='post'>";
        echo "<input type='hidden' name='date' value='$date'>";
        echo "<input type='hidden' name='time' value='$timeSlot[time]'>";
        echo "$timeSlot[time] <input type='submit' name='book' value='Book'>";
        echo "</form>";
      } else {
        // Time slot is not available, show a message
        echo $timeSlot['time'] . " Not available";
      }
    }
  }
  echo "</td>";
}
echo "</tr>";

echo "</table>";

// Close the database connection
mysqli_close($db);

//
?>

<div id="calendar">
  <?php


$month = 8; // August
$year = 2022;

// Find the number of days in the month
$numDays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// Create an array of the days of the week
$days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");

// Find the day of the week that the first day of the month falls on
$startDay = date("w", mktime(0,0,0,$month,1,$year));

// Create the calendar
echo "<table>";

// Create the calendar header
echo "<tr>";
foreach($days as $day) {
  echo "<th>" . $day . "</th>";
}
echo "</tr>";

// Create the rest of the calendar
echo "<tr>";
for ($i=0; $i<$startDay; $i++) {
  echo "<td>&nbsp;</td>";
}
for ($i=1; $i<=$numDays; $i++) {
  if (($i + $startDay - 1) % 7 == 0) {
    echo "</tr><tr>";
  }
  // Display the day
  echo "<td style='border: 1px solid black; text-align: center;'>" . $i . "</td>";
}
echo "</tr>";

echo "</table>";


  // Calendar code goes here...
  ?>
</div>

