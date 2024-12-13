<?php
$input = file('./input.txt');

$safe = 0;
foreach ( $input as $line ) {
	$report = explode(' ', $line);
	echo "Report: " . join (", ", $report);
	$is_safe = true;
	$unsafe_count = 0;
	$increasing = $report[0] < $report[1];
	for( $x=1; $x<count($report); $x++ ) {
		if ( ($report[$x] > $report[$x-1] && !$increasing ) ||
			 ($report[$x] < $report[$x-1] && $increasing) ) {
			$unsafe_count++;
			if ( $unsafe_count > 1 ) {
				$is_safe = false;
				break;
			}
		}
		$difference = abs($report[$x] - $report[$x-1]);
		if ( $difference < 1 || $difference > 3) {
			$unsafe_count++;
			if ( $unsafe_count > 1 ) {
				$is_safe = false;
				break;
			}
		}
	}
	if ( $is_safe) {
		echo "safe\n";
		$safe ++;
	}
}

echo $safe . PHP_EOL;

