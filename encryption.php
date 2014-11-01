<?php

function x_Encrypt($string, $key)
{
  for($i=0; $i<strlen($string); $i++)
  {
    for($j=0; $j<strlen($key); $j++)
    {
      $string[$i] = $string[$i]^$key[$j];
    }
  }

  return $string;
}



function x_Decrypt($string, $key)
{
  for($i=0; $i<strlen($string); $i++)
  {
    for($j=0; $j<strlen($key); $j++)
    {
      $string[$i] = $key[$j]^$string[$i];
    }
  }

  return $string;
}


?>