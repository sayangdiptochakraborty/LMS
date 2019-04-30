<?php
function isNull($str)
{
  return (!isset($str) || trim($str) === '');
}
?>
