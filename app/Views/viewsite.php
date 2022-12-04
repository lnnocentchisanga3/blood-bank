<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">

    <div class="row">
<div class="col-sm-12">
    

    <?php if (session()->getTempdata('Success')): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>Success!</strong> <?=session()->getTempdata('Success');?>
    </div>
  <?php endif ?>

</div>
</div>
<!-- <div class="row">
<div class="col-sm-12">
    <div class="card-box">
        <div class="card-block">
            

      
        </div>
    </div>
</div>
</div> -->

<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>"><i class="fa fa-home back-icon"></i> <span>Back to Home</span></a>
                </li>
                <li class="menu-title"><a href=" " data-toggle="modal" data-target="#addADonationSite" class="btn btn-primary btn-block btn-rounded ">+ Add a Donation Site</a></li>

                <li class="py-2 mx-2"><small>Select one of the Donation Sites</small></li>
                
                <?php foreach ($sites as $row): ?>
                    <li class="border-bottom">
                        <a href="<?=base_url()?>/viewdonationsite/<?=$row['site_id']?>/<?=$row['hospital_id']?>" class="div-menu" ><i class="fa fa-folder"></i> <span><small> <?=$row['donation_site_name']?></small></span></a>
                    </li>
                <?php endforeach ?>

            </ul>
        </div>
    </div>
</div>


<?php if ($siteview == null || $siteview == ''): ?>
<h4 class="col-md-12 text-center my-5">
    <img src="<?=base_url()?>/public/assets/img/sent.png"><br><br>
There are no Donation dates found from this Donation Site </h4>
<?php else: ?>

<div class="page-wrapper" style="margin-top: -100px;">
<div class="content">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="page-title text-uppercase">List of all the donation Dates from <?=$siteview[0]->donation_site_name;?></h4>
        </div>
    </div>
    <div class="row">
    <?php foreach ($siteview as $row): ?>
        <div class="col-md-4 col-sm-4  col-lg-3">
        <div class="profile-widget">
            <h4 class="doctor-name text-ellipsis">
        <i class="fa fa-calendar col-md-12"></i></h4>
            <div class="user-country">
                <h5>Date of Donation</h5>
           <?=$row->date_of_donation?><br>
           <a href="<?=base_url()?>/Donationsites/viewsitedate/<?=$row->site_id?>/<?=$row->date_of_donation;?>" class="badge badge-primary p-2"><i class="fa fa-folder-open"></i> Open</a>   
            </div>
        </div>
    </div>
    <?php endforeach ?>
    </div>
</div>
</div>
<?php endif ?>

<div id="delete_employee" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <i class="fa fa-trash-o fa-5x text-danger"></i>
                        <h3>Are you sure want to delete this Donor Record?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <a id="addAttri" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function getval(uid) {
                document.getElementById('addAttri').setAttribute("href", "<?=base_url()?>/delete_donor/"+uid+"/<?=$userdata['hospital_id']?>");
            }
        </script>


<?=$this->endSection('content')?>

