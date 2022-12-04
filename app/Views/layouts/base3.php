<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>/public/assets/img/logo-dark1.jpg">
    <title>
        <?php 
        global $title;
        ?>
        <?php if ($title == null || $title == ""): ?>
            <?php else: ?>
                <?=esc($title);?>
        <?php endif ?>
    </title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>/public/assets/css/style.css">
    <script src="<?= base_url();?>/public/assets/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        function zoom() {
            document.body.style.zoom = "80%" 
        }
    </script>

    <!--[if lt IE 9]>
        <script src="<?= base_url();?>/public/assets/js/html5shiv.min.js"></script>
        <script src="<?= base_url();?>/public/assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body >
    <div class="loader"></div>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>" class="logo">
                    <img src="<?= base_url();?>/public/assets/img/logo-dark.png" width="35" height="35" alt=""> <span>ZNBTS</span>
                </a>
            </div>

            <div class="dropdown float-left mt-2">
                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bars"></i> Menu
                </button>
                <div class="dropdown-menu">
                  <span class="dropdown-item-text">Select one of the options Below</span>
                  <a class="py-2 new-menu dropdown-item" href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>"><i class="fa fa-home"></i> Back to home</a>
                  <a class="py-2 new-menu dropdown-item" href="<?=base_url()?>/addsites/<?=$userdata['hospital_id']?>"><i class="fa fa-map-marker"></i> Donation Sites</a>
                  <a class="py-2 new-menu dropdown-item" href="<?=base_url()?>/listdonors/<?=$userdata['hospital_id']?>"><i class="fa fa-users"></i> Donors</a>
                  <a class="py-2 new-menu dropdown-item" href="#"><i class="fa fa-paste"></i> Local Blood Bank Inverntory</a>
                  <a class="py-2 new-menu dropdown-item" href="#"><i class="fa fa-paste"></i> Blood bank Inverntory</a>
                  <a class="py-2 new-menu dropdown-item" href="<?=base_url()?>/statistics/<?=$userdata['hospital_id']?>"><i class="fa fa-bar-chart"></i> Statistics</a>
                  <a class="py-2 new-menu dropdown-item" href="<?=base_url()?>/upcoming/<?=$userdata['hospital_id']?>"><i class="fa fa-calendar"></i> Upcoming Dates</a>
                  <a class="py-2 new-menu dropdown-item" href="<?=base_url()?>/reports/<?=$userdata['hospital_id']?>"><i class="fa fa-copy"></i> Blood Collection Reports</a>
                  <a class="py-2 new-menu dropdown-item-text" href="<?=base_url()?>/oneAdddonor/<?=$userdata['hospital_id']?>"><i class="fa fa-user-plus"></i> Add a Donor</a>

                  <?php if ($userdata['user_role'] == 'admin' || $userdata['user_role'] == 'donor_data_clerk'): ?>
                      <a class="py-2 new-menu dropdown-item-text" href="<?=base_url()?>/adddonors/<?=$userdata['hospital_id']?>"><i class="fa fa-user-plus"></i> Add Multiple Donors</a>
                  <?php endif ?>
                </div>
              </div>


            <!-- <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a> -->


            <ul class="nav user-menu float-right">
                
                <li class="nav-item dropdown has-arrow">
                    <a href="#" class="dropdown-toggle nav-link user-link" data-toggle="dropdown">
                        <span class="user-img">
                            <img class="rounded-circle" src="<?= base_url();?>/public/assets/img/user.jpg" width="24" alt="Admin">
                            <span class="status online"></span>
                        </span>
                        <span>
                            <?php
                            echo strtoupper($userdata['fname']." ".$userdata['lname']);
                            ?>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?=base_url()?>/logout">Logout</a>
                    </div>
                </li>
            </ul>
            <div class="dropdown mobile-user-menu float-right">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                <div class="dropdown-menu dropdown-menu-right">
                    <!-- <a class="dropdown-item" href="profile.html">My Profile</a>
                    <a class="dropdown-item" href="edit-profile.html">Edit Profile</a>
                    <a class="dropdown-item" href="settings.html">Settings</a> -->
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </div>
        </div>

 <?= $this->renderSection('content'); ?>

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
                document.getElementById('addAttri').setAttribute("href", "<?=base_url()?>/deleteSite/"+uid+"/"+"<?=$userdata['hospital_id']?>");
            }
        </script>


    <div id="addADonationSite" class="modal fade" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Add a Donation Site</h3>
                    </div>
                    <div class="modal-body">
                        <form action="<?=base_url()?>/dashboard/addsites/<?=$userdata['hospital_id']?>" method="POST">
                        <input type="text" class="form-control" placeholder="Donation site" name="donationsite" <?=set_value('donationsite')?> request>
                        <input type="submit"  value="Save a Donation site" name="submit" class="btn btn-primary my-3">
                        <?=form_close()?>
                    </div>
                </div>
            </div>
        </div>

    <!-- The Modal -->
    <div class="modal fade " id="editDonorDetails" role="dialog">
      <div class="modal-dialog modal-dialog-scrollable modal-xl" style="width: 100%;">
        <div class="modal-content" id="pasteData">


          </div>
        </div>
      </div>
    </div>

    <script>
        function getDonorDetails(uid) {
            const xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("pasteData").innerHTML =
                  this.responseText;
                }
              };
              xhttp.open("GET", "<?=base_url()?>/Listdonors/edit_donor_one/"+uid+"/<?=$userdata["hospital_id"]?>");
              xhttp.send();
        }
    </script>

    <!-- End Dialog -->  

