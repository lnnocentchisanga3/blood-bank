<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">Home</a> / <a href="<?=base_url()?>/addsites/<?=$userdata['hospital_id']?>">Donation Sites</a> / Editing <?=$donor->donor_fname." ".$donor->donor_lname;?> | Sample ID : <?=$donor->sample_id?></h4>

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
            <div class="col-md-4"><a href="<?=base_url()?>/addsites/<?=$userdata['hospital_id']?>" class="btn btn-primary my-3 btn-rounded"><i class="fa fa-folder-open"></i> View Donation Sites</a></div>
          </div>
        </div>

        <!-- <div class="input-group">
          <label class="text-center col-md-12">Enter the number of Donors you want to add</label><br>
        <input type="number" name="num" id="numberOfDonors" class="form-control col-md-6 offset-md-3 ">
        <button class="btn btn-primary" onclick="createInputs()">Add Input</button>
       </div> -->

       <form action="<?=base_url()?>/Listdonors/edit_donor/<?=$donor->serial_number?>/<?=$userdata['hospital_id']?>" method="POST">
         <div class="input-group col-md-12 my-4 container">
          <div class="row">
            <label class="px-2 my-2 col-md-2">Date of Donation</label>
         <div class="col-md-10">
          <!-- <div class="cal-icon"> -->
          <input type="date" name="dod" class="form-control" value="<?=$donor->date_of_donation?>">
        <!-- </div> -->
        </div><br><br><br>
          <label class="px-2 my-2 col-md-2">Date of Next Donation</label>
          <div class="col-md-10">
          <!-- <div class="cal-icon"> -->
          <input type="date" name="donextd" class="form-control" value="<?=$donor->date_of_next_donation?>">
        <!-- </div> -->
        </div>
          <input type="text" name="province" value="<?=$userdata['province_id']?>" hidden>
          <input type="text" name="district" value="<?=$userdata['district_id']?>" hidden>

          <label class="px-2 my-2 col-md-2">Donation Site</label>
           <div class="col-md-10">
              <select name="site" class="form-control">
            <?php if ($donor == null || $donor == ''): ?>
              <option>0 Sites Found</option>
            <?php else: ?>
               <option value="<?=$donor->site_id?>"><?=$donor->donation_site_name?></option>
              <?php foreach ($sites as $row): ?>
               <?php if ($donor->donation_site_name == $row['donation_site_name']): ?>

                 <?php else: ?>
                   <option value="<?=$row['site_id']?>"><?=$row['donation_site_name']?></option>
               <?php endif ?>
              <?php endforeach ?>
            <?php endif ?>
          </select>  
           </div>

          </div>
         </div>
        
         <div class="input-group col-md-12 my-4 container">
          <div class="row">

        <label class="px-2 my-2 col-md-2">Sample_ID</label>
        <div class="col-md-10">
          <input type="text" class="form-control" placeholder="Sample ID" name="sampleid" value="<?=$donor->sample_id;?>" >
        </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Firstnames</label>
         <div class="col-md-10">
           <input type="text" class="form-control" placeholder="Donor Names" name="fnames" value="<?=$donor->donor_fname;?>">
         </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Middlenames</label>
        <div class="col-md-10">
          <input type="text" class="form-control" placeholder="Donor Names" name="mnames" value="<?=$donor->donor_mname;?>">
        </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Lastnames</label>
        <div class="col-md-10">
          <input type="text" class="form-control" placeholder="Donor Names" name="lnames" value="<?=$donor->donor_lname;?>">
        </div><br><br><br>

        <label class="px-2 my-2 col-md-2">HIV<small>(1,2,22,R)</small></label>
        <div class="col-md-10">
          <select class="form-control" name="hiv" >
              <option><?=$donor->hiv;?></option>
              <option>1</option>
              <option>2</option>
              <option>22</option>
              <option>R</option>
            </select>
        </div><br><br><br>


        <label class="px-2 my-2 col-md-2">HBV<small>(1,2,22,R)</small></label>
        <div class="col-md-10">
        <select class="form-control" name="hbv" >
              <option><?=$donor->hbv;?></option>
              <option>1</option>
              <option>2</option>
              <option>22</option>
              <option>R</option>
            </select>
          </div><br><br><br>

        <label class="px-2 my-2 col-md-2">HCV<small>(1,2,22,R)</small></label>
        <div class="col-md-10">
        <select class="form-control" name="hcv">
              <option><?=$donor->hcv;?></option>
              <option>1</option>
              <option>2</option>
              <option>22</option>
              <option>R</option>
            </select>
          </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Syphilis<small>(1,2,22,R)</small></label>
         <div class="col-md-10">
         <select class="form-control" name="syphilis">
              <option><?=$donor->syphilis;?></option>
              <option>1</option>
              <option>2</option>
              <option>22</option>
              <option>R</option>
            </select>
          </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Blood_Group</label>
         <div class="col-md-10">
         <select class="form-control" name="group">
              <option><?=$donor->blood_group;?></option>
              <option>A</option>
              <option>B</option>
              <option>O</option>
              <option>A+</option>
              <option>A-</option>
              <option>O+</option>
              <option>O-</option>
            </select>
          </div><br><br><br>

        <label class="px-2 my-2 col-md-2">Status_Comment</label>
        <div class="col-md-10">
          <input type="text" class="form-control" placeholder="Comment" name="comment" value="<?=$donor->comment;?>">
        </div><br><br><br>

        <div class="box-footer" >
        <input type="submit"  value="Save Changes" name="submit" class="btn btn-primary btn-rounded my-3">
        <!-- <a href="order.php" class="btn btn-warning">Kembali</a> -->
        </div>
      </div>
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

