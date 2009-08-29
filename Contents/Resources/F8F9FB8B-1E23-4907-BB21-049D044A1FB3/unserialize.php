#!/usr/bin/php

<?php

fwrite(STDOUT, print_r(unserialize(stream_get_contents(STDIN)) , TRUE)); 

exit(0);

?>