<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>webConnect</title>
    <link href='http://fonts.googleapis.com/css?family=Aladin&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href=<?php echo base_url()."public/css/style_portal.css" ?> media="screen" title="no title">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" charset="utf-8"></script>
  </head>
  <body>
    <div class="header">
      <div class="background" style=<?php echo '"background-image: url(data:image/gif;base64,'.base64_encode($background).')"'?>>
      </div>
      <div class="profile" style=<?php echo '"background-image: url(data:image/gif;base64,'.base64_encode($profile).')"'?>>
      </div>
      <a href="favourite" id="ulubieni">ulubieni</a>
      <a href="gallery" id="galeria">galeria</a>
      <a href="" id="post">wstaw post</a>
      <a href="global_tab" id="global_tab">tablica globalna</a>
      <a href="home/logout" id="wyloguj">wyloguj</a>
    </div>
    <div class="container">
      <div class="fav_box">
        <?php
        foreach($fav as $row){
            echo '<div class="favourite">
                      <p class="name">'.$row->fav_nick.'   '.$row->fav_name.'</p>
                      <div class="photo" style="background-image: url(data:image/gif;base64,'.base64_encode($row->fav_profile).')" ></div>
                      <p class="about">'.$row->fav_about.'</p>
                      <a href="home/profile/'.$row->fav_nick.'"> Przejdź</a>
                  </div>';
        }
        ?>
      </div>
    </div>
    <script src="<?php echo base_url()."public/js/buttons.js" ?>" charset="utf-8"></script>
  </body>
</html>
                                                                                                 
