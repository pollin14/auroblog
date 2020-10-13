<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckAgentTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     *
     * @dataProvider dataProvider
     * @return void
     */
    public function testRedirect($version, $expected)
    {
        $response = $this
            ->withHeader('User-Agent', $version)
            ->get('/');

        $response->assertStatus($expected);
    }

    public function dataProvider()
    {
        return [
            ['Mozilla/4.0 (compatible; MSIE 6.0; Windows 98)', 302],
            ['Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; WOW64; Trident/5.0; KTXN)', 302],
            ['Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; rv:11.0) like Gecko', 200],
        ];
    }
}
