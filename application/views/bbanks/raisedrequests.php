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
<body>-->
<div class="row">
<div class="col-xs-12">
<style type="text/css">
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
<div>
<div style="text-align:right;"><a href="<?php echo base_url();?>bbank/raiserequest">New Request</a></div>
<?php if($data){?>
<table>
  <tr>
    <th>Blood Group</th>
    <th>Units</th>
    <th>Date & Time</th>
    <th>Hospital</th>
    <th>Location</th>
  </tr>
  <?php
  foreach($data as $row){
  ?>
  <tr>
    <td><?php echo $row->blood_group;?></td>
    <td><?php echo $row->no_of_units;?></td>
    <td><?php echo date("Y-m-d",  strtotime($row->required_date))." ".$row->required_time;?></td>
    <td><?php echo $row->hospital_name;?></td>
    <td><?php echo $row->loc_addressline1."<br/>".$row->loc_addressline2."<br/>".$row->loc_city."<br/>".$row->loc_state."<br/>";?>
    </td>
  </tr>
  <?php
  }?>           
</table>
<?php }else{ ?>
    <div style="text-align: center">No Records Found</div>
<?php } ?>
</div>
</div>
</div>
<!--</body>
</html>-->