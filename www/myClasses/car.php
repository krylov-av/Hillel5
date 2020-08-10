<?php
namespace mySpace\myClasses;
print '<h1>file with class included</h1>';
class Car
{
    private $color;
    public function __construct(string $color)
    {
        $this->color = $color;
    }
}
