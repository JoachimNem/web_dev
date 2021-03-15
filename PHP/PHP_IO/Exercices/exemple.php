<?php
$myfile = fopen("exemple.txt", "r") or die("Unable to open file!");
$monFichier = fread($myfile, filesize("exemple.txt"));
echo ($monFichier);
fclose($myfile);
