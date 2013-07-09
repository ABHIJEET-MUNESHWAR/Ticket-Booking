<!--

<Ticket-Booking>
Copyright (C) <2013>  
<Abhijeet Ashok Muneshwar>
<openingknots@gmail.com>

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
 any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

-->

<?php
include('db_login.php');
session_start();
$connection = mysql_connect($db_host, $db_username, $db_password);
if (!$connection)
{
	die ("Could not connect to the database: <br />". mysql_error());
}
mysql_select_db('book');

// check for form submission - if it doesn't exist then send back to signin form
if (!isset($_POST['save']) || $_POST['save'] != 'signin') {
    header('Location: login.php'); exit;
}

	
// get the posted data
$userid = strip_tags( utf8_decode( $_POST['userid'] ) );
$password = strip_tags( utf8_decode( $_POST['password'] ) );
	

// check that user id was entered
if (empty($userid))
    $error = 'You must enter your user id.';

	
// check that a message was entered
if (empty($password))
    $error = 'You must enter password.';



//Check whether the student is already registered.
$select = mysql_query("select * from register where userid = '" . $userid . "' and password = '" . $password . "'", $connection);

//$query = mysql_real_escape_string($select);

$num_rows = mysql_num_rows($select);

if ( $num_rows == 0)
	$error = 'You are not registered.';
	
	
// check if an error was found - if there was, send the user back to the form
if (isset($error)) {
    header('Location: login.php?e='.urlencode($error)); exit;
}


?>

<!DOCTYPE HTML>
<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ticket Cancelation</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	</HEAD>

	<BODY>
		<br><br><br>
		<div class="container">
			<div class="row">
				<div class="span10">
					<?php
						$query = "select * from seat where userid = '" . $userid . "'";
						$result = mysql_query($query);
						if ( mysql_num_rows($result) == 0 )
						{
							echo "You have not booked any tickets.";
						}
						else
						{
							echo "<form action='cancelled.php' method='POST' onsubmit='return validateCheckBox();'>";
								echo "<table align='center' class='table table-hover table-bordered table-striped span6' align='center'>";
									echo "<thead>";
										echo "<tr>";
											echo "<th>Select</th>";
											echo "<th>Seat Number</th>";
											echo "<th>PNR</th>";
											echo "<th>Date</th>";
										echo "</tr>";
									echo "</thead>";
									echo "<tbody>";
								
									while($row = mysql_fetch_array($result))
									{
										echo "<tr>";
											echo "<td><input type='checkbox' name='formSeat[]' value='".$row['PNR']."'/></td>";
											echo "<td>". $row['number'] ."</td>";
											echo "<td>". $row['PNR'] ."</td>";
											echo "<td>". $row['date'] ."</td>";
										echo "</tr>";				
									}
									echo "<tr>";
										echo "<td>";
										echo "</td>";
										echo "<td>";
											echo '<button type="submit" name="formSubmit" class="btn btn-info">';
												echo '<i class="icon-ok icon-white"></i> Submit';
											echo '</button>';
										echo "</td>";
										echo "<td>";
											echo '<button type="reset" class="btn">';
												echo '<i class="icon-refresh icon-black"></i> Clear';
											echo '</button>';
										echo "</td>";
										echo "<td>";
										echo "</td>";
									echo "</tr>";
									echo "</tbody>";
								echo "</table>";
							echo "</form>";
						}
					?>
				</div>
			</div>
		</div>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript">
			function validateCheckBox()
			{
				var c = document.getElementsByTagName('input');
				for (var i = 0; i < c.length; i++)
				{
					if (c[i].type == 'checkbox')
					{
						if (c[i].checked) 
						{
							return true;
						}
					}
				}
				alert('Please select at least 1 ticket.');
				return false;
			}
		</script>
	</BODY>
</HTML>
