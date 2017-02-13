<?php

namespace Limbu\Elements;

use Limbu\Contracts\CompositeInterface;
use Limbu\Contracts\HtmlElementInterface;
use Limbu\Exceptions\InvalidComposite as InvalidCompositeException;
use Limbu\Limbu;

/**
 * Base class of all html elements.
 */
class Tag implements HtmlElementInterface, CompositeInterface
{
    /**
     * Collection of attributes.
     *
     * @var array
     */
    protected $attributes = [];

    /**
     * Collection of children elements.
     *
     * @var array
     */
    protected $children = [];

    /**
     * Name of tag.
     *
     * @var string
     */
    protected $name;

    /**
     * Flag for empty element.
     *
     * @var boolean
     */
    protected $empty = false;

    /**
     * Instantiate a new tag.
     *
     * @param  string  $name
     * @param  mixed  $content
     * @param  array  $attributes
     */
    public function __construct($name = 'div', $content = null, array $attributes = [])
    {
        $this->name = $name;
        $this->attributes($attributes);
        $this->content($content);
    }

    /**
     * Add an element to children collection.
     *
     * @param  mixed  $element
     * @return \Limbu\Contracts\Composite
     * @throws \Limbu\Exceptions\InvalidComposite
     */
    public function add($element)
    {
        if ($this->empty) {
            throw new InvalidCompositeException('Add element to invalid composite');
        }

        $this->children[] = $element;

        return $this;
    }

    /**
     * Set or get the element attributes.
     *
     * @param  mixed  $attributes  An attribute name or array of attributes
     * @param  mixed  $value  An optional value of attribute if first param is
     * a name
     * @return array|\Limbu\Contracts\HtmlElement
     */
    public function attributes($attributes = null, $value = null)
    {
        if (is_array($attributes)) {
            $this->attributes = $attributes;

            return $this;
        }

        if ($attributes && $value !== null) {
            $this->attributes[$attributes] = $value;

            return $this;
        }

        if ($attributes && $value === null) {
            return $this->attributes[$attributes];
        }

        return $this->attributes;
    }

    /**
     * Set or get the element content.
     *
     * @param  mixed  $content
     * @return mixed
     */
    public function content($content = null)
    {
        if ($content !== null) {
            $this->children = (array) $content;

            return $this;
        }

        return $this->children;
    }

    /**
     * Render the element markup.
     *
     * @return string
     */
    public function render()
    {
        $out = [];
        $out[] = $this->renderOpen();

        if ( ! $this->empty) {
            $out[] = $this->renderChildren();
            $out[] = $this->renderClose();
        }

        return implode('', $out);
    }

    /**
     * Render tag attributes.
     *
     * @return string
     */
    protected function renderAttributes()
    {
        $out = [];

        foreach ($this->attributes() as $name => $value) {
            $out[] = "{$name}=\"{$value}\"";
        }

        return implode(' ', $out);
    }

    /**
     * Render tag children elements.
     *
     * @return string
     */
    protected function renderChildren()
    {
        $out = [];

        foreach ($this->content() as $child) {
            if (is_string($child)) {
                $out[] = $child;
            }

            if (is_array($child)) {
                $out[] = call_user_func_array([new Limbu(), 'tag'], $child);
            }

            if ($child instanceOf self) {
                $out[] = $child->render();
            }
        }

        return implode('', $out);
    }

    /**
     * Render the tag close part.
     *
     * @return string
     */
    protected function renderClose()
    {
        return '</'.$this->name.'>';
    }

    /**
     * Render the tag open part.
     *
     * @return string
     */
    protected function renderOpen()
    {
        $attributes = $this->renderAttributes();
        $attributes = $attributes? ' '.$attributes : '';

        return '<'.$this->name.$attributes.'>';
    }

    /**
     * Return the element string.
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->render();
    }
}
