#!/usr/bin/php
<?php

$text = stream_get_contents(STDIN);
fwrite(STDOUT, indent($text)); 

/**
 * Indent php source code
 */
function indent($str)
{
  $indent_chars = "  ";
	$count = substr_count($str, '}') - substr_count($str, '{');

	if ( $count < 0 )
	{
		$count = 0;
	}

	$strarray=explode("\n", $str);

	for( $i=0; $i < count($strarray); $i++)
	{
		$strarray[$i]=trim($strarray[$i]);
		if (strstr($strarray[$i], '}'))
		{
			$count--;
		}

		if (preg_match("/^case\s/i", $strarray[$i]))
		{
			$level = str_repeat($indent_chars, ($count-1) );
		} else if (preg_match("/^or\s/i", $strarray[$i]))
		{
			$level = str_repeat($indent_chars, ($count+1));
		} else 
		{
			$level = str_repeat($indent_chars, $count);
		}

		$strarray[$i] = $level . $strarray[$i];
		
		if (strstr($strarray[$i], '{'))
		{
			$count++;
		}
	}
	$formatdstr=implode("\n", $strarray);
	return  $formatdstr;
}