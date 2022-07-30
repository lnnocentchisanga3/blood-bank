<?= $this->extend('layouts/base2'); ?>
<?=$this->section('content');?>

<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><i class="fa fa-user-plus"></i> Editing <?=$donor->donor_name;?></h4>
   <?=$success;?>
   <?=$error;?>


  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $field => $error): ?>
        <p><?=$error?></p>
      <?php endforeach ?>
    </div>
  <?php endif ?>


  <?php if (session()->getTempdata('Success')): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>Success!</strong> <?=session()->getTempdata('Success');?>
    </div>
  <?php endif ?>


  <?php if (isset($validation)): ?>
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Warning</strong><?=$validation->listErrors();?>
    </div>
  <?php endif ?>
</div>




<div class="container">
	<div class="row">

 <?=form_open()?>
 <div class="input-group col-md-12 my-4 container">
 	<div class="row">
    <label class="px-2 my-2 col-md-2">Date of Donation</label>
  <input type="text" name="dod" class="form-control col-md-10" value="<?=$donor->date_of_donation;?>"><br><br><br>
  <label class="px-2 my-2 col-md-2">Date of Next Donation</label>
  <input type="date" name="donextd" class="form-control col-md-10" value="<?=$donor->date_of_next_donation;?>">
  <label class="px-2 my-2 col-md-2">Site</label>
  <input type="text" name="site" class="form-control col-md-10" value="<?=$donor->site;?>"><br>
  </div>
 </div>
<table class="table table-bordered table-hover table-striped  mt-5 col-md-12" >
<thead style="width:100%">
<tr>
  <!-- <th>No#</th> -->
<th>Sample ID</th>
<th>Donor Names</th>
<th>HIV</th>
<th>HBV</th>
<th>HCV</th>
<th>Syphilis</th>
<th>Comment</th>
</tr>

</thead>
<tbody id="myOrder">
<td>
  <input type="text" class="form-control" placeholder="Sample ID" name="sampleid" value="<?=$donor->sample_id;?>" ></td>
  <td><input type="text" class="form-control" placeholder="Donor Names" name="names" value="<?=$donor->donor_name;?>"></td>
  <td><select class="form-control" name="hiv" ><option><?=$donor->hiv;?></option><option>1</option><option>2</option><option>22</option></select></td>
  <td><select class="form-control" name="hbv" ><option><?=$donor->hbv;?></option><option>1</option><option>2</option><option>22</option></select></td>
  <td><select class="form-control" name="hcv"><option><?=$donor->hcv;?></option><option>1</option><option>2</option><option>22</option></select></td>
  <td><select class="form-control" name="syphilis"><option><?=$donor->syphilis;?></option><option>1</option><option>2</option><option>22</option></select></td>
  <td><input type="text" class="form-control" placeholder="Comment" name="comment" value="<?=$donor->comment;?>"></td>
</tbody>
</table>
<div class="box-footer" >
<input type="submit"  value="Submit" name="submit" class="btn btn-primary my-3">
<!-- <a href="order.php" class="btn btn-warning">Kembali</a> -->
</div>
<?=form_close()?>



</div>
</div>
</div>

</div>
</div>

<?=$this->endSection('content')?>

