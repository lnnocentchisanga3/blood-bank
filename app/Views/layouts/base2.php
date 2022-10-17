<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url();?>/public/assets/img/logo-dark1.jpg">
    <title><?=esc($title);?></title>
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
            document.body.style.zoom = "85%" 
        }
    </script>

    <!--[if lt IE 9]>
        <script src="<?= base_url();?>/public/assets/js/html5shiv.min.js"></script>
        <script src="<?= base_url();?>/public/assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body onload="zoom()">
    <div class="loader"></div>
    <div class="main-wrapper">
        <div class="header">
            <div class="header-left">
                <a href="#!" class="logo">
                    <img src="<?= base_url();?>/public/assets/img/logo-dark.png" width="35" height="35" alt=""> <span>ZNBTS</span>
                </a>
            </div>
            <a id="toggle_btn" href="javascript:void(0);"><i class="fa fa-bars"></i></a>
            <a id="mobile_btn" class="mobile_btn float-left" href="#sidebar"><i class="fa fa-bars"></i></a>


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
        <div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="">
                            <a href="<?=base_url()?>/dashboard/<?=$userdata['hospital_id']?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a>
                        </li>
                         
                        <li class="submenu">
                            <a href="#"><i class="fa fa-user"></i> <span> Donors </span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="<?=base_url()?>/listdonors/<?=$userdata['hospital_id']?>"><i class="fa fa-copy"></i> Manage All Donors</a></li>
                                <li><a href="<?=base_url()?>/adddonors/<?=$userdata['hospital_id']?>"><i class="fa fa-users"></i> Add Multiple Donors</a></li>
                                <li><a href="<?=base_url()?>/oneAdddonor/<?=$userdata['hospital_id']?>"><i class="fa fa-user-plus"></i> Add a Single Donor</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#"><i class="fa fa-map-marker"></i> <span> Donation Sites</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="<?=base_url()?>/addsites/<?=$userdata['hospital_id']?>"><i class="fa fa-map-marker"></i>Manage Donation Sites</a></li>

                                <?php if ($sites == null): ?>
                                    <li><a href="#!"><i class="fa fa-map"></i> -No Donation Sites Found</a></li>
                                <?php else: ?>
                                    <?php foreach ($sites as $row): ?>
                                       <li><a href="<?=base_url()?>/donorsectionsitedonors/<?=$row['site_id']?>/<?=$userdata['hospital_id']?>"><h6 style="border-left: 1px solid black; padding-top: initial;" class="text-end">--<i class="fa fa-folder-open"></i> <?=$row['donation_site_name']?></h6></a></li>
                                    <?php endforeach ?>
                               <?php endif ?>
                            </ul>
                        </li>
                        
                         <li>
                            <a href="<?=base_url()?>/users/<?=$userdata['hospital_id']?>"><i class="fa fa-user-circle-o"></i> <span>Manage Users</span></a>
                        </li>
                        
                    </ul>
                </div>
            </div>
</div>

 <?= $this->renderSection('content'); ?>


 

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
           title: 'ZNBTS systems Data',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
           
          
       },
       {
           extend: 'excel',
           foot: false,
           title: 'ZNBTS systems Data',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
       }
       ,
       {
           extend: 'print',
           foot: false,
           title: 'ZNBTS systems Data',
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
           title: 'ZNBTS systems Data',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
           
          
       },
       {
           extend: 'excel',
           foot: false,
           title: 'ZNBTS systems Data',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
       }
       ,
       {
           extend: 'print',
           foot: false,
           title: 'ZNBTS systems Data',
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
           title: 'ZNBTS systems Data',
            exportOptions: {
                columns: "thead th:not(.noExport)"
            }
           
          
       },
       {
           extend: 'excel',
           foot: false,
           title: 'ZNBTS systems Data',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
       }
       ,
       {
           extend: 'print',
           foot: false,
           title: 'ZNBTS systems Data',
           exportOptions: {
                columns: "thead th:not(.noExport)"
            }
          
       }         
    ]
    } );
    } );
    </script>




</body>



</html>