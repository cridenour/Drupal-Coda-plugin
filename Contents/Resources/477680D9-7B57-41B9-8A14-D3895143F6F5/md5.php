#!/usr/bin/php
<?php

fwrite(STDOUT, md5(stream_get_contents(STDIN)) ); 

exit(0);

?>