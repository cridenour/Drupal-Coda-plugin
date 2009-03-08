#!/usr/bin/php
<?php

$text = stream_get_contents(STDIN);
fwrite(STDOUT, db_prefix_tables($text));

function db_prefix_tables($sql) {
  $db_prefix = '';

  if (is_array($db_prefix)) {
    if (array_key_exists('default', $db_prefix)) {
      $tmp = $db_prefix;
      unset($tmp['default']);
      foreach ($tmp as $key => $val) {
        $sql = strtr($sql, array('{'. $key .'}' => $val . $key));
      }
      return strtr($sql, array('{' => $db_prefix['default'], '}' => ''));
    }
    else {
      foreach ($db_prefix as $key => $val) {
        $sql = strtr($sql, array('{'. $key .'}' => $val . $key));
      }
      return strtr($sql, array('{' => '', '}' => ''));
    }
  }
  else {
    return strtr($sql, array('{' => $db_prefix, '}' => ''));
  }
}