<?php

namespace Limbu\Exceptions;

use BadMethodCallException;

/**
 * Exception for adding elements on self closed tags.
 */
class InvalidComposite extends BadMethodCallException
{
}