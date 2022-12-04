<?= $this->extend('layouts/base3'); ?>
<?=$this->section('content');?>

<div class="page-wrapper-base-3">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title"><a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>">Home</a> / Upcoming Dates</h4>
</div>
</div>
<div class="card-box">  
<div class="row col-md-12">
<h4 class="col-md-8 d-inline-block">Upcoming Dates</h4>
<a href="<?=base_url()?>/addsites/<?=$userdata['hospital_id']?>" class="btn btn-primary float-right btn-rounded col-md-4">View all Donation Sites <i class="fa fa-map-marker"></i></a>
</div>
<!-- <button type="button" class="btn btn-primary" >Open modal</button> -->
<div class="table-responsive">
    <table class="table mb-0 table-hover table-striped" id="dataTable">
        <thead class="">
            <tr>
                <th>Visted</th>
                <th>Site</th>
                <th>Next Visit</th>
                <th class="text-right noExport">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($alldonors == null || $alldonors == '' || $alldonors == 0 || $alldonors == false || is_numeric($alldonors)): ?>
            <!-- <tr>
                <td>
                  No data available
                </td>
            </tr> -->
                <?php else: ?>
                    <?php foreach ($alldonors as $row): ?>
            <tr>
                <td>
                    <h2><?=$row->date_of_donation?></h2>
                </td>                 
                <td>
                    <h5 class="time-title p-0"><i class="fa fa-map-marker"></i> <?=$row->donation_site_name?></h5>
                </td>
                <td>
                    <h5 class="time-title p-0"><?=$row->date_of_next_donation?></h5>
                </td>
                <td class="text-right noExport">
                    <a href="<?=base_url()?>/Donationsites/viewsitedate/<?=$row->site_id?>/<?=$row->date_of_donation;?>" class="btn btn-outline-primary btn-rounded">View and Print <i class="fa fa-print"></i></a>
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

<?=$this->endSection('content')?>

