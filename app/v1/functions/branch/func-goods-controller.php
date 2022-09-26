<?php
class GoodsController{

    function createGoodTypes($INPUTS){
        global $dbCon;
        $returnData = [];
        $isValidate = validate($INPUTS, [
            "goodTypeName" => "required",
            "goodTypeDesc" => "required"
        ], [
            "goodTypeName" => "Enter good type name",
            "goodTypeDesc" => "Enter good type  desc"
        ]);

        if ($isValidate["status"] != "success") {
            $returnData['status'] = "warning";
            $returnData['message'] = "Invalid form inputes";
            $returnData['errors'] = $isValidate["errors"];
            return $returnData;
        }

        $companyId = $INPUTS["companyId"];
        $goodTypeName = $INPUTS["goodTypeName"];
        $goodTypeDesc = $INPUTS["goodTypeDesc"];

        $goodTypeCreatedBy = 1;

        $createSql = "INSERT INTO `".ERP_INVENTORY_MASTR_GOOD_TYPES."` SET `companyId`='".$companyId."',`goodTypeName`='".$goodTypeName."',`goodTypeDesc`='".$goodTypeDesc."',`goodTypeCreatedBy`='".$goodTypeCreatedBy."',`goodTypeUpdatedBy`='".$goodTypeCreatedBy."'";

        if(mysqli_query($dbCon, $createSql)){
            $returnData["status"] = "success";
            $returnData["message"] = "Good type created success.";
        }else{
            $returnData["status"] = "warning";
            $returnData["message"] = "Good type created failed, try again!";
        }
        return $returnData;
    }
    
    function getAllGoodTypes(){
        global $dbCon;
        $returnData = [];
        $selectSql = "SELECT * FROM `".ERP_INVENTORY_MASTR_GOOD_TYPES."`";

        if($res = mysqli_query($dbCon, $selectSql)){
            $returnData['status'] = "success";
            $returnData['message'] = mysqli_num_rows($res) ." records found.";
            $returnData['data'] = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }else{
            $returnData['status'] = "warning";
            $returnData['message'] = "Something went wrong, try again";
            $returnData['data'] = [];
        }
        return $returnData;
    }


    function createGoodGroup($INPUTS){
        global $dbCon;
        $returnData = [];
        $isValidate = validate($INPUTS, [
            "goodGroupName" => "required",
            "goodGroupDesc" => "required"
        ], [
            "goodGroupName" => "Enter good group name",
            "goodGroupDesc" => "Enter good group desc"
        ]);

        if ($isValidate["status"] != "success") {
            $returnData['status'] = "warning";
            $returnData['message'] = "Invalid form inputes";
            $returnData['errors'] = $isValidate["errors"];
            return $returnData;
        }

        $companyId = $INPUTS["companyId"];
        $goodGroupName = $INPUTS["goodGroupName"];
        $goodGroupDesc = $INPUTS["goodGroupDesc"];

        $goodGroupCreatedBy = 1;

        $createSql = "INSERT INTO `".ERP_INVENTORY_MASTR_GOOD_GROUPS."` SET `companyId`='".$companyId."',`goodGroupName`='".$goodGroupName."',`goodGroupDesc`='".$goodGroupDesc."',`goodGroupCreatedBy`='".$goodGroupCreatedBy."',`goodGroupUpdatedBy`='".$goodGroupCreatedBy."'";

        if(mysqli_query($dbCon, $createSql)){
            $returnData["status"] = "success";
            $returnData["message"] = "Good group created successfully";
        }else{
            $returnData["status"] = "warning";
            $returnData["message"] = "Good group created failed, try again!";
        }
        return $returnData;
    }

    function getAllGoodGroups(){
        global $dbCon;
        $returnData = [];
        $selectSql = "SELECT * FROM `".ERP_INVENTORY_MASTR_GOOD_GROUPS."`";

        if($res = mysqli_query($dbCon, $selectSql)){
            $returnData['status'] = "success";
            $returnData['message'] = mysqli_num_rows($res) ." records found.";
            $returnData['data'] = mysqli_fetch_all($res, MYSQLI_ASSOC);
        }else{
            $returnData['status'] = "warning";
            $returnData['message'] = "Something went wrong, try again";
            $returnData['data'] = [];
        }
        return $returnData;
    }

}




?>