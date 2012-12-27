<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ideate</title>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>

<body>
    <script>
    var display = "";
    var display1 = "";
    var ids = [];
    var count = 0;
    var total_calories = 0;
    var activeSettings =0;
    var calorie_limit=0;
    function doSomething() {
     activeSettings = 1;
     $("#divdiv").hide();
     $("#crap").show();

 }
 function doSomethingNot() {
    $("#crap").hide();
    $("#divdiv").show();
}
 
function myFunction(item,id,calorie) {

    total_calories+=calorie;

    display += $(document.getElementById(item)).html();
    ids[count++] = id;
    if(activeSettings==0)
        document.getElementById('checkout').innerHTML = display;
    

    document.getElementById('total_calories').innerHTML = "Calories: " + total_calories;


    if(total_calories>800) {
        document.getElementById('total_calories').style.color= "red";
    } else {
        document.getElementById('total_calories').style.color= "green";
    }

    for(i=1;i<100;i++) {
        try{
            calorie_id="calorie"+i;



            element = document.getElementById(calorie_id);

            calorie_count = element.innerHTML.split(": ")[1];

            if(parseInt(calorie_count)+total_calories>800) {
                element.style.color="red";

                document.getElementById("border"+i).style.borderStyle="solid";

                document.getElementById("border"+i).style.borderWidth="1px";

                document.getElementById("border"+i).style.borderColor="red";




            } else {
                element.style.color="green";
            }
        } catch(err) {

        }


    }

    s = "";

    for(i=0;i<ids.length;i++) {
        s+=ids[i]+",";
    }

    setCookie("ids",s,10);
    setCookie("total_calories",""+total_calories,10);

    setCookie("order_html",display,10);


}

function setCookie(c_name,value,exdays)
{
    var exdate=new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
    document.cookie=c_name + "=" + c_value;
}

</script>

<?php
if ((include '/var/www/oliophp/login.php') !== 1)
{
    die('Include failed.');
    echo "d";
}

?>

<div class="container">
    <div class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="/" style="color:#005580">Ideate</a>
            <ul class="nav pull-right">
                <li><a href="#" onClick="doSomethingNot();">Order</a></li>
                <li><a href="#" onClick="doSomething();">Settings</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="span9 pull-left">
            <div class="tabbable tabs-left" id="disableMe">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#lA" data-toggle="tab">Hamburgers</a></li>
                    <li><a href="#lB" data-toggle="tab">Chicken Sandwiches and Wraps</a></li>
                    <li><a href="#lC" data-toggle="tab">Salads</a></li>
                    <li><a href="#lD" data-toggle="tab">Beverages</a></li>
                    <li><a href="#lE" data-toggle="tab">Sides</a></li>
                    <li><a href="#lF" data-toggle="tab">Desserts</a></li>
                </ul>
                <div class="tab-content" id = "divdiv">
                    <div id="lA" class="tab-pane active"><?php echo get_dataVals(1,"img/wendy/Burgers");?></div>
                    <div id="lB" class="tab-pane"><?php echo get_dataVals(2,"img/wendy/Chicken"); ?></div>
                    <div id="lC" class="tab-pane"><?php echo get_dataVals(3,"img/wendy/Salads"); ?></div>
                    <div id="lD" class="tab-pane"><?php echo get_dataVals(4,"img/wendy/Drinks"); ?></div>
                    <div id="lE" class="tab-pane"><?php echo get_dataVals(5,"img/wendy/Sides"); ?></div>
                    <div id="lF" class="tab-pane"><?php echo get_dataVals(6,"img/wendy/Desserts");?></div>
                </div>
                <div class="tab-content" id="crap">
                    <p>Track Calories</p>
                    <form id ="caltracker" action="#">
                        Enter Calorie Goal: <input type="integer" name="Calorie Goal"><br>
                                            <input type="submit" value="Subscribe" name="Update" class="subscribe_btn">
                    </form>
                </div>    
            </div>
        </div>


        <!-- Show Order Pane -->
        <div class="span3 pull-right" style="height: 100%; background-color:#FAFAFA; background-image:linear-gradient(#FFFFFF,​ #F2F2F2); background-repeat:repeat-x">

            <p>Current Order:</p>
            <br/>                                    
            <div id="checkout" class="thumbnails bootstrap-examples" >
            </div>
            <br/><br/><br/>
            <br/><br/><br/>
            <b><font id="total_calories" color="green">Calories: 0</font></b>
            <br/><br/><br/>
            <div class="pagination-centered">
                <button class="btn btn-success" style="text-align:center" onClick="location.href='driveThruMenu.php'"> Upload on Card </button>
            </div>
        </div>
    </div>      


    <hr>
    <footer>
        <p style="text-align:center">Ideate Copyright &copy 2012</p>
    </footer>

</div>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
