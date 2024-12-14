<?php

class WordSearch {

	private $grid;
	private $word;
	private $letters;

	public function __construct(  $word = null,  $input = null) {

		if ( ! $input ) {
			$input = $this->read_input();
		}
		$this->grid = $input;

		$this->word    = $word ?? 'XMAS';
		$this->letters = str_split( $this->word );
	}

	public function count_word() : int {
		$count = 0;
		for ( $y = 0; $y < count( $this->grid ); $y ++ ) {
			for ( $x = 0; $x < count( $this->grid[ $y ] ); $x ++ ) {
				if ( $this->contains_word_backwards( $x, $y ) ) {
					$count ++;
				}
				if ( $this->contains_word_forwards( $x, $y ) ) {
					$count ++;
				}
				if ( $this->contains_word_NW( $x, $y ) ) {
					$count ++;
				}
				if ( $this->contains_word_up( $x, $y ) ) {
					$count ++;
				}
				if ( $this->contains_word_down( $x, $y ) ) {
					$count ++;
				}
				if ( $this->contains_word_NE( $x, $y ) ) {
					$count ++;
				}
				if ( $this->contains_word_SE( $x, $y ) ) {
					$count ++;
				}
				if ( $this->contains_word_SW( $x, $y ) ) {
					$count ++;
				}
			}
		}
	return $count;
	}


function count_mas_xs() {
		$count = 0;
		for ( $y = 0; $y < count( $this->grid ); $y ++ ) {
			for ( $x = 0; $x < count( $this->grid[ $y ] ); $x ++ ) {
				if ($this->contains_word_SE($x,$y) && $this->contains_word_NE($x,$y+2)) {
					$count++;
				}
				if ( $this->contains_word_NE( $x,$y) && $this->contains_word_NW($x+2, $y)) {
					$count++;
				}
				if ( $this->contains_word_SE( $x,$y) && $this->contains_word_SW($x+2, $y)) {
					$count++;
				}
				if ( $this->contains_word_SW($x, $y) && $this->contains_word_NW($x, $y+2)) {
					$count++;
				}
			}
		}

		return $count;
}


function contains_word_from_cell( int $x, int $y ): bool {
	return $this->contains_word_backwards(  $x, $y  ) ||
	       $this->contains_word_forwards(  $x, $y  ) ||
	       $this->contains_word_up(  $x, $y  ) ||
	       $this->contains_word_down(  $x, $y  ) ||
	       $this->contains_word_NE(  $x, $y  ) ||
	       $this->contains_word_SE(  $x, $y  ) ||
	       $this->contains_word_NW(  $x, $y  ) ||
	       $this->contains_word_SW(  $x, $y  );
}

function read_input( ): array {
	$input = file( './input.txt' );

	$array = [];
	foreach ( $input as $line ) {
		$array[] = str_split( trim( $line ) );
	}

	return $array;
}


function contains_word_forwards(  int $x, int $y): bool {
	$found = $this->is_word(  $x, $y,  'E' );
	return $found;
}

function contains_word_backwards(  int $x, int $y ): bool {
	return $this->is_word(  $x, $y, 'W' );
}

function contains_word_down( int $x, int $y): bool {
	return $this->is_word( $x, $y, 'S' );
}

function contains_word_up(  int $x, int $y ): bool {
	return $this->is_word(  $x, $y,  'N' );
}

function contains_word_NE( int $x, int $y ): bool {
	return $this->is_word(  $x, $y,  'NE' );
}

function contains_word_SE(  int $x, int $y): bool {
	return $this->is_word(  $x, $y,  'SE' );
}

function contains_word_NW(  int $x, int $y ): bool {
	return $this->is_word( $x, $y,  'NW' );
}

function contains_word_SW(  int $x, int $y): bool {
	return $this->is_word( $x, $y,  'SW' );
}

function is_word(  int $x, int $y,  string $direction ): bool {

	foreach ( $this->letters as $letter ) {
		if ( ! isset( $this->grid[ $y ][ $x ] ) ) {
			return false;
		}
		if ( $letter != $this->grid[ $y ][ $x ] ) {
			return false;
		}
		if ( str_contains( $direction, 'N' ) ) {
			$y --;
		}
		if ( str_contains( $direction, 'S' ) ) {
			$y ++;
		}
		if ( str_contains( $direction, 'E' ) ) {
			$x ++;
		}
		if ( str_contains( $direction, 'W' ) ) {
			$x --;
		}
	}

	return true;
}
}
