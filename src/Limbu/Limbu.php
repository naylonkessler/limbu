<?php

namespace Limbu;

use Limbu\Elements\Tag;

/**
 * Main class of limbu package.
 */
class Limbu
{
    /**
     * Load helpers to global scope.
     *
     * @return true
     */
    public function loadHelpers()
    {
        include_once __DIR__.
                DIRECTORY_SEPARATOR.'Support'.
                DIRECTORY_SEPARATOR.'helpers.php';

        return true;
    }

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