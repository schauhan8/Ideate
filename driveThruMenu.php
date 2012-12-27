<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ideate</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style type="text/css">
    body { background-image:url(img/eAhE8L.png);background-repeat:repeat-x; }
    .container {-webkit-box-shadow: 0px 0px 15px rgba(50, 50, 50, 0.75);
        -moz-box-shadow:    0px 0px 15px rgba(50, 50, 50, 0.75);
        box-shadow:         0px 0px 15px rgba(50, 50, 50, 0.75);
        background-color:   #FFFFFF;
        border-radius: 10px;
        /*margin-top: 25%;*/
        padding:10px;
        margin-top: 10%;
        vertical-alivf gn: center;}
        </style>
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>


        <?php
        if ((include '/var/www/oliophp/login.php') !== 1)
        {
            die('Include failed.');
        }


        ?>

        
        <div id = "default pane">
            <?php
                    $userid = $_GET["userid"];
                    //echo $_COOKIE['order_html'.$userid];
                    if(!isset($_COOKIE['order_html'.$userid]))
                    {
                     echo "YOUR DEFAULT ORDER: CHOOSE FROM THESE";
                     echo "<div align=center><img src=\"img/defaultMenu.jpeg\" alt=\"bla bla\" ></div>";
                     exit;
                    }
             ?>       
        </div>


        
        <div class="wrapper">
            <div class="container">
                <h1>Your Order:</h1><br/>
                <div id="order" class="thumbnails bootstrap-examples" >
                    <?php
                    $userid = $_GET["userid"];
                    $cookie = $_COOKIE['order_html'.$userid];

                    $patterns = array();
                    $patterns[0] = "(\\\')";
                    $patterns[1] = "(\\\\\")";

                    $replacements = array();
                    $replacements[0]="'";
                    $replacements[1]="";
                    echo "<h4 class=\"span4\"> Total Calories for the meal : ".$_COOKIE['total_calories'.$userid]."</h4>";

                    echo preg_replace($patterns, $replacements, $cookie);                  
                    
                    ?>
                </div>
            </div>
        </div>
    </body>
    </html>
