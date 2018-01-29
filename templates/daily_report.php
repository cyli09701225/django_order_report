<?php
        $serverName = "192.168.1.221"; //serverName\instanceName
        $connectionInfo = array( "Database"=>"KGI", "UID"=>"sa", "PWD"=>"dsc@28674287", "CharacterSet" => "UTF-8");
        $conn = sqlsrv_connect( $serverName, $connectionInfo);
?>
<!DOCTYPE html>
<html>
<head>
    <title>訂單查詢</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="/css/normalize.css" />
    <link rel="stylesheet" href="/css/daily_report.css" />
</head>
<body>
<div id="main">
    <div class="select">
        <form method="POST" action="./post_test.php">
            <label for="startdate">開始日期：</label>
            <input type="date" name="startdate" value=<?php echo date("Y-m-d");?>>
            <br/>
            <label for="closedate">結束日期：</label>
            <input type="date" name="closedate" value=<?php echo date("Y-m-d");?>>
            <br/><br/>
            專案 :
            <select name="project">
                <option value="xxx">全部</option>
                <option value="F01">元氣加油站</option>
                <option value="F02">活力天天樂</option>
                <option value="T01">聰明拜金女</option>
                <option value="T02">冰冰廣告</option>
                <option value="T03">樂活有方</option>
                <option value="001">MYMY網路</option>
                <option value="002">東森購物</option>
                <option value="003">MOMO購物</option>
                <option value="004">生活市集</option>
                <option value="005">全國漁會</option>
                <option value="006">全國農會</option>
                <option value="007">養殖基金會</option>
                <option value="008">新北市農會</option>
                <option value="008">活動</option>
            </select>
            <br/><br/>

            客服人員 :
            <select name="business">
                <option value="xxx">全部</option>
                <option value="0001">陳佳如</option>
                <option value="0002">曹春娥</option>
                <option value="0003">陳嬿妃</option>
                <option value="0004">陳宣如</option>
                <option value="0005">林意玲</option>
                <option value="0006">陳瑛招</option>
                <option value="0007">喬慧琴</option>
                <option value="0008">詹清月</option>
                <option value="0009">王遐萍</option>
                <option value="0010">劉佟殷</option>
            </select>
            <br/><br/>
            <input type="submit" value="確定送出" />
        </form>
    </div>


    <div class="order_table">
    <?php
    $start_date = " where dbo.COPTC.TC002>='".date("Ymd")."000'";
    $select_order = "select * from KGI.dbo.COPTC". $start_date;
    $close_date = " and dbo.COPTC.TC002<='".date("Ymd")."999'";
    $select_order = $select_order. $close_date. " order by TC056;";

    $result = sqlsrv_query($conn, $select_order); //select dbo.COPTC資料表

    if($result == false) {
        die( print_r( sqlsrv_errors(), true));
    }
    else{
        echo "<div class='order' id='all'>";
        $total_price = 0;
        $total_num = 0;
        while( $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ){
            $total_price = $total_price + $row['TC029'] + $row['TC030'];
            $total_num = $total_num +1;
        }
        echo "訂單數量 : ". $total_num. " 訂單總金額 : ". $total_price;
        echo "</div>";

        $result = sqlsrv_query($conn, $select_order); //select dbo.COPTC資料表
        while( $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC) ) {
        echo "<div class='order'>";
        echo "訂單編號 : ". $row['TC002']. ", 客戶代號 : ". $row['TC004']. ", 客戶名稱 : ". $row['TC018']. ", 通路案別 : ". $row['TC056']."<br />"; //echo資料欄ID 與 SAA列

        $select_goods = "select * from KGI.dbo.COPTD where dbo.COPTD.TD002='". $row['TC002']."';";
        $result_goods = sqlsrv_query($conn,  $select_goods); //select dbo.COPTC資料表
        echo "<div class='goods'>";
        while( $row = sqlsrv_fetch_array($result_goods, SQLSRV_FETCH_ASSOC) ) {
            echo "商品編號 : ". $row['TD004']. ", 商品名稱 : ". $row['TD005']. ", 數量 : ". $row['TD008']. ", 單位 : ". $row['TD010']. ", 金額 : ". $row['TD011']."<br />"; //echo資料欄ID 與 SAA列
        }
        echo "</div>";
        echo "</div>";
        }
    }
    // Close the connection.
    sqlsrv_close($conn);
    ?></div>

</div>
</body>
</html>