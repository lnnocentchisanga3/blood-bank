<?= $this->extend('donordataclerk/layouts/base'); ?>
<?=$this->section('content');?>

<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title text-uppercase">List of all the donors from <?="<strong>".$sitedata[0]->donation_site_name."</strong>"." ("."Next donation date ".$sitedata[0]->date_of_next_donation.")";?></h4>
   <!--  <h4 class="page-title"></h4> -->

    <?php if (session()->getTempdata('Success')): ?>
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
     <strong>Success!</strong> <?=session()->getTempdata('Success');?>
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
          <!-- <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2"><a href="<?=base_url()?>/adddonors" class="btn btn-primary my-3"><i class="fa fa-plus"></i> Add Donors</a></div>
          </div> -->
        </div>
        <table class="table table-striped table-hover" id="dataTable1" width="100%">
                <thead>
                    <tr>
                      <th>NO#</th>
                        <th>Sampe ID</th>
                        <th>Firstname</th>
                        <th>Middlename</th>
                        <th>Lastname</th>
                        <th>Blood Group</th>
                        <th>HIV</th>
                        <th>HBV</th>
                        <th>HCV</th>
                        <th>Syphilis</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                   <?php if ($sitedata == null): ?>
                    <tr>
                      <td>No data is available here</td>
                    </tr>
                    <?php else: ?>
                        <?php $i=1; ?>
                      <?php foreach ($sitedata as $row): ?>
                    <tr>
                        <td><?=$i;?></td>
                        <td><?=$row->sample_id?></td>
                        <td><?=$row->donor_fname?></td>
                        <td><?=$row->donor_mname?></td>
                        <td><?=$row->donor_lname?></td>
                        <td><?=$row->blood_group?></td>
                        <td><?=$row->hiv?></td>
                        <td><?=$row->hbv?></td>
                        <td><?=$row->hcv?></td>
                        <td><?=$row->syphilis?></td>
                        <td><?=$row->comment?></td>
                    </tr>
                    <?php $i++; ?>
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

<script>
    $(document).ready(function() {
    $('#dataTable1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
       {
           extend: 'pdf',
           foot: false,
           title: '<h3 class="text-uppercase col-md-12 text-center py-3" style="font-weight: bold; text-decoration: underline;">List of all the donors from <?=$sitedata[0]->donation_site_name?></h3>',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
           
          
       },
       {
           extend: 'excel',
           foot: false,
           title: '<h3 class="text-uppercase col-md-12 text-center py-3" style="font-weight: bold; text-decoration: underline;">List of all the donors from <?=$sitedata[0]->donation_site_name?></h3>',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
       }
       ,
       {
           extend: 'print',
           foot: false,
           title: '<h3 class="text-uppercase col-md-12 text-center py-3" style="font-weight: bold; text-decoration: underline;">List of all the donors from <?=$sitedata[0]->donation_site_name?></h3>',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
          
       }         
    ]
    } );
    } );
</script>


<?=$this->endSection('content')?>

