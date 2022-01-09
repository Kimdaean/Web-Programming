<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <fieldset>
    <legend>Order Form</legend>
    <input type="text" name="cookie" size="2" /><a href="url"><img src="https://junji64.github.io/php/Homework-3-Order-form_files/cookie.gif" border="0" width="40" height="40"></a> Cookie &times; $1.50<br />
    <input type="text" name="candy" size="2" /><a href="url"><img src="https://junji64.github.io/php/Homework-3-Order-form_files/snickers.jpg" border="0" width="20" height="50"></a> Candy Bar &times; $2.00<br />
    Delivery :
    <input type="radio" name="delivery" value="(default) Regular ($4.00)" checked="checked">(default) Regular ($4.00)
    <input type="radio" name="delivery" value="Express ($8.00)">Express ($8.00)<br />
    Donation for children in need : <input type="checkbox" name="donation" /> $10 extra<br />
    <input type="submit" name="submit" value="Buy Now!" />
    </fieldset>
</form>
<?php
$x = 1;
$y = 1;
$cost = 0.00;
$cookie = $_POST["cookie"];
$candy = $_POST["candy"];
if ( $_POST["cookie"] != "" ) {
    $cost += $cookie * 1.50;
}
if ( $_POST["candy"] != "" ) {
    $cost += $candy * 2.00;
}
if ( isset($_POST["donation"]) ) {
    $cost += 10.00;
}
if ( isset($_POST["delivery"]) ) {
    if ($_POST["delivery"] == "(default) Regular ($4.00)") {
    $cost += 4.00;
}
}
if ( isset($_POST["delivery"]) ) {
    if ($_POST["delivery"] == "Express ($8.00)") {
    $cost += 8.00;
}
}
?>
<hr>
<fieldset>
    <legend>Your Order</legend>
<?php
if ( $_POST["cookie"] != "" ) {
 while($x <= $cookie) {
    echo "<img src='https://junji64.github.io/php/Homework-3-Order-form_files/cookie.gif' border=0 width=40 height=40>" ;
    $x++;
}
}
if ( $_POST["candy"] != "" ) {
 while($y <= $candy) {
    echo "<img src='https://junji64.github.io/php/Homework-3-Order-form_files/snickers.jpg' border=0 width=20 height=50>" ;
    $y++;
}
}
echo "<br>"."Total order cost: <strong>$$cost</strong>";
if (isset($_POST["delivery"])) { echo "<br>"."<br>"."Delivery type : ".$_POST["delivery"]; }  
if (isset($_POST["donation"])) { echo "<br>"."Thank you for your generous donation!"; }
?>
</fieldset>
