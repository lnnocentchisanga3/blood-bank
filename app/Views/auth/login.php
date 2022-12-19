<?= $this->extend('layouts/base1'); ?>
<?=$this->section('content');?>

<div class="main-wrapper account-wrapper bg-login">
        <div class="account-page">
			<div class="account-center">
                
				<div class="account-box shadow-sm rounded">   
            <?=form_open()?>	
			<div class="account-logo row p-2 rounded shadow-sm" id="internetStatusBg">
                <a href="<?= base_url();?>" class="col-md-2"><img src="<?= base_url();?>/public/assets/img/logo-dark.png" alt=""></a>
                 <h5 class="col-md-10"> Zambia National Blood Transfusion Service Donor's Database</h5>
                 <div class="row col-md-12 text-uppercase">
                     <small class="col-md-12 text-center" id="internetStatus"> </small>
                 </div>

                <?php if (session()->getTempdata('error')): ?>
                <div class="alert alert-danger mt-2 col-md-12">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                 <strong>Warning !</strong> <?=session()->getTempdata('error');?>
                </div>
              <?php endif ?>

            </div>
                    
                    <h5 class="col-md-12 text-center">Login to your account</h5>
                        <div class="form-group mt-4">
                            <label>User ID</label>
                            <input type="text" name="email" autofocus="on" placeholder="Enter the user ID" class="form-control border" value="<?= set_value("email")?>">
                           
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control border" placeholder="Enter the password" value="<?=set_value("password")?>">
                            
                        </div>
                        <!-- <div class="form-group text-right">
                            <a href="forgot-password.html">Forgot your password?</a>
                        </div> -->
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary account-btn">Login</button>
                        </div>
                        <div class="text-center register-link">
                            Designed and Developed By <a href="<?=base_url()?>/Login/about_developer" class="text-primary">Chisanga Innocent</a>
                        </div>
                    <?=form_close();?>
                </div>
			</div>
        </div>
    </div>

    <script>
        // function myFunction() {
        //   var x = "Is the browser online? " + navigator.onLine;
        //   document.getElementById("demo").innerHTML = x;
        // }


        setInterval(function(){
            if (navigator.onLine == false){
                //document.getElementById('internetStatusBg').style.backgroundColor = "palevioletred";
                document.getElementById('internetStatus').innerHTML = "<div class='text-danger'><i class='fa fa-globe'></i> No Internet Connection </div>";
            }else{
                document.getElementById('internetStatus').innerHTML = "<div class='text-success'><i class='fa fa-globe'></i> You are Connected to the Internet </div>";
            }
        },2000);
    </script>

<?=$this->endSection('content');?>