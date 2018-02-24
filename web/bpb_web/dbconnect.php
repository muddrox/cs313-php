<?php
    function get_db() {
        $dbHost = 'localhost';
        $dbPort = '5432';

        $dbName = 'bpb_db';

        $dbUser = 'bpb_user';
        $dbPass = 'benchit';

        $db = NULL;

        try {
            $dbUrl = getenv('DATABASE_URL');

            if ( !isset($dbUrl) || empty($dbUrl) ) {
                $dbUrl = "postgres://$dbUser:$dbPass@$dbHost:$dbPort/$dbName";
            }

            $dbOpts = parse_url($dbUrl);

            $dbHost = $dbOpts['host'];
            $dbPort = $dbOpts['port'];
    
            $dbUser = $dbOpts['user'];
            $dbPass = $dbOpts['pass'];
    
            $dbName = ltrim($dbOpts['path'], '/');

            $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPass);
            
            $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch(PDOException $ex) {
            echo "Connection to $dbName failed.  Error Message: $ex";
            die();
        }

        return $db;
    }
?>