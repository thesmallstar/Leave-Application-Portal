<?php
	
	session_start();
	if(!isset($_SESSION['user'])){  
	 echo '<script language="javascript">alert("Please Login")</script>';      
	   header("Refresh: 1; url=index.php"); 
	   exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>student</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>

		@import url('https://fonts.googleapis.com/css?family=Roboto');

		body {font-family: 'Roboto', sans-serif;}

		.sidenav {
			height: 100%;
			width: 250px;
			position: fixed;
			z-index: 1;
			top: 0;
			left: 0;
			background-color: #111;
			overflow-x: hidden;
			padding-top: 20px;
			background: linear-gradient( rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.8) );
			background-size: cover;
			box-shadow: 0 0 10px #7b7777;
		}

		.sidenav li {
			padding: 6px 8px 6px 16px;
			text-decoration: none;
			font-size: 18px;
			color: #796ed4;
			display: block;
		}

		.sidenav li:hover {
			color: #f1f1f1;
		}

		.main {
			margin-left: 160px; /* Same as the width of the sidenav */
			font-size: 28px; /* Increased text to enable scrolling */
			padding: 0px 10px;
		}

		@media screen and (max-height: 450px) {
			.sidenav {padding-top: 15px;}
			.sidenav a {font-size: 18px;}
		}

		input {
			border-radius: 0px!important;
		}	

		.form-control {
			border: 1px solid #000!important;
			border-radius: 0px!important;
			color: #000!important;
		}

		.form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
			background-color: #f6f6f6!important;
		}

		table {
			font-family: 'Roboto', sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 4px;
			padding-left: 5px;
		}

		th {
			background: #796ed4;
			color: #fff;
		}

		tr:nth-child(odd) {
			background-color: #dddddd;
		}

		.row-data:hover {
			background: rgba(0,0,255,.2);
			cursor: pointer
		}
		
		button{
			
			-webkit-transition-duration: 0.4s; /* Safari */
			 transition-duration: 0.4s;
			 background-color:white;
                        color: black;
			 border: 2px solid #796ed4;
			 text-decoration-color: #796ed4;
			
            
                         text-align: center;
                         text-decoration: none;
                          display: inline-block;
			 width: 225px;
		 }
	
		   button:hover {
			 background-color: #796ed4; /* Green */
			 color: #796ed4;
		   }
	</style>
</head>
<body>
	<div class="sidenav">
	<div style="height: 220px;width: 100%;padding: 10px;">
	<div style="background: url('peoM.jpg');height: inherit;width: inherit;background-size: cover;border-radius: 100%">
	</div>
	<div style="text-align:center;font-size: 24px;color: #fff"><?php echo $_SESSION['enroll'] ?></div>
	</div>
	<ul style="padding: 10px; margin-top: 70px">
		<button><li class="btn all_apps" >APPLICATIONS</li></button>
		<br>
		<br>

		<button><a href="form.php"><li class="btn" >NEW APPLICATION</li></a></button>
	</div>
	</ul>
	<div>
		<h3 id="navdars" style="text-align: center;float: right;margin-right: 40px;margin-bottom: 50px;border-bottom: 2px solid cornflowerblue;">APPLICATIONS</h3>
		<div style="padding-left: 20px;width: 83%;margin-left: 250px;padding-right: 20px">
			<table id="records_table" class="table-responsive" style="box-shadow: 0 17px 50px 0 rgba(0, 0, 0, 0.19), 0px 2px 20px 0 rgba(0, 0, 0, 0.24)">
				<tr>
					<th style="padding: 10px">NAME</t>
					<th style="padding: 10px">ENROLLMENT NUMBER</th>
					<th style="padding: 10px">BRANCH</th>
					<th style="padding: 10px">SEMESTER</th>
					<th style="padding: 10px">NATURE OF LEAVE</th>
					<th style="padding: 10px">PURPOSE</th>
					<th style="padding: 10px">CLASSES SCHEDULED</th>
					<th style="padding: 10px">ADDRESS</th>
					<th style="padding: 10px">MOBILE</th>
					<th style="padding: 10px">EMAIL</th>
					<th style="padding: 10px">UPLOADS</th>
					<th style="padding: 10px">STATUS</th>
				</tr>
			</table>
		</div>
		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content" style="border-radius: 0px!important">
				<div class="modal-header">
					<h4 class="modal-title">Leave Application (Cannot be edited)</h4>
				</div>
				<div class="modal-body">
				<div class="container">
					<div class="form-horizontal">
						<!--<div class="form-group">
						<label class="control-label col-sm-2" for="email">NAME</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_name"></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">ENROLLMENT NUMBER</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_enroll"></p>
						</div>
						</div>
	-->
						<div class="form-group">
						<label class="control-label col-sm-2" for="email">BRANCH</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_branch"></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">SEMESTER</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_semester" ></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">NATURE OF LEAVE</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_nature"></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">PURPOSE</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_purpose"></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">CLASS SCHEDULED ON LEAVE</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_classScheduledOnLeave"></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">START DATE</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_startdate"></p>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">END DATE</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_enddate"></p>
						</div>
						</div>


						<div class="form-group">
						<label class="control-label col-sm-2" for="email">ADDRESS</label>
						<div class="col-sm-4">
							<textarea type="email" class="form-control" id="ans_addr" disabled></textarea>
						</div>
						</div>

						<div class="form-group">
						<label class="control-label col-sm-2" for="email">MOBILE</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_mobile"></p>
						</div>
						</div>
