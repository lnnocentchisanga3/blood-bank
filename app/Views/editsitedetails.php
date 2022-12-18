<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">Home</a> / <a href="<?=base_url()?>/addsites/<?=$userdata['hospital_id']?>">Donation Sites</a> / Editing <strong><?=$site[0]->donation_site_name?></strong></h4>

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

      <div class="table-responsive">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-4"><a href="<?=base_url()?>/addsites/<?=$userdata['hospital_id']?>" class="btn btn-primary my-3"><i class="fa fa-folder-open"></i> View Donation Sites</a></div>
          </div>
        </div>

        <!-- <div class="input-group">
          <label class="text-center col-md-12">Enter the number of Donors you want to add</label><br>
        <input type="number" name="num" id="numberOfDonors" class="form-control col-md-6 offset-md-3 ">
        <button class="btn btn-primary" onclick="createInputs()">Add Input</button>
       </div> -->

       <form action="<?=base_url()?>/donationsites/editSite/<?=$site[0]->site_id;?>/<?=$userdata['hospital_id']?>" method="POST">
        <label>Donation Site Name</label>
        <input type="text" class="form-control" name="site" value="<?=$site[0]->donation_site_name?>" >
        <div class="box-footer" >
        <input type="submit"  value="Save Changes" name="submit" class="btn btn-primary my-3">
        </div>
        <?=form_close()?>
       
      </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<?=$this->endSection('content')?>

