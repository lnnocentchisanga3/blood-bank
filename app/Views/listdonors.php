<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">Home</a> / Donors </h4>


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
                        <a href="<?=base_url()?>/viewdonationsite/<?=$row['site_id']?>/<?=$row['hospital_id']?>" class="div-menu"><i class="fa fa-folder"></i> <span><small> <?=$row['donation_site_name']?></small></span></a>
                    </li>
                <?php endforeach ?>
              </li>

            </ul>
        </div>
    </div>
</div>



<div class="page-wrapper" style="margin-top: -100px;">
            <div class="content">
                <div class="row">

                    <div class="col-sm-12">
                        <h4 class="page-title text-uppercase">Donors form all the donation sites for all the Years</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php if (session()->getTempdata('Success')): ?>
                        <div class="alert alert-success">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                         <strong>Success!</strong> <?=session()->getTempdata('Success');?>
                        </div>
                      <?php endif ?>
                    </div>
                    <div class="col-md-12">
                        <div class="card-box">
                            
                            <div class="email-content">
                                <div class="table-responsive">
                                    
                                    <table class="table table-stripped " id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>NO#</th>
                                            <th>Donor_ID</th>
                                            <th>Firstname</th>
                                            <th>Middle_name</th>
                                            <th>Lastname</th>
                                            <th>Donation_Site</th>
                                            <th>Donation_Status</th>
                                            <th class="noExport">Action</th>
                                        </tr>
                                    </thead>

                                    <tfoot>
                                        <tr>
                                            <th>NO#</th>
                                            <th>Donor ID</th>
                                            <th>Firstname</th>
                                            <th>Middle name</th>
                                            <th>Lastname</th>
                                            <th>Donation_Site</th>
                                            <th>Donation_Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                       <?php if ($donors == null): ?>
                                        <!-- <tr>
                                            <td>No data is available here</td>
                                        </tr> -->
                                        <?php else: ?>
                                            <?php foreach ($donors as $row): ?>
                                        <tr>
                                            <td><?php $num=0; echo $num = $num + 1?></td>
                                            <td><?=$row->donor_id?></td>
                                            <td><?=$row->donor_fname?></td>
                                            <td><?=$row->donor_mname?></td>
                                            <td><?=$row->donor_lname?></td>
                                            <td><?=$row->donation_site_name?></td>
                                            <td>
                                            <?php if ($row->donation_status == "Can Donate"){ ?>
                                                <span class="bg-success text-white py-1 px-1">Can Donate <i class="fa fa-map-marker"></i></span>
                                           <?php }elseif($row->donation_status == ""){ ?>
                                               <span>Under Review....</span>
                                            <?php }else{ ?>
                                                <span class="bg-danger text-white py-1 px-1">Can Not Donate <i class="fa fa-close"></i></span>
                                           
                                            <?php }?>
                                        </td>
                                        <td class="noExport row">
                                            <a href="<?=base_url()?>/Listdonors/donor_print/<?=$row->donor_id?>#PrintedData" class="col-md-10 btn btn-primary mx-1 py-1 px-2 my-1" data-toggle="tooltip" data-placement="left" title="Donation History"><i class="fa fa-paste"></i>
                                            </a>

                                            <a href="<?=base_url()?>/Listdonors/donor_print/<?=$row->donor_id?>" target="_blank" class="col-md-10 btn btn-warning mx-1 py-1 px-2 my-1" data-toggle="tooltip" data-placement="left" title="Print Donor's Details"><i class="fa fa-print"></i>
                                            </a>

                                            <button value="<?=$row->serial_number?>" class="col-md-10 btn btn-danger mx-1 py-1 px-2 my-1" onclick="getvalDonor(this.value)" data-toggle="modal" data-target="#delete_Donor"><i class="fa fa-trash-o " data-toggle="tooltip" data-placement="left" title="Delete a Donor"></i></button>

                                            <button value="<?=$row->serial_number?>" onclick="getDonorDetails(this.value)" data-toggle="modal" data-target="#editDonorDetails" class="col-md-10 btn btn-success py-1 px-2 my-1"><i class="fa fa-edit" data-toggle="tooltip" data-placement="left" title="View Or Edit Donor Details"></i> / <i class="fa fa-eye" data-toggle="tooltip" data-placement="left" title="View Or Edit Donor Details"></i></button>
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
        </div>

</div>
</div>

<!-- <div id="delete_employee" class="modal fade delete-modal" role="dialog">
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
            function getvalDonor(uid) {
                document.getElementById('addAttri').setAttribute("href", "<?=base_url()?>/delete_donor/"+uid+"/<?=$userdata['hospital_id']?>");
            }
        </script> -->


<?=$this->endSection('content')?>

