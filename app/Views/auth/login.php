<?= $this->extend('layouts/base1'); ?>
<?=$this->section('content');?>

<div class="main-wrapper account-wrapper bg-login">
        <div class="account-page">
			<div class="account-center">
                
				<div class="account-box shadow-sm rounded">   
            <form action="<?=base_url()?>/login/index" method="POST">	
			<div class="account-logo row p-2 rounded shadow-sm">
                <a href="<?= base_url();?>" class="col-md-2"><img src="<?= base_url();?>/public/assets/img/logo-dark.png" alt=""></a>
                 <h3 class="col-md-10"> Zambia National Blood Transfusion Service</h3>

                <?php if (session()->getTempdata('error')): ?>
                    <h5 class="text-center bg-danger text-white py-2 rounded col-md-12"><?=session()->getTempdata('error');?></h5>
                <?php endif ?>

                 <?php if ($info != null): ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>Warning!</strong> <?=$info?>
                </div>
                 <?php endif ?>

            </div>
                    <div>
                        <?php if ($loginerrors): ?>
                            <h4 class="py-2 bg-danger text-white text-center"><?=$loginerrors?></h4>
                        <?php endif ?>
                    </div>
                    <h5 class="col-md-12 text-center">Login to your account</h5>
                        <div class="form-group mt-4">
                            <label>User ID</label>
                            <input type="text" name="email" autofocus="on" placeholder="Enter the user ID" class="form-control border" value="<?= set_value("email")?>">
                            <small class="text-danger"><?= display_error($validation, 'email')."*"; ?></small>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control border" placeholder="Enter the password" value="<?=set_value("password")?>">
                            <small class="text-danger"><?= display_error($validation, 'password')."*"; ?></small>
                        </div>
                        <!-- <div class="form-group text-right">
                            <a href="forgot-password.html">Forgot your password?</a>
                        </div> -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
<!--                        <div class="text-center register-link">
                            Don’t have an account? <a href="register.html">Register Now</a>
                        </div>-->
                    <?=form_close();?>
                </div>
			</div>
        </div>
    </div>

<?=$this->endSection('content');?>