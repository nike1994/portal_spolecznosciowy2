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
      <div class="form-box">
        <div class="login">
          <p>
            Logowanie
          </p>
        </div>
        <div class="form">
          <?php echo form_open('verifylogin'); ?>
            <br/>
            <label for="username">Username:</label>
            <br/>
            <input type="text" size="20" id="username" name="username"/>
            <br/>
            <label for="password">Password:</label>
            <br/>
            <input type="password" size="20" id="passowrd" name="password"/>
            <br/>
            <input type="submit" value="Login"/>
          </form>
        </div>
      </div>
      <!--<div class="triangle-top-left">
        <p>
          Przypomnienie
          </br>
          hasła
        </p>
      </div>-->
      <div class="triangle-bottom-right">
        <a href="registration">
          Rejestracja
        </p>
      </div>
    </div>
  </body>
</html>
