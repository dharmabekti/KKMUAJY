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
    <?php echo form_open('c_login/check_login'); ?>
			<h1>Login Form</h1>
			<div>
				<input type="text" placeholder="Username" required="" id="username" />
			</div>
			<div>
				<input type="password" placeholder="Password" required="" id="password" />
			</div>
			<div>
				<input type="submit" value="Masuk" />
				<a href="#">Lupa Password?</a>
				<a href="<?php echo base_url(); ?>index.php/c_register">Daftar</a>
			</div>
    <?php echo form_close(); ?>

		<div class="button">
			<a href="#">Download Pedoman</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>

    <script src="<?php echo base_url("template/login_form/js/index.js"); ?>"></script>

</body>
</html>
