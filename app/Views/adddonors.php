<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">Home</a> / Donors / Add a Donor</h4>

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
            <div class="col-md-10"></div>
            <div class="col-md-2"><a href="<?=base_url()?>/listdonors/<?=$userdata['hospital_id']?>" class="btn btn-primary my-3 btn-rounded"><i class="fa fa-folder-open"></i> View Donors</a></div>
          </div>
        </div>

        <div class="input-group">
          <label class="text-center col-md-12">Enter the number of Donors you want to add</label><br>
        <input type="number" name="num" id="numberOfDonors" class="form-control col-md-6 offset-md-3 ">
        <button class="btn btn-primary" onclick="createInputs()">Add Input</button>
       </div>

       <form action="<?=base_url()?>/adddonors/index/<?=$userdata['hospital_id']?>" method="POST">
       <div class="input-group col-md-12 my-4 container">
          <div class="row">
          <label class="px-2 my-2 col-md-2">Date of Donation</label>
        <div class="col-md-10">
         <!--  <div class="cal-icon"> -->
          <input type="date" name="dod" class="form-control" value="<?=set_value('dod')?>" required>
        <!-- </div> -->
        </div><br><br><br>
        <label class="px-2 my-2 col-md-2">Date of Next Donation</label>
        <div class="col-md-10">
          <!-- <div class="cal-icon"> -->
          <input type="date" name="donextd" class="form-control" value="<?=set_value('dod')?>" required>
        <!-- </div> -->
        </div>
        <input type="text" name="province" value="<?=$userdata['province_id']?>" hidden>
        <input type="text" name="district" value="<?=$userdata['district_id']?>" hidden>

        <label class="px-2 my-2 col-md-2">Donation Site</label>
         <select name="site" class="form-control">
          <?php if ($sites == null || $sites == '' || $sites == 0): ?>
            <option>0 Sites Found</option>
          <?php else: ?>
            <?php foreach ($sites as $row): ?>
              <option value="<?=$row['site_id']?>"><?=$row['donation_site_name']?></option>
            <?php endforeach ?>
          <?php endif ?>
        </select>
        </div>
       </div>

        <table class="table table-stripped" style="width: 100%;">
        <thead>
        <tr>
          <!-- <th>No#</th> -->
        <th>Donor_SampleID</th>
        <th>Donor_Firstname</th>
        <th>Donor_Middlename</th>
        <th>Donor_Lastname</th>
        <th>HIV(1,2,22,R)</th>
        <th>HBV(1,2,22,R)</th>
        <th>HCV(1,2,22,R)</th>
        <th>Syphilis(1,2,22,R)</th>
        <th>Status_Comment</th>
        <th>Blood_Group</th>
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
        <input type="submit"  value="Submit" name="submit" class="btn btn-primary btn-rounded my-3">
        <!-- <a href="order.php" class="btn btn-warning">Kembali</a> -->
        </div>
        <?=form_close()?>
      </div>
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
          document.getElementById('inputAlert').innerHTML = addAlert("Please enter a number greater than or equal to 1 and not greater than 10");
        }else if (num > 10){
          document.getElementById('inputAlert').innerHTML = addAlert("The number provided is greater than 10");
        }else if (num < 0){
          document.getElementById('inputAlert').innerHTML = addAlert("Nagative numbers are not allowed");
        }else{
          localStorage.setItem('numInputs', num);

         location.reload();

        getInputFieldNumber();
        }
    }

    function addAlert(msg) {
      var html = "";

      html+='<div class="alert alert-danger ">';
      html+='<button type="button" class="close" data-dismiss="alert">&times;</button>';
      html+='<strong>warning ! </strong>'+msg;
      html+='</div>';

      return html;
    }


    /*Ends here*/


    /*Script to load input fields*/
    function getInputFieldNumber(){

    let i = "";
    let html = "";




        html+='<tr>';
        /*html +='<td><input type="number" class="form-control" id="num" readonly></td>';*/

        html+='<td><input type="text" class="form-control" required placeholder="Sample ID" name="sampleid[]" <?=set_value('sampleid[]')?> ></td>';

        html+='<td><input type="text" class="form-control" required placeholder="Firstname" name="fnames[]" <?=set_value('')?>></td>';
        html+='<td><input type="text" class="form-control"  placeholder="Middle name (Optional)" name="mnames[]" <?=set_value('')?>></td>';
        html+='<td><input type="text" class="form-control" required placeholder="Lastname" name="lnames[]" <?=set_value('')?>></td>';

        html+='<td><select class="form-control" name="hiv[]" <?=set_value('hiv[]')?>><option>0</option><option>1</option><option>2</option><option>22</option><option>R</option></select></td>';
        html+='<td><select class="form-control" name="hbv[]" <?=set_value('hbv[]')?>><option>0</option><option>1</option><option>2</option><option>22</option><option>R</option></select></td>';
        html+='<td><select class="form-control" name="hcv[]" <?=set_value('hcv[]')?>><option>0</option><option>1</option><option>2</option><option>22</option><option>R</option></select></td>';
        html+='<td><select class="form-control" name="syphilis[]" <?=set_value('syphilis[]')?>><option>0</option><option>1</option><option>2</option><option>22</option><option>R</option></select></td>';
        html+='<td><input type="text" class="form-control" placeholder="Comment" name="comment[]"<?=set_value('comment[]')?>></td>';
        html+='<td><select class="form-control" name="group"><option>0</option><option>A</option><option>B</option><option>O</option><option>A+</option><option>A-</option><option>O+</option><option>O-</option></select></td>';
        html+='<td><button type="button" name="remove" class="btn btn-danger btn-sm btn-remove"><i class="fa fa-remove"></i></button></td>'
        html+='</tr>'

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


<?=$this->endSection('content')?>

