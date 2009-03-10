#!/usr/bin/php
<?php

$input = "";

$fp = fopen("php://stdin", "r");
while ( $line = fgets($fp, 1024) )
	$input .= $line;
	
fclose($fp);

$input = rtrim($input);
$lines = split("[\r\n]+", $input);
for ($i = 0; $i < count($lines); $i++) {
  $lines[$i] = trim($lines[$i]);
}
$input = implode('', $lines);
echo $input . "\n";

?>