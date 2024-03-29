 <?php
// namespace aoc2021;

// use aoc2021\Rubber\Node;

spl_autoload_register(function ($className) {
    // var_dump($className);
    require '/Users/arne/Sites/' . str_replace('\\', '/', $className) . '.php';
});

use aoc2021\Rubber\Gum as Gum;
use aoc2021\Rubber\Node as Node;
use aoc2021\Rubber\Legs as Legs;
use aoc2021\Crups\Dice as Dice;
use aoc2021\Crups\Player as Player;


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
// require('/Users/arne/Sites/aoc2021/Ruler/Line.php');
// require('/Users/arne/Sites/aoc2021/Ruler/Grid.php');

// $grid = new Grid();

// $demoInput = '0,9 -> 5,9
// 8,0 -> 0,8
// 9,4 -> 3,4
// 2,2 -> 2,1
// 7,0 -> 7,4
// 6,4 -> 2,0
// 0,9 -> 2,9
// 3,4 -> 1,4
// 0,0 -> 8,8
// 5,5 -> 8,2';

// foreach (preg_split('/\n/', $demoInput) as $value) {
//     $grid->addLine(new Line($value));
// }

// $handle = file('/Users/arne/Sites/aoc2021/ex5_data.txt');

// foreach ($handle as $value) {
//     $grid->addLine(new Line($value));
// }

// $grid->drawLines();
// // print_R($grid->getPaperSize());
// // $grid->printPaper();
// //4204 too low
// //16602 too low

// $result = $grid->getScore();

// ex6
// require('/Users/arne/Sites/aoc2021/Fish/Fish.php');

// $demoInput = '3,4,3,1,2';

// //siin jama, failist ei osatud lugeda korralikult. wut?
// $handle = trim(file_get_contents('/Users/arne/Sites/aoc2021/ex6_data.txt'));

// $fish = new Fish($handle);

// $fish->ffwd(256);
// $result = $fish->countFish();

//ex7
// require('/Users/arne/Sites/aoc2021/Crab/Crab.php');
// $demoInput = '16,1,2,0,4,2,7,1,2,14';
// $handle = trim(file_get_contents('/Users/arne/Sites/aoc2021/ex7_data.txt'));

// $cr = new Crab($handle);
// // print_r($cr);

// // $result = $cr->getFuelToPositionFactorial(2);
// $result = $cr->findLeastFuel();

//ex8
// require('/Users/arne/Sites/aoc2021/Display/Simple.php');
// require('/Users/arne/Sites/aoc2021/Display/Combination.php');
// $demoInput = 'be cfbegad cbdgef fgaecd cgeb fdcge agebfd fecdb fabcd edb | fdgacbe cefdb cefbgd gcbe
// edbfga begcd cbg gc gcadebf fbgde acbgfd abcde gfcbed gfec | fcgedb cgb dgebacf gc
// fgaebd cg bdaec gdafb agbcfd gdcbef bgcad gfac gcb cdgabef | cg cg fdcagb cbg
// fbegcd cbd adcefb dageb afcb bc aefdc ecdab fgdeca fcdbega | efabcd cedba gadfec cb
// aecbfdg fbg gf bafeg dbefa fcge gcbea fcaegb dgceab fcbdga | gecf egdcabf bgf bfgea
// fgeab ca afcebg bdacfeg cfaedg gcfdb baec bfadeg bafgc acf | gebdcfa ecba ca fadegcb
// dbcfg fgd bdegcaf fgec aegbdf ecdfab fbedc dacgb gdcebf gf | cefg dcbef fcge gbcadfe
// bdfegc cbegaf gecbf dfcage bdacg ed bedf ced adcbefg gebcd | ed bcgafe cdgba cbgef
// egadfb cdbfeg cegd fecab cgb gbdefca cg fgcdab egfdb bfceg | gbdfcae bgc cg cgb
// gcafb gcf dcaebfg ecagb gf abcdeg gaef cafbge fdbac fegbdc | fgae cfgab fg bagce
// ';

// $handle = trim(file_get_contents('/Users/arne/Sites/aoc2021/ex8_data.txt'));

// $easy = new Simple($handle);
// $result = $easy->countEasySegments();
// // print_r($easy);
// $result = $easy->addSegmentValues();

//ex9
// require('/Users/arne/Sites/aoc2021/Smoke/Map.php');
// require('/Users/arne/Sites/aoc2021/Smoke/Point.php');
// $demoInput = '2199943210
// 3987894921
// 9856789892
// 8767896789
// 9899965678';

