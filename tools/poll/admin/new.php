<html>
<head>
<title></title>
<meta name="author" content="Robin">
<meta name="editor" content="html-editor phase 5">
</head>
<body text="#000000" bgcolor="#FFFFFF" link="#FF0000" alink="#FF0000" vlink="#FF0000">
<h1>Neue Umfrage</h1>
<a href="index.php">zurück</a>
<?php
require_once("/../config.php");
require_once("/../poll.php");
echo "<form name='new' method=post action='".$_SERVER['PHP_SELF']."'>";


if (isset($_POST["question"])) {
$question=strip_tags(trim($_POST["question"]));

if (isset($_POST["pollname"])) {
$pollname=strip_tags(trim($_POST["pollname"]));

if (!$pollname==0) {
if (!$question==0) {
//echo $question;


$a=0;
for($i=1;$i<17;$i++) {
if (isset($_POST["item".$i])) {
$temp=strip_tags(trim($_POST["item".$i]));
if (!$temp==0) {
$a++;
$item[$a]=$temp;
}
}
}

if ($a<2) {
echo "<font color=#ff0000>Es müssen mindestens zwei Optionen angebeben sein!</font><br>";
print_addform();
} else {
echo "<br>";
for($i=1;$i<17;$i++) {
if (!$item[$i]==0) {
echo "<p>item".$i."=".$item[$i]."</p>";
add_item($pollname,$item[$i],$i);
}
}
add_data($question,$a,$pollname);
}

} else {
echo "<font color=#ff0000>Bitte eine Frage angeben!</font><br>";
print_addform();
}
} else {
echo "<font color=#ff0000>Bitte einen Namen angeben!</font><br>";
print_addform();
}
} else {
print_addform();
}

} else {
print_addform();
}
?>

</form>
</body>
</html>