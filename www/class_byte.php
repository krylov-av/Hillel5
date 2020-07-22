<?php
class byte{
    private $byte;
    function __construct(int $byte){
        $this->setByte($byte);
        return $this->getByte;
    }
    function equal(byte $byte){
        return $this->byte=$byte->byte;
    }
    function getByte(){
        return $this->byte;
    }
    function setByte($byte){
        if ($byte<0) die("The value must be positive 0");
        if ($byte>255) die("The value must be less then 255");
        $this->byte=$byte;
        return $this;
    }
    function __toString()
    {
        return (string) $this->byte;
    }
}
$red = new byte(25);
$green = new byte(35);
print "<pre>";
print_r($red);
print "<pre>";
print "<hr>";
print "<pre>";
print_r($green);
print "<pre>";
print "<hr>";
print "<pre>";
print_r($red.$green);
print "<pre>";
print "<hr>";
?>