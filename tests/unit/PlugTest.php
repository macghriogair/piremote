<?php

use App\Entities\Plug;
use Laravel\Lumen\Testing\DatabaseTransactions;

class PlugTest extends TestCase //PHPUnit_Framework_TestCase
{
    use DatabaseTransactions;

     /** @test */
    public function it_returns_a_unique_key()
    {
        $plug = Plug::create([
            'name' => 'dummy',
            'systemcode' => '12345',
            'unitcode' => '03'
        ]);

        $this->assertEquals('1234503', $plug->getKey());
    }
}
