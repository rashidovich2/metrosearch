<?php
include ("mysqli/class/mysql_crud.php");
$db = new Database();
$db->connect();
if(!empty($_POST["keyword"])) {
$db->sql("SELECT * FROM cls_metro WHERE station like '" . $_POST["keyword"] . "%' ORDER BY station LIMIT 0,6");
$result = $db->getResult();
if(!empty($result)) {
?>
<ul id="metro-list">
<?php
foreach($result as $metro) {
switch($metro['lineid']) {
    case 1:
        $color = "red";
    break;
    case 2:
        $color = "green";
    break;
    case 3:
        $color = "darkblue";
        break;
    case 4:
        $color = "deepskyblue";
        break;
    case 5:
        $color = "darkred";
        break;
    case 6:
        $color = "darkorange";
        break;
    case 7:
        $color = "darkviolet";
        break;
    case 8:
        $color = "gold";
        break;
    case 9:
        $color = "grey";
        break;
    case 10:
        $color = "lightgreen";
        break;
    case 11:
        $color = "lightseagreen";
        break;
    case 12:
        $color = "lavender";
        break;
    case 13:
        $color = "royalblue";
        break;
}
?>
<li onClick="selectMetro('<?php echo $metro["station"]; ?>');"><span style="color:<?php echo $color; ?>"><b>|</b>   </span><?php echo $metro["station"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>


