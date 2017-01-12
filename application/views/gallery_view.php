<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>WebConnect</title>
    <link href='http://fonts.googleapis.com/css?family=Aladin&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href=<?php echo base_url()."public/css/style_portal.css" ?> media="screen" title="no title">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>
    <h1><?php echo $username ?></h1>
    <div class="header">
      <div class="background" style=<?php echo '"background-image: url(data:image/gif;base64,'.base64_encode($background).')"'?>>
      </div>
      <div class="profile" style=<?php echo '"background-image: url(data:image/gif;base64,'.base64_encode($profile).')"'?>></div>
      <a href="<?php echo base_url()."index.php/favourite" ?>" id="ulubieni">ulubieni</a>
      <a href="<?php echo base_url()."index.php/gallery" ?>" id="galeria">galeria</a>
      <a id="post">wstaw post</a>
      <a href="<?php echo base_url()."index.php/global_tab" ?>" id="global_tab">tablica globalna</a>
      <a href="<?php echo base_url()."index.php/home/logout" ?>" id="wyloguj">wyloguj</a>
    </div>
    <?php
      if($str == 'gallery'){
        echo '<div id="photo"> wstaw nowe zdjęcie </div>' ;
      }
    ?>
    <div class="container">
      <div class="photo_box">
        <?php
        foreach($photos as $row){
            echo '<div class="photos">
                      <p class="title">'.$row->title.'</p>
                      <div class="photo" style="background-image: url(data:image/gif;base64,'.base64_encode($row->photo).')" ></div>
                      <p class="description">'.$row->description.'</p>
                      <p class="date">'.$row->date.'</p>
                      <a class="comments" id='.$row->id.'> Pokarz komentarze </a>
                  </div>';
        }
        ?>
      </div>
    </div>
      <script src="<?php echo base_url().'public/js/buttons.js' ?>" charset="utf-8"></script>
  </body>
</html>
