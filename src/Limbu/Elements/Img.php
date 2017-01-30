<?php

namespace Limbu\Elements;

/**
 * Tag class for HTML image element.
 */
class Img extends Tag
{
    /**
     * Flag for empty element.
     *
     * @var boolean
     */
    protected $empty = true;

    /**
     * Instantiate a new img tag.
     *
     * @param  array  $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct('img', null, $attributes);
    }
}
