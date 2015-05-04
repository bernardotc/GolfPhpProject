<?php
/**
 * Created by PhpStorm.
 * User: bernardot
 * Date: 5/3/15
 * Time: 11:22 AM
 */
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="golfStyle.css">
    <script src="golfAJAX.js"></script>
    <title>Golf statistics</title>
</head>
<header>
    <h1>Calculate your Golf round statistics</h1><br>
</header>
<body>
<br>
<fieldset>
    <form>
        <table>
            <thead>
            <th>Hole</th>
            <th>Par</th>
            <th>Score</th>
            <th>Putts</th>
            <th>Fairway</th>
            <th>Penalties</th>
            </thead>
            <tbody>
            <?php
            for($i = 1; $i < 19; $i++) {
                echo "<tr>\n";
                echo "<td>$i</td>\n";
                echo "<td><input type = 'number' name = 'par".$i."' required value = '4' required onchange='checkPar(this)'></td>\n";
                echo "<td><input type = 'number' name = 'score".$i."' required value = '4' required></td>\n";
                echo "<td><input type = 'number' name = 'putts".$i."' required value = '2' required></td>\n";
                echo "<td>\n";
                echo "<select name = 'fairway".$i."' >\n";
                echo "<option value = 'c' >Center </option>\n";
                echo "<option value = 'l' > Left</option>\n";
                echo "<option value = 'r' > Right</option>\n";
                echo "<option value = 'o' > O.B. </option>\n";
                echo "</select>\n";
                echo "</td>\n";
                echo "<td><input type = 'number' name = 'penalties".$i."' value = '0' required></td>\n";
                echo "</tr>\n";
            }
            ?>
            </tbody>
        </table>
        <br>
        <center><input type="button" value="Get statistics" onclick="getStatistics()"></center>
    </form>
    <div id = "results"></div>
</fieldset>
</body>
<footer>
    <br><p>Made by Bernardo Treviño and Ovidio Villarreal</p>
</footer>
</html>