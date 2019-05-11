<?php
function updateDB($collection,$new_data,$id)
{
  require 'vendor/autoload.php';
  $filter=array('_id' => $id,'phone' => $new_data['phone'] );
  $collection->updateOne($filter, array('$set' => $new_data),array('upsert' => true));
}
/*add functions to insert or delete data after this */
?>
