<?php
    
    // Your mysql-connection data
    define('SQL_SERVER','localhost'); // Database Server
    define('SQL_USER','USERNAME'); // Your mysql User
    define('SQL_PASS','PASSWORD'); // Your mysql Password
    define('SQL_DB','DATABASE'); // Your mysql database
    
    define('MESSAGE_DELETE','1'); // How many month till a message is completly deleted
    
    // Creating the connection using the above configuration
    mysql_connect(SQL_SERVER,SQL_USER,SQL_PASS) or die("Error: ".mysql_error()); // Connection to the server
    mysql_select_db(SQL_DB) or die("Error: ".mysql_error()); // Connecting to the database
    
?>