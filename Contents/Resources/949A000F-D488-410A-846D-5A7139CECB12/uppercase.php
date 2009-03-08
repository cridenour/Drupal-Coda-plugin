#!/usr/bin/php
<?php

$fp = fopen('php://stdin', 'r');

while ( $line = fgets($fp, 4096) )
	echo strtoupper($line); 

fclose($fp);

?>