<?php

$usuario = "admin";
$password = "1234";
$intentos = 2;
$activo = true;

define("MAX_INTENTOS", 3);

//mostar datos de cada variable
echo "Tipo de dato de usuario: " . gettype($usuario) . "<br>";
echo "Tipo de dato de password: " . gettype($password) . "<br>";
echo "Tipo de dato de intentos: " . gettype($intentos) . "<br>";
echo "Tipo de dato de activo: " . gettype($activo) . "<br>";
echo "Tipo de dato de MAX_INTENTOS: " . gettype(MAX_INTENTOS) . "<br>";

//comprobar que el usuario sea "admin", su contraseña 1234, la cuenta este activa, y que el numero de intentos sea menor que 3.
print $usuario === "admin" && $password === "1234" && $activo == true && $intentos <= MAX_INTENTOS ? "<h1> Acceso permitido </h1>" : "<h1> Acesso denegado </h1>";




?>