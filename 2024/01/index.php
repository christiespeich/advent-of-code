<?php

$input = file('./input.txt');

$list_1 = array();
$list_2 = array();

foreach ( $input as $line ) {
	$list_values = preg_split("/ +/", $line);
	$list_1[] = trim($list_values[0]);
	$list_2[] = trim($list_values[1]);
}

sort($list_1);
sort($list_2);

$difference = 0;
for( $x=0; $x<count($list_1); $x++ ) {
	$difference += abs($list_1[$x] - $list_2[$x]);
}

echo $difference;
echo "\n";

$list2_count = array_count_values($list_2);
$similarity = 0;
foreach ( $list_1 as $value ) {
	if( array_key_exists($value, $list2_count) ) {
		$similarity += $list2_count[$value] * $value;
	}
}
echo $similarity . "\n";

