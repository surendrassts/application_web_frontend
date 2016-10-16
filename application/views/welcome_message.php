<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
	</style>
</head>
<body>

<div id="container">
	<h1>Welcome to Doctor App</h1>

	<div id="body">
            <div style="width: 20%;float: left">Left
                <ul style="list-style: none">
                    <li><a href="doctor/appointments">Appointments</a></li>
                    <li><a href="medicines/index">Medicines</a></li>
                    
                </ul>
            </div>
            <div style="width: 60%;float: left">Middle
                <form name="g_search" id="g_search" method="post">
                    <select name="g_s_city">
                        <option value="">Select City</option>
                        <?php foreach ($cities as $city) {?>
                        <option value="<?php echo $city->id;?>"><?php echo $city->name;?></option>
                        <?php }?>
                        
                    </select><input type="text" name="g_s_key"/><input type="submit" name="g_s_submit" value="Submit"/>
                </form>
                <br/>
                <table>
                <?php
                if(!empty ($search_results_doctors)){
                foreach($search_results_doctors as $result){
                ?>
                <tr><td><div>
                    <div style="float:left;width: 20%"><img style="width:50px;height: 50px" src="<?php echo base_url();?>assets/images/user_img.png"/></div>
                    <div style="float:left;width: 80%"><?php echo $result->name?></div>
                    <div style="clear:both"></div></div>
                </td></tr>
                <?php
                }} ?>
                <?php
                if(!empty ($search_results)){
                foreach($search_results as $result){
                ?>
                <tr><td><div>
                    <div style="float:left;width: 20%"><img style="width:50px;height: 50px" src="<?php echo base_url();?>assets/images/hospital_img.png"/></div>
                    <div style="float:left;width: 80%">
                    <?php echo $result->name?><br/>
                    <?php echo $result->addressline1?><br/>
                    <?php echo $result->addressline2?><br/>
                    <?php echo $result->city_name?><br/>
                    </div>
                    <div style="clear:both"></div></div>
                    </td></tr>
                <?php
                }} ?>
                </table>
            </div>
            <div style="width: 20%;float: left">Right</div>
            <div style="clear:both"></div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>