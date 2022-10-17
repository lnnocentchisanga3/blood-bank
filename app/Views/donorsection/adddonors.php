<?= $this->extend('donorsection/layouts/base'); ?>
<?=$this->section('content');?>

<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><i class="fa fa-user-plus"></i> Adding Donors</h4>
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
 <div class="input-group">
 	<label class="text-center col-md-12">Enter the number of Donors you want to add</label><br>
  <input type="number" name="num" id="numberOfDonors" class="form-control col-md-6 offset-md-3 ">
  <button class="btn btn-primary" onclick="createInputs()">Add Input</button>
 </div>

 <?=form_open()?>
 <div class="input-group col-md-12 my-4 container">
 	<div class="row">
    <label class="px-2 my-2 col-md-2">Date of Donation</label>
  <input type="date" name="dod" class="form-control col-md-10" value="<?=set_value('dod')?>"><br><br><br>
  <label class="px-2 my-2 col-md-2">Date of Next Donation</label>
  <input type="date" name="donextd" class="form-control col-md-10" value="<?=set_value('donextd')?>">
  <label class="px-2 my-2 col-md-2">Site</label>
  <select name="site" class="form-control">
    <?php if ($site == null || $site == ''): ?>
      <option>0 Sites Found</option>
    <?php else: ?>
      <?php foreach ($sites as $row): ?>
        <option value="<?=$row['site_id']?>"><?=$row['donation_site_name']?></option>
      <?php endforeach ?>
    <?php endif ?>
  </select>
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
<th>Remove</th>
</tr>

</thead>
<tbody id="myOrder">
<!-- <tr>
  <td><img src="<?=base_url()?>/public/assets/img/load-indicator.gif"></td>
</tr> -->
</tbody>
</table>
<div class="box-footer" >
<input type="submit"  value="Submit" name="submit" class="btn btn-primary my-3">
<!-- <a href="order.php" class="btn btn-warning">Kembali</a> -->
</div>
<?=form_close()?>



</div>
</div>

<script>
	/*script to take input number*/

	function createInputs() {
		let num = document.getElementById('numberOfDonors').value;

        if (num == null || num == 0){
          window.alert("Please enter a value");
        }else{
          localStorage.setItem('numInputs', num);

         location.reload();

        getInputFieldNumber();
        }
	}


	/*Ends here*/


	/*Script to load input fields*/
	function getInputFieldNumber(){

    let i = "";
    let html = "";




        html+='<tr>';
        /*html +='<td><input type="number" class="form-control" id="num" readonly></td>';*/

        html+='<td><input type="text" class="form-control" placeholder="Sample ID" name="sampleid[]" <?=set_value('sampleid[]')?> ></td>';
        html+='<td><input type="text" class="form-control" placeholder="Donor Names" name="names[]" <?=set_value('')?>></td>';
        html+='<td><select class="form-control" name="hiv[]" <?=set_value('hiv[]')?>><option>1</option><option>2</option><option>22</option></select></td>';
        html+='<td><select class="form-control" name="hbv[]" <?=set_value('hbv[]')?>><option>1</option><option>2</option><option>22</option></select></td>';
        html+='<td><select class="form-control" name="hcv[]" <?=set_value('hcv[]')?>><option>1</option><option>2</option><option>22</option></select></td>';
        html+='<td><select class="form-control" name="syphilis[]" <?=set_value('syphilis[]')?>><option>1</option><option>2</option><option>22</option></select></td>';
        html+='<td><input type="text" class="form-control" placeholder="Comment" name="comment[]"<?=set_value('comment[]')?>></td>';
        html+='<td><button type="button" name="remove" class="btn btn-danger btn-sm btn-remove"><i class="fa fa-remove"></i></button></td>'

        let number = localStorage.getItem("numInputs");

        if (number == null || number == 0){

        }else{
          while(i < number){
          $('#myOrder').append(html);
          /*document.getElementById('num').value = i+1;*/

          i++;
        }
        }

     

      $(document).on('click','.btn-remove', function(){
        $(this).closest('tr').remove();
        let num = localStorage.getItem("numInputs");
        let total = num-1;
        localStorage.setItem('numInputs', total);
        calculate(0,0);
        $("#paid").val(0);
      });
  }

  $(document).ready(function(){
  	getInputFieldNumber();
  });
/*Ends here*/


	$(document).ready(function(){

      $(document).on('click','.btn-remove', function(){
        $(this).closest('tr').remove();
        calculate(0,0);
        $("#paid").val(0);
      })

    });
</script>


</div>

</div>
</div>

<?=$this->endSection('content')?>

