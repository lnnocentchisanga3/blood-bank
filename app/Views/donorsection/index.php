<?= $this->extend('donorsection/layouts/base'); ?>
<?=$this->section('content');?>
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-md-12 py-2 my-3 bg-white">
                        <a href="#" data-toggle="modal" data-target="#LookForBlood" class="btn btn-primary submit-btn"><i class="fa fa-search"></i> <span>Search for a Donor</span></a>
                    </div>
                    <!-- <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg1"><i class="fa fa-stethoscope" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?=$hiv?></h3>
                                <span class="widget-title1">HIV<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?=$hbv?></h3>
                                <span class="widget-title2">HBV<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?=$hcv?></h3>
                                <span class="widget-title3">HCV<i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-heartbeat" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
                                <h3><?=$syphilis?></h3>
                                <span class="widget-title4">Syphilis <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <!-- <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Patient Total</h4>
                                    <span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
                                </div>  
                                <canvas id="linegraph"></canvas>
                            </div>
                        </div>
                    </div> -->
                    <!-- Graph here -->
                    <!-- Ends here -->
                    
                </div>
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">Incoming Dates</h4> 

                                <a href="<?=base_url()?>/donorsectiondonationsites/<?=$userdata['hospital_id']?>" class="btn btn-primary float-right submit-btn">View all Donation Sites <i class="fa fa-map-marker"></i></a>
                            </div>
                            <div class="card-body">
                                <!-- <button type="button" class="btn btn-primary" >Open modal</button> -->
                                <div class="table-responsive" style="height: 55vh;">
                                    <table class="table mb-0 table-hover table-striped" id="dataTable">
                                        <thead class="">
                                            <tr>
                                                <th>Visted</th>
                                                <th>Site</th>
                                                <th>Next Visit</th>
                                                <th class="text-right noExport">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if ($alldonors == null || $alldonors == '' || $alldonors == 0 || $alldonors == false || is_numeric($alldonors)): ?>
                                            <!-- <tr>
                                                <td>
                                                  No data available
                                                </td>
                                            </tr> -->
                                                <?php else: ?>
                                                    <?php foreach ($alldonors as $row): ?>
                                            <tr>
                                                <td>
                                                    <h2><?=$row->date_of_donation?></h2>
                                                </td>                 
                                                <td>
                                                    <h5 class="time-title p-0"><i class="fa fa-map-marker"></i> <?=$row->donation_site_name?></h5>
                                                </td>
                                                <td>
                                                    <h5 class="time-title p-0"><?=$row->date_of_next_donation?></h5>
                                                </td>
                                                <td class="text-right noExport">
                                                    <a href="<?=base_url()?>/printData/<?=$row->site_id;?>/<?=$row->hospital_id?>" class="btn btn-primary submit-btn">View and Print <i class="fa fa-print"></i></a>
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
                    
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12" >
                        <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Blood Collected in the passed months</h4>
                                    <div class="float-right">
                                    </div>
                                </div>  
                                <canvas id="bargraph" style="height: 30vh"></canvas>
                            </div>
                        </div>
                </div>

               <?php
                    if ($statistics == null || $statistics == '' || empty($statistics)) {
                        
                    }else{
                        echo "<script>
                    $(document).ready(function(){
                        var barChartData = {";
                        echo "labels: [";
                        foreach($statistics as $row) {
                        echo "'".substr($row->donation_site_name, 0,10)."',";
                            }
                        echo " ],";
                        echo "datasets: [{
                            label: 'Donors 1',
                            backgroundColor: 'rgba(0, 158, 251, 0.5)',
                            borderColor: 'rgba(0, 158, 251, 1)',
                            borderWidth: 1,";
                           echo "data: ["; 
                
                  foreach($statistics as $row){
                       /*print_r();*/
                        echo $row->num.",";
                        }
                           echo ",]";
                        echo "}
                        ]
                    };

                    var ctx = document.getElementById('bargraph').getContext('2d');
                    window.myBar = new Chart(ctx, {
                        type: 'bar',
                        data: barChartData,
                        options: {
                            responsive: true,
                            legend: {
                                display: false,
                            }
                        }
                    });
                    });
                </script>";
                    }
                  
                    ?>

                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
                    <div class="modal fade" id="LookForBlood">
                      <div class="modal-dialog modal-dialog-scrollable modal-xl">
                        <div class="modal-content" style="width: 100%;">

                          <!-- Modal Header -->
                          <div class="modal-header">
                           <div class="row">
                                <h4 class="modal-title col-md-12">Do a quick search for a Donor <i class="fa fa-search"></i></h4>
                            <small class="col-md-12 text-danger">NB: Please note that if you want to delete the donor go to <strong>Donors</strong> the select <strong>Manage Donors</strong></small>
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
                                    <th>HIV</th>
                                    <th>HBV</th>
                                    <th>HCV</th>
                                    <th>Syphilis</th>
                                    <th>Comment</th>
                                    <th>Blood_Group</th>
                                    <!-- <th class="noExport">Action</th> -->
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
                               <?php if ($donors == null): ?>
                                <!-- <tr>
                                    <td>No data is available here</td>
                                </tr> -->
                                <?php else: ?>
                                    <?php foreach ($donors as $row): ?>
                                <tr>
                                    <td><?=$num1 = $num1 + 1?></td>
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
                                    <!-- <td class="noExport">
                                        <button value="<?=$row->serial_number?>" class="btn btn-danger py-1 px-2 my-1" onclick="getval(this.value)" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o "></i></button> 

                                        <a href="<?=base_url()?>/edit_donor_data/<?=$row->serial_number?>/<?=$row->hospital_id?>" class="badge badge-success py-2 px-2 my-2"><i class="fa fa-edit"></i></a>
                                    </td> -->
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
<?=$this->endSection('content')?>