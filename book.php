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


<!DOCTYPE HTML>
<HTML>

	<HEAD>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Boot the ticket</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	</HEAD>

	<BODY>

		<br>
		<div class="container">
	        <div class="page-header">
	            <h1>Book the tickets</h1>
	        </div>			
			<?php

					// check for a successful form post
					if (isset($_GET['s'])) 
					{
						echo "<div class=\"alert alert-success\">".$_GET['s']." You will be automatically redirected after 5 seconds.</div>";
//						echo "You will be automatically redirected after 5 seconds.";
						header("refresh: 5; index.php");
					}

					// check for a form error
					elseif (isset($_GET['e'])) echo "<div class=\"alert alert-error\">".$_GET['e']."</div>";

			?> 
			<form name="contactForm" action="register.php" method="POST" class="form-horizontal">
				<div class='control-group'>
					<label class='control-label' for='input1'>Seat Numbers</label>
					<div class='controls'>
					<?php 
						for($i=1; $i<11; $i++)
						{
							$chparam = "ch" . strval($i);
							if(isset($_POST[$chparam]))
							{
								echo "<input type='text' class='span3' name=ch".$i." value=".$i." readonly/><br>";
							}
						}
					?>
	                </div>
	            </div>
	  
					<?php
						if(isset($_POST['doj']))
						{
							echo "<div class='control-group'>";
							echo "<label class='control-label' for='input1'>Date of Journey</label>";
								echo "<div class='controls'>";
									echo "<input type='text' name='journey_date' id='input1' class='span3' value=". $_POST['doj'] ." readonly />";
								echo "</div>";
							echo "</div>";
						}
					?>
	            
				<div class="control-group">
	                <label class="control-label" for="input1">Name</label>
	                <div class="controls">
	                    <input type="text" name="user_name" id="input1" placeholder="Type your name" class="span3" pattern="[A-z ]{3,}" title="Please enter a valid name." required>
	                </div>
	            </div>
				
	            <div class="control-group">
	                <label class="control-label" for="input2">Address</label>
	                <div class="controls">
	                    <input type="text" name="address" id="input2" placeholder="Type your address" class="span3" required>
	                </div>
	            </div>

	            <div class="control-group">
	                <label class="control-label" for="input3">Contact Number (only 10 digits)</label>
	                <div class="controls">
	                    <input type="text" name="mobile" pattern=".{10}" title="Please enter 10 digit no." class="span3" placeholder="Type your mobile number" maxlength="10" required/>
	                </div>
	            </div>
				

	            <div class="control-group">
	                <label class="control-label" for="input4">User ID</label>
	                <div class="controls">
	                    <input type="text" class="span3" placeholder="Type your user id" name="userid" pattern="[A-z ]{3,}" title="Please enter a valid username." required/>
	                </div>
	            </div>


	            <div class="control-group">
	                <label class="control-label" for="input5">Email ID</label>
	                <div class="controls">
	                    <input type="text" class="span3" placeholder="Type your email id" name="email" pattern="^[a-zA-Z0-9-\_.]+@[a-zA-Z0-9-\_.]+\.[a-zA-Z0-9.]{2,5}$" title="Please enter a valid email id." required/>
	                </div>
	            </div>

	            <div class="control-group">
	                <label class="control-label" for="input6">Password</label>
	                <div class="controls">
	                    <input type="password" class="span3" name="password" placeholder="Type your password" required/>
	                </div>
	            </div>

	            <div class="control-group">
	                <label class="control-label" for="input6">Message</label>
	                <div class="controls">
	                    <textarea class="span3" rows="3" name="message" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{5,150}$" title="Please enter a valid message." ></textarea>
	                </div>
	            </div>

	            <div class="form-actions">
	                <input type="hidden" name="save" value="contact">
					<button type="submit" class="btn btn-info">
						<i class="icon-ok icon-white"></i> Book
					</button>
					<button type="reset" class="btn">
						<i class="icon-refresh icon-black"></i> Clear
					</button>
	            </div>

			</form>
		</div>

		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/jquery-latest.min.js">\x3C/script>')</script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
	</BODY>
</HTML>