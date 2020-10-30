<?php
if (isset($_POST["question"])) {
$question=strip_tags(trim($_POST["question"]));


if (!$question==0) {
echo $question;

for($i=1;$i<17;$i++) {
if (isset($_POST["item".$i])) {
$temp=strip_tags(trim($_POST["item".$i]));

if (!$temp==0) {
$a++;
$item[$a]=$temp;
echo "<p>item".$i."=".$item[$a]."</p>";
}
}
}



} else {
echo "<font color=#ff0000>Bitte eine Frage angeben!</font>";
}


}



echo "<br><br><br><br>";
for($i=1;$i<17;$i++) {
echo $item[$i];
echo "<br>";
}





?>