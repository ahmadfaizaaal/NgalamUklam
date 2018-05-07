<head>
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
	<div class="form" style="margin-top: -80px">
		<img src="img/logofix.png"/>
		<h3>Daftar NgalamUklam</h3>
                <div class="formcontainer" >
                    <form method="post" id="register">
                        <div class="label">Username</div>
                        <input style="border-radius: 5px;" id="usernamereg" type="text" value="<?php echo $this->input->post("username"); ?>" placeholder="Ketikkan Nama Pengguna..." name="username"/>
                        <div class="error" style="display: none">
                            <span class="alert" style="background:#E14938;color: #FFF;padding: 5px 0;font-size: 14px; width: 100%;display: block;">Username sudah digunakan</span>
                        </div>
                        <div class="label">Password</div>
                        <input style="border-radius: 5px;" type="password" value="" placeholder="Ketikkan Password..." name="password"/>
                        <div class="label">Konfirmasi Password</div>
                        <input style="border-radius: 5px;" type="password" value="" placeholder="Ketikkan Ulang Password..." name="passwordco"/>
                        <div class="label">Nama</div>
                        <input style="border-radius: 5px;" type="text" value="" placeholder="Ketikkan Nama Anda..." name="nama"/>
                        <input type="submit" value="Register" />
                        <p>Sudah punya akun ? <a href="<?php echo base_url();?>login" class="register-btn">Login</a></p>
                    </form>
		        </div>
                <div class="notifcontainer" style="display:none">
                    <h2>Pendaftaran Berhasil</h2>
                    <p>Terimakasih sudah mendaftar InstaPariwisata, akun anda siap digunakan.</p>
                    <a href="<?php echo base_url()?>login">Click disini untuk login</a>
                </div>
	</div>
</div>
<script src="<?php echo base_url();?>js/jquery.min.js"></script>
<script>
$(document).ready(function(){
    var cuser = false;
    $('#usernamereg').on('blur',function(){
        var username = $(this).val();
        $.ajax({
            url: '<?php echo base_url();?>register/cekusername/'+username,
            success: function(data){
                if(data==0){
                    $('.error').slideUp('slow');
                    cuser = true;
                }else{
                    $('.error').slideDown('slow');
                    cuser = false;
                }
            }
        });
    });
    $('form').submit(function(){
        if(!cuser){
            alert('cek username anda');
            return false;
        }
        if($('input[name="password"]').val() != $('input[name="passwordco"]').val()){
            alert('Konfirmasi password salah');
            return false;
        }
        $.ajax({
            url: '<?php echo base_url();?>register/submitregister',
            type: "POST",
            timeout: 60000,
            data: $('#register').serialize(),
            success: function(data){
                if(data==1){
                    $('.formcontainer').slideUp('slow');
                    $('.notifcontainer').slideDown('slow');
                }
            }
        });
        return false;
    })
})
</script>
</body>
