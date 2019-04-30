<?php
function updateDB($collection,$new_data,$id)
{
  $filter=array('_id' => $id,'phone' => $new_data['phone'] );
  $collection->update($filter, array('$set' => $new_data),array('upsert' => true));
}
/*add functions to insert or delete data after this */
?>
