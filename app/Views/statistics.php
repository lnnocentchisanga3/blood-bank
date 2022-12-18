<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">Home</a> / Statistics</h4>
</div>
</div>
<div class="card-box">
<!-- <button type="button" class="btn btn-primary" >Open modal</button> -->

<div class="content">
<div class="row">

</div>

<div class="row">
<div class="col-md-12 container-fluid">
    <div class="row">
<div class="container-fluid border-bottom py-2 mb-4">
    <div class="row">
        <h4 class="col-md-6 text-uppercase ">Blood Collection Statistics for (<?=$year_added?>)</h4>
        <div class="col-md-6">
            <h4>Select a Year Your want to see the Statistics</h4>
            <select class="select" onchange="getYearAndPass(this.value)">
                <option value="0">--- Select a Year ---</option>
                <?php
                $x = "2001";
                $y = date("Y");
                while($y >= $x) {
                  echo "<option value='$y'>$y</option>";
                  $y--;
                }
                ?>
            </select>
        </div>
    </div>
</div>

    <div class="col-md-3 col-sm-3  col-lg-3">
        <div class="profile-widget bg-danger text-white">
            <h4 class="doctor-name text-ellipsis"></h4>
            <div class="user-country">
                <h5>HIV</h5>
           <?php if ($hiv == null || $hiv == 0): ?>
            <small>No Data Found</small>
               <?php else: ?>
                <?php if ($hiv == 1): ?>
                    <?=$hiv?> <small>Donor</small>
                <?php else: ?>
                    <?=$hiv?> <small>Donors</small>
                <?php endif ?>
           <?php endif ?><br>  
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-3  col-lg-3">
        <div class="profile-widget bg-warning text-white">
            <h4 class="doctor-name text-ellipsis"></h4>
            <div class="user-country">
                <h5>HBV</h5>
           <?php if ($hbv == null || $hbv == 0): ?>
            <small>No Data Found</small>
               <?php else: ?>
                <?php if ($hbv == 1): ?>
                    <?=$hbv?> <small>Donor</small>
                <?php else: ?>
                    <?=$hbv?> <small>Donors</small>
                <?php endif ?>
           <?php endif ?><br>  
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-3  col-lg-3">
        <div class="profile-widget bg-success text-white">
            <h4 class="doctor-name text-ellipsis"></h4>
            <div class="user-country">
                <h5>HCV</h5>
           <?php if ($hcv == null || $hcv == 0): ?>
            <small>No Data Found</small>
               <?php else: ?>
                <?php if ($hcv == 1): ?>
                    <?=$hcv?> <small>Donor</small>
                <?php else: ?>
                    <?=$hcv?> <small>Donors</small>
                <?php endif ?>
           <?php endif ?><br>  
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-3  col-lg-3">
        <div class="profile-widget bg-primary text-white">
            <h4 class="doctor-name text-ellipsis"></h4>
            <div class="user-country">
                <h5>Syphilis</h5>
           <?php if ($syphilis == null || $syphilis == 0): ?>
            <small>No Data Found</small>
               <?php else: ?>
                <?php if ($syphilis == 1): ?>
                    <?=$syphilis?> <small>Donor</small>
                <?php else: ?>
                    <?=$syphilis?> <small>Donors</small>
                <?php endif ?>
           <?php endif ?><br>  
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-3  col-lg-3">
        <div class="profile-widget bg-dark text-white">
            <h4 class="doctor-name text-ellipsis"></h4>
            <div class="user-country">
                <h5>Discards</h5>
           <?php if ($Discards == null || $Discards == 0): ?>
            <small>No Data Found</small>
               <?php else: ?>
                <?php if ($Discards == 1): ?>
                    <?=$Discards?> <small>Donor</small>
                <?php else: ?>
                    <?=$Discards?> <small>Donors</small>
                <?php endif ?>
           <?php endif ?><br>  
            </div>
        </div>
    </div>

    </div>
