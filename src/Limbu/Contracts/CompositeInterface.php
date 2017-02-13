<?php

namespace Limbu\Contracts;

/**
 * Composite contract.
 */
interface CompositeInterface
{
    /**
     * Add an element to children collection.
     *
     * @param  mixed  $element
     * @return \Limbu\Contracts\CompositeInterface
     */
    public function add($element);
}
