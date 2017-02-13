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
    public function testHelpersLoadingExistence($limbu)
    {
        $this->assertTrue(method_exists($limbu, 'loadWrappers'));
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
    public function testHelpersLoading($limbu)
    {
        $limbu->loadWrappers();

        $this->assertTrue(function_exists('tag'));
    }

    /**
     * @depends testLimbuInstance
     */
    public function testTagCreation($limbu)
    {
        $tag = $limbu->tag('div');

        $this->assertInstanceOf(\Limbu\Contracts\HtmlElement::class, $tag);
    }
}