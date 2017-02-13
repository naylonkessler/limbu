<?php

namespace Limbu;

/**
 * Limbu wrapper functions
 */

/**
 * Limbu wrapper function to generate tags.
 *
 * @param  string  $name
 * @param  mixed  $content
 * @param  array  $attributes
 * @return \Limbu\Contracts\HtmlElement
 */
function tag($name = 'div', $content = null, array $attributes = []) {
    return new \Limbu\Elements\Tag($name, $content, $attributes);
}

/**
 * Limbu wrapper function to generate anchors.
 *
 * @param  mixed  $content
 * @param  array  $attributes
 * @return \Limbu\Contracts\HtmlElement
 */
function a($content = null, array $attributes = []) {
    return new \Limbu\Elements\A($content, $attributes);
}

/**
 * Limbu wrapper function to generate forms.
 *
 * @param  mixed  $content
 * @param  array  $attributes
 * @return \Limbu\Contracts\HtmlElement
 */
function form($content = null, array $attributes = []) {
    return new \Limbu\Elements\Form($content, $attributes);
}

/**
 * Limbu wrapper function to generate images.
 *
 * @param  array  $attributes
 * @return \Limbu\Contracts\HtmlElement
 */
function img(array $attributes = []) {
    return new \Limbu\Elements\Img($attributes);
}
