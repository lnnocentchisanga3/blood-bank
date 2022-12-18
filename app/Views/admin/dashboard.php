<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>
<div class="page-wrapper-base-3">
            <div class="content container">
                <div class="row">
                    <h3 class="col-md-11 my-4 mx-4 text-uppercase text-dark"><strong><?=$hospital[0]['hospital_name']?></strong></h3>

                    <?php
                    if ($userdata['user_role'] == 'admin') {
                        ?>
                   <a href="<?=base_url()?>/users/<?=$userdata['hospital_id']?>" class="nav-link col-md-4">
                        <div class="dash-widget new-menu">
                           <div class="container-fluid py-3">
                               <div class="row">
                                    <div class="col-md-12">
                                        <img src="<?=base_url()?>/public/assets/img/users3.png" height="80px" class="mx-auto d-block">
                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="col-md-12 text-center py-2">Manage Staff Members<h4>
                                    </div>
                               </div>
                           </div>
                        </div>
                    </a>
                        <?php

                    }?>

                    <a href="<?=base_url()?>/addsites/<?=$userdata['hospital_id']?>" class="nav-link col-md-4">
                        <div class="dash-widget new-menu">
                            <div class="container-fluid py-3">
                               <div class="row">
                                    <div class="col-md-12">
                                        <img src="<?=base_url()?>/public/assets/img/pin.png" height="80px" class="mx-auto d-block">
                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="col-md-12 text-center py-2">Donation Sites<h4>
                                    </div>
                               </div>
                           </div>
                        </div>
                    </a>


                    <a href="<?=base_url()?>/listdonors/<?=$userdata['hospital_id']?>" class="nav-link col-md-4">
                        <div class="dash-widget new-menu">
                            <div class="container-fluid py-3">
                               <div class="row">
                                    <div class="col-md-12">
                                        <img src="<?=base_url()?>/public/assets/img/users1.png" height="80px" class="mx-auto d-block">
                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="col-md-12 text-center py-2">Donors<h4>
                                    </div>
                               </div>
                           </div>
                        </div>
                    </a>

                    <a href=" " data-toggle="modal" data-target="#LookForBlood" class="nav-link col-md-4">
                        <div class="dash-widget new-menu">
                            <div class="container-fluid py-3">
                               <div class="row">
                                    <div class="col-md-12">
                                        <img src="<?=base_url()?>/public/assets/img/database.png" height="80px" class="mx-auto d-block">
                                    </div>
                                    <div class="col-md-12">
                                        <h4 class="col-md-12 text-center py-2">Search Local database<h4>
                                    </div>
                               </div>
                           </div>
                        </div>
                    </a>

                    <!-- <a href=" " data-toggle="modal" data-target="#LookForBloodDonorInAllDb" class="nav-link col-md-4">
                        <div class="dash-widget new-menu">
                            <div class="contain py-3er-fluid">
                                <div class="row">
                            <div class="col-md-12">
                                <img src="<?=base_url()?>/public/assets/img/dbsearch.png" height="80px" class="mx-auto d-block">
                            </div>
                            <div class="col-md-12">
                                <h4 class="col-md-12 text-center py-2">Search Blood Bank Database<h4>
                            </div>
                        </div>
                    </div>
                        </div>
                    </a> -->

                    <a href="<?=base_url()?>/oneAdddonor/<?=$userdata['hospital_id']?>" class="nav-link col-md-4">
                        <div class="dash-widget new-menu">
                            <div class="contain py-3er-fluid">
                                <div class="row">
                            <div class="col-md-12">
                                <img src="<?=base_url()?>/public/assets/img/users.png" height="80px" class="mx-auto d-block">
                            </div>
                            <div class="col-md-12">
                                <h4 class="col-md-12 text-center py-2">Add A Donor<h4>
                            </div>
                        </div>
                    </div>
                        </div>
                    </a>

                    <!-- <?php
                    if ($userdata['user_role'] == 'admin' || $userdata['user_role'] == 'donor_data_clerk') {
                        ?>
                        <a href="<?=base_url()?>/adddonors/<?=$userdata['hospital_id']?>" class="nav-link col-md-4">
                        <div class="dash-widget new-menu">
                            <div class="contain py-3er-fluid">
                                <div class="row">
                            <div class="col-md-12">
                                <img src="<?=base_url()?>/public/assets/img/users2.png" height="80px" class="mx-auto d-block">
                            </div>
                            <div class="col-md-12">
                                <h4 class="col-md-12 text-center py-2">Add Multiple Donors<h4>
                            </div>
                        </div>
                    </div>
                        </div>
                    </a>
                    <?php

                    }?>

                    <a href=" " class="nav-link col-md-4">
                        <div class="dash-widget new-menu">
                            <div class="contain py-3er-fluid">
                                <div class="row">
                            <div class="col-md-12">
                                <img src="<?=base_url()?>/public/assets/img/inve.png" height="80px" class="mx-auto d-block">
                            </div>
                            <div class="col-md-12">
                                <h4 class="col-md-12 text-center py-2">Local Blood Bank Inventory<h4>
                            </div>
                        </div>
                    </div>
                        </div>
                    </a>

                    <a href=" " class="nav-link col-md-4">
                        <div class="dash-widget new-menu">
                            <div class="contain py-3er-fluid">
                                <div class="row">
                            <div class="col-md-12">
                                <img src="<?=base_url()?>/public/assets/img/invet1.png" height="80px" class="mx-auto d-block">
                            </div>
                            <div class="col-md-12">
                                <h4 class="col-md-12 text-center py-2">Blood Bank Inventory<h4>
                            </div>
                        </div>
                    </div>
                        </div>
                    </a> -->

                    <a href="<?=base_url()?>/statistics/<?=$userdata['hospital_id']?>/<?=date("Y")?>" class="nav-link col-md-4">
                        <div class="dash-widget new-menu">
                            <div class="contain py-3er-fluid">
                                <div class="row">
                            <div class="col-md-12">
                                <img src="<?=base_url()?>/public/assets/img/stats1.png" height="80px" class="mx-auto d-block">
                            </div>
                            <div class="col-md-12">
                                <h4 class="col-md-12 text-center py-2">Statistics<h4>
                            </div>
                        </div>
                    </div>
                        </div>
                    </a>

                    <a href="<?=base_url()?>/upcoming/<?=$userdata['hospital_id']?>"  class="nav-link col-md-4">
                        <div class="dash-widget new-menu">
                            <div class="contain py-3er-fluid">
                                <div class="row">
                            <div class="col-md-12">
                                <img src="<?=base_url()?>/public/assets/img/dates.jpeg" height="80px" class="mx-auto d-block">
                            </div>
                            <div class="col-md-12">
                                <h4 class="col-md-12 text-center py-2">Upcoming dates<h4>
                            </div>
                        </div>
                    </div>
                        </div>
                    </a>

                    <a href="<?=base_url()?>/reports/<?=$userdata['hospital_id']?>" class="nav-link col-md-4">
                        <div class="dash-widget new-menu">
                            <div class="contain py-3er-fluid">
                                <div class="row">
                            <div class="col-md-12">
                                <img src="<?=base_url()?>/public/assets/img/reports.jpeg" height="80px" class="mx-auto d-block">
                            </div>
                            <div class="col-md-12">
                                <h4 class="col-md-12 text-center py-2">Blood Collection Reports<h4>
                            </div>
                        </div>
                    </div>
                        </div>
                    </a>


                </div>


            </div>



            <div class="row">
                    
                    
            </div>

            <!-- The Modal -->
                    <div class="modal fade " id="LookForBlood" role="dialog">
                      <div class="modal-dialog modal-dialog-scrollable modal-xl" style="width: 100%;">
                        <div class="modal-content" >

                          <!-- Modal Header -->
                          <div class="modal-header">
                           <div class="row">
                                <h4 class="modal-title col-md-12">Do a quick search for a Donor <i class="fa fa-search"></i></h4>
                            <!-- <small class="col-md-12 text-danger">NB: Please note that if you want to delete the donor go to <strong>Donors</strong> the select <strong>Manage Donors</strong></small> -->
                           </div>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">

                        <div class="row">
                        <div class="col-md-12">

                            <div class="table-responsive">
                            <table class="table table-stripped " id="dataTable2">
                            <thead>
                                <tr>
                                    <th>NO#</th>
                                    <th>Sampe_ID</th>
                                    <th>Firstname</th>
                                    <th>Middle_name</th>
                                    <th>Lastname</th>
                                    <th>Donation_Status</th>
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
                                    <th>Donation_Status</th>
                                    <th class="noExport">Action</th>
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
                                    <td><?php $num1=0;  echo $num1 = $num1 + 1?></td>
                                    <td><?=$row->donor_id?></td>
                                    <td><?=$row->donor_fname?></td>
                                    <td><?=$row->donor_mname?></td>
                                    <td><?=$row->donor_lname?></td>
                                    <td>
                                       <?php if ($row->donation_status == "Can Donate"){ ?>
                                                <span class="bg-success text-white py-1 px-1">Can Donate <i class="fa fa-map-marker"></i></span>
                                       <?php }elseif($row->donation_status == ""){ ?>
                                           <span>Under Review....</span>
                                        <?php }else{ ?>
                                            <span class="bg-danger text-white py-1 px-1">Can Not Donate <i class="fa fa-close"></i></span>
                                       
                                        <?php }?>
                                    </td>
                                    <td class="noExport">
                                    <a href="<?=base_url()?>/Listdonors/donor_print/<?=$row->donor_id?>#PrintedData" class="col-md-10 btn btn-primary mx-1 py-1 px-2 my-1" data-toggle="tooltip" data-placement="left" title="Donation History"><i class="fa fa-paste"></i>
                                    </a>

                                    <a href="<?=base_url()?>/Listdonors/donor_print/<?=$row->donor_id?>" target="_blank" class="col-md-10 btn btn-warning mx-1 py-1 px-2 my-1" data-toggle="tooltip" data-placement="left" title="Print Donor's Details"><i class="fa fa-print"></i>
                                    </a>

                                    <button value="<?=$row->serial_number?>" class="col-md-10 btn btn-danger mx-1 py-1 px-2 my-1" onclick="getval(this.value)" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o " data-toggle="tooltip" data-placement="left" title="Delete a Donor"></i></button>

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

                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- End Dialog -->


                    <!-- The Modal -->
                    <div class="modal fade " id="LookForBloodDonorInAllDb" role="dialog">
                      <div class="modal-dialog modal-dialog-scrollable modal-xl" style="width: 100%;">
                        <div class="modal-content" >

                          <!-- Modal Header -->
                          <div class="modal-header">
                           <div class="row">
                                <h4 class="modal-title col-md-12">Do a quick search for a Donor in the Entire Blood Bank Database <i class="fa fa-search"></i></h4>
                            <small class="col-md-12 text-danger">NB: Please note that You can not do an Action on the Information Just View the Information On any Of these Donors</small>
                           </div>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>

                          <!-- Modal body -->
                          <div class="modal-body">

                        <div class="row">
                        <div class="col-md-12">

                            <div class="table-responsive">
                            <table class="table table-stripped " id="dataTable3">
                            <thead>
                                <tr>
                                    <th>NO#</th>
                                    <th>Sampe_ID</th>
                                    <th>Firstname</th>
                                    <th>Middle_name</th>
                                    <th>Lastname</th>
                                    <th>Donation Status</th>
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
                                    <th>Donation Status</th>
                                    <th class="noExport">Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                               <?php if ($donorsAllDb == null): ?>
                                <!-- <tr>
                                    <td>No data is available here</td>
                                </tr> -->
                                <?php else: ?>
                                    <?php foreach ($donorsAllDb as $row1): ?>
                                <tr>
                                    <td><?php$num2=0; $num2 = $num2 + 1?></td>
                                    <td><?=$row1->donor_id?></td>
                                    <td><?=$row1->donor_fname?></td>
                                    <td><?=$row1->donor_mname?></td>
                                    <td><?=$row1->donor_lname?></td>
                                    <td>
                                       <?php if ($row->donation_status == "Can Donate"){ ?>
                                                <span class="bg-success text-white py-1 px-1">Can Donate <i class="fa fa-map-marker"></i></span>
                                       <?php }elseif($row->donation_status == ""){ ?>
                                           <span>Under Review....</span>
                                        <?php }else{ ?>
                                            <span class="bg-danger text-white py-1 px-1">Can Not Donate <i class="fa fa-close"></i></span>
                                       
                                        <?php }?>
                                    </td>
                                    <td class="noExport">
                                       <button value="<?=$row->donor_id?>" class="col-md-10 btn btn-primary mx-1 py-1 px-2 my-1" data-toggle="tooltip" data-placement="left" title="Donation History"><i class="fa fa-paste"></i>
                                        </button>

                                    <a href="<?=base_url()?>/Listdonors/donor_print/<?=$row->donor_id?>" target="_blank" class="col-md-10 btn btn-warning mx-1 py-1 px-2 my-1" data-toggle="tooltip" data-placement="left" title="Print Donor's Details"><i class="fa fa-print"></i>
                                    </a>

                                    <!-- <button value="<?=$row->serial_number?>" class="col-md-10 btn btn-danger mx-1 py-1 px-2 my-1" onclick="getval(this.value)" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o " data-toggle="tooltip" data-placement="left" title="Delete a Donor"></i></button>

                                    <button value="<?=$row->serial_number?>" onclick="getDonorDetails(this.value)" data-toggle="modal" data-target="#editDonorDetails" class="col-md-10 btn btn-success py-1 px-2 my-1"><i class="fa fa-edit" data-toggle="tooltip" data-placement="left" title="View Or Edit Donor Details"></i> / <i class="fa fa-eye" data-toggle="tooltip" data-placement="left" title="View Or Edit Donor Details"></i></button> -->

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

                          <!-- Modal footer -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          </div>

                        </div>
                      </div>
                    </div>
                    <!-- End Dialog -->
            

            </div>


        

<?=$this->endSection('content')?>