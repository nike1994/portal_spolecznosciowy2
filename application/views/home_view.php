<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>WebConnect</title>
    <link href='http://fonts.googleapis.com/css?family=Aladin&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href=<?php echo base_url()."public/css/style_portal.css" ?> media="screen" title="no title">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js" charset="utf-8"></script>
    <script type='text/javascript'>
      var userName = "<?php $session_data = $this->session->userdata('logged_in'); $userName = $session_data['username']; echo $userName?>";
    </script>
  </head>
  <body>
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
    <div class="container">
      <div class="dane">
        <div class="name">
          <p>Imie i nazwisko</p>
          <p id="name"><?php echo $f_name." ".$l_name?></p>
        </div>
        <div class="date">
          <p>Data urodzin</p>
          <p id="date"><?php echo $date_b?></p>
        </div>
        <div class="about">
          <p>O sobie</p>
          <p id="about"><?php echo $about?></p>
        </div>
        <?php
          if($str=='fav'){
            echo ' <div class="buttons">
                    <a href="'.base_url().'index.php/gallery/profile/'.$username.'" class="button gallery">galeria</a>
                    <a class="button favourite"> polub </a>
                  </div>
                  ';
          }
        ?>
      </div>
      <div class="post_box">
        <?php
        foreach($posts as $row){
          if($str=='global'){
            if($row->nick_author==$username){
              echo '<div class="posts">
                        <div class="photo" style="background-image: url(data:image/gif;base64,'.base64_encode($row->photo_author).')"></div>
                        <a href="'.base_url().'index.php/home" class="name">'.$row->nick_author.'  '.$row->name_author.'</a>
                        <p class="title">'.$row->title.'</p>
                        <p class="text">'.$row->text.'</p>
                        <p class="date">'.$row->date.'</p>
                        <a class="comments" id='.$row->id.'> Pokarz komentarze </a>
                    </div>';
            }else{
              echo '<div class="posts">
                        <div class="photo" style="background-image: url(data:image/gif;base64,'.base64_encode($row->photo_author).')"></div>
                        <a href="'.base_url().'index.php/home/profile/'.$row->nick_author.'" class="name">'.$row->nick_author.'  '.$row->name_author.'</a>
                        <p class="title">'.$row->title.'</p>
                        <p class="text">'.$row->text.'</p>
                        <p class="date">'.$row->date.'</p>
                        <a class="comments" id='.$row->id.'> Pokarz komentarze </a>
                    </div>';
            }
          }else{
            echo '<div class="posts">
                      <p class="title">'.$row->title.'</p>
                      <p class="text">'.$row->text.'</p>
                      <p class="date">'.$row->date.'</p>
                      <a class="comments" id='.$row->id.'> Pokarz komentarze </a>
                  </div>';
          }
        }
        ?>
      </div>
    </div>
    <script src="<?php echo base_url()."public/js/buttons.js" ?>" charset="utf-8"></script>
  </body>
</html>
                                                                                                                                                                                                                                                                                                                    
