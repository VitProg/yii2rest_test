<?php
/**
 * Created by PhpStorm.
 * User: VitProg
 * Date: 18.07.2015
 * Time: 19:31
  */

$ua = $_SERVER['HTTP_USER_AGENT'];
if ($ua !== 'GitHub-Hookshot/f5d5ca1') die();

$data = file_get_contents('php://input');
$data = json_decode($data);
var_dump($data);




