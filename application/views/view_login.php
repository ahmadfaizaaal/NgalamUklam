<head>
<base href="<?php echo base_url();?>" />
<link href="https://fonts.googleapis.com/css?family=Yantramanav:300,400,500,700" rel="stylesheet">
<link rel="stylesheet" href="css/login.css"/>
<link href="<?php echo base_url() ?>/img/ikon.png" rel="shortcut icon">
<script src="js/jquery-1.11.1.min.js"></script>
<title>NgalamUklam - Bergabunglah dan share momen tak terlupakan kalian</title>
</head>
<body>
<div class="container">
	<video autoplay="true" poster="img/poster.jpg" loop muted>
		<source src="img/malang.MKV" type="video/mp4"/>
	</video>
	<div class="overlay"></div>
	<div class="form">
		<img src="img/logofix.png"/>
		<h3>Bergabunglah dan share momen tak terlupakan kalian</h3>
                <form method="post" id="login" action="<?php echo base_url()."login/submitlogin"?>" >
      <div class="label">Username</div>
			<input style="border-radius: 5px;" type="text" value="<?php echo $this->input->post("username"); ?>" placeholder="Ketikkan Nama..." name="username"/>
      <div class="label">Password</div>
			<input style="border-radius: 5px;" type="password" value="" placeholder="Ketikkan Password..." name="password"/>
			<input type="submit" value="Login" name="login"/>
			<p>Belum punya akun ? <a href="<?php echo base_url()?>register" class="register-btn">Daftar Sekarang</a></p>
		</form>
		<form method="post" style="display:none" id="register">
			<input type="text" placeholder="Username" id="username" name="username"/><br>
			<input type="text" placeholder="Email" id="email" name="email"/><br>
			<input type="text" placeholder="Nama" name="nama" id="nama"/><br>
			<input type="password" placeholder="Password" id="password" name="password"/><br>
			<input type="submit" value="Register" name="register"/><br>
			<p>Already have an account ? <a href="#" class="login-btn">Login Now</a></p>
		</form>
		<form id="ann" style="display:none">
			<div class="panel">
				Pendaftaran Berhasil, silahkan melakukan login dengan <a href="">klik disini</a>
			</div>
		</form>
	</div>
</div>
<?php
	if(@$error){
?>
<div class="error">
	<p>
		Maaf, Login gagal.
	</p>
</div>
<?php } ?>
</body>
