<?= $this->extend('donorsection/layouts/base'); ?>
<?=$this->section('content');?>

<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title">Home / List of all donation sites</h4>

    <?php if (session()->getTempdata('Success')): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>Success!</strong> <?=session()->getTempdata('Success');?>
    </div>
  <?php endif ?>

</div>
</div>
<div class="row">

    <?php if ($sites == null): ?>
    <div class="col-md-12 my-5 text-center">
        <i class="fa fa-map-marker fa-2x"></i>
        <h4>-No Donation Sites Found</h4>
    </div>
    <?php else: ?>
        <?php foreach ($sites as $row): ?>
            <div class="col-md-4 col-sm-4  col-lg-3">
        <a href="<?=base_url()?>/donorsectionsitedonors/<?=$row['site_id']?>/<?=$userdata['hospital_id']?>">
            <div class="profile-widget sites">
            <div class="doctor-img">
               <i class="fa fa-map-marker fa-4x marker"></i>
            </div>
            <!-- <div class="dropdown profile-action">
                <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
                </div>
            </div> -->
            <h4 class="doctor-name text-ellipsis"><a href="<?=base_url()?>/donorsectionsitedonors/<?=$row['site_id']?>/<?=$userdata['hospital_id']?>"><?=$row['donation_site_name']?></a></h4>
            <!-- <div class="doc-prof">Neurologist</div>
            <div class="user-country">
                <i class="fa fa-map-marker"></i> United States, San Francisco
            </div> -->
             <div class="col-md-12">
                <a href="<?=base_url()?>/donorsectionsitedonors/<?=$row['site_id']?>/<?=$userdata['hospital_id']?>" class="btn btn-primary submit-btn my-3"><i class="fa fa-folder-open"></i> Open</a>
            </div>
        </div>
        </a>
    </div>
        <?php endforeach ?>
   <?php endif ?>

</div>
</div>
</div>


<?=$this->endSection('content')?>

