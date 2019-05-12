<!DOCTYPE HTML>
<?php
    session_start();
    require 'vendor/autoload.php';
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
    {
        header("Location: index.php");
    }

    include 'connections.php'; //for connnecting to DB
    $server='mongodb://127.0.0.1:27017'; //replace by server details e.g "mongodb://admu:new_pass@localhost:27017/university"
    $collection=connectDB($server,'phototrip',0); //replace fullstack by db name

    if(isset($_POST['username']) && isset($_POST['password']))
    {   $username = $_POST['username'];
        $password = $_POST['password'];
        $cursor = $collection->find(['username' => $username]);
        foreach($cursor as $document)
        {
          if($document['password']==$password)
          {
            $_SESSION['logged_in']=true;
            header("Location: index.php");
          }
        }
    }
?>
<html>
    <head>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="css/login.css">
    </head>
    <body>
        <div class="wrapper fadeInDown">
          <div id="formContent">
            <h2 style="padding-top:20px;padding-bottom:20px;">TrippyIgloo LMS</h2>
            <form method="post" action="login.php">
            Username:<br/>
            <input type="text" id="login" class="fadeIn second" name="username" placeholder="admin">
            <br/><br/>
            Password:<br/>
            <input type="text" id="password" class="fadeIn third" name="password" placeholder="********">
            <br/><br/>
            <input type="submit" class="fadeIn fourth" value="Log In">
        </form>
    </body>
</html>
