<?php
/**
 * Created by PhpStorm.
 * User: Ovidio
 * Date: 5/3/2015
 * Time: 8:30 PM
 */

    // Get the POST data

    //By Input
    $pars = array();
    $scores = array();
    $putts = array();
    $fairways = array();
    $penalties = array();

    for($x = 1; $x < 19; $x++) {
        $pars[] = $_POST["par".$x];
        $scores[] = $_POST["score".$x];
        $putts[] = $_POST["putts".$x];
        $fairways[] = $_POST["fairway".$x];
        $penalties[] = $_POST["penalties".$x];
    }

    //By holes
    $hole1 = array($_POST["par1"], $_POST["score1"], $_POST["putts1"], $_POST["fairway1"], $_POST["penalties1"]);
    $hole2 = array($_POST["par2"], $_POST["score2"], $_POST["putts2"], $_POST["fairway2"], $_POST["penalties2"]);
    $hole3 = array($_POST["par3"], $_POST["score3"], $_POST["putts3"], $_POST["fairway3"], $_POST["penalties3"]);
    $hole4 = array($_POST["par4"], $_POST["score4"], $_POST["putts4"], $_POST["fairway4"], $_POST["penalties4"]);
    $hole5 = array($_POST["par5"], $_POST["score5"], $_POST["putts5"], $_POST["fairway5"], $_POST["penalties5"]);
    $hole6 = array($_POST["par6"], $_POST["score6"], $_POST["putts6"], $_POST["fairway6"], $_POST["penalties6"]);
    $hole7 = array($_POST["par7"], $_POST["score7"], $_POST["putts7"], $_POST["fairway7"], $_POST["penalties7"]);
    $hole8 = array($_POST["par8"], $_POST["score8"], $_POST["putts8"], $_POST["fairway8"], $_POST["penalties8"]);
    $hole9 = array($_POST["par9"], $_POST["score9"], $_POST["putts9"], $_POST["fairway9"], $_POST["penalties9"]);
    $hole10 = array($_POST["par10"], $_POST["score10"], $_POST["putts10"], $_POST["fairway10"], $_POST["penalties10"]);
    $hole11 = array($_POST["par11"], $_POST["score11"], $_POST["putts11"], $_POST["fairway11"], $_POST["penalties11"]);
    $hole12 = array($_POST["par12"], $_POST["score12"], $_POST["putts12"], $_POST["fairway12"], $_POST["penalties12"]);
    $hole13 = array($_POST["par13"], $_POST["score13"], $_POST["putts13"], $_POST["fairway13"], $_POST["penalties13"]);
    $hole14 = array($_POST["par14"], $_POST["score14"], $_POST["putts14"], $_POST["fairway14"], $_POST["penalties14"]);
    $hole15 = array($_POST["par15"], $_POST["score15"], $_POST["putts15"], $_POST["fairway15"], $_POST["penalties15"]);
    $hole16 = array($_POST["par16"], $_POST["score16"], $_POST["putts16"], $_POST["fairway16"], $_POST["penalties16"]);
    $hole17 = array($_POST["par17"], $_POST["score17"], $_POST["putts17"], $_POST["fairway17"], $_POST["penalties17"]);
    $hole18 = array($_POST["par18"], $_POST["score18"], $_POST["putts18"], $_POST["fairway18"], $_POST["penalties18"]);

    // Start variables for statistics
    $totalPutts = 0;
    $penaltiesStrokes = 0;
    $upsAndDowns = 0;
    $puttsPerGIR = 0;
    $GIR = 0;
    $par3 = 0;
    $fairway = 0;
    $leftFairway = 0;
    $rightFairway = 0;
    $firstShotOB = 0;
    $lessEagles = 0;
    $eagles = 0;
    $birdies = 0;
    $par = 0;
    $bogeys = 0;
    $dBogeys = 0;
    $tBogeys = 0;
    $moreBogeys = 0;
    $onePutt = 0;
    $twoPutts = 0;
    $threePutts = 0;
    $moreThreePutts = 0;

    for($y = 0; $y < 18; $y++) {
        // Total putts
        $totalPutts += $putts[$y];

        // GIR and putts per GIR
        if ($scores[$y] - $putts[$y] == $pars[$y] - 2) {
            $GIR++;
            $puttsPerGIR += $putts[$y];
        } else if ($scores[$y] == $pars[$y]) {
            // Ups and downs
            $upsAndDowns++;
        }

        // First hit fairways.
        if ($fairways[$y] == "c") {
            $fairway++;
        } else if ($fairways[$y] == "l") {
            $leftFairway++;
        } else if ($fairways[$y] == "r") {
            $rightFairway++;
        } else if ($fairways[$y] == "o") {
            $firstShotOB++;
            $penaltiesStrokes++;
        }

        // Penalties
        $penaltiesStrokes += $penalties[$y];

        // Get Pars, Birdies, etc.
        if ($scores[$y] - $pars[$y] < -2) {
            $lessEagles++;
        } else if ($scores[$y] - $pars[$y] == -2) {
            $eagles++;
        } else if ($scores[$y] - $pars[$y] == -1) {
            $birdies++;
        } else if ($scores[$y] - $pars[$y] == 0) {
            $par++;
        } else if ($scores[$y] - $pars[$y] == 1) {
            $bogeys++;
        } else if ($scores[$y] - $pars[$y] == 2) {
            $dBogeys++;
        } else if ($scores[$y] - $pars[$y] == 3) {
            $tBogeys++;
        } else if ($scores[$y] - $pars[$y] > 3) {
            $moreBogeys++;
        }

        // Get number of putts
        if ($putts[$y] == 1) {
            $onePutt++;
        } else if ($putts[$y] == 2) {
            $twoPutts++;
        } else if ($putts[$y] == 3) {
            $threePutts++;
        } else if ($putts[$y] == 4) {
            $moreThreePutts++;
        }

        // Get number of pars 3
        if ($pars[$y] == 3) {
            $par3++;
        }

    }

    // Score of first 9 holes
    $scoreFirst9 = 0;
    $parFirst9 = 0;
    for ($y = 0; $y < 9; $y++) {
        $scoreFirst9 += $scores[$y];
        $parFirst9 += $pars[$y];
    }

    // Score of last 9 holes
    $scoreLast9 = 0;
    $parLast9 = 0;
    for ($y = 9; $y < 18; $y++) {
        $scoreLast9 += $scores[$y];
        $parLast9 += $pars[$y];
    }

    // Score of 18 holes.
    $par18 = $parFirst9 + $parLast9;
    $totalScore = $scoreFirst9 + $scoreLast9;

    // Calculate fairway percentages.
    $totalFairways = 18 - $par3;

    // Print a table with statistics
    echo "<table>\n<thead>\n<th>Statistic</th>\n<th>Result</th>\n<th>Percentage</th>\n</thead>\n<tbody>\n";

    // Round statistics
    echo "<tr class='merge'>\n<td colspan='3' style='text-align: center;'>Golf Score</td>\n</tr>\n";
    printf ("<tr>\n<td>Score of 18 holes</td>\n<td>%d of %d</td>\n<td>-</td>\n</tr>\n", $totalScore, $par18);
    printf ("<tr>\n<td>Score of first 9</td>\n<td>%d of %d</td>\n<td>%.2f%%</td>\n</tr>\n", $scoreFirst9, $parFirst9, $scoreFirst9 / $totalScore * 100);
    printf ("<tr>\n<td>Score of last 9</td>\n<td>%d of %d</td>\n<td>%.2f%%</td>\n</tr>\n", $scoreLast9, $parLast9, $scoreLast9 / $totalScore * 100);

    // Stroke statistics
    echo "<tr class='merge'>\n<td colspan='3' style='text-align: center;'>Strokes</td>\n</tr>\n";
    printf ("<tr>\n<td>Less than Eagles</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $lessEagles, $lessEagles / 18 * 100);
    printf ("<tr>\n<td>Eagles</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $eagles, $eagles / 18 * 100);
    printf ("<tr>\n<td>Birdies</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $birdies, $birdies / 18 * 100);
    printf ("<tr>\n<td>Pars</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $par, $par / 18 * 100);
    printf ("<tr>\n<td>Bogeys</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $bogeys, $bogeys / 18 * 100);
    printf ("<tr>\n<td>Double Bogeys</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $dBogeys, $dBogeys / 18 * 100);
    printf ("<tr>\n<td>Triple Bogeys</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $tBogeys, $tBogeys / 18 * 100);
    printf ("<tr>\n<td>More than Triple Bogeys</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $moreBogeys, $moreBogeys / 18 * 100);

    // First shot statistics
    echo "<tr class='merge'>\n<td colspan='3' style='text-align: center;'>First shot</td>\n</tr>\n";
    printf ("<tr>\n<td>Fairway hits</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $fairway, $fairway / $totalFairways * 100);
    printf ("<tr>\n<td>Left hits</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $leftFairway, $leftFairway / $totalFairways * 100);
    printf ("<tr>\n<td>Right hits</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $rightFairway, $rightFairway / $totalFairways * 100);
    printf ("<tr>\n<td>O.B.</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $firstShotOB, $firstShotOB / $totalFairways * 100);

    // Short game statistics
    echo "<tr class='merge'>\n<td colspan='3' style='text-align: center;'>Short Game</td>\n</tr>\n";
    printf ("<tr>\n<td>Greens in Regulation</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $GIR, $GIR / 18 * 100);
    printf ("<tr>\n<td>Total Putts</td>\n<td>%d</td>\n<td>-</td>\n</tr>\n", $totalPutts);
    printf ("<tr>\n<td>Putts per GIR</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $puttsPerGIR, $puttsPerGIR / $totalPutts * 100);
    printf ("<tr>\n<td>Ups and Downs</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $upsAndDowns, $upsAndDowns / 18 * 100);

    // Putt statistics
    echo "<tr class='merge'>\n<td colspan='3' style='text-align: center;'>Putts</td>\n</tr>\n";
    printf ("<tr>\n<td>One Putt</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $onePutt, $onePutt / 18 * 100);
    printf ("<tr>\n<td>Two Putts</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $twoPutts, $twoPutts / 18 * 100);
    printf ("<tr>\n<td>Three Putts</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $threePutts, $threePutts / 18 * 100);
    printf ("<tr>\n<td>More than three Putts</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $moreThreePutts, $moreThreePutts / 18 * 100);

    // Penalty statistics
    echo "<tr class='merge'>\n<td colspan='3' style='text-align: center;'>Penalties</td>\n</tr>\n";
    printf ("<tr>\n<td>Penalty Strokes</td>\n<td>%d</td>\n<td>%.2f%%</td>\n</tr>\n", $penaltiesStrokes, $penaltiesStrokes / $totalScore * 100);
    echo "</tbody>\n</table>"

?>

