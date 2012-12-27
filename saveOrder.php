<?php

ob_start();

if ((include '/var/www/oliophp/login.php') !== 1)
{
    die('Include failed.');
}



$userid = $_COOKIE['userid'];             

header('Location: http://localhost/ideateproto/driveThruMenu.php?userid='.$userid);
$ids = $_COOKIE['ids'];

$chars = preg_split('/,/', $ids, -1, PREG_SPLIT_OFFSET_CAPTURE);

get_auth();
foreach($chars as $value) {                     

    if($value[0]!='') {                                                        
        mysql_query("INSERT INTO `ideate`.`order` (`id`, `userId`, `foodDetailsId`) VALUES (NULL, '".$userid."', ".$value[0].")");                           
    }
} 

exit;

?>
