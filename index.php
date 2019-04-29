<html>
<head>
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.filterable .btn-filter').click(function(){
          var $panel = $(this).parents('.filterable'),
          $filters = $panel.find('.filters input'),
          $tbody = $panel.find('.table tbody');
          if ($filters.prop('disabled') == true) {
              $filters.prop('disabled', false);
              $filters.first().focus();
          } else {
              $filters.val('').prop('disabled', true);
              $tbody.find('.no-result').remove();
              $tbody.find('tr').show();
          }
        });

      $('.filterable .filters input').keyup(function(e){
          /* Ignore tab key */
          var code = e.keyCode || e.which;
          if (code == '9') return;
          /* Useful DOM data and selectors */
          var $input = $(this),
          inputContent = $input.val().toLowerCase(),
          $panel = $input.parents('.filterable'),
          column = $panel.find('.filters th').index($input.parents('th')),
          $table = $panel.find('.table'),
          $rows = $table.find('tbody tr');
          /* Dirtiest filter function ever ;) */
          var $filteredRows = $rows.filter(function(){
              var value = $(this).find('td').eq(column).text().toLowerCase();
              return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
              $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
            }
          });
        });
        function zoom() {
            document.body.style.zoom = "70%"
        }
  </script>
</head>
<style type="text/css">
  tr:nth-child(even)
  {
    background-color: #f2f2f2;
  }
  th {
  background-color: #56baed;
  color: white;
  }
  tr:hover
  {
    background-color: #ddd;
  }
  table
  {
    border: 1px solid black
  }
  .filterable {
    margin-top: 15px;
  }
  .filterable .panel-heading .pull-right {
      margin-top: -20px;
  }
  .filterable .filters input[disabled] {
    background-color: transparent;
    border: none;
    cursor: auto;
    box-shadow: none;
    padding: 0;
    height: auto;
  }
  .filterable .filters input[disabled]::-webkit-input-placeholder {
    color: white;
  }
  .filterable .filters input[disabled]::-moz-placeholder {
    color: white;
  }
  .filterable .filters input[disabled]:-ms-input-placeholder {
    color: white;
  }
</style>
<?php
function isNull($str)
{
  return (!isset($str) || trim($str) === '');
}

function updateDB($collection,$new_data,$id)
{
  $filter=array('_id' => $id,'phone' => $new_data['phone'] );
  $collection->update($filter, array('$set' => $new_data),array('upsert' => true));
}
?>
<body onload="zoom()">
<div class="row">
  <h1 style="text-align: center"> You are now logged in to TrippyIgloo Lead Management System. </h1>
  <div class="panel panel-primary filterable">
    <div class="panel-heading">
        <h3 class="panel-title">Filter and Search Data</h3>
        <div class="pull-right">
            <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
        </div>
    </div>
<table class="table" style='text-align: center;'>
  <thead>
    <tr class="filters">
      <th><input type="text" class="form-control" placeholder="Group Size" disabled></th>
      <th><input type="text" class="form-control" placeholder="Form" disabled></th>
      <th><input type="text" class="form-control" placeholder="Phone" disabled></th>
      <th><input type="text" class="form-control" placeholder="Tour Date" disabled></th>
      <th><input type="text" class="form-control" placeholder="Email" disabled></th>
      <th><input type="text" class="form-control" placeholder="URL" disabled></th>
      <th><input type="text" class="form-control" placeholder="Referrer" disabled></th>
      <th><input type="text" class="form-control" placeholder="Base URL" disabled></th>
      <th><input type="text" class="form-control" placeholder="Lead Assigned To" disabled></th>
      <th><input type="text" class="form-control" placeholder="Person Assigned To" disabled></th>
      <th><input type="text" class="form-control" placeholder="Lead Status" disabled></th>
      <th>Update Details</th>
    </tr>
</thead>
<tbody>
<?php
$server='mongodb://127.0.0.1:27017'; //replace by server details e.g "mongodb://admu:new_pass@localhost:27017/university"
try
{
    $m= new MongoClient($server);
}
catch (MongoConnectionException $connectionException)
{
    print $connectionException;
    exit;
}
$db=$m->selectDB('fullstack');
$collection = $db->clients;//replcae client by name of Your collection
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
  <td><?php echo $document["base_url"]?></td>
  <td><?php echo $document["lead_assigned"]?></td>
  <td><?php echo $document["person_assigned"]?></td>
  <td><?php echo $document["status"]?></td>
  <td>
    <form action="" method="POST">
      <h4>Lead Assignment</h4>
      <select class="lead" name="lead">
        <?php foreach($document["company_list"] as $val) {
          ?>
          <option value='<?php echo $val;?>'><?php echo $val; ?></option>
        <?php } ?>
      </select><br><h4>Person Assignment</h4>
      <select class="person" name="person">
        <?php foreach($document["person_list"] as $val) {
          ?>
          <option value='<?php echo $val;?>'><?php echo $val; ?></option>
        <?php } ?>
      </select><br>
      <h4>Lead Status</h4>
      <select class="status" name="status">
        <?php foreach($document["lead_status"] as $val) {
          ?>
          <option value='<?php echo $val;?>'><?php echo $val; ?></option>
        <?php } ?>
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
