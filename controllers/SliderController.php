<?php

use function PHPSTORM_META\type;

require('../models/slider.php');

$contact = new sliderDB('localhost', 'root', '', 'web');
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
                $id = $_GET['id'];
                $row = $contact->getDataByID($id);
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
                $res = $contact->insert($_POST['id'], $img, $b64type, $_POST['desc']);
                echo $res;
                break;
            case 'delete':
                $id = $_POST['id'];
                $res = $contact->remove($id);
                echo $res;
                break;
            case 'edit':
                $id = $_POST['id'];
                $newid = $_POST['newid'];
                $img = $_POST['img'];
                $b64type = substr($img, 11, strpos($img, ';') - 11);
                $img = substr($img, strpos($img, ',') + 1);
                $img = base64_decode($img);
                $desc = $_POST['desc'];
                $res = $contact->update($id, $newid, $img, $b64type, $desc);
                echo $res;
                break;
        }
        break;
}
?>