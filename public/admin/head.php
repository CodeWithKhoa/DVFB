
<?php
require('../../config/config.php');
if($ManhDev->users('level') !== "3"){header('Location: /');exit;}
if(empty($_SESSION['username'])){header('Location: /404');exit;}
?>
<!DOCTYPE html>
<html lang="en" class="dark-mode">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trang Quản Trị</title>
<meta name="csrf-token" content="9jILCFLdUiKHj5NIvPwKO98dWO5obzeL3msiDKcQ">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="/public/admin/plugins/fontawesome-free/css/all.min.css?<?=rand(1,999999999);?>">

  <link rel="stylesheet" href="/public/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css?<?=rand(1,999999999);?>">

  <link rel="stylesheet" href="/public/admin/dist/css/adminlte.min.css?<?=rand(1,999999999);?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css?<?=rand(1,999999999);?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
      <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <link href="/assets/css/swal.css?<?=time();?>" rel="stylesheet">
</head>
<body class="hold-transition light-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">