<?php
    header("Content-Type: text/xml");   //XML 文件
    //取得欄位值
    $name = ($_GET["name"]);
    echo "<result>";
    echo "<name> 你 好 ！". $name. "</name>";
    echo "</result>";
?>