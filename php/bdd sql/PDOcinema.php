<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cinéma;charset=utf8', 'root','');

    function testSqlInjection($bdd, $requeststr) {
        try {
            $request = $bdd->prepare($requeststr);
            if (is_bool($request) and $request) {
                return false;
            } else {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}
catch (Exception $e)
{
    die('Erreur : ' . $e ->getMessage());
}
