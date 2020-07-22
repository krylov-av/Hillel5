<?
class Color
{
    private $red;
    private $green;
    private $blue;
    public function __construct(int $red=0,int $green=0,int $blue=0)
    {
        if (!is_numeric($red)||!is_numeric($green)||!is_numeric($blue))
        {
            die("Incorrect format of colors. It expects the numbers 0..255");
        }
        if ($red<0 || $green<0 || $blue<0)
        {
            die("Incorrect format of color. It expects positive numbers 0.255");
        }
        if ($red>255 || $green>255 || $blue>255)
        {
            die("Incorrect format of color. It expects values not more then 255");
        }
        $this->red=$red;
        $this->green=$green;
        $this->blue=$blue;
        return $this;
    }
    private function dth($value)
    {

        $prefix=($this->$value<10)?0:'';
        return $prefix.dechex($this->$value);
    }
    public function printColor()
    {
        //return "#".dechex($this->red).dechex($this->green).dechex($this->blue);
        return "#".$this->dth('red').$this->dth('green').$this->dth('blue');
    }
    public function getRed(){return $this->red;}
    public function getGreen(){return $this->green;}
    public function getBlue(){return $this->blue;}
    public function equals($red,$green,$blue)
    {
        //return $this->red==$red&&$this->green==$green&&$this->blue==$blue;
        return ($this->red==$red&&$this->green==$green&&$this->blue==$blue)?'true':'false';
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
}
$color1=new Color(200,145,176);
$color2=(new Color())->random();
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
    equal-color1:<?print $color2->equals($color1->getRed(),$color1->getGreen(),$color1->getBlue());?>
</p>
<div class='myBlock'>You picked this color</div>
<div class='myBlock' style="background-color: <?print $color2->printColor();?>;">Random color</div>
<div class='myBlock' style="background-color: <?print $color1->mix($color2)->printColor();?>;">Mixed color</div>

<?
print "<hr><hr>TEST on some values<br>";
$color = new Color(200, 200, 200);
$mixedColor = $color->mix(new Color(100, 100, 100));
print $mixedColor->getRed()."must be 150<br>"; // 150
print $mixedColor->getGreen()."must be 150<br>"; // 150
print $mixedColor->getBlue()."must be 150<br>"; // 150
?>

</body>
</html>
