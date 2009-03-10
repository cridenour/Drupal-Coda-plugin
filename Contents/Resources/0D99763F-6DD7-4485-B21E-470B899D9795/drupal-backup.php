#!/usr/bin/php
<?php
print 'qsdflkj';
if ($_ENV['CODA_SITE_LOCAL_PATH']) {
  chdir($_ENV['CODA_SITE_LOCAL_PATH']);
  
  require_once './includes/bootstrap.inc';
  drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
 
  _coda_backup_migrate_dump_tables();
}

/**
 * Build the database dump file. Takes a list of tables to exclude and some formatting options.
 */
function _coda_backup_migrate_dump_tables() {
  $filename = $_ENV['CODA_SITE_LOCAL_PATH'] . '/sql/dump.sql';

  // Dump the database.
  $temp_file = _backup_migrate_temp_file();

  $success = _backup_migrate_get_dump_sql(
    $filename, 
    variable_get("backup_migrate_exclude_tables", _backup_migrate_default_exclude_tables()),
    variable_get("backup_migrate_nodata_tables", _backup_migrate_default_structure_only_tables())
  );
  $filename .= ".sql";
  $filemime = 'text/x-sql';


  // Save or download the results.
  if ($success) {
    rename($temp_file, $filepath);
  }

  // Delete any temporary files we've created.
  _backup_migrate_temp_file("", TRUE);
}

?>