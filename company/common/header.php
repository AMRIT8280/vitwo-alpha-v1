<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="<?=BASE_URL?>/public/storage/logo/<?= getAdministratorSettings("favicon"); ?>">
  <title><?= getAdministratorSettings("title") ?> | Dashboard</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../public/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../public/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="../public/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../public/assets/plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="../public/assets/plugins/jqvmap/select2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../public/assets/AdminLte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../public/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../public/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../public/assets/plugins/summernote/summernote-bs4.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../public/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../public/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="../public/assets/plugins/bs-stepper/css/bs-stepper.min.css">

  <link rel="stylesheet" href="../public/assets/sass/custom.css">
<style>
.btn-primary{
  border-radius: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.card-primary:not(.card-outline)>.card-header{
  background-color:#003060 !important;
}
.btn-primary, .page-item.active .page-link{
  background-color:#003060 !important;
  border-color:#003060 !important;
}
.btn-primary .fa-plus{ margin-right:5px;}
.menu-btn img, .rounded .nav-icon{
display:none;
}
.menu-btn .fa-edit{ margin-left:10px;}
.btn-outline-primary{
  color: #003060;
    border-color: #003060;
}
.menu-btn{
  margin-bottom:10px;
}
.btn-outline-primary:hover{
  background-color:#003060 !important;
  border-color: #003060;
  color:#fff;
}
.btn-outline-primary:hover label{
  color:#fff;
}
.form-table{
  width: 100%;
}
#customFields .btnstyle{
  position:absolute;
  right:20px;
  top:20px;
}
.step2{
  position: relative;
}
.defaultDataTable .pagination {   
        display: inline-block;
        float:right;   
    }   
    .defaultDataTable .pagination a {     
        font-size:14px;   
        color: black;   
        float: left;   
        padding: 8px 10px;   
        text-decoration: none;   
        border:1px solid rgba(0,0,0,0.5);   
    }   
    .defaultDataTable .pagination a.active {   
            background-color: #000; 
            color:#fff;  
    }   
    .defaultDataTable .pagination a:hover:not(.active) {   
        background-color: #003060;
        color:#fff;   
    } 
    #mytable_paginate, #mytable_info{
      display:none;
    } 
    .filter-col{
      position:absolute;
      right:20px;
      width:70%;
      background:#fff;
      z-index: 9;
      margin-top:-10px;
    }
</style>
  <!-- jQuery -->
  <script src="../public/assets/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?=BASE_URL?>public/storage/logo/<?= getAdministratorSettings("logo"); ?>" alt="<?php getAdministratorSettings("title") ?> logo" height="60" width="60">
  </div>