<!--
						<div class="form-group">
						<label class="control-label col-sm-2" for="email">EMAIL</label>
						<div class="col-sm-4">
							<p type="email" class="form-control" id="ans_email"></p>
						</div>
						</div>-->
						<input id="Application_id" type="hidden" value=""/>
						<div class="form-group">        
						<div class="col-sm-offset-2 col-sm-10">
							<button type="button" class="btn btn-default" data-dismiss="modal" style="background: #fff;border-radius: 0px!important;color: #000;outline: none;border-color: #000;border-width: 2px;">&nbsp&nbsp Close &nbsp&nbsp</button>
						</div>
						</div>
					</div>
					</div>
				</div>
				</div>

			</div>
		</div>
		</div>
</body>
<script type="text/javascript" src="js-lib/jq.min.js"></script>
	<script type="text/javascript">

		$(document).on('click','.all_apps',function() {
			location.reload();
		});

		text_truncate = function(str,size) {
			if (str.length > size) {
			return str.substring(0, size)+'...';
			} else {
			return str;
			}
		};

		ShowDet = function(id) {
			//var stname = document.getElementById("stname"+id).textContent;
			//var stroll = document.getElementById("stroll"+id).textContent;
			var stbrnch = document.getElementById("stbrnch"+id).textContent;
			var stsem = document.getElementById("stsem"+id).textContent;
			var stnatleave = document.getElementById("stnatleave"+id).textContent;
			var stpurpose = document.getElementById("stpurpose"+id).textContent;
			var stshedornt = document.getElementById("stshedornt"+id).textContent;
			var addr = document.getElementById("addr"+id).textContent;
			var stmbno = document.getElementById("stmbno"+id).textContent;
			//var stemai = document.getElementById("stemai"+id).textContent;
			var ststrtdat = document.getElementById("ststrtdat"+id).textContent;
			var stenddat = document.getElementById("stenddat"+id).textContent;
			console.log("error");
			//document.getElementById("ans_name").textContent = stname;
			//document.getElementById("ans_enroll").textContent = stroll;
			document.getElementById("ans_branch").textContent = stbrnch;
			document.getElementById("ans_semester").textContent = stsem;
			document.getElementById("ans_nature").textContent = stnatleave;
			document.getElementById("ans_purpose").textContent = stpurpose;
			document.getElementById("ans_classScheduledOnLeave").textContent = stshedornt;
			document.getElementById("ans_startdate").textContent = ststrtdat;
			document.getElementById("ans_enddate").textContent = stenddat;
			document.getElementById("ans_addr").textContent = addr;
			document.getElementById("ans_mobile").textContent = stmbno;
			//document.getElementById("ans_email").textContent = stemai;
			document.getElementById("Application_id").setAttribute("value",id);

		}

		$(document).ready(function(){
		    $.ajax({
		        url: './core/student-dashboard-fetch.php',
		        type: 'post',
		        data: {method: 'getstudentApps'},
		        success: function(data) {
		        	// check for no application
		        	// if data == 'No applications currently' else //logic ends
		            // showdirectly
		            console.log(data);
					response = $.parseJSON(data);

				$(function() {
					$.each(response, function(i, item) {
						var color = "#222";
						var opacit = 1;
						var tity = "no action";
						if(item.status == 0) {

						} else if(item.status == 1) {
							color = "#ff1744";
							tity = "REJECTED";
						} else if(item.status == 2) {
							color = "#ffc400";
							tity = "PENDING";
						} else if(item.status == 3) {
							color = "#4caf50";
							opacit = .6;
							tity = "ACCEPTED";
						}
						var $tr = $('<tr id="row-data" onclick="ShowDet('+item.id+')" style="opacity:'+opacit+'" class="row-data" data-toggle="modal" data-target="#myModal">').append(
							$('<td style="padding-left: 10px;padding-right: 10px" id="stname'+item.id+'">').text(item.studentName),
							$('<td id="stroll'+item.id+'">').text(item.rollNumber.toUpperCase()),
							$('<td id="stbrnch'+item.id+'">').text(item.branch.toUpperCase()),
							$('<td id="stsem'+item.id+'">').text(item.semester),
							$('<td id="stnatleave'+item.id+'">').text(item.natureOfLeave),
							$('<td id="stpurpose'+item.id+'">').text(item.purpose),
							$('<td id="stshedornt'+item.id+'">').text(item.classScheduledOnLeave.toUpperCase()),
							$('<td style="display: none" id="ststrtdat'+item.id+'">').text(item.startDate.toUpperCase()),
							$('<td style="display: none" id="stenddat'+item.id+'">').text(item.endDate.toUpperCase()),
							$('<td id="addr'+item.id+'">').text(item.address),
							$('<td id="stmbno'+item.id+'">').text(item.mobile),
							$('<td id="stemai'+item.id+'">').text(item.email),
							$('<td>').append($('<a>').attr({href:"uploads/"+item.uploadedImageName,target:"_blank"}).text("UP")),
							$('<td id="status_app">').append($('<div title="'+tity+'" style="border:4px solid #222;background:'+color+';width: 25px;height: 25px;border-radius: 0%;margin: auto">'))
						).appendTo('#records_table');
						//console.log($tr.wrap('<p>').html());
					});
				});
		        }
	    	})
		});
	</script>
</html>
