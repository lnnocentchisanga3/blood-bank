<!--
                        Search for a Donor part
                     <div class="col-md-12 py-2 my-3 bg-white">
                        <a href="#" data-toggle="modal" data-target="#LookForBlood" class="btn btn-primary btn-rounded"><i class="fa fa-search"></i> <span>Search for a Donor</span></a>
                    </div> -->
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                         <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <h4 class="col-md-6">Donation Sites <i class="fa fa-map-marker"></i></h4>
                                <div class="col-md-6 text-right">
                                    <a href="<?=base_url()?>/addsites/<?=$userdata['hospital_id']?>" class="btn btn-primary btn-rounded">+ Add A Donation Site</a>
                               </div>
                                </div>
                            </div>
                            <div class="card-body">
                               
                                <div class="table-responsive" style="height: 50vh">
                                    <table class="table table-stripped " id="dataTable3">
                                            <thead>
                                                <tr>
                                                  <th>No#</th>
                                                    <th>Donation Site</th>
                                                    <th class="noExport">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               <?php if ($sites == null): ?>
                                                <tr>
                                                  <td>No data is available here</td>
                                                </tr>
                                                <?php else: ?>
                                                  <?php foreach ($sites as $row): ?>
                                                <tr>
                                                  <td><?=$num = $num + 1?></td>
                                                    <td><?=$row['donation_site_name']?></td>
                                                    <td class="noExport">
                                                        <a href="<?=base_url()?>/viewdonationsite/<?=$row['site_id']?>/<?=$row['hospital_id']?>" class="badge badge-warning py-2 px-3 my-2"><i class="fa fa-eye"></i></a>

                                                        <a href="<?=base_url()?>/editSites/<?=$row['site_id']?>/<?=$row['hospital_id']?>" class="badge badge-success py-2 px-3 my-2"><i class="fa fa-edit"></i></a>

                                                        <!-- <a href="<?=base_url()?>/deleteSite/<?=$row['site_id']?>/<?=$row['hospital_id']?>" class="badge badge-danger py-2 px-3 my-2"><i class="fa fa-trash"></i></a> -->

                                                        <!-- <button value="<?=$row['site_id']?>" class="btn btn-danger py-1 px-2 my-1" onclick="getval(this.value)" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o "></i></button> -->
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

                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
                         <div class="card">
                            <div class="card-body">
                                <div class="chart-title">
                                    <h4>Blood Collected in the passed months</h4>
                                    <div class="float-right">
                                        <ul class="chat-user-total">
                                            <!-- <li><i class="fa fa-circle current-users" aria-hidden="true"></i>Okay</li>
                                            <li><i class="fa fa-circle old-users" aria-hidden="true"></i> Discards</li> -->
                                        </ul>
                                    </div>
                                </div>  
                                <canvas id="bargraph" style="height: 30vh">
                                    Thers is nop data to show
                                </canvas>
                            </div>
                        </div>
                    </div>



                    <!-- <div class="row"> -->
                    <div class="col-12 col-md-12 col-lg-12 col-xl-12 ">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title d-inline-block">Upcoming Dates</h4> <a href="<?=base_url()?>/addsites/<?=$userdata['hospital_id']?>" class="btn btn-primary float-right btn-rounded">View all Donation Sites <i class="fa fa-map-marker"></i></a>
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
                                                    <a href="<?=base_url()?>/sitedataprint/<?=$row->site_id;?>/<?=$row->hospital_id?>" class="btn btn-outline-primary btn-rounded">View and Print <i class="fa fa-print"></i></a>
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