<?php
$serverName = "192.168.1.221"; //serverName\instanceName
$connectionInfo = array( "Database"=>"KGI", "UID"=>"sa", "PWD"=>"dsc@28674287", "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
$result_order = sqlsrv_query($conn, "select * from KGI.dbo.COPTC where dbo.COPTC.TC002>='20180119000' order by TC056;"); //select dbo.COPTC資料表

if($result_order == false) {
    die( print_r( sqlsrv_errors(), true) );
   }
else{
    while( $row = sqlsrv_fetch_array($result_order, SQLSRV_FETCH_ASSOC) ) {
        echo "訂單編號 : ". $row['TC002']. ", 客戶代號 : ". $row['TC004']. ", 客戶名稱 : ". $row['TC018']. ", 通路案別 : ". $row['TC056']."<br />"; //echo資料欄ID 與 SAA列
        
        $select_goods = "select * from KGI.dbo.COPTD where dbo.COPTD.TD002='". $row['TC002']."';";
        $result_goods = sqlsrv_query($conn,  $select_goods); //select dbo.COPTC資料表
        while( $row = sqlsrv_fetch_array($result_goods, SQLSRV_FETCH_ASSOC) ) {
            echo "商品編號 : ". $row['TD004']. ", 商品名稱 : ". $row['TD005']. ", 數量 : ". $row['TD008']. ", 單位 : ". $row['TD010']. ", 金額 : ". $row['TD011']."<br />"; //echo資料欄ID 與 SAA列
        }
    


    }
}
   // Close the connection.
sqlsrv_close($conn);
?>