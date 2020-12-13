<?php include "shared/head.php"; ?>

<table width="89%" border="1">
    <tbody>
        <tr>
            <td width="21%">
                <p><strong>ID </strong></p>
            </td>
            <td width="31%">
                <p><strong>Zh </strong></p>
            </td>
            <td width="46%">
                <p><strong>En </strong></p>
            </td>
        </tr>

<?php include "shared/conn.php"; ?>

<?php
    mysqli_select_db($conn,"stiterm");
    $sql = "SELECT ID, zh_CN, en_US FROM TermData"; //SELECT语句 sql查询语句: SELECT字段名称 FROM数据表名称 （从数据表中选取数据）
    //mysqli_query() used to configure the charset to avoid gibberish characters.
    mysqli_query($conn,"set names 'utf8'");
    // mysqli_query() used to execute the SELECT statement and then assign the result
    // to the variable $getterm.
    $getterm = mysqli_query($conn,$sql);
    // print_r($getterm);
    if(! $getterm)
        {
            echo "Fail to get term data, please check again";
        }
    else
        {
            while ($row = mysqli_fetch_array($getterm, MYSQLI_ASSOC))

            {
                echo "<tr>
                        <td width='21%'>
                        <p>{$row["ID"]}</p>
                        </td>
                        <td width='31%'>
                        <p>{$row["zh_CN"]}</p>
                        </td>
                        <td width='46%'>
                        <p>{$row["en_US"]}</p>
                        </td>
                      </tr>";

            }
        }


    mysqli_close($conn);
?>
    </tbody>
</table>
<?php include "shared/foot.php"; ?>