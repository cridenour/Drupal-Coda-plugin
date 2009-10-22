#!/usr/bin/php
<?php

fwrite(STDOUT, tiny_url(stream_get_contents(STDIN))); 

exit(0);

function tiny_url($url) {
  $api = "http://tinyurl.com/api-create.php?url={$url}";

  if (function_exists('curl_init')) {
    $session = curl_init();
    curl_setopt($session, CURLOPT_URL, $api);
    curl_setopt($session, CURLOPT_RETURNTRANSFER, 1);
    $url = curl_exec($session);
    curl_close($session);
  }
  return $url;
}

?>