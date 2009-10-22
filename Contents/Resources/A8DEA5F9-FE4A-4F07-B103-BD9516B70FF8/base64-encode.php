#!/usr/bin/php
<?php

fwrite(STDOUT, base64_encode(stream_get_contents(STDIN)) ); 

exit(0);

?>