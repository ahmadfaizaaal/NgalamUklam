<?php
    $isLogin = $this->session->userdata( 'username' );
    if($isLogin==""){
      redirect( base_url().'login');
    }
?>
<html lang="en">
  <head>
    <base href="<?php echo base_url();?>" />
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="username" id="username" content="<?php echo $this->session->userdata( 'username' );?>"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags-->
    <title>NgalamUklam</title>
    <link href="https://fonts.googleapis.com/css?family=Yantramanav:300,400,500,700" rel="stylesheet"/>
    <!-- Bootstrap-->
    <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"/>
    <link href="<?php echo base_url();?>css/style.css" rel="stylesheet"/>
    <link href="<?php echo base_url();?>css/animate.css" rel="stylesheet"/>
    <link href="<?php echo base_url() ?>/img/ikon.png" rel="shortcut icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js')
    script(src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js')
    -->
  </head>
  <body>
    <section class="sidebar col-md-3">
      <div class="logo-container"><a href="<?php echo base_url();?>"><img style="margin-top: -10px; width: 55%;" src="img/logofix.png"/></a></div>
      <div class="profile-container">
        <?php
        //print_r($isLogin);
          $member = $this->model_member->get_member($isLogin);
        ?>
        <div class="profile-pict"><img src="img/pp/<?php echo $member[0]->foto_profil?>"/></div>
        <div class="info"><a style="color: #ffc400;" href="<?php echo base_url();?>profil/lihatprofil/<?php echo $member[0]->username;?>" class="profile"><?php echo $member[0]->username?></a>
          <h2><?php echo $member[0]->nama;?></h2>
          <p>
            <?php echo $member[0]->deskripsi;?>
          </p><!--a href="#"> <span class="fa fa-cog"> </span> Edit Profile</a><br/><br/><a href="#"> <span class="fa fa-sign-out"> </span> Logout</a-->
        </div>
        <button class="add-photo"><span class="fa fa-camera-retro"></span> Tambah Foto</button>
      </div>
    </section>
    <section class="main-content col-md-9">
      <div class="title-container">
        <div class="col-xs-4 title">
        <?php
            if(!empty($profil[0]->username)){
                echo 'Profil';
            }else{
                echo 'Beranda';
            }
        ?>
        </div>
        <div class="col-xs-4">
        <?php
            if(!empty($profil[0]->username)){
                echo '<input style="opacity: 0; cursor:default; border-radius: 5px; height: 60%; width: 100%; padding-left: 15px; margin-left: -10px; margin-top: 12px; font-size: 16px;" type="text" value="" placeholder="Cari..." name="cari"/>';
            }else{
                echo '<input style="border-radius: 5px; height: 60%; width: 100%; padding-left: 15px; margin-left: -10px; margin-top: 12px; font-size: 16px;" type="text" value="" placeholder="Cari..." name="cari"/>';
            }
        ?>
            <!-- <input style="border-radius: 5px; height: 60%; width: 100%; padding-left: 15px; margin-left: -10px; margin-top: 12px; font-size: 16px;" type="text" value="" placeholder="Cari..." name="cari"/> -->
        </div>
        <div class="col-xs-4 log">
            <a style="opacity: 0;cursor:default"> <span class="fa fa-cog"> </span> Ubah Profil</a>
          <?php
            if(@$profil[0]->username == $this->session->userdata( 'username' )){
          ?>
            <a href="#" class="editprofile"><span class="fa fa-cog"> </span> Ubah Profil</a>
          <?php
            }
          ?>
          <!-- <div class="caption col-md-12">
              <input type="text" value="" placeholder="Cari..." name="nama"/>
              <button type="submit"><span class="fa fa-search"></button>
          </div> -->
          <a href="<?php echo base_url();?>logout/dologout"> <span class="fa fa-sign-out"> </span> Logout</a>
        </div>
        <div class="clearfix"></div>
      </div>
      <div class="main">
        <?php
          // echo $page;
          include $page.".php";
        ?>
      </div>
      </section>
          <div class="detail" idfoto="">
            <div class="overlay"></div>
            <div class="close"><span class="fa fa-close"></span></div>
            <div class="col-md-1"></div>
            <div class="col-md-10 panel">
                <div class="edit"><span class="fa fa-pencil" ></span></div>
                <div class="delete"><span class="fa fa-trash-o" ></span></div>
              <div class="col-md-8"><img src="img/popup.jpg" class="photo"/></div>
              <div class="col-md-4 right">
                <div class="profile"><img src="" class="profilepict"/><a href="#">-</a></div>
                <div class="meta"><span class="fa fa-comment"></span><span count="" class="comments">-</span><span class="fa fa-heart"></span><span count="" class="likes">-</span><span class="fa fa-clock-o"> </span><span class="time">-</span><span class="fa fa-map-marker"> </span><span class="loc">-</span></div>
                <ul class="comment">
                   Belum ada Komentar
                </ul>
                <div class="form row" >
                  <div class="col-xs-1 like" status=""><span class="fa fa-heart-o"></span></div>
                  <div class="col-xs-10 commend">
                      <form>
                        <input autocomplete="off" name="komentar" placeholder="Type commend here..."/>
                      </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-1"> </div>
          </div>
        <div class="loading" style="display: none">
            <div class="overlay"></div>
            <div class="spinner spinner-1"></div>
        </div>
        <div class="popupupload upload" style="display: none">
            <div class="overlay"></div>
            <div class="close"><span class="fa fa-close"></span></div>
            <div class="popclose"><span class="fa fa-close"></span></div>
                <div class="col-md-2"></div>
                <div class="panel-upload formfoto col-md-8">
                    <!--form enctype="multipart/form-data" action="<?php echo base_url()?>foto/tambahfoto" method="post"-->
                    <?php echo form_open_multipart('foto/tambahfoto');?>
                    <div class="title">
                        <span class="fa fa-image"></span>&nbsp; TAMBAH FOTO
                    </div>
                    <div class="mainform" >
                        <div class="image col-md-6">
                                <img src="img/" style="display:none">
                                <label for="file-upload" class="custom-file-upload">
                                    <span class="fa fa-image"></span>&nbsp; PILIH FOTO
                                </label>
                                <input id="file-upload" type="file" accept="image/*" onchange="loadFile(event)" name="userfile">
                        </div>
                        <div class="caption col-md-6">
                                <textarea cols="45" rows="11" name="caption" placeholder="Tulis caption disini..."></textarea>
                                <input type="text" name="location" placeholder="Tulis Lokasi foto">
                                <button type="submit"><span class="fa fa-send"></span>&nbsp; UPLOAD FOTO</button>
                        </div>
                    </div>
                    <div class="lod" style="display: none">
                        <br>
                        <br>
                        <br>
                        <h2>Sedang Mengupload</h2>
                        <div class="spinner spinner-1"></div>
                    </div>
                    <div class="notice" style="display: none">
                        <div class="content">
                            <h2><span class="fa fa-check"></span> Berhasil Upload</h2>
                            <h3>Sedang Refresh data....</h3>
                            <a onclick="retryImageUpload()">Coba Lagi</a>
                        </div>
                    </div>
                    <?php echo form_close();?>
                </div>
                <div class="col-md-2"></div>
            
	</div>
      	<div class="popupupload popedit" style="display:none">
            <div class="overlay"></div>
            <div class="close"><span class="fa fa-close"></span></div>
            <div class="container">
                    <div class="col-md-4">
                    </div>
                    <div class="panel-upload col-md-4" style="margin-top:10px;height:530px;">
                        <form enctype="multipart/form-data" action="<?php echo base_url()?>profil/editprofil" method="post">
                            <div class="title">
                                <span class="fa fa-cog"></span>&nbsp; EDIT PROFILE
                            </div>
                            <div class="caption">
                                <label for="picture" class="custom-file-upload">Foto Profil : (Kosongi jika tidak mengubah)</label>
                                <input type="file" accept="image/*" value="" name="userfile"/>
                                <label for="nama" class="custom-file-upload">Nama : </label>
                                <input type="text" value="<?php echo $member[0]->nama;?>" name="nama" style="margin-top:-5px"/>
                                <label for="password" class="custom-file-upload">Password : (Kosongi jika tidak mengubah)</label>
                                <input type="password" value="" name="password"/>
                                <label for="bio" class="custom-file-upload">Bio :</label>
                                <textarea cols="45" rows="3" name="deskripsi" style="height:100px" placeholder="Tulis bio disini..."><?php echo $member[0]->deskripsi;?></textarea>
                                <button type="submit"><span class="fa fa-pencil"></span>&nbsp; SAVE</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-md-4">
                    </div>
            </div>
	</div>
        <div class="popupupload popeditfoto" style="display: none">
            <div class="overlay"></div>
            <div class="close"><span class="fa fa-close"></span></div>
            <div class="container">
              <div class="col-md-4">
              </div>
              <div class="panel-upload col-md-4" style="margin-top:10px;height:530px;">
                  <form enctype="multipart/form-data" action="<?php echo base_url()?>foto/editcaption" method="post">
                      <div class="title">
                          <span class="fa fa-pencil"></span>&nbsp; EDIT FOTO
                      </div>
                      <div class="caption">
                          <input type="hidden" name="idfoto" value="" />
                          <label for="location" class="custom-file-upload">Lokasi : </label>
                          <input type="text" value="" name="location" style="margin-top:-5px"/>
                          <label for="caption" class="custom-file-upload">Caption :</label>
                          <textarea cols="45" rows="3" name="caption" style="height:100px" placeholder="Tulis bio disini..."></textarea>
                          <button type="submit"><span class="fa fa-paper-plane"></span>&nbsp; SIMPAN</button>
                      </div>
                  </form>
                  <div class="clearfix"></div>
              </div>
              <div class="col-md-4">
              </div>
            </div>
        </div>
      <?php
        if(!empty($this->session->flashdata('msuccess'))){
      ?>
      <div class="message success">
          <?php echo $this->session->flashdata('msuccess');?>
      </div>
      <?php
        }
      ?>
          <!--.detail
          .overlay
          .close
            span.fa.fa-close
          .col-md-4
          .col-md-4.panel
            .col-md-8
            .col-md-4
          .col-md-1
          -->
          <script src="<?php echo base_url();?>js/jquery.min.js"></script>
          <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
          <script src="<?php echo base_url();?>js/ngalamuklam.js"></script>
        <script src="/prepros.js"></script>
      </body>
      </html>
