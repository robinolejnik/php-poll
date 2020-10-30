<?php
require_once("config.php");

function open_mysql($sql="") {
$db = mysql_connect(mysql_host, mysql_user, mysql_pass);
mysql_select_db(mysql_db,$db);
$result = mysql_query($sql,$db);
$db_close;
if (!$result==0) {
return $result;
}
}

function getpolls($table="",$value) {
$sql = "SELECT id FROM user WHERE selection=".$value." AND name='".$table."'";
$result=open_mysql($sql);
$polls=mysql_num_rows($result);
$sql = "SELECT id FROM user WHERE name='".$table."'";
$result=open_mysql($sql);
$allpolls=mysql_num_rows($result);
if ($allpolls==0) {
$allpolls=1;
}
return 100/$allpolls*$polls;
}

function addpffgfgll($table,$value) {
$sql = "INSERT INTO ".$table." (selection) VALUES(".$value.")";
$result=open_mysql($sql);
}
function setpoll($table="",$selection=0) {
$sql = "INSERT INTO user (ip,time,name,selection) VALUES('".$_SERVER["REMOTE_ADDR"]."',".time().",'".$table."', ".$selection.")";
$result=open_mysql($sql);
}

function getdata($table="") {
$timedif=time()-wait_time;
$sql = "SELECT time FROM user WHERE ip='".$_SERVER["REMOTE_ADDR"]."' AND name='".$table."' AND time>".$timedif;
$result=open_mysql($sql);
if(mysql_num_rows($result)>0) {
return false;
} else {
return true;
}
}

function get_nr_of_items($table="") {
$sql = "SELECT itemcount FROM data WHERE pollname='".$table."'";
$result=open_mysql($sql);
$result = mysql_fetch_array($result);
return $result["itemcount"];
}

function get_question ($table="") {
$sql = "SELECT question FROM data WHERE pollname='".$table."'";
$result=open_mysql($sql);
$result = mysql_fetch_array($result);
return $result["question"];
}

function get_item_name($table="",$item_nr=0) {
$sql = "SELECT itemname FROM items WHERE pollname='".$table."' AND itemnr='".$item_nr."'";
$result=open_mysql($sql);
$result = mysql_fetch_array($result);
return $result["itemname"];
}

function printform($table="") {
echo "<form name='form_umfrage' method=post action='".$_SERVER["PHP_SELF"]."?".$_SERVER["QUERY_STRING"]."'>";
echo "<input type=hidden name='send' value=1>";
echo "<input type=hidden name='name' value='".$table."'>";
echo "<table border=0>";
for ($i=1;$i<get_nr_of_items($table)+1;$i++) {
echo "<tr><td>".get_item_name($table,$i);
echo "</td><td><input type=radio name='umfrage' value='".$i."'>";
echo "</td></tr>";
}
echo "</table>";
echo "<p><input type=submit name='submit' value='Abstimmen'></p>";
echo "</form>";
}

function umfrage($table="") {
echo "<div align=center>";
echo "<fieldset><legend>Umfrage</legend>";
echo "<h5>".get_question($table)."</h5>";
if(!isset($_POST["send"])) {
   $ok=getdata($table);
   if($ok==true) {
      printform($table);
   }
} else {
   if(!isset($_POST["umfrage"])) {
      printform($table);
      echo "<font color=#ff0000>Bitte eine Angabe machen!</font>";
   }
   if(isset($_POST["umfrage"])) {
      $ok=getdata($table);
      if($ok==true) {
         if(isset($_POST["name"])) {
            if($_POST["name"]==$table) {
               setpoll($table,$_POST["umfrage"]);
               echo "<font color=#007f00>Danke für die Teilnahme!</font>";
            } else {
            printform($table);
            }
         }
      } else {
         echo "<font color=#ff0000>Es wurde bereits abgestimmt!</font>";
      }
   }
  echo "<br><br>";
}
echo "<img src='tools/poll/poll_graph.php?name=".$table."'>";
echo "</fieldset>";
echo "</div>";
}

function print_addform() {
echo "<br>Frage:<br><input type=text name='question' value='".$_POST["question"]."' size='100' maxlength='64'>";
echo "<br>Name:<br><input type=text name='pollname' value='".$_POST["pollname"]."' size='20' maxlength='16'>";
echo "<br><br><input type=submit value='Weiter'>";
for ($i=1;$i<17;$i++) {
echo "<p>".$i.". Option:&nbsp<input type=text value='".$_POST["item".$i]."' name='item".$i."' size='20' maxlength='16'></p>";
}
}

function add_data($question="",$itemcount=0,$pollname="") {
$sql = "INSERT INTO data (question,itemcount,pollname) VALUES('".$question."', ".$itemcount.", '".$pollname."')";
$result=open_mysql($sql);
}

function add_item($pollname="",$itemname="",$itemnr=0) {
$sql = "INSERT INTO items (pollname,itemname,itemnr) VALUES('".$pollname."', '".$itemname."', ".$itemnr.")";
echo "<br><br>";
echo $sql;
$result=open_mysql($sql);
}

?>