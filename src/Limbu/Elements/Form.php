<?php

namespace Limbu\Elements;

/**
 * Tag class for HTML form element.
 */
class Form extends Tag
{
    /**
     * Instantiate a new form tag.
     *
     * @param  mixed  $content
     * @param  array  $attributes
     */
    public function __construct($content = null, array $attributes = [])
    {
        parent::__construct('form', $content, $attributes);
    }
}
