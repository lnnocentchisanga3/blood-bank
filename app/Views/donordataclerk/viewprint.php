<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">

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

<div class="page-wrapper" style="margin-top: -100px">
    <div class="content">
        <div class="row">

            <?php if ($donors == null || $donors == ""): ?>
                <h4 class="page-title text-uppercase col-md-12">No Data Found</h4>
            <?php else: ?>
                <h4 class="page-title text-uppercase col-md-12">List of all the donors from <?="<strong>".$donors[0]->donation_site_name."</strong>";?></h4>
            <?php endif ?>

            <div class="row col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-light ">

                  <a class="nav-link btn btn-success mx-2 mb-2" href="<?=base_url()?>/adddonors/<?=$userdata['hospital_id']?>/<?=$donors[0]->site_id?>"><i class="fa fa-plus"></i> Add a Donation</a>

                  <a class="nav-link btn btn-primary mx-2 mb-2" href="<?=base_url()?>/oneAdddonor/<?=$userdata['hospital_id']?>/<?=$donors[0]->site_id?>"><i class="fa fa-user-plus"></i> Add new Donor</a>

                   <!-- <a class="nav-link btn btn-danger mx-2 mb-2" href="<?=base_url()?>/Donationsites/oneSiteViewList/<?=$userdata['hospital_id']?>/<?=$site_id?>"><i class="fa fa-users"></i> List Donors</a> -->

                   <!-- <a class="nav-link btn btn-danger mx-1 mb-2" href="dashboard.php?showCourse"><i class="fa fa-folder"></i> view course</a> -->
                </nav>
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
                                    <td><?=$num = $num + 1?></td>
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

<script>
    
</script>


<?=$this->endSection('content')?>

