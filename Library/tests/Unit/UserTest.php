<?php

namespace Tests\Unit;

use Tests\Unit\UserTest;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function checking_books()
    {
        $book1 = Book::where('id','1');
        $book1 = Book::where('id','5');

        $this->assertTrue($book1->book_number != $book2->book_number);
    }
}
