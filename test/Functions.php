<?php

use PHPUnit\Framework\TestCase;

require '../functions.php';

class Functions extends TestCase
{
    public function testDisplay_winners_success() {
        $winners = [
            ['prize_year' => '2020', 'author_name' => 'Douglas Stuart', 'book_title' => 'Shuggie Bain', 'author_nationality' => 'Scottish-American'],
            ['prize_year' => '1900', 'author_name' => 'foo', 'book_title' => 'bar', 'author_nationality' => 'bar']
        ];
        $result = display_winners($winners);
        $this->assertIsString($result);
    }

    public function testDisplay_winners_failure() {
        $this->expectException(TypeError::class);
        display_winners(42);
    }

    public function testTest_input_success() {
        $data = "      \<html> spaces \ ";
        $sanitized = validate_input($data);
        $expected = "<html> spaces";
        $this->assertEquals($sanitized, $expected);

    }
}