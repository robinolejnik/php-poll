<?php
if (isset($_GET["name"])) {
$pollname=$_GET["name"];
require_once("poll.php");
header("Content-Type: image/jpeg");
$height= array (0,0,20,40,60,80,100,120,140,160,180,200,220,240,260,280,300);
$height2=array(0,15,35,55,75,95,115,135,155,175,195,215,235,255,275,295,315);
$width=100;

$itemcount=get_nr_of_items($pollname);

$img=imagecreate($width,$height[$itemcount+1]+1);
$tr=imagecolorallocate($img,255,255,255);
imagefill($img,0,0,$tr);
//imagecolortransparent($img,$tr);

$col=imagecolorallocate($img,0,0,255);
$backcol=imagecolorallocate($img,0,192,255);
$textcol=imagecolorallocate($img,200,200,255);

for ($i=1;$i<$itemcount+1;$i++) {
$val[$i]=getpolls($pollname,$i);

imagefilledrectangle($img,0,$height[$i],$width,$height2[$i],$backcol);
imagefilledrectangle($img,0,$height[$i],$val[$i]*$width/100,$height2[$i],$col);

imagestring($img,2,30,$height[$i]+1,get_item_name($pollname,$i),$textcol);
imagestring($img,3,5,$height[$i]+1,round($val[$i])."%",$textcol);
}
imagejpeg($img,null,100);
imagedestroy($img);
}
?>