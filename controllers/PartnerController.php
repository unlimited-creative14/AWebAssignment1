<?php

use function PHPSTORM_META\type;

require('../models/partner.php');

$contact = new sliderDB('localhost', 'root', '', 'db_ass2');
$method = $_SERVER['REQUEST_METHOD'];
$type = isset($_POST['type']) ? $_POST['type'] : $_GET['type'];

switch ($method){
    case 'GET':
        switch ($type){
            case 'list':
                $data = $contact->getData();
                for ($i=0; $i < count($data); $i++) { 
                    $data[$i][1] = base64_encode($data[$i][1]);
                }
                echo json_encode($data);
                break;
            case 'item':
                $namep = $_GET['namep'];
                $row = $contact->getDataByID($namep);
                $row[0][1] = base64_encode($row[0][1]);
                echo json_encode($row);
                break;
        }
        break;
    case 'POST':
        switch ($type){
            case 'insert':
                $img = $_POST['img'];
                $b64type = substr($img, 11, strpos($img, ';') - 11);
                $img = substr($img, strpos($img, ',') + 1);
                $img = base64_decode($img);
                $res = $contact->insert($_POST['namep'], $img, $b64type, $_POST['desc']);
                echo $res;
                break;
            case 'delete':
                $namep = $_POST['namep'];
                $res = $contact->remove($namep);
                echo $res;
                break;
            case 'edit':
                $namep = $_POST['namep'];
                $newnamep = $_POST['newnamep'];
                $img = $_POST['img'];
                $b64type = substr($img, 11, strpos($img, ';') - 11);
                $img = substr($img, strpos($img, ',') + 1);
                $img = base64_decode($img);
                $desc = $_POST['desc'];
                $res = $contact->update($namep, $newnamep, $img, $b64type, $desc);
                echo $res;
                break;
        }
        break;
}
?>