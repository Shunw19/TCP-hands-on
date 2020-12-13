<?php include "shared/head.php"; ?>
<form action="" method="POST">
    <table>
        <tr>
            <td><textarea rows="10" name="text">北京语言大学（Beijing Language and Culture University, BLCU）成立于1962年。</textarea></td>
        </tr>
        <tr>
            <td><button type="submit">Calculate Wordcount</button></td>
        </tr>
    </table>
</form>
<?php 
$text=$_POST["text"];
echo "Wordcount (English): ".str_word_count($text)."<br>";
echo "Words (English) include: ";
$english_char_num="0";
foreach(str_word_count($text,1) as $english)
{
    $english_char_num = $english_char_num + strlen($english);
    echo $english." ";
}
echo "<br>"."Total wordcount (English) is: ".$english_char_num."<br>";
echo "Total count (space): ".substr_count($text," ")."<br>";

$chinese_punct="，。、！？：；﹑•＂…‘’“”〝〞∕¦‖—　〈〉﹞﹝「」‹›〖〗】【»«』『〕〔》《﹐¸﹕︰﹔！¡？¿﹖﹌﹏﹋＇´ˊˋ―﹫︳︴¯＿￣﹢﹦﹤‐¬˜﹟﹩﹠﹪﹡﹨﹍﹉﹎﹊ˇ︵︶︷︸︹︿﹀︺︽︾ˉ﹁﹂﹃﹄︻︼（）";
$pattern = array("/[[:punct:]]/i","/['.$chinese_punct.']/u","/[[:alnum:]]/","/[[:space:]]/");
$chinese = preg_replace($pattern, '', $text);
echo "Words (Chinese) include: ".$chinese."<br>";
echo "Wordcount (Chinese): ".mb_strlen($chinese, "utf8")."<br>";
preg_match_all("/\d+/",$text,$matches);
echo "Numbers includes: ";
$number_char_num="0";
foreach($matches[0] as $number)
{
    $number_char_num=$number_char_num+strlen($number);
    echo $number." ";
}
echo "<br>"."Total count (number): ".count($matches[0])."<br>";
echo "Total character count (number): ".$number_char_num."<br>";
preg_match_all("/[[:punct:]]/i",$text,$punct_matches);
echo "The English punctuation count: ".count($punct_matches[0])."<br>";
preg_match_all("/['.$chinese_punct.']/u",$text,$chinese_punct_matches);
echo "The Chinese punctuation count: ".count($chinese_punct_matches[0])."<br>";
echo "According to the word count calculation method in Word, the wordcount in this text is: ";
echo mb_strlen($chinese, "utf8")+str_word_count($text)+count($matches[0])+count($punct_matches[0])+count($chinese_punct_matches[0])."."."<br>";

echo "According to the word count calculation method in Word, the wordcount (space excluded) in this text is: ";
echo mb_strlen($chinese, "utf8")+$english_char_num+$number_char_num+count($punct_matches[0])+count($chinese_punct_matches[0])."."."<br>";

echo "According to the word count calculation method in Word, the wordcount (space included) in this text isL ";
echo mb_strlen($chinese, "utf8")+$english_char_num+$number_char_num+count($punct_matches[0])+count($chinese_punct_matches[0])+substr_count($text," ").".";
?>
<?php include "shared/foot.php"; ?>
