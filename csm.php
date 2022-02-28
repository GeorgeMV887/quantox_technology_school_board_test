<?php

// Includes folder
$inc = "/inc/";
// Load classes and custom functions
require_once (__DIR__ . $inc . "classes/qDatabase.php");

// Connect to database
$db = new qDatabase("quantox_technology","localhost","root","");
$link = $db->connect();

$request_method=$_SERVER["REQUEST_METHOD"];

switch($request_method) {
    case 'GET':
        // Retrive Products
        if(!empty($_GET["id"])) {
            $id = intval($_GET["id"]);
            get_student($link,$id);
        }
        break;
    default:
        // Invalid Request Method
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function get_student($link, $id = 0) {
    $query = "SELECT * FROM csm";
    if ($id != 0) {
        $query.=" WHERE id=".$id." AND school_board='csm' LIMIT 1";
    }
    $response = [];
    // $result = mysqli_query($link, $query);
    $result = $link->query($query);
    // while ( $row = mysqli_fetch_array($result) )  {
    //     $response[] = $row;
    // }
    $row = $result->fetch_array(MYSQLI_ASSOC);
    if ($row["id"] !== 0 && $row["name"] != null) {
        $response["id"] = intval($row["id"]);
        $response["name"] = $row["name"];
        $response["grade_1"] = intval($row["grade_1"]);
        $response["grade_2"] = intval($row["grade_2"]);
        $response["grade_3"] = intval($row["grade_3"]);
        $response["grade_4"] = intval($row["grade_4"]);
        $response["average"] = ($row["grade_1"] + $row["grade_2"] + $row["grade_3"] + $row["grade_4"])/4;
        $response["result"] = ($response["average"] >= 7) ? "Pass" : "Fail";
        // echo '<pre>';
        // var_dump($response);
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}