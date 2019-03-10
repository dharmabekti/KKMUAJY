<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Login | ... </title>



      <link rel="stylesheet" href="<?php echo base_url("template/login_form/css/style.css"); ?>">


</head>

<body>
  <body>
<div class="container">
	<section id="content">
		<!-- <form action="c_register/check_register"> -->
    <?php echo form_open('c_register/check_register'); ?>
			<h1>Form Register</h1>
      <?php echo $this->session->flashdata('msg'); ?>
			<div>
				<input type="text" name="f_name" placeholder="First Name" required="" id="f_name" />
			</div>
      <div>
				<input type="text" name="l_name" placeholder="Last Name" required="" id="l_name" />
			</div>
      <div>
				<input type="text" name="username" placeholder="Username" required="" id="username" />
			</div>
			<div>
				<input type="password" name="password" placeholder="Password" required="" id="password" />
			</div>
			<div>
				<input type="submit" value="Daftar" />
			</div>
		<?php echo form_close(); ?>
    <!-- form -->
		<div class="button">
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>

    <script src="<?php echo base_url("template/login_form/js/index.js"); ?>"></script>

</body>
</html>
