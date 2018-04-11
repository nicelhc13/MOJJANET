<?php if(!defined("__XE__")) exit();
$db_info = (object)array (
  'master_db' => 
  array (
    'db_type' => 'mysqli',
    'db_port' => '3306',
    'db_hostname' => 'localhost',
    'db_userid' => 'laundary',
    'db_password' => 'Goodho532',
    'db_database' => 'laundary',
    'db_table_prefix' => 'xe_',
  ),
  'slave_db' => 
  array (
    0 => 
    array (
      'db_type' => 'mysqli',
      'db_port' => '3306',
      'db_hostname' => 'localhost',
    'db_userid' => 'laundary',
    'db_password' => 'Goodho532',
    'db_database' => 'laundary',
      'db_table_prefix' => 'xe_',
    ),
  ),
  'default_url' => 'http://mojja.net/',
  'lang_type' => 'ko',
  'use_mobile_view' => 'Y',
  'use_rewrite' => 'Y',
  'time_zone' => '+0900',
);