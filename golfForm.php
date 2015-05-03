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
    <title>Golf statistics</title>
</head>
<body>
<form>
    <table>
        <thead>
        <th>Hole</th>
        <th>Par</th>
        <th>Score</th>
        <th>Putts</th>
        <th>Fairway</th>
        <th colspan="2">Penalties</th>
        </thead>
        <tbody>
        <?php
            for($i = 1; $i < 19; $i++) {
                echo "<tr>\n";
                echo "<td>$i</td>\n";
                echo "<td><input type = 'number' name = 'par".$i."' required value = '4' ></td>\n";
                echo "<td><input type = 'number' name = 'score".$i."' required value = '4' ></td>\n";
                echo "<td><input type = 'number' name = 'putts".$i."' required value = '2' ></td>\n";
                echo "<td>\n";
                    echo "<select name = 'fairway".$i."' >\n";
                        echo "<option value = 'c' >Center </option>\n";
                        echo "<option value = 'l' > Left</option>\n";
                        echo "<option value = 'r' > Right</option>\n";
                        echo "<option value = 'o' > Out of Bounds </option>\n";
                        echo "<option value = 'p' > Par 3 </option>\n";
                    echo "</select>\n";
                echo "</td>\n";
                echo "<td> O.B.: <input type = 'checkbox' name = 'penalties".$i."' value = 'O.B.' ></td>\n";
                echo "<td> Hazard:<input type = 'checkbox' name = 'penalties".$i."' value = 'Hazard' ></td>\n";
                echo "</tr>\n";
            }
?>
        </tbody>
    </table>
</form>
</body>
</html>