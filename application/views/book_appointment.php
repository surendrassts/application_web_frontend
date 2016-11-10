<script type="text/javascript">
    $("#check-availability-next").bind("click",function(){
        alert("dsfdsfds");
        var data = {"user_id":$("#data_user_id").attr("data-user-id"),"appointment_check_date":$(this).html()};
        web.doctors.checkavailability(data);
    });
    $("#check-availability-previous").bind("click",function(){
        alert("gfggg");
        alert($(this).html());
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
                    "slot_start":$(this).html(),
                    "patient_name":$("#patient-name").val(),
                    "mobile_number":$("#mobile-number").val(),
                    "email":$("#email").val(),
                    "problem":$("#problem").val()
                   };
        web.doctors.bookAppointment(data);
    });
</script>
<div id="container">
	<h3>Welcome to Doctor App</h3>
        <div id="body">        
	   <?php if(empty($status)){
               echo "Appointment booked Successfully.";
           }else{
               echo "Error Occured.";
           } ?>
	</div>        
	<p class="footer"></p>
</div>