<?php
namespace aoc2021;

error_reporting(E_ERROR | E_PARSE);

// ex1
// require_once('ex1_a.php');
// $demoInput = [199, 200, 208, 210, 200, 207, 240, 269, 260, 263];
// $handle = file('/Users/arne/Sites/aoc2021/ex1_data.txt');

// $asi = new DepthProbe($handle);
// $result = $asi->countIncrementsWindowed(3);

// $ese = new DepthProbe($result);
// $result = $ese->countIncrements(1);

// ex2
// require_once('ex2_a.php');
// $demoInput = [
//     'forward 5', 
//     'down 5', 
//     'forward 8', 
//     'up 3', 
//     'down 8', 
//     'forward 2', 
// ];
// $handle = file('/Users/arne/Sites/aoc2021/ex2_data.txt');

// $sub = new Submarine();
// foreach ($handle as $command) {
//     $sub->tracker($command);
// }

// $result = $sub->depth * $sub->distance;

// ex 3
// require_once('ex2_a.php');
// $demoInput = [
//     '00100',
//     '11110',
//     '10110',
//     '10111',
//     '10101',
//     '01111',
//     '00111',
//     '11100',
//     '10000',
//     '11001',
//     '00010',
//     '01010',
// ];
// $handle = file('/Users/arne/Sites/aoc2021/ex3_data.txt');
// $sub = new Submarine();
// foreach ($demoInput as $row) {
//     $sub->powerMeter($row);
// }

// $oxInput = $coInput = $handle;

// for ($i=0; $i < 12; $i++) {
//     if (count($oxInput) > 1) {
//         $oxInput = $sub->getRating($oxInput, $i, true);
//     }
//     if (count($coInput) > 1) {
//         $coInput = $sub->getRating($coInput, $i, false);
//     }
// }


// ex4_a
// $demoInput = 
// '7,4,9,5,11,17,23,2,0,14,21,24,10,16,13,6,15,25,12,22,18,20,8,19,3,26,1

// 22 13 17 11  0
//  8  2 23  4 24
// 21  9 14 16  7
//  6 10  3 18  5
//  1 12 20 15 19

//  3 15  0  2 22
//  9 18 13 17  5
// 19  8  7 25 23
// 20 11 10 24  4
// 14 21 16 12  6

// 14 21 17 24  4
// 10 16 15  9 19
// 18  8 23 26 20
// 22 11 13  6  5
//  2  0 12  3  7';


// print_r(preg_split('/\n\n/', $demoInput));
// require('/Users/arne/Documents/aoc2021/Bingo/Card.php');
// require('/Users/arne/Documents/aoc2021/Bingo/Game.php');

// $handle = file_get_contents('/Users/arne/Documents/aoc2021/ex4_data.txt');

// $input = preg_split('/\n\n/', $demoInput);
// $input = preg_split('/\n\n/', $handle);
// $firstLine = $input[0];
// unset($input[0]);

// $leGame = new Game($firstLine, $input);

// $winningCard = $leGame->play();

//ex4_B
// while (count($leGame->cards) > 1) {
//     $winningCard = $leGame->play();
//     unset($leGame->cards[$winningCard->cardNo]);
// }

// $result = $winningCard->getScore() * $leGame->lastNumber;

//ex5
require('/Users/arne/Sites/aoc2021/Ruler/Line.php');
require('/Users/arne/Sites/aoc2021/Ruler/Grid.php');

$grid = new Grid();

$demoInput = '0,9 -> 5,9
8,0 -> 0,8
9,4 -> 3,4
2,2 -> 2,1
7,0 -> 7,4
6,4 -> 2,0
0,9 -> 2,9
3,4 -> 1,4
0,0 -> 8,8
5,5 -> 8,2';

// foreach (preg_split('/\n/', $demoInput) as $value) {
//     $grid->addLine(new Line($value));
// }

$handle = file('/Users/arne/Sites/aoc2021/ex5_data.txt');

foreach ($handle as $value) {
    $grid->addLine(new Line($value));
}

$grid->drawLines();
// print_R($grid->getPaperSize());
// $grid->printPaper();
//4204 too low
//16602 too low

$result = $grid->getScore();

echo '##################' . PHP_EOL;
echo '###  AoC 2021  ###' . PHP_EOL;
echo '##################' . PHP_EOL;

print_r($result);

echo PHP_EOL;
