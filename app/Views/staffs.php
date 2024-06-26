<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
            <div class="content">
                <div class="row">

                    <?php if (session()->getTempdata('Success')): ?>
                        <div class="alert alert-success col-md-12">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                         <strong>Success!</strong> <?=session()->getTempdata('Success');?>
                        </div>
                      <?php endif ?>

                       <?php if (session()->getTempdata('error')): ?>
                        <div class="alert alert-danger col-md-12">
                          <button type="button" class="close" data-dismiss="alert">&times;</button>
                         <strong>Success!</strong> <?=session()->getTempdata('error');?>
                        </div>
                      <?php endif ?>

                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">LOCAL STAFF MEMBERS</h4>

                        <?php
                        // $val = "bloodbank_alldone_when_paid";
                        // $val1 = strrev($val);
                        // $encrypt = crypt($val1,'$6$rounds5000$maluinevector40_formercy$');
                        // echo $encrypt;
                        ?>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="<?=base_url()?>/addstaff/<?=$userdata['hospital_id']?>" class="btn btn-primary float-right btn-rounded">CREATE A STAFF MEMBER</a>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped custom-table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Lastname</th>
                                        <th>Lastname</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Role</th>
                                        <th class="text-right noExport">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($staffs == null || $staffs == 0): ?>
                                        <?php else: ?>
                                            <?php foreach ($staffs as $row): ?>
                                                <tr>
                                                <td>
                                                    <img width="28" height="28" src="<?= base_url();?>/public/assets/img/user.jpg" class="rounded-circle" alt=""> <h2><?=$row['username']?></h2>
                                                </td>
                                                <td><?=$row['fname']?></td>
                                                <td><?=$row['lname']?></td>
                                                <td><?=$row['email']?></td>
                                                <td><?=$row['phone']?></td>
                                                <td>
                                                <span class="custom-badge status-green"><?=strtoupper($row['user_role'])?></span>
                                                </td>
                                                <td class="text-right">
                                                    <a class="my-2 nav-item btn btn-success btn-sm" href="<?=base_url()?>/editStaff/<?=$row['user_id']?>/<?=$userdata['hospital_id']?>"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                                   <?php if ($userdata['user_role'] == $row['user_role']): ?>
                                                     <button class="my-2 btn btn-danger btn-sm" value="<?=$row['user_id']?>" onclick="getvalStaff(this.value)" data-toggle="modal" data-target="#deleteStaff" disabled><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                                       <?php else: ?>
                                                         <button class="my-2 btn btn-danger btn-sm" value="<?=$row['user_id']?>" onclick="getvalStaff(this.value)" data-toggle="modal" data-target="#deleteStaff"><i class="fa fa-trash-o m-r-5"></i> Delete</button>
                                                   <?php endif ?>
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
        <div id="deleteStaff" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="<?=base_url()?>/public/assets/img/sent.png">
                        <h3>Are you sure want to delete this Staff Member?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <a id="addAttri" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function getvalStaff(uid) {
                document.getElementById('addAttri').setAttribute("href", "<?=base_url()?>/deleteUser/"+uid+"/"+"<?=$userdata['hospital_id']?>");
            }
        </script>


<?=$this->endSection('content')?>

