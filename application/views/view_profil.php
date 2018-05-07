<div class="profile-page row">
    <div class="col-xs-3 pp"><img src="img/pp/<?php echo $profil[0]->foto_profil?>" alt="">
        <h3> <a href="<?php echo base_url().'profil/lihatprofil/'.$profil[0]->username;?>"><?php echo $profil[0]->username;?></a></h3>
    </div>
    <div class="col-xs-5 meta">
      <h2><?php echo $profil[0]->nama;?></h2>
      <p><?php echo $profil[0]->deskripsi;?></p>
    </div>
    <div class="col-xs-4 count">
      <div class="foto"><span><?php echo $totalfoto;?></span><small>FOTO</small></div>
      <div class="like"><span><?php echo $totallike;?></span><small>LIKE</small></div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="row" style="margin:0px;padding:0px">
<?php
    foreach ($foto as $fotos){
      $komentar = $this->model_komentar->count_komentar($fotos->idFoto);
      $like = $this->model_like->count_like($fotos->idFoto);
      $time = file_get_contents(base_url().'converttime?time='.urlencode($fotos->tanggal));
?>

<div class="item col-md-4">
    <figure url="<?php echo base_url()."foto/lihatfoto/".$fotos->idFoto; ?>">
        <div class="overlay"></div><img src="<?php echo base_url(); ?>img/foto/<?php echo $fotos->link_foto; ?>"/>
        <div class="short">
          <?php echo substr($fotos->caption, 0, 50); ?>
        </div>
        <div class="meta"><span class="fa fa-clock-o"> </span> <?php echo $time?> <span class="fa fa-heart-o"> </span> <span id="like-<?php echo $fotos->idFoto;?>"><?php echo $like;?></span> <span class="fa fa-comment-o"> </span> <span id="comment-<?php echo $fotos->idFoto;?>"><?php echo $komentar;?></span></div>
      <div class="profile"><img src="img/pp/<?php echo $fotos->foto_profil; ?>"/> &nbsp;<a href="<?php echo base_url().'profil/lihatprofil/'.$fotos->member;?>"><?php echo $fotos->member; ?></a></div>
    </figure>
  </div>
<?php
    }
?>
</div>