<!DOCTYPE html>
<html lang="en">


<!-- add-donor24:07-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>/public/assets/img/logo-dark1.jpg">
    <title><?=esc($title);?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/style.css">
    <script src="<?= base_url();?>/public/assets/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "85%" 
        }
    </script>

    <!--[if lt IE 9]>
        <script src="<?= base_url();?>/public/assets/js/html5shiv.min.js"></script>
        <script src="<?= base_url();?>/public/assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container bg-white mt-5">
        <div class="row">
        	<div class="col-md-12 text-center">
        		<h3 class="my-4 text-uppercase">Entering The Details of The Blood Donor</h3>
        	</div>
        	<div class="col-lg-12 my-4">
        		<?php
        		if ($userdata['user_role'] == 'admin') {
        			?>
        		<a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">
        			<button class="btn btn-primary submit-btn">Go To Home</button>
        		</a>
        			<?php

        		} elseif ($userdata['user_role'] == 'donor_data_clerk') {
        			?>
        		<a href="<?=base_url()?>/donordataclerk/<?=$userdata['hospital_id']?>">
        			<button class="btn btn-primary submit-btn">Go To Home</button>
        		</a>
        			<?php
        		}else{
        			?>
        		<a href="<?=base_url()?>/donorsection/<?=$userdata['hospital_id']?>">
        			<button class="btn btn-primary submit-btn">Go To Home</button>
        		</a>
        			<?php
        		}
        		
        		?>
        	</div>
            <!-- <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Add A Donor</h4>
            </div> -->
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-5">
                <form>
                    <div class="row">
                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>Unit Number</label>
                        	<input type="text" class="form-control" placeholder="Unit Number" name="sampleid" <?=set_value('sampleid[]')?> >
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>Firstname</label>
                        	<input type="text" class="form-control" placeholder="Firstname" name="fnames" <?=set_value('')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>MiddleName</label>
                        	<input type="text" class="form-control" placeholder="Middle name" name="mnames" <?=set_value('')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>LastName</label>
                        	<input type="text" class="form-control" placeholder="Lastname" name="lnames" <?=set_value('')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>Date Of Birth</label>
                        	<input type="date" class="form-control" name="dob" <?=set_value('')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>Gender</label>
                        	<select class="form-control" name="gender" <?=set_value('gender')?>>
                        		<option>Male</option>
                        		<option>Female</option>
                        	</select>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>Occupation</label>
                        	<select class="form-control" name="occupation" <?=set_value('occupation')?>>
                        		<option>Farmer</option>
                        		<option>Civil Servant</option>
                        		<option>Self Employed</option>
                        		<option>Student</option>
                        		<option>Pupil</option>
                        	</select>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>Date Of Last Donation</label>
                        	<input type="date" class="form-control" name="dold" <?=set_value('')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>Site Of Donation</label>
                        	<?php if ($sites == null): ?>
                                    <li><a href="#!"><i class="fa fa-map"></i> -No Donation Sites Found</a></li>
	                        <?php else: ?>
	                        <select class="form-control" name="sod" <?=set_value('occupation')?>>
	                        	<option value="0" >None</option>
                        		<?php foreach ($sites as $row): ?>
	                               <option value="<?=$row['site_id']?>"><?=$row['donation_site_name']?></option>
	                            <?php endforeach ?>
                        	</select>
	                       <?php endif ?>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>Residential Address</label>
                        	<input type="text" class="form-control" placeholder="Residential Address" name="postaladdress" <?=set_value('')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>Email</label>
                        	<input type="email" class="form-control" placeholder="Email" name="email" <?=set_value('')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>Phone Number</label>
                        	<input type="text" class="form-control" placeholder="Phone Number" name="phone" <?=set_value('')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>Blood Group</label>
                        	<select class="form-control" name="group">
                        		<option>0</option>
                        		<option>A+</option>
                                <option>A-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                        		<option>B+</option>
                                <option>B-</option>
                        		<option>O+</option>
                                <option>O-</option>
                        	</select>
                        </div>
                        </div>

                        <div class="col-sm-6">
                        	<div class="form-group">
                        	<label>Number Of Donation</label>
                        	<select class="form-control" name="group">
                        		<option>0</option>
                        		<option>1</option>
                        		<option>2</option>
                        		<option>3</option>
                        		<option>4</option>
                        		<option>5</option>
                        		<option>6</option>
                        		<option>7</option>
                        		<option>8</option>
                        		<option>9</option>
                        		<option>10</option>
                        		<option>11</option>
                        		<option>12</option>
                        		<option>13</option>
                        		<option>14</option>
                        		<option>15</option>
                        	</select>
                        </div>
                        </div>

                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Save Details</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/app.js"></script>
	<script src="assets/js/moment.min.js"></script>
	<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
	
</body>


<!-- add-employee24:07-->
</html>
