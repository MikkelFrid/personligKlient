<?php
include("encryption.php");

$tis = "DetteErEnTest";

$tis = x_Encrypt($tis, "17");
echo $tis;

$fp = fsockopen("localhost", 8888, $errno, $errstr, 30);
if (!$fp) {
    echo "$errstr ($errno)<br />\n";
} else {
    fwrite($fp, "test");
    while (!feof($fp)) {
        echo fgets($fp, 128);
    }
    fclose($fp);
}

?>