<?php

class TagsTest extends PHPUnit_Framework_TestCase
{
    public function testATag()
    {
        $a = new \Limbu\Elements\A('Test');
        $render = $a->render();

        $this->assertInstanceOf(\Limbu\Elements\A::class, $a);
        $this->assertEquals('<a>Test</a>', $render);
    }

    public function testFormTag()
    {
        $form = new \Limbu\Elements\Form('Test', ['method' => 'POST']);
        $render = $form->render();

        $this->assertInstanceOf(\Limbu\Elements\Form::class, $form);
        $this->assertEquals('<form method="POST">Test</form>', $render);
    }

    public function testImgTag()
    {
        $img = new \Limbu\Elements\Img(['src' => 'test.jpg']);
        $render = $img->render();

        $this->assertInstanceOf(\Limbu\Elements\Img::class, $img);
        $this->assertEquals('<img src="test.jpg">', $render);
    }
}