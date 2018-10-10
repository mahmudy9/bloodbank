<?php



function apiResponse($status , $msg , $data=null)
{
    $response = [
        "status" => $status,
        "msg" => $msg,
        "data" => $data
    ];

    return response()->json($response);

}



?>