<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content container">
<div class="row">
<div class="col-md-12">
    <h4 class="page-title"><a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">Home</a> / Donation Sites <i class="fa fa-map-marker"></i></h4>

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

<div class="card my-5 col-md-12">
  <div class="card-header">
    <div class="container-fluid">
      <div class="row">
        <div class="card-title col-md-6 text-uppercase">All The Donation Sites</div>
        <div class="col-md-6">
          <button data-toggle="modal" data-target="#addADonationSite" class="col-md-7 offset-md-5 btn btn-primary"> + Add a Donation Site</button>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body">
  <div class="table-responsive">
    <table class="table table-stripped " id="dataTable">
            <thead>
                <tr>
                  <th>No#</th>
                    <th>Donation Site</th>
                    <th class="noExport">Action</th>
                </tr>
            </thead>
            <tbody>
               <?php if ($sites == null): ?>
                <tr>
                  <td>No data is available here</td>
                </tr>
                <?php else: ?>
                  <?php foreach ($sites as $row): ?>
                <tr>
                  <td><?php $num=0; echo $num = $num + 1?></td>
                    <td><?=$row['donation_site_name']?></td>
                    <td class="noExport">
                        <a href="<?=base_url()?>/viewdonationsite/<?=$row['site_id']?>/<?=$row['hospital_id']?>" class="badge badge-warning py-2 px-3 my-2"><i class="fa fa-eye"></i> view</a>

                        <a href="<?=base_url()?>/editSites/<?=$row['site_id']?>/<?=$row['hospital_id']?>" class="badge badge-success py-2 px-3 my-2"><i class="fa fa-edit"></i> edit</a>

                        <!-- <a href="<?=base_url()?>/deleteSite/<?=$row['site_id']?>/<?=$row['hospital_id']?>" class="badge badge-danger py-2 px-3 my-2"><i class="fa fa-trash"></i></a> -->

                        <button value="<?=$row['site_id']?>" class="btn btn-danger py-1 px-2 my-1" onclick="getval(this.value)" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o "></i> delete</button>
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

        html+='<td><input type="text" class="form-control" placeholder="Donation site" name="donationsite[]" <?=set_value('donationsite[]')?> request></td>';

        html+='<td><button type="button" name="remove" class="btn btn-danger btn-sm btn-remove"><i class="fa fa-remove"></i></button></td>'

        let number = localStorage.getItem("numInputs");

        if (number == null || number == 0){

        }else{
          while(i < number){
          $('#donationSite').append(html);
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




<?=$this->endSection('content')?>

