<?php

namespace Limbu;

use Limbu\Elements\Tag;

/**
 * Main class of limbu package.
 */
class Limbu
{
    /**
     * Create and return a HtmlElement object.
     *
     * @param  string  $name
     * @param  mixed  $content
     * @param  array  $attributes
     * @return \Limbu\Contracts\HtmlElement
     */
    public function tag($name = 'div', $content = null, array $attributes = [])
    {
        return new Tag($name, $content, $attributes);
    }
}
