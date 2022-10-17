<?= $this->extend('donorsection/layouts/base'); ?>
<?=$this->section('content');?>

<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title">List of all the donors</h4>

    <?php if (session()->getTempdata('Success')): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>Success!</strong> <?=session()->getTempdata('Success');?>
    </div>
  <?php endif ?>

</div>
</div>
<div class="row">
<div class="col-sm-12">
    <div class="card-box">
        <div class="card-block">
            
			<div class="table-responsive">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10"></div>
                        <!-- <div class="col-md-2"><a href="<?=base_url()?>/adddonors/<?=$userdata['hospital_id']?>" class="btn btn-primary my-3"><i class="fa fa-plus"></i> Add Donors</a></div> -->
                    </div>
                </div>
                <table class="table table-stripped " id="dataTable">
                <thead>
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
                        <!-- <th>Action</th> -->
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
                            <a href="<?=base_url()?>/delete_donor/<?=$row->serial_number?>/<?=$row->hospital_id?>" onclick="window.confirm('Are you sure you want to delete this record ?');" class="badge badge-danger py-2 px-2 my-2"><i class="fa fa-trash"></i></a>
                            <a href="<?=base_url()?>/edit_donor/<?=$row->serial_number?>/<?=$row->hospital_id?>" class="badge badge-success py-2 px-2 my-2"><i class="fa fa-edit"></i></a>
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
</div>
</div>
</div>


<?=$this->endSection('content')?>

