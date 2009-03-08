#!/usr/bin/php
<?php

if ($_ENV['CODA_SITE_LOCAL_PATH']) {
  chdir($_ENV['CODA_SITE_LOCAL_PATH']);
  
  require_once './includes/bootstrap.inc';
  drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
  
  drupal_flush_all_caches();
}

?>