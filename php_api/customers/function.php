<?php

require '../../php_api/inc/dbcon.php';

function getCustomerList()
{
    global $conn;
    $selectquery="SELECT * FROM cutsomers";
    $selectquery_res=mysqli_query($conn,$selectquery);
    if($selectquery_res)
    {
        if(mysqli_num_rows($selectquery_res)>0) 
        {
            $result=mysqli_fetch_all($selectquery_res,MYSQLI_ASSOC);
            $data=[
                'status'=>200,
                'message'=>'Data Fetched Successfully',
                'data'=>$result
            ];
            header("HTTP/1.0 200 Ok");
            return json_encode($data);
        }
        else
        {
            $data=[
                'status'=>404,
                'message'=>'No Customer Data Found!!',
            ];
            header("HTTP/1.0 404 No Customer Data Found!!");
            return json_encode($data);
        }
    }
    else
    {
        $data=[
            'status'=>500,
            'message'=>'Server Error Please',
        ];
        header("HTTP/1.0 500 Server Error Please");
        echo json_encode($data);
    }
}

?>