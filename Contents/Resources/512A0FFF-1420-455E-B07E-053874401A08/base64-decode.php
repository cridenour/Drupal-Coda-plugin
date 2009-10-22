#!/usr/bin/php
<?php

fwrite(STDOUT, base64_decode(stream_get_contents(STDIN)) ); 

exit(0);

?>