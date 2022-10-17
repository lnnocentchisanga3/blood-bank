<div class="input-group">
    <label class="text-center col-md-12">Enter the number of Donors you want to add</label><br>
  <input type="number" name="num" id="numberOfDonors" class="form-control col-md-6 offset-md-3 ">
  <button class="btn btn-primary" onclick="createInputs()">Add Input</button>
 </div>

 <form action="<?=base_url()?>/adddonors/index/<?=$userdata['hospital_id']?>" method="POST">
 <div class="input-group col-md-12 my-4 container">
    <div class="row">
    <label class="px-2 my-2 col-md-2">Date of Donation</label>
  <input type="date" name="dod" class="form-control col-md-10" value="<?=set_value('dod')?>"><br><br><br>
  <label class="px-2 my-2 col-md-2">Date of Next Donation</label>
  <input type="date" name="donextd" class="form-control col-md-10" value="<?=set_value('donextd')?>">
  <input type="text" name="province" value="<?=$userdata['province_id']?>" hidden>
  <input type="text" name="district" value="<?=$userdata['district_id']?>" hidden>

  <label class="px-2 my-2 col-md-2">Donation Site</label>
   <select name="site" class="form-control">
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
 <div class="col-sm-12">
    <div class="card-box">
        <div class="card-block">
<div class="table-responsive">

  <table class="table table-stripped" style="width: 100%;">
<thead>
<tr>
  <!-- <th>No#</th> -->
<th>DonorSampleID</th>
<th>DonorFirstname</th>
<th>DonorMiddlename</th>
<th>DonorLastname</th>
<th>HIV(1,2,22,R)</th>
<th>HBV(1,2,22,R)</th>
<th>HCV(1,2,22,R)</th>
<th>Syphilis(1,2,22,R)</th>
<th>StatusComment</th>
<th>BloodGroup</th>
<th>Remove</th>
</tr>

</thead>
<tbody id="myOrder">
<!-- <tr>
  <td><img src="<?=base_url()?>/public/assets/img/load-indicator.gif"></td>
</tr> -->
</tbody>
</table>
</div>
</div>
</div>
</div>
<div class="box-footer" >
<input type="submit"  value="Submit" name="submit" class="btn btn-primary my-3">
<!-- <a href="order.php" class="btn btn-warning">Kembali</a> -->
</div>
<?=form_close()?>