</div>
<div class="col-md-8">
 <div class="card-box">
    <div class="card-body">
        <div class="chart-title">
            <h4 class="col-md-12 py-4 text-uppercase border-bottom">Blood Collected This year (<?=$year_added?>)</h4>
            <div class="float-right">
                <ul class="chat-user-total">
                    <!-- <li><i class="fa fa-circle current-users" aria-hidden="true"></i>Okay</li>
                    <li><i class="fa fa-circle old-users" aria-hidden="true"></i> Discards</li> -->
                </ul>
            </div>
        </div>  
        <canvas id="bargraph" style="height: 30vh">
            
        </canvas>
    </div>
</div>
</div>


<!-- All the Sites -->
<div class="col-4 col-md-4 col-lg-4 col-xl-4">
<!-- <div class="hospital-barchart">
    <h4 class="card-title d-inline-block">Blood Collected This Year In All the Sites</h4>
</div> -->
<div class="bar-chart">
    <div class="legend">
        <div class="item">
            <h4>Level1</h4>
        </div>
        
        <div class="item">
            <h4>Level2</h4>
        </div>
        <div class="item text-right">
            <h4>Level3</h4>
        </div>
        <div class="item text-right">
            <h4>Level4</h4>
        </div>
    </div>
    <div class="chart clearfix">
        
        <?php if ($statistics == null || $statistics == 1 || $statistics == false || is_numeric($statistics)): ?>
        <h5>No Data Found</h5>
        <?php else: ?>
            <h4 class="col-md-12 text-center text-uppercase border-bottom">Total Number Of All The Donors This Year (<?=$year_added?>) <?php $num = count($donors); echo $num;?> Donors</h4>

            <?php foreach ($statistics as $row): ?>
                <?php
                $allpercent = 100;
                $total = count($donors);
                $x = "";
                $sitedat = $row->num;

                $hold =  $sitedat/$allpercent;
                $x = $hold * $total;

                echo $x."%";
                ?>
                <div class="item">
                    <div class="container">
                      <div class="progress bg-warning rounded-0" style="height:40px" data-toggle="tooltip" data-placement="left" title="<?=$row->donation_site_name?> [ <?=$row->num?> Donors ]">
                        <div class="progress-bar  bg-primary progress-bar-animated text-white" style="width:<?=$x?>%; height: 40px;"><span class="px-2"><?=$row->donation_site_name?> [ <?=$row->num?> Donors ]</span></div>
                      </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
        
    </div>
</div>
</div>


<!-- End All the sites -->
</div>
</div>

</div>
</div>
</div>

<?php
                
if ($statistics == null || $statistics == 1 || $statistics == false || is_numeric($statistics)) {
       ?>
       <script>
           var c = document.getElementById("bargraph");
           var ctx = c.getContext("2d");
           ctx.font = "15px Arial";
           ctx.textAlign = "left";
           ctx.fillText("No Data Found", 10, 50);
       </script>
       <?php
   }else{
     echo "<script>
    $(document).ready(function(){
        var barChartData = {";
        echo "labels: [";
        foreach($statistics as $row) {
        echo "'".substr($row->donation_site_name, 0,10)."',";
            }
        echo " ],";
        echo "datasets: [{
            label: 'Donors 1',
            backgroundColor: 'rgba(0, 158, 251, 0.5)',
            borderColor: 'rgba(0, 158, 251, 1)',
            borderWidth: 1,";
           echo "data: ["; 

  foreach($statistics as $row){
       /*print_r();*/
        echo round($row->num,0,PHP_ROUND_HALF_ODD).",";
        }
           echo ",]";
        echo "}
        ]
    };

    var ctx = document.getElementById('bargraph').getContext('2d');
    window.myBar = new Chart(ctx, {
        type: 'bar',
        data: barChartData,
        options: {
            responsive: true,
            legend: {
                display: false,
            }
        }
    });
    });
</script>";
   }
  
 ?>

 <script>
     function getYearAndPass(value) {
        //window.location = '';
        window.location.assign("<?=base_url()?>/statistics/<?=$userdata['hospital_id']?>/"+value);
         //window.alert();
     }
 </script>

 

<?=$this->endSection('content')?>

