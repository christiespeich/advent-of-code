<?php /** @noinspection ALL */

use PHPUnit\Framework\TestCase;


class WordSearchTest extends TestCase {


	function setUp(): void {
		require_once __DIR__ . '/../../04/WordSearch.php';
	}

	public function test_contains_word_forwards() {
		$input = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
		];
		$word  = 'ABC';

		$search = new WordSearch( 'ABC', [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
		] );

		$this->assertTrue( $search->contains_word_forwards( 0, 0 ) );
	}

	public function test_not_contain_word_forwards() {
		$input  = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
		];
		$word   = 'ABE';
		$search = new WordSearch( $word, $input );
		$this->assertFalse( $search->contains_word_forwards( 0, 0 ) );
	}

	public function test_word_longer_than_forward_space() {
		$input  = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
		];
		$word   = 'BCE';
		$search = new WordSearch( $word, $input );
		$this->assertFalse( $search->contains_word_forwards( 1, 0 ) );
	}

	public function test_not_contains_word_backwards() {
		$input  = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
		];
		$word   = 'CBF';
		$search = new WordSearch( $word, $input );
		$this->assertFalse( $search->contains_word_backwards( 2, 0 ) );
	}

	public function test_contains_word_backwards() {
		$input  = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
		];
		$word   = 'CBA';
		$search = new WordSearch( $word, $input );
		$this->assertTrue( $search->contains_word_backwards( 2, 0 ) );
	}

	public function test_word_longer_than_backward_spaces() {
		$input  = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
		];
		$word   = 'BAE';
		$search = new WordSearch( $word, $input );
		$this->assertFalse( $search->contains_word_backwards( 1, 0 ) );
	}

	public function test_contains_word_down() {
		$input  = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
			[ 'G', 'H', 'I', ],
		];
		$word   = 'ADG';
		$search = new WordSearch( $word, $input );
		$this->assertTrue( $search->contains_word_down( 0, 0 ) );
	}

	public function test_not_contains_word_down() {
		$input  = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
			[ 'G', 'H', 'I', ],
		];
		$word   = 'ADH';
		$search = new WordSearch( $word, $input );
		$this->assertFalse( $search->contains_word_down( 0, 0 ) );
	}

	public function test_word_longer_than_spaces_down() {
		$input  = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
			[ 'G', 'H', 'I', ],
		];
		$word   = 'DGA';
		$search = new WordSearch( $word, $input );
		$this->assertFalse( $search->contains_word_down( 0, 1 ) );
	}

	public function test_contains_word_NE() {
		$input  = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
			[ 'G', 'H', 'I', ],
		];
		$word   = 'GEC';
		$search = new WordSearch( $word, $input );
		$this->assertTrue( $search->contains_word_NE( 0, 2 ) );
	}

	public function test_not_contains_word_NE() {
		$input  = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
			[ 'G', 'H', 'I', ],
		];
		$word   = 'GEB';
		$search = new WordSearch( $word, $input );
		$this->assertFalse( $search->contains_word_NE( 0, 2 ) );
	}

	public function test_word_longer_than_NE_spaces() {
		$input  = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
			[ 'G', 'H', 'I', ],
		];
		$word   = 'ECB';
		$search = new WordSearch( $word, $input );
		$this->assertFalse( $search->contains_word_NE( 0, 2 ) );
	}

	public function test_contains_word_SE() {
		$input  = [
			[ 'A', 'B', 'C', ],
			[ 'D', 'E', 'F', ],
			[ 'G', 'H', 'I', ],
		];
		$word   = 'AEI';
		$search = new WordSearch( $word, $input );
		$this->assertTrue( $search->contains_word_SE( 0, 0 ) );
	}

	public function test_word_count_3() {
		$input  = [
			[ 'A', 'B', 'C' ],
			[ 'D', 'B', 'F' ],
			[ 'B', 'F', 'C' ],
		];
		$word   = 'ABC';
		$search = new WordSearch( $word, $input );
		$this->assertTrue( $search->contains_word_SE( 0, 0 ) );
		$this->assertEquals( 2, $search->count_word() );
	}


	public function test_mas_x_line() {

		$input = [
			[ 'S', '.', 'S', '.', 'S', '.', 'S', '.', 'S', '.' ],
			[ '.', 'A', '.', 'A', '.', 'A', '.', 'A', '.', '.' ],
			[ 'M', '.', 'M', '.', 'M', '.', 'M', '.', 'M', '.' ],
		];

		$word   = 'MAS';
		$search = new WordSearch( $word, $input );
		$this->assertEquals( 4, $search->count_mas_xs() );

	}

}
