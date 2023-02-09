<?php
class Duomenys{
    public $x=10;


    public function __get(string $name)
    {
        return $_GET[$name];
    }

}

$d=new Duomenys();
$d->vardas="Jonas";
