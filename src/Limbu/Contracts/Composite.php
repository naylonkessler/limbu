<?php

namespace Limbu\Contracts;

/**
 * Composite contract.
 */
interface Composite
{
    /**
     * Add an element to children collection.
     *
     * @param  mixed  $element
     * @return \Limbu\Contracts\Composite
     */
    public function add($element);
}
