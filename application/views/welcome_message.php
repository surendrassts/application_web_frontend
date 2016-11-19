<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style type="text/css">
#bpopup_div {
	background-color: #fff;
	color:#000;
	text-align: center;
}
.appointment-details{
    display: none;
}
</style>
<script type='text/javascript' src="<?php echo $this->config->item('assets_base_url');?>js/common.js"></script>
<div class="row">
<div class="col-xs-12">
	<h1 class="mb-sm">FIND DOCTOR AND BOOK APPOINTMENT</h1>
	<p>Tell us your problem and we will figure out the rest</p>
	<form class="form main-search" name="g_search" id="g_search" method="post" role="form">
		<div class="input-group">
			<div class="input-group-btn search-panel">
				<button type="button" class="btn dropdown-toggle search-part" data-toggle="dropdown" name="g_s_city">
					<span id="search_concept">Location</span> <span class="caret"></span>
				</button>
				<ul class="dropdown-menu" role="menu">
				<?php foreach ($cities as $city) {?>
				<li><a href="<?php echo $city->id;?>"><?php echo $city->name;?></a></li>
				<?php }?>
				</ul>
			</div>
			<input type="hidden" name="search_param" value="all" id="search_param">
			<input type="text" class="form-control search-part" name="g_s_key" placeholder="Search Doctor and speciality and hospital">
			<span class="input-group-btn button-main-search">
				<button class="btn search-part" name="g_s_submit" type="submit"><span class="fa fa-search"></span></button>
			</span>
		</div>
	</form>
<script src="https://code.jquery.com/jquery-1.9.1.js" integrity="sha256-e9gNBsAcA0DBuRWbm0oZfbiCyhjLrI6bmqAl5o+ZjUA=" crossorigin="anonymous"></script>
<?php
if(!empty ($search_results_doctors)){
foreach($search_results_doctors as $result){
?>
<div class="details-container">
<div class="result-panel">
		<div class="row">
			<div class="col-sm-4">
			   <div class="photo-container">
					<a href="#" class="">
						<img src="<?php echo $this->config->item('assets_base_url');?>images/doctor_img.png" class="img-responsive" alt="Astra Healthcare">
					</a>
				</div>
			</div>
			<div class="col-sm-4">

				<div class="details-block">
					<a href="#">
						<h2><?php echo $result->name;?></h2>
					</a>
					<div class="qlfs">
						<a href="#">
						<?php echo $result->specialization;?>
						</a>
					</div>
					<p class="clinic-photos">
						<img src="<?php echo $this->config->item('assets_base_url');?>images/thumbnail-1.jpg">
						<img src="<?php echo $this->config->item('assets_base_url');?>images/thumbnail-2.jpg">
						<img src="<?php echo $this->config->item('assets_base_url');?>images/thumbnail-3.jpg">
						<img src="<?php echo $this->config->item('assets_base_url');?>images/thumbnail-4.jpg">
					</p>
					<ul class="clinic-services list-unstyled">
						<li>Pharmacy</li>
						<li>Clinics</li>
						<li>Diagnostics</li>
						<li>View all 4 services </li>
					 </ul>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="availability-block">
					<ul class="list-unstyled">
						<li>
							<i class="fa fa-comment"></i> 1000 feedback for 50 doctors
						</li>
						 <li>
							<i class="fa fa-map-marker"></i><?php echo $result->user_add_line1." ".$result->user_add_line2." ".$result->user_city." ".$result->user_state;?>
						</li>
						 <li>
							<i class="fa fa-money"></i> INR 500
						</li>
						 <li>
							<i class="fa fa-clock-o"></i> MON-SUN,6:00AM-11:00PM
						</li>
					</ul>
				</div>
				<div class="availability-bottom">
					<a class="clearfix" href="#">show more</a>
					<button class="btn show-Contact clearfix" id="check-availability<?php echo $result->user_id; ?>">Book Appointment</button>
				</div>
                <script type="text/javascript">
                    $("#check-availability<?php echo $result->user_id; ?>").bind("click",function(){
                        var data = {"user_id":<?php echo $result->user_id; ?>};
                        web.doctors.checkavailability(data);
                    });
                </script>
			</div>
		</div>
	</div>
</div>
<?php
}} ?>
<?php
if(!empty ($search_results)){
foreach($search_results as $result){
?>
<div class="details-container">
<div class="result-panel">
		<div class="row">
			<div class="col-sm-4">
			   <div class="photo-container">
					<a href="#" class="">
						<img src="<?php echo $this->config->item('assets_base_url');?>images/hospital-1.jpg" class="img-responsive" alt="Astra Healthcare">
					</a>
				</div>
			</div>
			<div class="col-sm-4">

				<div class="details-block">
					<a href="#">
						<h2>Astra Healthcare Hospitals</h2>
					</a>
					<div class="qlfs">
						<a href="#">
								3 General Physician & 2 Specilists
						</a>
					</div>

					<p class="clinic-photos">

						<img src="<?php echo $this->config->item('assets_base_url');?>images/thumbnail-1.jpg">
						<img src="<?php echo $this->config->item('assets_base_url');?>images/thumbnail-2.jpg">
						<img src="<?php echo $this->config->item('assets_base_url');?>images/thumbnail-3.jpg">
						<img src="<?php echo $this->config->item('assets_base_url');?>images/thumbnail-4.jpg">
					</p>
					<ul class="clinic-services list-unstyled">
						<li>Pharmacy</li>
						<li>Clinics</li>
						<li>Diagnostics</li>
						<li>View all 4 services </li>
					 </ul>
				</div>
			</div>
			<div class="col-sm-4">
				<div class="availability-block">
					<ul class="list-unstyled">
						<li>
							<i class="fa fa-comment"></i> 1000 feedback for 50 doctors
						</li>
						 <li>
							<i class="fa fa-map-marker"></i><?php echo $result->name." ".$result->addressline1." ".$result->addressline2." ".$result->city_name;?>
						</li>
						 <li>
							<i class="fa fa-money"></i> INR 500
						</li>
						 <li>
							<i class="fa fa-clock-o"></i> MON-SUN,6:00AM-11:00PM
						</li>
					</ul>
				</div>
				<div class="availability-bottom">
					<a class="clearfix" href="#">show more</a>
					<button class="btn show-Contact clearfix">Book Appointment</button>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
}} ?>
</div>
</div>
<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
        <script type='text/javascript' src="<?php echo $this->config->item('assets_base_url');?>js/common.js"></script>
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
        #bpopup_div {
            background-color: #fff;
            color:#000;
            text-align: center;
            width: 600px;
        }
	</style>
