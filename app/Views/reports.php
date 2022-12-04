<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">Home</a> / Upcoming Dates</h4>
</div>
</div>
<div class="card-box">
<!-- <button type="button" class="btn btn-primary" >Open modal</button> -->

<div class="content">
<div class="row">
<div class="col-sm-8 col-5">
    <h4 class="page-title">Blood Collection Reports</h4>
</div>

</div>
<form action="<?=base_url()?>/Dashboard/searchreport/<?=$userdata['hospital_id']?>" method="POST">
<div class="row filter-row">

<!-- <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
    <div class="form-group form-focus">
        <label class="focus-label">Item Name</label>
        <input type="text" class="form-control floating">
    </div>
</div> -->
<div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-12">
    <div class="form-group form-focus select-focus">
        <label class="focus-label">Donation Site</label>
        <select name="site" class="select floating">
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
<!-- <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-12">
    <div class="form-group form-focus select-focus">
        <label class="focus-label">Paid By</label>
        <select class="select floating">
            <option> -- Select -- </option>
            <option> Cash </option>
            <option> Cheque </option>
        </select>
    </div>
</div> -->
<div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-12">
    <div class="form-group form-focus">
        <label class="focus-label">From</label>
        <!-- <div class="cal-icon"> -->
            <input name="fromdate" class="form-control floating" type="date">
        <!-- </div> -->
    </div>
</div>
<div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-12">
    <div class="form-group form-focus">
        <label class="focus-label">To</label>
        <!-- <div class="cal-icon"> -->
            <input name="todate" class="form-control floating" type="date">
        <!-- </div> -->
    </div>
</div>
<div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-12">
    <button class="btn btn-success btn-block"> Search </button>
</div>
</div>
</form>
<div class="row">
<div class="col-md-12">
    <?php if ($dataSearched == null): ?>
        <h5 class="col-md-12 text-center py-4">There are no reports here please search for one</h5>
    <?php else: ?>
        <h4 class="col-md-12 text-center py-4 text-uppercase border-bottom border-top" style="font-weight: bold;"><?=$tests?></h4>
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
                <th>Date_of_Donation</th>
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
                <th>Date_of_Donation</th>
                <th>Action</th>
            </tr>
        </tfoot>
        <tbody>
           <?php if ($dataSearched == null): ?>
            <!-- <tr>
                <td>No data is available here</td>
            </tr> -->
            <?php else: ?>
                <?php foreach ($dataSearched as $row): ?>
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
                <td><?=$row->date_of_donation?></td>
                <td class="noExport">
                    <!-- <button value="<?=$row->serial_number?>" class="btn btn-danger py-1 px-2 my-1" onclick="getval(this.value)" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o "></i></button> -->

                    <button value="<?=$row->serial_number?>" onclick="getDonorDetails(this.value)" data-toggle="modal" data-target="#editDonorDetails" class="btn btn-success py-1 px-2 my-1"><i class="fa fa-edit"></i></button>
                </td>
            </tr>
                <?php endforeach ?>
           <?php endif ?>
        </tbody>
    </table>
    </div>
    <?php endif ?>
</div>
</div>
</div>

</div>
</div>
</div>

<?=$this->endSection('content')?>

