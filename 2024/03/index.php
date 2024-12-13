<?php

$input = file_get_contents('./input.txt');


preg_match_all('/mul\((\d{1,3}),(\d{1,3})\)/', $input, $matches);


$sum = 0;
foreach ( $matches[1] as $index => $mul1 ) {
	$sum += $mul1 * $matches[2][$index];
}

echo $sum . "\n";

// part 2
preg_match_all('/(do\(\))|(don\'t\(\))|(mul\((\d{1,3}),(\d{1,3})\))/', $input, $matches);


$do = true;
$sum = 0;
foreach ( $matches[0] as $index =>$line ) {
	if ( $line == 'do()' ) {
		$do = true;
	}
	if ( $line == "don't()" ) {
		$do = false;
	}
	if ( $do && str_starts_with( $line, 'mul(' ) ) {
		$sum += $matches[4][ $index ] * $matches[5][ $index ];
	}
}

echo $sum . "\n";
