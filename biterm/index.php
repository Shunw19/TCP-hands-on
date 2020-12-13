<?php include "shared/head.php"; ?>
<form action="" method="POST">
    <table>
    <tr>
        <td><textarea rows="10" name="text"></textarea></td>
    </tr>
    <tr>
        <td><button type="submit">Start replace</button></td>
    </tr>
    </table>    
</form>
<?php 
$text=$_POST["text"];
$english_punc_chinese = "/([A-z0-9])[，]([一-龟])/u";
$replacement = "$1\t$2";
$out = preg_replace($english_punc_chinese, $replacement, $text);
echo
'<table>
    <tr>
        <td><textarea rows="10" name="text">'.$out.'</textarea></td>
    </tr>
</table>';
?>
<?php include "shared/foot.php"; ?>