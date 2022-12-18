<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">Home</a> / Donors / Add a Donation</h4>

    <?php if (session()->getTempdata('Success')): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>Success! </strong> <?=session()->getTempdata('Success');?>
    </div>
  <?php endif ?>

  <?php if (session()->getTempdata('error')): ?>
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>Error ! </strong> <?=session()->getTempdata('error');?>
    </div>
  <?php endif ?>

  <div class="col-md-12" id="inputAlert">
    
  </div>


</div>
</div>
<div class="row">

  <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
        <!-- <a class="nav-link btn btn-success mx-2 mb-2" href="<?=base_url()?>/adddonors/<?=$userdata['hospital_id']?>/<?=$site_id?>"><i class="fa fa-plus"></i> Add a Donation</a> -->
          <a class="nav-link btn btn-primary mx-2 mb-2" href="<?=base_url()?>/oneAdddonor/<?=$userdata['hospital_id']?>/<?=$site_id?>"><i class="fa fa-user-plus"></i> Add new Donor</a>
           <!-- <a class="nav-link btn btn-dark mx-2 mb-2" href="dashboard.php?addCoursePage"><i class="fa fa-plus"></i> Add new Course</a>
           <a class="nav-link btn btn-danger mx-1 mb-2" href="dashboard.php?showCourse"><i class="fa fa-folder"></i> view course</a> -->
        </nav>
    </div>

<div class="col-md-12">
    <div class="card-box">
        <div class="card-block">
          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-stripped " id="dataTable2">
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

                  <!-- <tfoot>
                      <tr>
                          <th>NO#</th>
                          <th>Sampe ID</th>
                          <th>Firstname</th>
                          <th>Middle name</th>
                          <th>Lastname</th>
                          <th>Donation Status</th>
                          <th class="noExport">Action</th>
                      </tr>
                  </tfoot> -->
                  <tbody>
                     <?php if ($donors == null): ?>
                      <!-- <tr>
                          <td>No data is available here</td>
                      </tr> -->
                      <?php else: ?>
                          <?php foreach ($donors as $row): ?>
                      <tr>
                          <td><?=$num1 = $num1 + 1?></td>
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
                              <button value="<?=$row->donor_id?>" class="col-md-12 btn btn-primary mx-1 py-1 px-2 my-1" onclick="getDonorId(this.value)" data-toggle="modal" data-target="#addaDonation"><i class="fa fa-plus" data-toggle="tooltip" data-placement="left" title="Donate Blood"></i></button>

                              <button value="<?=$row->serial_number?>" onclick="getDonorDetails(this.value)" data-toggle="modal" data-target="#editDonorDetails" class="col-md-12 btn btn-success py-1 px-2 my-1"><i class="fa fa-edit" data-toggle="tooltip" data-placement="left" title="View Or Edit Donor Details"></i></button>

                              <a href="<?=base_url()?>/Listdonors/donor_print/<?=$row->donor_id?>" target="_blank" class="col-md-12 btn btn-warning mx-1 py-1 px-2 my-1" data-toggle="tooltip" data-placement="left" title="Print Donor's Details"><i class="fa fa-print"></i>
                              </a>

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

<div id="addaDonation" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
              <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Adding Donation Details</h4>
                <form action="<?=base_url()?>/adddonors/index/<?=$userdata['hospital_id']?>/<?=$site_id?>" method="POST">
                  <div class="row">
                    <div class="col-md-6">
                      <label>Date Of Donation</label>
                      <input type="date" name="dod" class="form-control" value="<?=date('Y-m-d')?>">
                    </div>
                    <div class="col-md-6">
                      <label>Date Of Next Donation</label>
                      <input type="date" name="donextd" class="form-control" placeholder="Date of Next Donation" required>
                    </div>
                  </div>
                  <label>Sample ID</label>
                  <input type="text" name="sampleid" class="form-control" placeholder="Sample ID" required>
                  <label>Donor ID</label>
                  <input type="text" name="donor_id" class="form-control" id="donorId" readonly>

                  <div class="m-t-20 text-center">
                      <button class="btn btn-primary submit-btn text-white">Save Details</button>
                  </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function getDonorId(uid) {
        document.getElementById('donorId').setAttribute('value',uid);
    }
</script>


<?=$this->endSection('content')?>

