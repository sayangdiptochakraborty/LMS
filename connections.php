<?php
require 'vendor/autoload.php';
function connectDB($server,$dbName,$var) //$var =0 login.php calling, $var =1 index.php calling
{
  $m= new MongoDB\Client($server);
  $db=$m->selectDatabase($dbName);
  if($var==0) //login php
  {
    $collection = $db->lmslogin;//replcae lmslogin by name of Your collection*/
   }
  elseif($var==1)//index.php
  {
    $collection = $db->leads;//replcae leads by name of Your collection*/
  }
  else //comapny list
  {
    $collection=$db->companies; //replcae companies by name of Your collection*/
  }
  //$collection=$collection->find()->toArray();
  return $collection;
}

?>
