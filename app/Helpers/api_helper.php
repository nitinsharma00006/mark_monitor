<?php
//============== Set json header ===============
function set_json_header(){
	header("content-type: application/json");
}

function blank($value , $name = '')
{
    if(!empty($name)){
        $msg = "Check Your Input ($name)";
    }else{
        $msg = "Check Your Input";
    }
    if(empty($value)){
        echo invalid_request($msg);
        exit();
    }
    return $value;
}

function response($result , $response_code, $msg="" , $data=array())
{
    set_json_header();
    echo json_encode(array('result' => $result , "response_code" => $response_code, 'msg' => $msg , 'data' => $data));
    exit();
}

function success($msg = "Success" , $data = array())
{
    return response(STATUS_SUCCESS , SUCCESS , $msg , $data);
}

function internal_server()
{
    return response(STATUS_ERROR , INTERNAL_SERVER,"Internal Server Error");
}

function not_found()
{
    return response(STATUS_ERROR , NOT_FOUND , "Not Found");
}
function unauthorized()
{
    return response(STATUS_ERROR , UNAUTHORIZED , "Unauthorized Access");
}
function invalid_request($msg = 'Invalid Request')
{
    return response(STATUS_ERROR , INVALID_REQUEST , $msg);
}