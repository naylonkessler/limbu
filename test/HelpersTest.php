<?php

class HelpersTest extends PHPUnit_Framework_TestCase
{
    public static function setUpBeforeClass()
    {
        (new \Limbu\Limbu())->loadHelpers();
    }

    public function testTag()
    {
        $div = tag('div');

        $this->assertInstanceOf(\Limbu\Elements\Tag::class, $div);
    }

    public function testA()
    {
        $a = a('Location');

        $this->assertInstanceOf(\Limbu\Elements\A::class, $a);
    }

    public function testForm()
    {
        $form = form('Content');

        $this->assertInstanceOf(\Limbu\Elements\Form::class, $form);
    }

    public function testImg()
    {
        $img = img(['src' => 'lorempixel.com/10/10']);

        $this->assertInstanceOf(\Limbu\Elements\Img::class, $img);
    }
}