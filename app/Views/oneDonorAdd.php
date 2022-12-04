<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">Home</a> / Donors / Add a Donor</h4>
</div>
</div>
<div class="card-box">
        <div class="row">
            <div class="col-md-12 text-center">
                <h3 class="my-4 text-uppercase">Entering The Details of The Blood Donor</h3>
            </div>
            <div class="col-lg-12 my-4">
                <?php
                if ($userdata['user_role'] == 'admin') {
                    ?>
                <a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">
                    <button class="btn btn-primary submit-btn"><i class="fa fa-home"></i> Go To Home</button>
                </a>
                    <?php

                } elseif ($userdata['user_role'] == 'donor_data_clerk') {
                    ?>
                <a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">
                    <button class="btn btn-primary submit-btn"><i class="fa fa-home"></i> Go To Home</button>
                </a>
                    <?php
                }else{
                    ?>
                <a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">
                    <button class="btn btn-primary submit-btn"><i class="fa fa-home"></i> Go To Home</button>
                </a>
                    <?php
                }
                
                ?>
            </div>

            <?php if (session()->getTempdata('Success')): ?>
                <div class="alert alert-success col-md-12">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>Success!</strong> <?=session()->getTempdata('Success');?>
                </div>
              <?php endif ?>

        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2 mb-5">
                <form method="POST" action="<?=base_url()?>/adddonors/oneAdddonor/<?=$userdata['hospital_id']?>">

                    <input type="text" name="province" value="<?=$userdata['province_id']?>" hidden>
                    <input type="text" name="district" value="<?=$userdata['district_id']?>" hidden>

                    <div class="row">
                        <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donation Site Information</h4>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Unit Number</label>
                            <input type="text" class="form-control" required placeholder="Unit Number" name="sampleid" <?=set_value('sampleid')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Donation Site</label>
                             <select name="site" class="form-control">
                              <?php if ($sites == null || $sites == ''): ?>
                                <option>0 Sites Found</option>
                              <?php else: ?>
                                <?php foreach ($sites as $row): ?>
                                  <option value="<?=$row['site_id']?>"><?=$row['donation_site_name']?></option>
                                <?php endforeach ?>
                              <?php endif ?>
                            </select>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Date Of Next Donation</label>
                            <input type="date" class="form-control"  name="donextd" <?=set_value('donextd')?>required>
                        </div>
                        </div>

                        <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donor's Information</h4>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Firstname</label>
                            <input type="text" class="form-control" required placeholder="Firstname" name="fnames" <?=set_value('fnames')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>MiddleName</label>
                            <input type="text" class="form-control" placeholder="Middle name (Optional)" name="mnames" <?=set_value('mnames')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>LastName</label>
                            <input type="text" class="form-control" required placeholder="Lastname" name="lnames" <?=set_value('lnames')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Date Of Birth</label>
                            <input type="date" class="form-control"  name="dateofbirth" <?=set_value('dateob')?>required>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control"  name="gender" <?=set_value('gender')?>>
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Occupation</label>
                            <select class="form-control" name="occupation" <?=set_value('occupation')?>>
                                <option>Farmer</option>
                                <option>Civil Servant</option>
                                <option>Self Employed</option>
                                <option>Student</option>
                                <option>Pupil</option>
                            </select>
                        </div>
                        </div>

                        <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donor's Blood Donation Status</h4>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Date Of Last Donation</label>
                            <input type="date" class="form-control" name="doldon" <?=set_value('doldon')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Site Of Donation</label>
                            <?php if ($sites == null): ?>
                                    <li><a href="#!"><i class="fa fa-map"></i> -No Donation Sites Found</a></li>
                            <?php else: ?>
                            <select class="form-control" name="sod" <?=set_value('sod')?>>
                                <option value="0">None</option>
                                <?php foreach ($sites as $row): ?>
                                   <option value="<?=$row['site_id']?>"><?=$row['donation_site_name']?></option>
                                <?php endforeach ?>
                            </select>
                           <?php endif ?>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Blood Group</label>
                            <select class="form-control" name="group" <?=set_value('group')?>>
                                <option value="0">0</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Number Of Donations</label>
                            <select class="form-control" required name="numofdonation" <?=set_value('numofdonation')?>>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                            </select>
                        </div>
                        </div>

                        <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donor's Contact / Residential Information</h4>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Residential Address</label>
                            <input type="text" class="form-control" required placeholder="Residential Address" name="postaladdress" <?=set_value('postaladdress')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" <?=set_value('email')?>>
                        </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" required placeholder="Phone Number" name="phone" <?=set_value('phone')?>>
                        </div>
                        </div>

                    </div>
                    <div class="m-t-20 text-center">
                        <button class="btn btn-primary submit-btn">Save Details</button>
                    </div>
                </form>
            </div>
        </div>
</div>
</div>
</div>

<?=$this->endSection('content')?>