</div>

  <div class="sidebar-overlay" data-reff=""></div>
    <script src="<?= base_url();?>/public/assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?= base_url();?>/public/assets/js/popper.min.js"></script>
    <script src="<?= base_url();?>/public/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url();?>/public/assets/js/jquery.slimscroll.js"></script>
    <script src="<?= base_url();?>/public/assets/js/Chart.bundle.js"></script>
    <script src="<?= base_url();?>/public/assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url();?>/public/assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url();?>/public/assets/js/select2.min.js"></script>
    <script src="<?= base_url();?>/public/assets/js/moment.min.js"></script>
    <script src="<?= base_url();?>/public/assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="<?= base_url();?>/public/assets/js/chart.js"></script>
    <script src="<?= base_url();?>/public/assets/js/app.js"></script>
    <script src="<?= base_url();?>/public/assets/sweetalert/sweetalert.js"></script>
    <script src="<?= base_url();?>/public/assets/bundles/datatables/datatables.min.js"></script>
  <script src="<?= base_url();?>/public/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url();?>/public/assets/bundles/datatables/export-tables/dataTables.buttons.min.js"></script>
    <script src="<?= base_url();?>/public/assets/bundles/datatables/export-tables/buttons.flash.min.js"></script>
    <script src="<?= base_url();?>/public/assets/bundles/datatables/export-tables/jszip.min.js"></script>
    <script src="<?= base_url();?>/public/assets/bundles/datatables/export-tables/pdfmake.min.js"></script>
    <script src="<?= base_url();?>/public/assets/bundles/datatables/export-tables/vfs_fonts.js"></script>
    <script src="<?= base_url();?>/public/assets/bundles/datatables/export-tables/buttons.print.min.js"></script>
    <script src="<?= base_url();?>/public/assets/js/page/datatables.js"></script>

    <script>
    $(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
       {
           extend: 'pdf',
           foot: false,
           //title: 'ZNBTS systems Data',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
           
          
       },
       {
           extend: 'excel',
           foot: false,
           //title: 'ZNBTS systems Data',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
       }
       ,
       {
           extend: 'print',
           foot: false,
           //title: 'ZNBTS systems Data',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
          
       }         
    ]
    } );
    } );

        $(window).on("load", function () {
          $(".loader").fadeOut("slow");
        });

$(document).ready(function() {
    $('#dataTable2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
       {
           extend: 'pdf',
           foot: false,
           //title: 'ZNBTS systems Data',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
           
          
       },
       {
           extend: 'excel',
           foot: false,
           //title: 'ZNBTS systems Data',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
       }
       ,
       {
           extend: 'print',
           foot: false,
           //title: 'ZNBTS systems Data',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
          
       }         
    ]
    } );
    } );

$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
       {
           extend: 'pdf',
           foot: false,
           //title: 'ZNBTS systems Data',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
           
          
       },
       {
           extend: 'excel',
           foot: false,
           //title: 'ZNBTS systems Data',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
       }
       ,
       {
           extend: 'print',
           foot: false,
           //title: 'ZNBTS systems Data',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
          
       }         
    ]
    } );
    } );
    </script>


<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip({animation: true, delay: 1000});
});
</script>
</script>




</body>



</html>