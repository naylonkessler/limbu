<?php

namespace Limbu\Contracts;

/**
 * HtmlElement contract.
 */
interface HtmlElement
{
    /**
     * Set or get the element attributes.
     *
     * @param  mixed  $attributes  An attribute name or array of attributes
     * @param  mixed  $value  An optional value of attribute if first param is
     * a name
     * @return array|\Limbu\Contracts\HtmlElement
     */
    public function attributes($attributes = null, $value = null);

    /**
     * Set or get the element content.
     *
     * @param  mixed  $content
     * @return mixed
     */
    public function content($content = null);

    /**
     * Render the element markup.
     *
     * @return string
     */
    public function render();

    /**
     * Return the element string.
     *
     * @return string
     */
    public function __toString();
}
