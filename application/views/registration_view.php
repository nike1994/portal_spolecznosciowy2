<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>WebConnect</title>
    <link href='http://fonts.googleapis.com/css?family=Aladin&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href=<?php echo base_url()."public/css/style.css" ?> media="screen" title="no title">
  </head>
  <body>
    <div class="header">
      <h1>WebConnect</h1>
    </div>
    <div class="container">
      <div class="error">
          <?php echo validation_errors(); ?>
      </div>
      <div class="registration_form-box">
        <div class="login">
          <p>
            Rejestracja
          </p>
        </div>
        <div class="registration_form">
          <?php
            $attributes = array(
              'method'=> 'post',
              'enctype'=>"multipart/form-data",
              'id' =>'Registration'
            );
            echo form_open('verifyregistration',$attributes);
          ?>
            <div>
              <br/>
              <label for="username">Nazwa użytkownika:</label>
              <label for="password">Hasło:</label>
              <br/>
              <input type="text" id="username" name="username"/>
              <input type="password"  id="passowrd" name="password"/>
              <br/>
            </div>
            <div>
              <label for="f_name">Imie:</label>
              <label for="l_name">Nazwisko:</label>
              <br/>
              <input type="text"  id="f_name" name="f_name"/>
              <input type="text" id="l_name" name="l_name"/>
              <br/>
            </div>
            <div class="date">
              <label for="date">Data urodzenia y-m-d:</label>
              <br/>
              <input type="date" id="date" name="date"/>
              <br/>
            </div>
            <div>
              <label for="profile">Zdjęcie profilowe:</label>
              <label for="background">Zdjęcie na tło</label>
              <br/>
              <input type="file"  id="profile" name="profile" accept="image/*"/>
              <input type="file"  id="background" name="background" accept="image/*"/>
              <br/>
            </div>
            <input type="submit" value="Register"/>
          </form>
          <div class="about">
            <label for="about">O sobie:</label>
            <br/>
            <textarea name="about" id="about" cols="30" rows="10" form="Registration"></textarea>
          </div>
        </div>
      </div>
      <div class="triangle-bottom-right">
        <a href="login">
          Logowanie
        </p>
      </div>
    </div>
  </body>
</html>
