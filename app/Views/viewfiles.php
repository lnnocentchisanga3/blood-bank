<?= $this->extend('layouts/base2'); ?>
<?=$this->section('content');?>

<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title">List of all the Excel files</h4>

    <?php if (session()->getTempdata('Success')): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>Success!</strong> <?=session()->getTempdata('Success');?>
    </div>
  <?php endif ?>


  <?php if (session()->getTempdata('Warning')): ?>
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>Warning!</strong> <?=session()->getTempdata('Warning');?>
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
         <div class="row">
            <?=form_open_multipart()?>
            <div class="input-group col-md-12 my-4 container">
            <div class="row">
            <label class="px-2 my-2 col-md-2">File</label>
          <input type="file" name="file" class="form-control col-md-10 my-2" value="<?=set_value('dod')?>" required>
          <label class="px-2 my-2 col-md-2">Date Range</label>
          <input type="text" name="daterange" class="form-control col-md-10 my-2" value="<?=set_value('donextd')?>" required>
          <label class="px-2 my-2 col-md-2">Site</label>
          <input type="text" name="site" class="form-control col-md-10 my-2" value="<?=set_value('site')?>" required><br>
          </div>
         </div>
         <button class="btn btn-primary mb-4" name="submit"><i class="fa fa-save"></i> Save file</button>
            <?=form_close()?>
            <!-- <div class="col-md-10"></div>
            <div class="col-md-2"><a href="<?=base_url()?>/addfiles" class="btn btn-primary my-3"><i class="fa fa-plus"></i> Add Files</a></div> -->
          </div>
        </div>
        <table class="table table-stripped " id="dataTable">
                <thead>
                    <tr>
                      <th>NO#</th>
                        <th>File Name</th>
                        <th>Date Range</th>
                        <th>Date Added</th>
                        <th>Site</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php if ($file == null): ?>
                    <tr>
                      <td>No data is available here</td>
                    </tr>
                    <?php else: ?>
                      <?php foreach($file as $row): ?>
                    <tr>
                        <td><?=$row['file_id'];?></td>
                        <td><?=$row['file_name'];?></td>
                        <td><?=$row['data_range'];?></td>
                        <td><?=$row['added_on'];?></td>
                        <td><?=$row['site'];?></td>
                        <td>
                            <a href="<?=base_url()?>/files/delete/<?=$row->file_id?>" class=" py-2 col-sm-12 my-2 badge badge-danger"><i class="fa fa-trash"></i> Delete</a>
                            <a href="<?=base_url()?>/files/edit/<?=$row->file_id?>" class=" py-2 col-sm-12 my-2 badge badge-success"><i class="fa fa-folder-open "></i> Open</a>
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

