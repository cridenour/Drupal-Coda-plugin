#!/usr/bin/php

<?php

fwrite(STDOUT, print_r(json_decode(stream_get_contents(STDIN)) , TRUE)); 

exit(0);

?>