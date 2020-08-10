<?php

class Autoloader
{
    public function addNamespace(string $prefix, string $dir)
    {

    }

    public function register()
    {
        spl_autoload_register(array($this, 'auroload'));
    }

    public function autoload($class)
    {

    }
}

$autoload = new Autoloader()