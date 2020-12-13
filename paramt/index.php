<?php include "shared/head.php"; ?>
<form action="" method="POST">
    <table>
    <tr>
            <td>
            <textarea rows="10" cols="80" name="text"><?php echo $_POST["text"];?></textarea>
            </td>
    </tr>
    <tr>
        <td><button type="submit">Translate</button></td>
    </tr>
    </table>
</form>
<?php
if(isset($_POST["text"]))
{
    include_once "youdao_transapi.php";
    $query=$_POST["text"];
    $zh_CHS = "zh-CHS";
    $en = "en";
    $youdao_translation = translate($query, $zh_CHS, $en);

    $youdao_result = $youdao_translation["translation"][0];

    $youdao_back_translation = translate($youdao_result,$en,$zh_CHS);

    $youdao_back_result = $youdao_back_translation["translation"][0];

    similar_text($query,$youdao_back_result,$y_percentage);

    echo "
    <table border='1'>
        <tr>
            <td>Youdao Translate</td>
        </tr>
        <tr>
            <td>".$youdao_translation["translation"][0]."</td>
        </tr>
        <tr>
            <td>Back Translation: </td>
        </tr>
        <tr>
            <td>".$youdao_back_result."</td>
        </tr>
        <tr>
            <td>Back Translation Similarity: ".$y_percentage."</td>
        </tr>
    </table>
    ";
}
else
{
    echo "Please enter text";
}
?>
<?php include "shared/foot.php"; ?>


<!-- 
// // $ret = json_decode($ret, true);
// $source="北京语言大学高级翻译学院成立于2011年5月20日。";
// $query = $source;
// $from = "zh-CHS";
// $to = "en";
// // $youdao_translation = translate($query, $from, $to);
// $ret = do_request($source,$from,$to);
// echo $ret["translation"][0];


// // echo "The source text is: ".$query."<br>";
// // echo "The machine translation by Youdao is: ".$youdao_translation["translation"][0];
// ?> -->