<?php
require_once 'animal.php';
require_once 'Frog.php';
require_once 'Ape.php';

// Instance untuk Animal (shaun)
$sheep = new Animal("shaun");
echo "Name : " . $sheep->name . "<br>";
echo "Legs : " . $sheep->legs . "<br>";
echo "Cold blooded : " . $sheep->cold_blooded . "<br><br>";

// Instance untuk Frog (buduk)
$kodok = new Frog("buduk");
echo "Name : " . $kodok->name . "<br>";
echo "Legs : " . $kodok->legs . "<br>";
echo "Cold blooded : " . $kodok->cold_blooded . "<br>";
echo "Jump : ";
$kodok->jump();
echo "<br><br>";

// Instance untuk Ape (kera sakti)
$sungokong = new Ape("kera sakti");
echo "Name : " . $sungokong->name . "<br>";
echo "Legs : " . $sungokong->legs . "<br>";
echo "Cold blooded : " . $sungokong->cold_blooded . "<br>";
echo "Yell : ";
$sungokong->yell();
echo "<br><br>";
?>
