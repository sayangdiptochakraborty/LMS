<?php
if(isset($_SERVER['HTTP_REFERER']))
{
?>
<html>
<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/index.css">
  <script src="js/index.js"></script>
  <!-- MDBootstrap Datatables  -->
  <link href="css/addons/datatables.min.css" rel="stylesheet">
  <!-- MDBootstrap Datatables  -->
  <script type="text/javascript" src="js/addons/datatables.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/navbar.css">
</head>
<?php
include 'utils.php';
include 'db.php';
include 'connections.php';
require 'vendor/autoload.php';
?>
<body>
  <?php include 'navbar.php';
        navBar();
  ?>
<div class="row">
    <div class="container">
      <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Group Size</th>
            <th>Form</th>
            <th>Phone</th>
            <th>Tour Date</th>
            <th>Email</th>
            <th>URL</th>
            <th>Referrer</th>
            <th>Lead</th>
            <th>Person</th>
            <th>Status</th>
            <th>Update Details</th>
          </tr>
      </thead>
      <tbody>
      <?php
      $server='mongodb://127.0.0.1:27017'; //replace by server details e.g "mongodb://admu:new_pass@localhost:27017/university"
      $collection=connectDB($server,'phototrip',1); //replace fullstack by db name
      $cursor = $collection->find();
      foreach($cursor as $document){
        if(!(isNull($document["group_size"]) || isNull($document["phone"])|| isNull($document["tour_date"]) || isNull($document["email"])))
        {?>
      <tr>
        <td><?php echo $document["group_size"]?></td>
        <td><?php echo $document["form"]?></td>
        <td><?php echo $document["phone"]?></td>
        <td><?php echo $document["tour_date"]?></td>
        <td><?php echo $document["email"]?></td>
        <td><?php echo $document["url"]?></td>
        <td><?php echo $document["referrer"]?></td>
        <td><?php echo $document["lead_assigned"]?></td>
        <td><?php echo $document["person_assigned"]?></td>
        <td><?php echo $document["status"]?></td>
        <td>
          <form action="" method="POST">
            <h4>Lead Assignment</h4>
            <select class="lead" name="lead">
              <?php
                $company_list=connectDB($server,'phototrip',2)->find();
                foreach($company_list as $val) {
                ?>
                <option value='<?php echo $val['title'];?>'><?php echo $val['title']; ?></option>
              <?php } ?>
            </select><br><h4>Person Assignment</h4>
            <select class="person" name="person">
              <option value='Ananth'>Ananth</option>
              <option value='Nikhil'>Nikhil</option>
              <option value='Rajiv'>Rajiv</option>
              <option value='Abhiram'>Abhiram</option>
            </select><br>
            <h4>Lead Status</h4>
            <select class="status" name="status">
              <option value='New Lead'>New Lead</option>
              <option value='Follow Up'>Follow Up</option>
              <option value='Booked'>Booked</option>
            </select><br><br>
            <input type="submit" name="<?php echo $document['phone']; ?>" value="Update Details">
          </form>
          <?php
          if(isset($_POST[$document['phone']]))
          {
            $document['lead_assigned']=$_POST['lead'];
            $document['person_assigned']=$_POST['person'];
            $document['status']=$_POST['status'];

            updateDB($collection,$document,$document['_id']);
            echo "<meta http-equiv='refresh' content='0'>";
            exit;
          }
          ?>
        </td>
      </tr>
      <?php }
       } ?>
      </tbody>
      </table>
    </div>
</div>
</body>
</html>
<?php
}
else {
  // code...
?>
<html>
  <body style="text-align: center;">
    <h1>ACCESS DENIED!</h1>
    <h2>Please <a href="http://leads.trippyigloo.com:8085/lead-management-system/login.php">Login</a>.</h2>
  </body>
</html>
<?php
}
?>
