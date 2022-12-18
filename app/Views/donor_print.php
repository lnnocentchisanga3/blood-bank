<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title" id="page-title"><a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">Home</a> / Donor Details</h4>
    
</div>
</div>
<div class="card-box" id="pagePrint">  
<div class="row col-md-12">
<h4 class="col-md-10 text-center text-uppercase d-inline-block">DETAILS OF <?=$donor[0]->donor_fname."  ".$donor[0]->donor_lname; ?></h4>
<button class="col-md-2 btn btn-warning" onclick="PrintPage()" id="printBtn"><i class="fa fa-print"></i> Print</button>

<!-- /.card-heading -->
<div class="card-body">
    <div class="row">
    	 <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donor Personal Information</h4>
        <div class="col-md-3 my-3">
         <img class="" src="<?=base_url()?>/public/assets/img/user.jpg" width="200px">
        </div>
        <div class="col-md-3 my-3">
        	<h5 class="col-md-12 my-3">Donor ID : <span><?php echo $donor[0]->donor_id; ?></span></h5>

            <h5 class="col-md-12 my-3">Donor Names : <span><?php echo $donor[0]->donor_fname."  ".$donor[0]->donor_lname; ?></span></h5>
        
             <h5 class="col-md-12 my-3">Gender : <span><?php echo $donor[0]->gender?></span></h5>

             <h5 class='col-md-12'>Date Of Birth : <span><?=$donor[0]->datebirth?></span></h5>

             <h5 class='col-md-12'>Donation Site : <span><?=$donor[0]->donation_site_name?></span></h5>
        
        </div>
        <div class="col-md-4 my-3">
        	<h5 class="col-md-12 my-3">Country : <span><?php echo $donor[0]->nationality; ?></span></h5>

            <h5 class="col-md-12 my-3">NRC : <span><?php echo $donor[0]->nrc; ?></span></h5>

            <h5 class="col-md-12">Number of Donations : <span><?php echo $donor[0]->number_of_donations; ?></span></h5>

            <h5 class="col-md-12 my-3">Donation Status </h5>
            <?php if ($donor[0]->donation_status == "Can Donate"){ ?>
                <span class="bg-success text-white py-2 px-2 mx-3 my-3">Can Donate <i class="fa fa-map-marker"></i></span>
           <?php }elseif($donor[0]->donation_status == ""){ ?>
               <span>Under Review....</span>
            <?php }else{ ?>
                <span class="bg-danger text-white py-2 px-2 mx-3 my-3">Can Not Donate <i class="fa fa-close"></i></span>
           
            <?php }?>
        </div>
    </div>
    
    <div class="row">
    	 <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donor Contact  Details</h4>
        <div class="col-md-12 my-3">
           <h5 class="col-md-12 my-3">Phone : <span><a href="tel:<?php echo $donor[0]->phone; ?>"><?php echo $donor[0]->phone; ?></a></span></h5>
        
            <h5 class="col-md-12 my-3">Address : <span><?php echo $donor[0]->residentialAddress; ?></span></h5>
        
            <h5 class="col-md-12 my-3">Email : <span><a href="mailto: <?php echo $donor[0]->email; ?>"><?php echo $donor[0]->email; ?></a></span></h5>
        </div>
    </div>
    
    <div class="row">
    	 <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Other Information</h4>
        <div class="col-md-6">
           <h5 class="col-md-12 my-3">Marital Status : <span><?php echo $donor[0]->marital_status; ?></span></h5> 
        
        <h5 class="col-md-12 my-3">Next Of Kin : <span><?php echo $donor[0]->next_of_kin; ?></span></h5>
    
         <h5 class="col-md-12 my-3">Blood Group : <span><?=$donor[0]->blood_group?></span></h5>
         <h5 class="col-md-12 my-3">Occupation : <?=$donor[0]->occupation; ?></h5>
        
            <h5 class="col-md-12 my-3">Date Added : </h5><?php echo $donor[0]->added_on; ?>
        </div>
    </div>

    <div class="row" id="PrintedData">
         <h4 style="font-weight: bold;" class="col-md-12 text-uppercase py-2 border-bottom">Donation History</h4>

         <div class="table-responsive">
        <table class="table table-stripped " id="dataTablePrint">
        <thead>
            <tr>
                <th>NO#</th>
                <th>Sampe_ID</th>
                <th>HIV</th>
                <th>HBV</th>
                <th>HCV</th>
                <th>Syphilis</th>
                <th>Comment</th>
                <th>Date_of_Donation</th>
            </tr>
        </thead>

        <!-- <tfoot>
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
        </tfoot> -->
        <tbody>
           <?php if ($donationhistory == null): ?>
            <!-- <tr>
                <td>No data is available here</td>
            </tr> -->
            <?php else: ?>
                <?php foreach ($donationhistory as $row): ?>
            <tr>
                <td><?php $num1=0; $num1 = $num1 + 1?></td>
                <td><?=$row->sample_id?></td>
                <td>
                    <?php if ($row->hiv == null): ?>
                        still processing...
                    <?php else: ?>
                        <?=$row->hiv?>
                    <?php endif ?>
                </td>
                <td>
                    <?php if ($row->hbv == null): ?>
                        still processing...
                    <?php else: ?>
                        <?=$row->hbv?>
                    <?php endif ?>
                </td>
                <td>
                    <?php if ($row->hcv == null): ?>
                        still processing...
                    <?php else: ?>
                        <?=$row->hcv?>
                    <?php endif ?>
                </td>
                <td>
                    <?php if ($row->syphilis == null): ?>
                        still processing...
                    <?php else: ?>
                        <?=$row->syphilis?>
                    <?php endif ?>
                </td>
                <td>
                    <?php if ($row->comment == null): ?>
                        still processing...
                    <?php else: ?>
                        <?=$row->comment?>
                    <?php endif ?>
                </td>
                <td><?=$row->date_of_donation?></td>
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
		function PrintPage() {
		var dis1 = document.getElementById("page-title");
		var dis2 = document.getElementById("header");
        var dis3 = document.getElementById('printBtn');
        var dis4 = document.getElementById('pagePrint');

		dis1.style.display = "none";
		dis2.style.display = "none";
        dis3.style.display = "none";
        //dis4.style.backgroundImage = "url('<?= base_url();?>/public/assets/img/logo-dark.png')";
		
		var page = document.getElementById('pagePrint').innerHTML;

		print(page);

        window.location.assign(window.location.pathname);
		// window.location = "<?=base_url()?>/listdonors/<?=$donor[0]->hospital_id?>";

	}
</script>


<?php if ($donor == null || $donor == "" || $donor == 0): ?>
    <?php else: ?>
        <script>
            $(document).ready(function() {
    $('#dataTablePrint').DataTable( {
        dom: 'Bfrtip',
        buttons: [
       {
           extend: 'pdf',
           foot: false,
           title: '<?=$donor[0]->donor_fname."  ".$donor[0]->donor_lname; ?> Donation History',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
           
          
       },
       {
           extend: 'excel',
           foot: false,
           title: '<?=$donor[0]->donor_fname."  ".$donor[0]->donor_lname; ?> Donation History',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
       }
       ,
       {
           extend: 'print',
           foot: false,
           title: '<?=$donor[0]->donor_fname."  ".$donor[0]->donor_lname; ?> Donation History',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
          
       }         
    ]
    } );
    } );

        </script>
<?php endif ?>

<?=$this->endSection('content')?>

