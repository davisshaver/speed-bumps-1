<?php
namespace Speed_Bumps\Utils;

class Text {

	public static function split_paragraphs( $content ) {
		return preg_split( '/\n\s*\n/', $content );
	}


	public static function split_words( $content ) {
		return array_filter( explode( ' ', strip_tags( $content ) ) );
	}


	public static function split_chars( $content ) {
		return str_split( $content );
	}

	/**
	 * Get the content between two paragraph indexes.
	 *
	 * Given two indexes, return an array of paragraphs between those two indexes.
	 *
	 * @param array Parts; array of all paragraphs in content
	 * @param int Start (or end) index
	 * @param int End (or start) index
	 * @return array Array of paragraphs between these two points.
	 */
	public static function content_between_points( $parts, $index_1, $index_2 ) {
		$start_point = min( $index_1, $index_2 );
		$length = absint( $index_2 - $index_1 );

		return array_slice( $parts, $start_point, $length );
	}

	/**
	 * Abstracted helper function for counting the words in a chunk of text.
	 *
	 * Given either a string of text or an array of strings, will split it into words and return the word count
	 *
	 * @param string|array Text to count words in
	 * @return int Word count
	 */
	public static function word_count( $text ) {
		if ( is_array( $text ) ) {
			$text = implode( ' ', $text );
		}

		$words = Text::split_words( $text );

		return count( $words );
	}
}
