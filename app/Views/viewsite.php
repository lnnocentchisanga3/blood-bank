<?= $this->extend('layouts/base2'); ?>
<?=$this->section('content');?>

<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title">List of all the donors from <?=$sitedata[0]->site;?></h4>

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
            <!-- <h6 class="card-title text-bold">Default Datatable</h6>
            <p class="content-group">
                This is the most basic example of the datatables with zero configuration. Use the <code>.datatable</code> class to initialize datatables.
            </p> -->

      <div class="table-responsive">
        <div class="container-fluid">
          <!-- <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><a href="<?=base_url()?>/adddonors" class="btn btn-primary my-3"><i class="fa fa-plus"></i> Add Donors</a></div>
          </div> -->
        </div>
        <table class="table table-stripped " id="dataTable">
                <thead>
                    <tr>
                      <th>Serial NO#</th>
                        <th>Sampe ID</th>
                        <th>Names</th>
                        <th>HIV</th>
                        <th>HBV</th>
                        <th>HCV</th>
                        <th>Syphilis</th>
                        <th>Comment</th>
                        <th>Site</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php if ($sitedata == null): ?>
                    <tr>
                      <td>No data is available here</td>
                    </tr>
                    <?php else: ?>
                      <?php foreach ($sitedata as $row): ?>
                    <tr>
                        <td><?=$row->serial_number?></td>
                        <td><?=$row->sample_id?></td>
                        <td><?=$row->donor_name?></td>
                        <td><?=$row->hiv?></td>
                        <td><?=$row->hbv?></td>
                        <td><?=$row->hcv?></td>
                        <td><?=$row->syphilis?></td>
                        <td><?=$row->comment?></td>
                        <td><?=$row->site?></td>
                        <td>
                            <a href="<?=base_url()?>/listdonors/delete/<?=$row->serial_number?>" onclick="window.confirm('Are you sure you want to delete this record ?');" class=" py-2 col-sm-12 my-2 badge badge-danger"><i class="fa fa-trash"></i> Delete</a>
                            <a href="<?=base_url()?>/listdonors/edit/<?=$row->serial_number?>" class=" py-2 col-sm-12 my-2 badge badge-success"><i class="fa fa-edit"></i> Edit</a>
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


<?=$this->endSection('content')?>

