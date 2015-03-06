<?php 
// Local server settings
 
// Local Database
define('DB_NAME', 'isa_new');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_HOST', 'localhost');
 
// Overwrites the database to save keep edeting the DB
define('WP_HOME','http://localhost/isa_new/htdocs/'); //e.g. http://192.168.1.11/ISA/website/htdocs
define('WP_SITEURL','http://localhost/isa_new/htdocs/');
 
// Turn on debug for local environment
define('WP_DEBUG', true);

?>