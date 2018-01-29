<?php
$serverName = "192.168.1.221"; //serverName\instanceName
$connectionInfo = array( "Database"=>"KGI", "UID"=>"sa", "PWD"=>"dsc@28674287", "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
 echo "Connection established.<br />";
}else{
 echo "Connection could not be established.<br />";
 die( print_r( sqlsrv_errors(), true));
}
// Close the connection.
sqlsrv_close($conn);
?>