<?php

use PHPUnit\Framework\TestCase;

require_once '../functions.php';

class Functions extends TestCase {
    public function testDisplay_winners_success() {
        $winner = ['prize_year' => 2020, 'author_name' => 'Douglas Stuart', 'author_nationality' => 'Scottish-American'];
        display_winners($winner);
        $this->assertIsArray();
    }
}