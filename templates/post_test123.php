<title>iTHome_Test</title>
    <meta http-equiv="content-type" charset="UTF-8" />

<form method="POST" action="./post_test.php">

    <label for="startdate">開始日期：</label>
    <input type="date" name="startdate" value=<?php echo date("Y-m-d");?>>
    <br/>
    <label for="closedate">結束日期：</label>
    <input type="date" name="closedate" value=<?php echo date("Y-m-d");?>>


    <?php echo date("Ymd")."000";?>

    <br/><br/>
    專案 :
    <select name="project">
        <option value="xxx">全部</option>
        <option value="F01">元氣加油站</option>
        <option value="F02">活力天天樂</option>
        <option value="T01">聰明拜金女</option>
        <option value="T02">冰冰廣告</option>
        <option value="T03">樂活有方</option>
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