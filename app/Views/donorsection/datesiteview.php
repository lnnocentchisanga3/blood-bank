<?= $this->extend('donorsection/layouts/base'); ?>
<?=$this->section('content');?>

<div class="page-wrapper">
<div class="content">
<?php if ($sitedata == null || $sitedata == ''): ?>
    <div class="col-md-12 text-center my-5">
        <i class="fa fa-map-marker fa-3x"></i>
        <h4>- No Donors Were Found On this Donation Site </h4>
        <a href="<?=base_url()?>/donorsectionsitedonors/<?=$sitedata[0]->site_id?>/<?=$userdata['hospital_id']?>" class="btn btn-primary submit-btn"><i class="fa fa-arrow-left"></i> Back to Site</a></div>
<?php else: ?>
    <div class="row">
<div class="col-sm-12">
    
    <h4 class="page-title">Home / List of all donation sites / <?=$sitedata[0]->donation_site_name;?> / <i class="fa fa-folder-open"></i> <?=$date?></h4>

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
            <div class="col-md-4"><a href="<?=base_url()?>/donorsectionsitedonors/<?=$sitedata[0]->site_id?>/<?=$userdata['hospital_id']?>" class="btn btn-primary float-right submit-btn"><i class="fa fa-arrow-left"></i> back to Site</a></div>
          </div>
        </div>

    <div class="row">
        <?php if ($sitedata == null): ?>
    <tr>
      <td>No data is available here</td>
    </tr>
    <?php else: ?>
      <table class="table table-stripped " id="dataTable">
                <thead>
                    <tr>
                      <th>Serial_NO#</th>
                        <th>Sample_ID</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>HIV</th>
                        <th>HBV</th>
                        <th>HCV</th>
                        <th>Syphilis</th>
                        <th>Blood_Group</th>
                        <th>Comment</th>
                        <!-- <th class="noExport">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                   <?php if ($sitedata == null): ?>
                    <tr>
                      <td>No data is available here</td>
                    </tr>
                    <?php else: ?>
                      <?php foreach ($sitedata as $row): ?>
                    <tr>
                        <td><?=$num = $num +1?></td>
                        <td><?=$row->sample_id?></td>
                        <td><?=$row->donor_fname?></td>
                        <td><?=$row->donor_mname?></td>
                        <td><?=$row->donor_lname?></td>
                        <td><?=$row->hiv?></td>
                        <td><?=$row->hbv?></td>
                        <td><?=$row->hcv?></td>
                        <td><?=$row->syphilis?></td>
                        <td><?=$row->blood_group?></td>
                        <td><?=$row->comment?></td>
                        <!-- <td class="noExport">
                            <button value="<?=$row->serial_number?>" class="btn btn-danger py-1 px-2 my-1" onclick="getval(this.value)" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o "></i></button>

                            <a href="<?=base_url()?>/edit_donor_data/<?=$row->serial_number?>/<?=$row->hospital_id?>" class="badge badge-success py-2 px-2 my-2"><i class="fa fa-edit"></i></a>
                        </td> -->
                    </tr>
                      <?php endforeach ?>
                   <?php endif ?>
                </tbody>
            </table>
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

