<?php
    foreach ($foto as $fotos){
      $komentar = $this->model_komentar->count_komentar($fotos->idFoto);
      $like = $this->model_like->count_like($fotos->idFoto);
?>
<div class="item col-md-4">
    <figure url="<?php echo base_url()."foto/lihatfoto/".$fotos->idFoto; ?>">
        <div class="overlay"></div><img src="<?php echo base_url(); ?>img/foto/<?php echo $fotos->link_foto; ?>"/>
        <div class="short">
          <?php echo substr($fotos->caption, 0, 50); ?>
        </div>
        <div class="meta"><span class="fa fa-clock-o"> </span> <?php echo $this->CI->convert_time($fotos->tanggal)?> <span class="fa fa-heart-o"> </span> <span id="like-<?php echo $fotos->idFoto;?>"><?php echo $like;?></span> <span class="fa fa-comment-o"> </span> <span id="comment-<?php echo $fotos->idFoto;?>"><?php echo $komentar;?></span></div>
        <div class="profile"><img src="img/pp/<?php echo $fotos->foto_profil; ?>"/> &nbsp;<a href="<?php echo base_url().'profil/lihatprofil/'.$fotos->member;?>"><?php echo $fotos->member; ?></a></div>
    </figure>
  </div>
<?php
    }
?>
