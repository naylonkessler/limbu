<?php

class LimbuTest extends PHPUnit_Framework_TestCase
{
    public function testLimbuInstance()
    {
        $limbu = new \Limbu\Limbu();

        $this->assertInstanceOf(\Limbu\Limbu::class, $limbu);

        return $limbu;
    }

    /**
     * @depends testLimbuInstance
     */
    public function testTagMethodExistence($limbu)
    {
        $this->assertTrue(method_exists($limbu, 'tag'));
    }

    /**
     * @depends testLimbuInstance
     */
    public function testWrappersLoading($limbu)
    {
        $this->assertTrue(function_exists('\Limbu\tag'));
    }

    /**
     * @depends testLimbuInstance
     */
    public function testTagCreation($limbu)
    {
        $tag = $limbu->tag('div');

        $this->assertInstanceOf(\Limbu\Contracts\HtmlElementInterface::class, $tag);
    }
}