<script src="https://code.jquery.com/jquery-1.9.1.js" integrity="sha256-e9gNBsAcA0DBuRWbm0oZfbiCyhjLrI6bmqAl5o+ZjUA=" crossorigin="anonymous"></script>
</head>
<body>

<div id="container">
    <div><h1>Welcome to Doctor App module</h1>
        <div style="text-align:right;">
        <?php if(isset ($_SESSION['user'])){?>Welcome <?php echo $_SESSION['user']->user_email;?> | <a href="<?php echo base_url();?>user/logout">Logout</a><?php }  else {?>
        <a href="<?php echo base_url();?>user/login">Login</a>
        <?php }?>
        </div>
    </div>
<div id="body">
            <div style="width: 20%;float: left">Left
                <ul style="list-style: none">
                    <li><a href="<?php echo base_url();?>">Home</a></li>
                    <?php if(isset ($_SESSION['user'])){?>
                    <li><a href="<?php echo base_url();?>bbank/raisedrequests">Blood Requests</a>
                        <ul>
                            <li><a href="<?php echo base_url();?>bbank/raiserequest">Raise Request</a></li>
                        </ul>
                    </li>
                    <li><a href="<?php echo base_url();?>doctor/appointments">Appointments</a></li>
                    <li><a href="<?php echo base_url();?>doctor/bookings">Bookings</a></li>
                    <?php }?>
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
                    <div style="float:left;width: 20%"><img style="width:50px;height: 50px" src="<?php echo $this->config->item('assets_base_url');?>images/user_img.png"/></div>
                    <div style="float:left;width: 80%">
                    <?php echo $result->name;?>
                    <?php echo $result->user_add_line1;?><br/>
                    <?php echo $result->user_add_line2;?><br/>
                    <?php echo $result->user_city;?><br/>
                    <?php echo $result->user_state;?><br/>
                    <a class="check-availability" id="check-availability<?php echo $result->user_id; ?>">Book Appointment</a>
                    </div>
                <script type="text/javascript">
                    $("#check-availability<?php echo $result->user_id; ?>").bind("click",function(){
                        var data = {"user_id":<?php echo $result->user_id; ?>};
                        web.doctors.checkavailability(data);
                    });
                </script>
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
                    <?php echo $result->name;?>
                    <?php echo $result->addressline1;?><br/>
                    <?php echo $result->addressline2;?><br/>
                    <?php echo $result->city_name;?><br/>
                    </div>
                    <div style="clear:both"></div></div>
                    </td></tr>
                <?php
                }} ?>
                </table>
            </div>
            <div style="width: 20%;float: left">Right</div>
            <div style="clear:both"></div>
            <div id="bpopup_div" style="display:none"></div>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>-->