// $handle = trim(file_get_contents('/Users/arne/Sites/aoc2021/ex9_data.txt'));

// $treasure = new Map($handle);
// // print_r($treasure->findAdjacentSquareValues(50,50));
// // $result = $treasure->findLowPoints();
// // $result = $treasure->checker();
// // $treasure->prLow();
// // $treasure->prX();
// $result = $treasure->getScore();

// ex10
// require('/Users/arne/Sites/aoc2021/Syntax/Verify.php');
// $demoInput = '[({(<(())[]>[[{[]{<()<>>
// [(()[<>])]({[<{<<[]>>(
// {([(<{}[<>[]}>{[]{[(<()>
// (((({<>}<{<{<>}{[]{[]{}
// [[<[([]))<([[{}[[()]]]
// [{[{({}]{}}([{[{{{}}([]
// {<[[]]>}<{[{[{[]{()[[[]
// [<(<(<(<{}))><([]([]()
// <{([([[(<>()){}]>(<<{{
// <{([{{}}[<[[[<>{}]]]>[]]';
// $handle = trim(file_get_contents('/Users/arne/Sites/aoc2021/ex10_data.txt'));

// $checker = new Verify($demoInput);
// $resultstring = $checker->processRows();
// // print_r('res: '. $resultstring . PHP_EOL);
// // $result = $checker->getScore($resultstring);
// $result = $checker->getSecondScore();
// // print_r($checker);

// ex11
// require('/Users/arne/Sites/aoc2021/Octo/Dumbo.php');
// $demoInput = '5483143223
// 2745854711
// 5264556173
// 6141336146
// 6357385478
// 4167524645
// 2176841721
// 6882881134
// 4846848554
// 5283751526';

// $handle = trim(file_get_contents('/Users/arne/Sites/aoc2021/ex11_data.txt'));


// $swimmer = new Dumbo($handle);

// ex 13
// require('/Users/arne/Sites/aoc2021/Paper/Stahl.php');
// $handle = trim(file_get_contents('/Users/arne/Sites/aoc2021/ex13_data.txt'));

// $demoInput = '6,10
// 0,14
// 9,10
// 0,3
// 10,4
// 4,11
// 6,0
// 6,12
// 4,1
// 0,13
// 10,12
// 3,4
// 3,0
// 8,4
// 1,10
// 2,14
// 8,10
// 9,0

// fold along y=7
// fold along x=5
// ';

// $lak = new Stahl($demoInput);
// $lak = new Stahl($handle);
//903 too high
// 618, Curiously, it's the right answer for someone else; you might be logged in to the wrong account or just unlucky
// HZLEHJPK, wrong
// HZLEHJRK

// ex14
$demoInput = 'NNCB

CH -> B
HH -> N
CB -> H
NH -> C
HB -> C
HC -> B
HN -> C
NN -> C
BH -> H
NC -> B
NB -> B
BN -> B
BB -> N
BC -> B
CC -> N
CN -> C
';
// $handle = trim(file_get_contents('/Users/arne/Sites/aoc2021/ex14_data.txt'));

// $g = new Gum($demoInput);

$aN = new Node('a');
$bN = new Node('b');
$cN = new Node('c');
$dN = new Node('d');
$eN = new Node('e');
$fN = new Node('f');

$aN->left = $bN;
$aN->right = $cN;
$bN->left = $dN;
$bN->right = $eN;
$cN->right = $fN;

// print_r($aN->printDepthFirst($aN));
// print_r($aN);

$l = new Legs();

// ex21

// $handle = trim(file_get_contents('/Users/arne/Sites/aoc2021/ex14_data.txt'));
// $d = new Dice();

// $p1 = new Player(3);
// $p2 = new Player(5);

// while ($p1->score < 1000 && $p2->score < 1000) {
//     $p1->getScore($d->rollTheDice());
//     if ($p1->score >= 1000) {
//         break;
//     }
//     $p2->getScore($d->rollTheDice());
// }

// $losingScore = $p1->score > $p2->score ? $p2->score : $p1->score;

// print_R($losingScore * $d::$rollCount . PHP_EOL);



echo '##################' . PHP_EOL;
echo '###  AoC 2021  ###' . PHP_EOL;
echo '##################' . PHP_EOL;

// print_r($result);

echo PHP_EOL;
