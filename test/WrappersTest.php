<?php

class WrappersTest extends PHPUnit_Framework_TestCase
{
    public function testTag()
    {
        $div = \Limbu\tag('div');

        $this->assertInstanceOf(\Limbu\Elements\Tag::class, $div);
    }

    public function testA()
    {
        $a = \Limbu\a('Location');

        $this->assertInstanceOf(\Limbu\Elements\A::class, $a);
    }

    public function testForm()
    {
        $form = \Limbu\form('Content');

        $this->assertInstanceOf(\Limbu\Elements\Form::class, $form);
    }

    public function testImg()
    {
        $img = \Limbu\img(['src' => 'lorempixel.com/10/10']);

        $this->assertInstanceOf(\Limbu\Elements\Img::class, $img);
    }
}