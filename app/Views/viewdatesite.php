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
            <h4 class="page-title text-uppercase">List of all the donors from <?=$siteview[0]->donation_site_name;?> On 
                <?php if ($para == null): ?>
                    <?=str_replace("//","",$para1)?>
                <?php else: ?>
                    <?=str_replace("//","",$para)?>
                <?php endif ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="card col-md-12">
            <div class="card-body">
                <div class="table-responsive">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9"></div>
                        <?php if ($userdata['user_role'] == 'admin' || $userdata['user_role'] == 'donor_data_clerk'): ?>
                            <div class="col-md-3"><a href="<?=base_url()?>/adddonors/<?=$userdata['hospital_id']?>" class="btn btn-primary my-3 btn-rounded"><i class="fa fa-plus"></i> Add Donors</a></div>
                        <?php endif ?>
                    </div>
                </div>
                <table class="table table-stripped " id="dataTable">
                <thead>
                    <tr>
                        <th>NO#</th>
                        <th>Sampe_ID</th>
                        <th>Firstname</th>
                        <th>Middle_name</th>
                        <th>Lastname</th>
                        <th>HIV</th>
                        <th>HBV</th>
                        <th>HCV</th>
                        <th>Syphilis</th>
                        <th>Comment</th>
                        <th>Blood_Group</th>
                        <th class="noExport">Action</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>NO#</th>
                        <th>Sampe ID</th>
                        <th>Firstname</th>
                        <th>Middle name</th>
                        <th>Lastname</th>
                        <th>HIV</th>
                        <th>HBV</th>
                        <th>HCV</th>
                        <th>Syphilis</th>
                        <th>Comment</th>
                        <th>Blood Group</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                   <?php if ($sitedata == null ): ?>

                    
                        <?php if ($sitedata1 == null ): ?>
                        <!-- <tr>
                            <td>No data is available here</td>
                        </tr> -->
                        <?php else: ?>
                            <?php foreach ($sitedata1 as $row): ?>
                        <tr>
                            <td><?=$num = $num + 1?></td>
                            <td><?=$row->sample_id?></td>
                            <td><?=$row->donor_fname?></td>
                            <td><?=$row->donor_mname?></td>
                            <td><?=$row->donor_lname?></td>
                            <td><?=$row->hiv?></td>
                            <td><?=$row->hbv?></td>
                            <td><?=$row->hcv?></td>
                            <td><?=$row->syphilis?></td>
                            <td><?=$row->comment?></td>
                            <td><?=$row->blood_group?></td>
                            <td class="noExport row">
                                <button value="<?=$row->serial_number?>" class="btn btn-danger mx-2 py-1 px-2 my-1" onclick="getval(this.value)" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o "></i></button>

                                <button value="<?=$row->serial_number?>" onclick="getDonorDetails(this.value)" data-toggle="modal" data-target="#editDonorDetails" class="btn btn-success py-1 px-2 my-1"><i class="fa fa-edit"></i></button>
                            </td>
                        </tr>
                            <?php endforeach ?>
                       <?php endif ?>


                    <?php else: ?>
                        <?php foreach ($sitedata as $row): ?>
                    <tr>
                        <td><?=$num = $num + 1?></td>
                        <td><?=$row->sample_id?></td>
                        <td><?=$row->donor_fname?></td>
                        <td><?=$row->donor_mname?></td>
                        <td><?=$row->donor_lname?></td>
                        <td><?=$row->hiv?></td>
                        <td><?=$row->hbv?></td>
                        <td><?=$row->hcv?></td>
                        <td><?=$row->syphilis?></td>
                        <td><?=$row->comment?></td>
                        <td><?=$row->blood_group?></td>
                        <td class="noExport row">
                            <button value="<?=$row->serial_number?>" class="btn btn-danger mx-2 py-1 px-2 my-1" onclick="getval(this.value)" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o "></i></button>

                            <button value="<?=$row->serial_number?>" onclick="getDonorDetails(this.value)" data-toggle="modal" data-target="#editDonorDetails" class="btn btn-success py-1 px-2 my-1"><i class="fa fa-edit"></i></button>
                        </td>
                    </tr>
                        <?php endforeach ?>
                   <?php endif ?>
                </tbody>
            </table>
            </div>
            </div>
        </div>
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

