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
    $query = "SELECT * FROM csmb";
    if ($id != 0) {
        $query.=" WHERE id=".$id." AND school_board='csmb' LIMIT 1";
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
        $gradesArr = [$response["grade_1"], $response["grade_2"], $response["grade_3"], $response["grade_4"]];
        if (count($gradesArr) > 2) {
            // Get minimum grade(s);
            $minGrade = min($gradesArr);            
            function discard_grade($arr,$min) {
                $result = [];
                foreach($arr as $item) {
                    if ($item === $min) {continue;}
                    $result[] = $item;
                }
                return $result;
            }
            // Discard lowest grade
            $newArr = discard_grade($gradesArr,$minGrade);
                        
            function average_grade($arr) {
                $sum = 0;
                $counter = count($arr);
                foreach($arr as $item) {
                    $sum += $item;
                }
                return $sum/$counter;
            }
           // Store new computed average
           $newAverage = average_grade($newArr);           
           $response["result"] = ($newAverage > 8) ? "Pass" : "Fail";

        } else {
            $response["result"] = ($response["average"] > 8) ? "Pass" : "Fail";
        }        

        $data=<<<XML
        <student>
        <id>{$response["id"]}</id>
        <name>{$response["name"]}</name>
        <grade_1>{$response["grade_1"]}</grade_1>
        <grade_2>{$response["grade_2"]}</grade_2>
        <grade_3>{$response["grade_3"]}</grade_3>
        <grade_4>{$response["grade_4"]}</grade_4>
        <average>{$response["average"]}</average>
        <result>{$response["result"]}</result>
        </student>
        XML;

        $xml = new SimpleXMLElement($data);
        echo $xml->asXML();

    }
}