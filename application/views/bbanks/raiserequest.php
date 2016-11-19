<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}
        
        success{
		color: green;
		font-weight: normal;
	}
        
        error{
		color: red;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
       table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            text-align: left;
            padding: 8px;
        }
	</style>
</head>
<body>-->
<div id="container">
<div id="body">
        <div>
                <div class="<?php echo $status;?>"><?php echo $msg;?></div>
                <form name="raise_request_form" id="raise_request_form" method="post">
                    <table>
                        <tr><td style="width:20%">Blood Group:</td><td  style="width:80%">
                                <select name="blood_group" id="blood_group">
                                    <option value="">Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select></td></tr>
                        <tr><td style="width:20%">No Of Units:</td><td  style="width:80%"><input type="text" name="no_of_units" id="no_of_units"/></td></tr>
                        <tr><td style="width:20%">Required When:</td><td  style="width:80%"><input type="text" name="required_date" id="required_date"/></td></tr>
                        <tr><td style="width:20%">Required Time:</td><td  style="width:80%"><input type="text" name="required_time" id="required_time"/></td></tr>
                        <tr><td style="width:20%">Location Details:</td><td  style="width:80%"></td></tr>
                        <tr><td style="width:20%">Hospital Name:</td><td  style="width:80%"><input type="text" name="hospital_name" id="hospital_name"/></td></tr>
                        <tr><td style="width:20%">Address line1:</td><td  style="width:80%"><input type="text" name="loc_addressline1" id="loc_addressline1"/></td></tr>
                        <tr><td style="width:20%">Address line2:</td><td  style="width:80%"><input type="text" name="loc_addressline2" id="loc_addressline2"/></td></tr>
                        <tr><td style="width:20%">City:</td><td  style="width:80%"><input type="text" name="loc_city" id="loc_city"/></td></tr>
                        <tr><td style="width:20%">State:</td><td  style="width:80%"><input type="text" name="loc_state" id="loc_state"/></td></tr>
                        <tr><td style="width:20%">Zip Code:</td><td  style="width:80%"><input type="text" name="loc_zipcode" id="loc_zipcode"/></td></tr>
                        <tr><td style="width:20%">Contact Person Details:</td><td  style="width:80%"></td></tr>
                        <tr><td style="width:20%">Name:</td><td  style="width:80%"><input type="text" name="poc_name" id="poc_name"/></td></tr>
                        <tr><td style="width:20%">Email:</td><td  style="width:80%"><input type="text" name="poc_email" id="poc_email"/></td></tr>
                        <tr><td style="width:20%">Mobile Number:</td><td  style="width:80%"><input type="text" name="poc_mobile" id="poc_mobile"/></td></tr>
                        <tr><td style="width:20%"></td><td  style="width:80%"><input type="submit" name="raise_submit" value="Submit"/></td></tr>                        
                        </table>
                </form>
            </div>
	</div>
</div>
<!--
</body>
</html>-->