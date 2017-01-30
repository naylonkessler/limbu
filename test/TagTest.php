<?php

include 'mock/EmptyTag.php';

class TagTest extends PHPUnit_Framework_TestCase
{
    public function testTagInstance()
    {
        $div = new \Limbu\Elements\Tag('div');

        $this->assertInstanceOf(\Limbu\Elements\Tag::class, $div);
    }

    public function testTagAttributesControl()
    {
        $div = new \Limbu\Elements\Tag('div', null, ['class' => 'test']);
        $attributes = $div->attributes();

        $this->assertArrayHasKey('class', $attributes);
        $this->assertEquals('test', $attributes['class']);

        $return = $div->attributes(['class' => 'updated']);
        $attributes = $div->attributes();

        $this->assertArrayHasKey('class', $attributes);
        $this->assertEquals('updated', $attributes['class']);
        $this->assertInstanceOf(\Limbu\Elements\Tag::class, $return);

        $return = $div->attributes('class', 'new-one');
        $attribute = $div->attributes('class');

        $this->assertEquals('new-one', $attribute);
    }

    public function testTagTextContentControl()
    {
        $div = new \Limbu\Elements\Tag('div', 'Test');
        $content = $div->content();

        $this->assertEquals('Test', $content[0]);

        $return = $div->content('Updated');
        $content = $div->content();

        $this->assertEquals('Updated', $content[0]);
        $this->assertInstanceOf(\Limbu\Elements\Tag::class, $return);
    }

    public function testTagRender()
    {
        $div = new \Limbu\Elements\Tag('div', 'Test');
        $render = $div->render();

        $this->assertEquals('<div>Test</div>', $render);

        $div = new \Limbu\Elements\Tag('div', 'Test', ['class' => 'test']);
        $render = $div->render();

        $this->assertEquals('<div class="test">Test</div>', $render);
    }

    public function testTagMultipleTextContentRender()
    {
        $div = new \Limbu\Elements\Tag('div', ['Test', ' again']);
        $render = $div->render();

        $this->assertEquals('<div>Test again</div>', $render);
    }

    public function testTagMultipleContentRender()
    {
        $div = new \Limbu\Elements\Tag('div', [
            'Test ',
            new \Limbu\Elements\Tag('b', 'again '),
            ['i', 'and again']
        ]);
        $render = $div->render();

        $this->assertEquals('<div>Test <b>again </b><i>and again</i></div>', $render);
    }

    public function testTagString()
    {
        $div = new \Limbu\Elements\Tag('div', 'Test');
        $string = (string) $div;

        $this->assertEquals('<div>Test</div>', $string);
    }

    public function testTagComposite()
    {
        $div = new \Limbu\Elements\Tag('div');

        $this->assertInstanceOf(\Limbu\Contracts\Composite::class, $div);
    }

    public function testTagAddMethod()
    {
        $div = new \Limbu\Elements\Tag('div');

        $this->assertTrue(method_exists($div, 'add'));
    }

    public function testTagAdding()
    {
        $div = new \Limbu\Elements\Tag('div');

        $this->assertEquals('<div></div>', $div->render());

        $div->add(new \Limbu\Elements\Tag('b', 'Test'));

        $this->assertEquals('<div><b>Test</b></div>', $div->render());
    }

    public function testSelfClosedRender()
    {
        $img = new EmptyTag('img');
        $render = $img->render();

        $this->assertEquals('<img>', $render);

        $img = new EmptyTag('img', null, ['class' => 'test']);
        $render = $img->render();

        $this->assertEquals('<img class="test">', $render);
    }

    /**
     * @expectedException \Limbu\Exceptions\InvalidComposite
     */
    public function testAddExceptionOnSelfClosed()
    {
        $img = new EmptyTag('img');
        $img->add(new EmptyTag('br'));
    }
}