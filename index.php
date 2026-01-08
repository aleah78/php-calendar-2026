<?php
date_default_timezone_set("America/Chicago");

//cal_days_in_month(), getdate()
//$today = date("F j, Y, g:i a") . "\n";
$calendarType = CAL_GREGORIAN;
$date_info = getdate();
$current_day = $date_info['mday'];
$current_weekday = $date_info['wday'];
$current_month = $date_info['month'];
$current_month_int = $date_info['mon'];
$current_year = $date_info['year'];

$firstDayofMonth = date('w', mktime(0, 0, 0, $current_month_int, 1, $current_year));
//print_r($firstDayofMonth);
//echo "<br />";
$totalDays = cal_days_in_month($calendarType, $current_month_int, $current_year);
//print_r($totalDays);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Calendar</title>
	
	<style>
		
		.yearDiv {
			text-align: end;
			background: cadetblue;
			color: white;
			padding: 10px 10px;
			font-size: 1.2em;
			font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Arial, sans-serif;

		}
		
		.monthDiv {
			text-align: center;
			background: darkslateblue;
			color: white;
			padding: 25px 25px;
			font-size: 1.2em;
			font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Arial, sans-serif;

		}
		
		table {
			table-layout: fixed;
			text-align: start;
			border-collapse: collapse;
			width: 100%;
			
		}
		
		.tableHead tr {
			text-align: center;
			background: darkmagenta;
			color: white;
			/* padding: 15px 15px; */
			font-size: 1.2em;
			font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Arial, sans-serif;
			/* border: 2px solid black; */
		}
		
		th {
			height: 45px;
		}
		
		td {
		  width: 14.28%;
		  height: 95px;
		  font-size: .9em;
		  font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, "Fira Sans", "Droid Sans", "Helvetica Neue", Arial, sans-serif;
		  text-align: end;
		  vertical-align: text-top;
		  border: 2px solid lightgrey; 
		}
		
		td.today {
			background-color: #1abc9c;
			color: white;
			font-weight: bold;
		}

	
		
		
	</style>
</head>
<body>
	<h1>Today is <?php echo $current_month ." " .$current_day . ",  " . $current_year ;?></h1>
	<?php echo "Current: $current_day / $current_month / $current_year<br>"; ?>
	
	<div class="yearDiv">
		<span><?php echo $current_year; ?><span>
	</div>
	
	<div class="monthDiv">
		<span><?php echo $current_month; ?><span>
	</div>
	
	<div class = "daysDiv">
		<table>
			<thead class="tableHead">
				<tr>
				<th scope="column">Sunday </th>
				<th scope="column">Monday </th>
				<th scope="column">Tuesday </th>
				<th scope="column">Wednesday </th>
				<th scope="column">Thursday </th>
				<th scope="column">Friday </th>
				<th scope="column">Saturday </th>
				</tr>
			</thead>
			<tbody>
				<tr>
				<!-- Empty cells before the first day -->
				<?php 
					for($i = 0; $i < $firstDayofMonth; $i++) {
						echo "<td></td>";
					}
					
					// Now track which column we're in
					$day_of_week = $firstDayofMonth;
					
					// Loop through all days in the month
					for($day = 1; $day <= $totalDays; $day++) {
						// Check if we need to start a new row
						if($day_of_week == 7) {
							echo "</tr><tr>";
							$day_of_week = 0;
						}
						
						// Output the day number
						//echo "<td>" . $day . "</td>";
						
						if($day == $current_day) {
							echo "<td class='today'>" . $day . "</td>";
						} else {
							echo "<td>" . $day . "</td>";
						}
						
						// Move to next column
						$day_of_week++;
					}
				?>
				</tr>
			</tbody>
		</table>
	</div>
	
	
</body>
</html>
