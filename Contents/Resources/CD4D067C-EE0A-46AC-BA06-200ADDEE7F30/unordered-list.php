#!/usr/bin/php

<?php

$text = stream_get_contents(STDIN);
$output = str_replace("\t", "", $text);
$output=str_replace("\n", "</li>\n\t<li>", $output);

fwrite(STDOUT, "<ul>\n\t<li>".$output."<li>\n</ul>"); 

exit(0);

?>