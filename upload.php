<?php
   if(isset($_FILES['file'])){
      $errors= array();
      $file_name = $_FILES['file']['name'];
      $file_size =$_FILES['file']['size'];
      $file_tmp =$_FILES['file']['tmp_name'];
      $file_type=$_FILES['file']['type'];
      $tmp=explode('.',$_FILES['file']['name']);
      $file_ext=strtolower(end($tmp));

      $extensions= array("csv");

      if(in_array($file_ext,$extensions)=== false){
         $errors[]="extension not allowed, please choose a CSV file.";
      }

      if($file_size > 2097152){
         $errors[]='File size must be less than 2 MB';
      }

      if(empty($errors)==true){
         echo 'Success!';
      }else{
         echo $errors;
      }
   }
?>
<html>
  <head>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/upload.css">
    <link rel="stylesheet" type="text/css" href="css/navbar.css">
    <script src="js/upload.js"></script>
  </head>
  <body>
    <?php include 'navbar.php';
          navBar();
    ?>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading"><strong>Upload CSV File</strong> <small>Insert Leads to MongoDB</small></div>
        <div class="panel-body">

          <!-- Standard Form -->
          <h4>Select files from your computer</h4>
          <form action="" method="post" enctype="multipart/form-data" id="js-upload-form">
            <div class="form-inline">
              <div class="form-group">
                <input type="file" name="file" id="js-upload-files">
              </div>
              <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
            </div>
          </form>

          <!-- Drop Zone -->
          <h4>Or drag and drop files below</h4>
          <div class="upload-drop-zone" id="drop-zone">
            Just drag and drop files here
          </div>
        </div>
      </div>
    </div> <!-- /container -->
  </body>
</html>
