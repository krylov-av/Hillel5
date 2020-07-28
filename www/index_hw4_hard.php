<?
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
class Color {
    private $red;
    private $green;
    private $blue;
    public function __construct(byte $red,byte $green,byte $blue)
    {
        $this->red=$red->getByte();
        $this->green=$green->getByte();
        $this->blue=$blue->getByte();
        return $this;
    }
    private function dectohex($value)
    {
        $prefix=($this->$value<16)?0:'';
        return $prefix.dechex($this->$value);
    }
    function __toString()
    {
        return (string) '#'.$this->dectohex('red').$this->dectohex('green').$this->dectohex('blue');
    }
    public function getRed(){return $this->red;}
    public function getGreen(){return $this->green;}
    public function getBlue(){return $this->blue;}
    public function equals(Color $color2)
    {
        //return $this->red==$red&&$this->green==$green&&$this->blue==$blue;
        //return ($this->red==$red&&$this->green==$green&&$this->blue==$blue)?'true':'false';
        return ($this->red==$color2->red&&$this->green==$color2->green&&$this->blue==$color2->blue);
    }
    public function random(){
        $this->red=random_int(0,255);
        $this->green=random_int(0,255);
        $this->blue=random_int(0,255);
        return $this;
    }
    public function mix(Color $color)
    {
        $this->red=($this->red+$color->getRed())/2;
        $this->green=($this->green+$color->getGreen())/2;
        $this->blue=($this->blue+$color->getBlue())/2;
        return $this;
    }
    public function printColor()
    {
        //return "#".dechex($this->red).dechex($this->green).dechex($this->blue);
        return "#".$this->dectohex('red').$this->dectohex('green').$this->dectohex('blue');
    }
}

$color1=new Color(new byte(29),new byte(145),new byte(176));
$color2=(new Color(new byte(40),new byte(0),new byte(0)))->random();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .myBlock{
            border:5px dashed red;
            background-color: <?print $color1->printColor();?>;
            margin:5px;padding:20px;
            display: inline-block;
        }
    </style>
</head>
<body>
<h2>Color1</h2>
<p>
    printColor:<?print $color1->printColor();?><br>
    getred:<?print $color1->getRed();?><br>
    getgreen:<?print $color1->getGreen();?><br>
    getblue:<?print $color1->getBlue();?><br>
</p>
<h2>Color2</h2>
<p>
    printColor:<?print $color2->printColor();?><br>
    getred:<?print $color2->getRed();?><br>
    getgreen:<?print $color2->getGreen();?><br>
    getblue:<?print $color2->getBlue();?><br>
    equal-color1:<?print $color2->equals($color1);?>
</p>
<div class='myBlock'>You picked this color</div>
<div class='myBlock' style="background-color: <?print $color2->printColor();?>;">Random color</div>
<div class='myBlock' style="background-color: <?print $color1->mix($color2)->printColor();?>;">Mixed color</div>
<?
print "<hr><hr>TEST on some values<br>";
$color = new Color(new byte(200), new byte(200), new byte (200));
$mixedColor = $color->mix(new Color(new byte(100),new byte( 100), new byte(100)));
print $mixedColor->getRed()."must be 150<br>"; // 150
print $mixedColor->getGreen()."must be 150<br>"; // 150
print $mixedColor->getBlue()."must be 150<br>"; // 150
?>
</body>
</html>