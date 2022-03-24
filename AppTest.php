<?php

use PHPUnit\Framework\TestCase;

class AppTest extends TestCase
{
    /**
     * Test our PDO Connection
     *
     * @return void
     */
    public function testPDOConnection()
    {
        include_once '../functions.php';

        $this->assertInstanceOf(PDO::class, getPDOConnection());
    }

    /**
     * Test our MySQL Connection
     *
     * @return void
     */
    public function testMySQLiConnection()
    {
        include_once '../functions.php';
        
        $this->assertInstanceOf(mysqli::class, getMySQLiConnection());
    }

    /**
     * Test our login function
     *
     * @return void
     */
    public function testLogin() 
    {
        include_once '../functions.php';
        
        // test user should be created with this username and password
        $loginResponse = userLogin('test', 'test'); 

        $this->assertIsArray($loginResponse);
        $this->assertArrayHasKey('message', $loginResponse);
        $this->assertArrayHasKey('profile', $loginResponse);

        // assert key equals value
        $this->assertEquals('success', $loginResponse['message']);
    }

    /**
     * Test our register function
     *
     * @return void
     */
    public function testRegister()
    {
        include_once '../functions.php';

        $registerResponse = registerUser(date('U'), 'test');

        $this->assertIsArray($registerResponse);
        $this->assertArrayHasKey('status', $registerResponse);

        // assert key equals value
        $this->assertEquals('success', $registerResponse['status']);
    }


    /**
     * getQuote function
     *
     * @return void
     */
    public function testGetQuote()
    {
        include_once '../functions.php';

        $getQuoteResponse = getQuote(1);

        $this->assertIsArray($getQuoteResponse);
        $this->assertArrayHasKey('suggested_price', $getQuoteResponse);
        $this->assertArrayHasKey('total_amount', $getQuoteResponse);

        // assert key equals value
        $this->assertEquals(1.725, $getQuoteResponse['suggested_price']);
        $this->assertEquals(1.725, $getQuoteResponse['total_amount']);
    }
}