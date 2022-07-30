<?= $this->extend('layouts/base2'); ?>
<?=$this->section('content');?>

<div class="page-wrapper">
<div class="content">
<div class="row">
<div class="col-sm-12">
    <h4 class="page-title">List of all donation sites</h4>

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
			<div class="table-responsive">
				<div class="container-fluid">
					<div class="row">
                        <!--  -->
					</div>
				</div>
				<table class="table table-stripped " id="dataTable">
                <thead>
                    <tr>
                        <th>Site</th>
                        <th>Action</th>
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
                        <td><?=$row->site?></td>
                        <td>
                            <a href="<?=base_url()?>/donationsites/view/<?=$row->site?>" class="badge badge-warning py-2 col-sm-6 my-2"><i class="fa fa-eye"></i> View </a>
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
</div>


<?=$this->endSection('content')?>

