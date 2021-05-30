<?php
declare(strict_types=1);

namespace Tests;

class TestUtils
{
    // Useful to test private methods
    public static function callMethod(Object $obj, string $name, array $args)
    {
        $class  = new \ReflectionClass($obj);
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method->invokeArgs($obj, $args);
    }
}
