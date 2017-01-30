<?php

namespace Limbu\Elements;

/**
 * Tag class for HTML anchor elements.
 */
class A extends Tag
{
    /**
     * Instantiate a new anchor tag.
     *
     * @param  mixed  $content
     * @param  array  $attributes
     */
    public function __construct($content = null, array $attributes = [])
    {
        parent::__construct('a', $content, $attributes);
    }
}
