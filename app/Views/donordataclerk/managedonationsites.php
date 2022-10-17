<?= $this->extend('donordataclerk/layouts/base'); ?>
<?=$this->section('content');?>

<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><a href="<?=base_url()?>/donordataclerk/index/<?=$userdata['hospital_id']?>">Home</a> / Donation Sites <i class="fa fa-map-marker"></i></h4>
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

<div class="card my-5 col-md-4 mx-2">
  <div class="card-body">

  <div class="input-group my-3">
  <label class="text-center col-md-12">Enter the number of Donation Sites you want to add</label><br>
  <input type="number" name="num" id="numberOfDonors" class="form-control col-md-12">
  <button class="btn btn-primary" onclick="createInputs()">Add Input</button>
 </div>

  <form action="<?=base_url()?>/dashboard/managedonationsites/<?=$userdata['hospital_id']?>" method="POST">
<div class="table-responsive">
  <table class="table table-bordered table-hover table-striped  mt-5 col-md-12" >
<thead>
<tr>
  <!-- <th>No#</th> -->
<th>Donation Site</th>
<th>Remove</th>
</tr>

</thead>
<tbody id="donationSite">
<!-- <tr>
  <td><img src="<?=base_url()?>/public/assets/img/load-indicator.gif"></td>
</tr> -->
</tbody>
</table>
</div>
<div class="box-footer" >
<input type="submit"  value="Submit" name="submit" class="btn btn-primary btn-rounded my-3">
<!-- <a href="order.php" class="btn btn-warning">Kembali</a> -->
</div>
</div>
</div>
<?=form_close()?>
  

<div class="card my-5 col-md-7">
  <div class="card-header">
    <div class="card-title">All The Donation Sites</div>
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
                  <td><?=$num = $num + 1?></td>
                    <td><?=$row['donation_site_name']?></td>
                    <td class="noExport">
                        <a href="<?=base_url()?>/viewdonationsitedata/<?=$row['site_id']?>/<?=$row['hospital_id']?>" class="badge badge-warning py-2 px-3 my-2"><i class="fa fa-eye"></i></a>

                        <a href="<?=base_url()?>/editSitesData/<?=$row['site_id']?>/<?=$row['hospital_id']?>" class="badge badge-success py-2 px-3 my-2"><i class="fa fa-edit"></i></a>

                        <!-- <a href="<?=base_url()?>/deleteSite/<?=$row['site_id']?>/<?=$row['hospital_id']?>" class="badge badge-danger py-2 px-3 my-2"><i class="fa fa-trash"></i></a> -->

                        <button value="<?=$row['site_id']?>" class="btn btn-danger py-1 px-2 my-1" onclick="getval(this.value)" data-toggle="modal" data-target="#delete_employee"><i class="fa fa-trash-o "></i></button>
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

<script>
	/*script to take input number*/

	function createInputs() {
		let num = document.getElementById('numberOfDonors').value;

        if (num == null || num == 0){
          window.alert("Please enter a value");
        }else{
          localStorage.setItem('siteInputs', num);

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

        html+='<td><input type="text" class="form-control" placeholder="Donation site" required name="donationsite[]" <?=set_value('donationsite[]')?> request></td>';

        html+='<td><button type="button" required name="remove" class="btn btn-danger btn-sm btn-remove"><i class="fa fa-remove"></i></button></td>'

        let number = localStorage.getItem("siteInputs");

        if (number == null || number == 0){

        }else{
          while(i < number){
          $('#donationSite').append(html);
          /*document.getElementById('num').value = i+1;*/

          i++;
        }
        }

     

      $(document).on('click','.btn-remove', function(){
        $(this).closest('tr').remove();
        let num = localStorage.getItem("siteInputs");
        let total = num-1;
        localStorage.setItem('siteInputs', total);
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

<div id="delete_employee" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <img src="<?=base_url()?>/public/assets/img/sent.png">
                        <h3>Are you sure want to delete this Donation Site ?</h3>
                        <div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <a id="addAttri" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function getval(uid) {
                document.getElementById('addAttri').setAttribute("href", "<?=base_url()?>/deleteSiteData/"+uid+"/"+"<?=$userdata['hospital_id']?>");
            }
        </script>

<?=$this->endSection('content')?>

