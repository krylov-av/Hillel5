<?php

function explode_by_last_char(string $str,string $devider='\\')
{
    $res = explode($devider, $str);
    array_pop($res);
    return implode($devider,$res);
}

spl_autoload_register (function($class){
    global $class_config;
    // iterate name space while it not get empty
    $class='\\'.$class;
    //print "Class = '".$class."'<br>";
    for ($i=$class;$i!='';$i=explode_by_last_char($i))
    {
        print '=>=>'.$i."<=<=<br>";
        if (isset($class_config[$i]))
        {
            //replace begin of string with text from config
            print "We found '".$i."'<hr>";
            $pattern = '/'.addcslashes($i,'\\').'/';
            $class_file=preg_replace($pattern,$class_config[$i],$class);
            //revert slashes
            $class_file=preg_replace('/\\\\/','/',$class_file);
            print "New class = ".$class;
            if (file_exists($class_file.'.php'))
            {
                print "File exists";
                //$namespace=explode('\\',$class);
                //namespace $class;
                require(getcwd().'/'.$class_file.'.php');
                //namespace \;
            }
            else
            {
                print getcwd()."File not exists";
                print "<pre>";
                print_r(scandir (getcwd()));
                print "</pre>";
            }
            break;
        }
    }
    //print "We exited";
    //exit;
    //foreach ($class_config as $template=>$row)
   // {
   //     print $template.'===>'.$row.' || strpos = '.preg_match('/'.$template.'/',$class)."<br>";
    //}
    //print "</pre>";
    //$namespace=explode('\\',$class);
    //print_r($namespace);
});

$class_config = array(
    '\First\NameSpace'=>'\first',
    '\Second\L\NameSpace'=>'\second',
    '\tralala\mySpace\myClass'=>'testOnly',
    '\mySpace\myClasses'=>'myClasses',
    '\mySpace'=>'myClass',
    '\Third\Space'=>'\third',
    '\myClasses'=>'cooltesting'
);

$myCar = new \mySpace\myClasses\car('red');
print "<hr>We got class:<br><pre>";
print_r($myCar);
print "</pre>";
