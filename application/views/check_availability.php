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
        .appointment-details{
            display: none;
        }
	</style>
</head>
<body>
<script type="text/javascript">
    $("#check-availability-next").bind("click",function(){
        var data = {"user_id":$("#data_user_id").attr("data-user-id"),"appointment_check_date":$(this).html()};
        web.doctors.checkavailability(data);
    });
    $("#check-availability-previous").bind("click",function(){
        var data = {"user_id":$("#data_user_id").attr("data-user-id"),"appointment_check_date":$(this).html()};
        web.doctors.checkavailability(data);
    });
    $(".time-slot").bind("click",function(){
        var data = {"user_id":$("#data_user_id").attr("data-user-id"),
                    "appointment_check_date":$("#appointment_check_date").html(),
                    "h_entity_id":$("#data_hospital_entity_id").attr("data-hospital-entity-id"),
                    "h_entity_branch_id":$("#data_hospital_entity_branch_id").attr("data-hospital-entity-branch-id"),
                    "slot_start":$(this).html()
                   };
        $(".date-time").html($("#appointment_check_date").html()+" "+$(this).html());
        $("#data_slot_start").attr("data-slot-start",$(this).html());
        $(".entity-location-details").html($(".entity-location-details-div").html());
        $(".entity-details").html($(".entity-name").html());
        $(".doctor-name").html();
        $(".appointment-details").show();
        //web.doctors.checkavailability(data);
    });
    $("#book-appointment").bind("click",function(){
        var data = {"user_id":$("#data_user_id").attr("data-user-id"),
                    "appointment_check_date":$("#appointment_check_date").html(),
                    "h_entity_id":$("#data_hospital_entity_id").attr("data-hospital-entity-id"),
                    "h_entity_branch_id":$("#data_hospital_entity_branch_id").attr("data-hospital-entity-branch-id"),
                    "slot_start":$("#data_slot_start").attr("data-slot-start"),
                    "patient_name":$("#patient-name").val(),
                    "mobile_number":$("#mobile-number").val(),
                    "email":$("#email").val(),
                    "problem":$("#problem").val()
                   };
        web.doctors.bookAppointment(data);
    });
</script>
<div id="container">
	<h1>Welcome to Doctor App</h1>
	<div id="body">
            <a id="check-availability-previous"><?php echo $results['dates_data']['appointment_check_previous_date']; ?></a> | 
            <span id="appointment_check_date"><?php echo $results['dates_data']['appointment_check_date']; ?></span> |
            <a id="check-availability-next"><?php echo $results['dates_data']['appointment_check_next_date']; ?></a>
	</div>
	<div id="body">
           <div>
           <?php if(!empty ($results['entity_details']['0'])){ ?>
           <div class="entity-name"><?php echo $results['entity_details']['0']['name'];?></div>
           <div class="entity-location-details-div"><?php echo $results['entity_details']['0']['addressline1'].', '.$results['entity_details']['0']['addressline2'];?></div>
           <?php }?>
           </div>
           <div>           
           <?php           
           foreach ($results['slots'] as $slot){
           ?>
           <a <?php if($slot['status']){ ?>href="#" class="time-slot" <?php }?> data-slot-time="<?php echo $slot['slot_start'];?>"><?php echo $slot['slot_start']?></a>
           <?php
           }
           ?>
           </div>
           <div id="slot-details" class="appointment-details">
               Date and Time:<div class="date-time"></div>
               Location:<div class="entity-location-details"></div>
               Hospital:<div class="entity-details"></div>
               Doctor Name:<div class="doctor-name"></div>
           </div>
           <div id="slot-for-details" class="appointment-details">
               Patient Name:<div class="patient-name"><input type="text" name="patient-name" id="patient-name"/></div>
               Mobile:<div class="mobile-number"><input type="text" name="mobile-number" id="mobile-number"/></div>
               Email:<div class="email-details"><input type="text" name="email" id="email"/></div>
               Problem?:<div class="problem-details"><textarea name="problem" id="problem"></textarea></div>               
           </div>
           <div id="slot-booking" class="appointment-details">
               <div class="patient-name"><input type="button" id="book-appointment" name="book-appointment" value="Book Appointment"/></div>               
           </div>
        <input type="hidden" id="data_user_id" data-user-id="<?php echo $results['user_data']['user_id']; ?>"/>
        <?php if(!empty ($results['entity_details']['0'])){ ?>
        <input type="hidden" id="data_hospital_entity_id" data-hospital-entity-id="<?php echo $results['entity_details'][0]['h_entity_id']; ?>"/>
        <input type="hidden" id="data_hospital_entity_branch_id" data-hospital-entity-branch-id="<?php echo $results['entity_details'][0]['h_entity_branch_id']; ?>"/>
        <?php } ?>
        <input type="hidden" id="data_slot_start" data-slot-start=""/>
	</div>        
	<p class="footer"></p>
</div>
</body>
</html>