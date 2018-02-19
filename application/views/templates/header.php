<!DOCTYPE html>
<html>
<head>  <title>Kapil Blog Test</title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <nav class="navbar navbar-inverse">
   <div class="container">
     <div class="navbar-header">
       <a href="<?php echo base_url(); ?>" class="navbar-brand">Kapil Blog Test</a>
     </div>
     <div id="navbar">
       <ul class="nav navbar-nav">
         <li><a href="<?php echo base_url(); ?>contents">Blog</a></li>
         <li><a href="<?php echo base_url(); ?>categories">Categories</a></li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
        <?php if(!$this->session->userdata('logged_in')) : ?>
          <li><a href="<?php echo base_url(); ?>admins/login">Login</a></li>
          <li><a href="<?php echo base_url(); ?>admins/register">Sign Up</a></li>
        <?php endif; ?>

        <?php if($this->session->userdata('logged_in')) : ?>
         <li><a href="<?php echo base_url(); ?>contents/create">Create Contents</a></li>
         <li><a href="<?php echo base_url(); ?>categories/create">Create Category</a></li>
         <li><a href="<?php echo base_url(); ?>edit-admins">Edit Admins</a></li>
         <li><a href="<?php echo base_url(); ?>admins/logout">Logout</a></li>
       <?php endif; ?>

     </ul>
   </div>
 </div>
</nav>

<div class="container">
  <!--           Flash messages   -->
  <?php if($this->session->flashdata('success_flag')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('success_flag').'</p>'; ?>
  <?php endif; ?>
  
  <?php if($this->session->flashdata('warning_flag')): ?>
    <?php echo '<p class="alert alert-warning">'.$this->session->flashdata('warning_flag').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('danger_flag')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('danger_flag').'</p>'; ?>
  <?php endif; ?>
  
  