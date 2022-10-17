<?= $this->extend('donorsection/layouts/base'); ?>
<?=$this->section('content');?>

<div class="page-wrapper">
<div class="content">
<?php if ($sitedata == null || $sitedata == ''): ?>
    <div class="col-md-12 text-center my-5">
        <i class="fa fa-map-marker fa-3x"></i>
        <h4>- No Donors Were Found On this Donation Site </h4>
        <a href="<?=base_url()?>/donorsectiondonationsites/<?=$userdata['hospital_id']?>" class="btn btn-primary submit-btn"><i class="fa fa-arrow-left"></i> Back to donation sites</a></div>
<?php else: ?>
    <div class="row">
<div class="col-sm-12">
    
    <h4 class="page-title">Home / List of all donation sites / <?=$sitedata[0]->donation_site_name;?></h4>

    <?php if (session()->getTempdata('Success')): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>Success!</strong> <?=session()->getTempdata('Success');?>
    </div>
  <?php endif ?>

</div>
</div>
<div class="row">
<div class="col-sm-12">
    <div class="card-box">
        <div class="card-block">
            <!-- <h6 class="card-title text-bold">Default Datatable</h6>
            <p class="content-group">
                This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.
            </p> -->
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4"><a href="<?=base_url()?>/donorsectiondonationsites/<?=$userdata['hospital_id']?>" class="btn btn-primary float-right submit-btn"><i class="fa fa-arrow-left"></i> back to donation sites</a></div>
          </div>
        </div>

    <div class="row">
        <?php if ($sitedata == null): ?>
    <tr>
      <td>No data is available here</td>
    </tr>
    <?php else: ?>
      <?php foreach ($sitedata as $row): ?>

        <?php
        $date = $row->date_of_donation;
        ?>

        <div class="col-md-4 col-sm-4  col-lg-3">
        <div class="border">
            <div class="profile-widget">
            <!-- <div class="doctor-img">
               <i class="fa fa-map-marker fa-4x"></i>
            </div> -->
            <!-- <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                </div>
            </div> -->
            <h4 class="doctor-name text-ellipsis"><a href="<?=base_url()?>/donorsectionsitedonors/<?=$row->site_id?>/<?=$sitedata[0]->date_of_donation?>"><i class="fa fa-map-marker"></i> <?=$sitedata[0]->donation_site_name?></a></h4>

            <div class="doc-prof"><h4>Donation Date</h4></div>
            <div class="user-country">
                <i class="fa fa-calendar"></i> <?=$row->date_of_donation?>
            </div>
            <div class="col-md-12">
                <a href="<?=base_url()?>/DonorSection/datesitedonors/<?=$row->site_id?>/<?=$date?>" class="btn btn-primary submit-btn my-3"><i class="fa fa-folder"></i> Open</a>
            </div>
        </div>
        </div>
    </div>

      <?php endforeach ?>
   <?php endif ?>
 </div>

        </div>
    </div>
</div>
</div>
<?php endif ?>
</div>
</div>

<div id="delete_employee" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="<?=base_url()?>/public/assets/img/sent.png">
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
                document.getElementById('addAttri').setAttribute("href", "<?=base_url()?>/delete_donor_data/"+uid+"/<?=$userdata['hospital_id']?>");
            }
        </script>


<?=$this->endSection('content')?>

