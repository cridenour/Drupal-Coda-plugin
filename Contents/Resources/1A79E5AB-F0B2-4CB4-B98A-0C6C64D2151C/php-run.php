#!/usr/bin/php
<?php

$text = stream_get_contents(STDIN);

if (stripos(trim($text), '<?php') === 0) {
  $output = eval('?>'. $text);
}
else {
  $output = eval($text);
}

fwrite(STDOUT, $output); 

exit(0);

?>