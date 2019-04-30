<?php
function connectDB($server,$dbName,$var) //$var =0 login.php calling, $var =1 index.php calling
{
  try
  {
      $m= new MongoClient($server);
  }
  catch (MongoConnectionException $connectionException)
  {
      print $connectionException;
      exit;
  }
  $db=$m->selectDB($dbName);
  if($var==0) //login php
  {
    $collection = $db->userdb;//replcae clients by name of Your collection*/
  }
  else {
    $collection = $db->clients;
  }
  return $collection;
}

?>
