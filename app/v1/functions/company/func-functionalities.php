<?php
//*************************************/INSERT/******************************************//
function createDatafunctionalities($POST = [],$admin_id)
{
    global $dbCon;
    $returnData = [];
    $isValidate = validate($POST, [
        "functionalities_name" => "required"
    ], [
        "functionalities_name" => "Enter Credit Terms"
    ]);

    if ($isValidate["status"] == "success") {
        if($POST["createdata"]=='add_post'){
        $functionalities_status = 'active';
        }else{
        $functionalities_status = 'draft';

        }

        $functionalities_name = $POST["functionalities_name"];
        $functionalities_created_by = $admin_id;
        $functionalities_desc=$POST["functionalities_desc"];
        $company_id=$POST["fldAdminCompanyId"];

        //$adminAvatar = uploadFile($POST["adminAvatar"], "../public/storage/avatar/",["jpg","jpeg","png"]);

        $sql = "SELECT * FROM `".ERP_COMPANY_FUNCTIONALITIES."` WHERE `functionalities_name`='" .$functionalities_name. "' AND `functionalities_status`!='deleted'";
        if ($res = mysqli_query($dbCon, $sql)) {
            if (mysqli_num_rows($res) == 0) {

                $ins = "INSERT INTO `".ERP_COMPANY_FUNCTIONALITIES."` 
                            SET
                                `company_id`='" . $company_id . "',
                                `functionalities_name`='" . $functionalities_name . "',
                                `functionalities_desc`='" . $functionalities_desc . "',
                                `functionalities_created_by`='" . $functionalities_created_by . "',
                                `functionalities_updated_by`='" . $functionalities_created_by . "',
                                `functionalities_status`='" . $functionalities_status . "'";

                if (mysqli_query($dbCon, $ins)) {
                    $returnData['status'] = "success";
                    $returnData['message'] = "Information added success";
                } else {
                    $returnData['status'] = "warning";
                    $returnData['message'] = "Information added failed";
                }
            } else {
                $returnData['status'] = "warning";
                $returnData['message'] = "Information already exist";
            }
        } else {
            $returnData['status'] = "warning";
            $returnData['message'] = "Somthing went wrong";
        }
    } else {
        $returnData['status'] = "warning";
        $returnData['message'] = "Invalid form inputes";
        $returnData['errors'] = $isValidate["errors"];
    }
    return $returnData;
}

//*************************************/UPDATE/******************************************//
function updateDatafunctionalities($POST)
{
    global $dbCon;
    $returnData = [];
    $isValidate = validate($POST, [
        "adminKey" => "required",
        "adminName" => "required",
        "adminEmail" => "required|email",
        "adminPhone" => "required|min:10|max:10",
        "adminPassword" => "required|min:8",
        "adminRole" => "required",
    ], [
        "adminKey" => "Invalid admin",
        "adminName" => "Enter name",
        "adminEmail" => "Enter valid email",
        "adminPhone" => "Enter valid phone",
        "adminPassword" => "Enter password(min:8 character)",
        "adminRole" => "Select a role",
    ]);

    if ($isValidate["status"] == "success") {

        $adminKey = $POST["adminKey"];
        $adminName = $POST["adminName"];
        $adminEmail = $POST["adminEmail"];
        $adminPhone = $POST["adminPhone"];
        $adminPassword = $POST["adminPassword"];
        $adminRole = $POST["adminRole"];

        $sql = "SELECT * FROM `".ERP_COMPANY_FUNCTIONALITIES."` WHERE `fldAdminKey`='" . $adminKey . "'";
        if ($res = mysqli_query($dbCon, $sql)) {
            if (mysqli_num_rows($res) > 0) {
                $ins = "UPDATE `".ERP_COMPANY_FUNCTIONALITIES."` 
                            SET
                                `fldAdminName`='" . $adminName . "',
                                `fldAdminEmail`='" . $adminEmail . "',
                                `fldAdminPhone`='" . $adminPhone . "',
                                `fldAdminPassword`='" . $adminPassword . "',
                                `fldAdminRole`='" . $adminRole . "' WHERE `fldAdminKey`='" . $adminKey . "'";

                if (mysqli_query($dbCon, $ins)) {
                    $returnData['status'] = "success";
                    $returnData['message'] = "Admin modified success";
                } else {
                    $returnData['status'] = "warning";
                    $returnData['message'] = "Admin modified failed";
                }
            } else {
                $returnData['status'] = "warning";
                $returnData['message'] = "Admin not exist";
            }
        } else {
            $returnData['status'] = "warning";
            $returnData['message'] = "Somthing went wrong";
        }
    } else {
        $returnData['status'] = "warning";
        $returnData['message'] = "Invalid form inputes";
        $returnData['errors'] = $isValidate["errors"];
    }
    return $returnData;
}

//*************************************/SELECT ALL/******************************************//
function getAllDatafunctionalities($fldAdminCompanyId)
{
    global $dbCon;
    $returnData = [];
    $sql = "SELECT * FROM `".ERP_COMPANY_FUNCTIONALITIES."` WHERE `status`!='deleted' AND fldAdminCompanyId='".$fldAdminCompanyId."'";
    if ($res = mysqli_query($dbCon, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            $returnData['status'] = "success";
            $returnData['message'] = "Data found";
            $returnData['data'] = mysqli_fetch_all($res, MYSQLI_ASSOC);
        } else {
            $returnData['status'] = "warning";
            $returnData['message'] = "Data not found";
            $returnData['data'] = [];
        }
    } else {
        $returnData['status'] = "warning";
        $returnData['message'] = "Somthing went wrong";
        $returnData['data'] = [];
    }
    return $returnData;
}

//*************************************/SELECT SINGLE/******************************************//
function getDataDetails($key = null)
{
    global $dbCon;
    $returnData = [];
    $sql = "SELECT * FROM `".ERP_COMPANY_FUNCTIONALITIES."` WHERE `status`!='deleted' AND `fldRoleKey`=" . $key . "";
    if ($res = mysqli_query($dbCon, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            $returnData['status'] = "success";
            $returnData['message'] = "Data found";
            $returnData['data'] = mysqli_fetch_assoc($res);
        } else {
            $returnData['status'] = "warning";
            $returnData['message'] = "Data not found";
            $returnData['data'] = [];
        }
    } else {
        $returnData['status'] = "warning";
        $returnData['message'] = "Somthing went wrong";
        $returnData['data'] = [];
    }
    return $returnData;
}
//*************************************************Visit functionalities*********************************************** */

function Visitfunctionalities($POST){
    global $dbCon;
    $returnData=[];
    $sql="SELECT * FROM `tbl_branch_admin_details` WHERE `fldAdminCompanyId`='".$POST["fldAdminCompanyId"]."' AND `fldAdminBranchId`='".$POST["fldAdminBranchId"]."' AND `fldAdminStatus`='active' ORDER BY fldAdminKey ASC limit 1";
    if($result=mysqli_query($dbCon,$sql)){
        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);
            $_SESSION["logedBranchAdminInfo"]["adminId"]=$row["fldAdminKey"];
            $_SESSION["logedBranchAdminInfo"]["adminName"]=$row["fldAdminName"];
            $_SESSION["logedBranchAdminInfo"]["adminEmail"]=$row["fldAdminEmail"];
            $_SESSION["logedBranchAdminInfo"]["adminPhone"]=$row["fldAdminPhone"];
            $_SESSION["logedBranchAdminInfo"]["adminRole"]=$row["fldAdminRole"];
            $_SESSION["logedBranchAdminInfo"]["fldAdminCompanyId"]=$row["fldAdminCompanyId"];
            $_SESSION["logedBranchAdminInfo"]["fldAdminBranchId"]=$row["fldAdminBranchId"];
            $_SESSION["logedBranchAdminInfo"]["adminType"]='branch';
            $returnData["status"]="success";
            $returnData["message"]="Login success";
            
        }else{
            $returnData["status"]="warning";
            $returnData["message"]="Invalid Credentials, Try again...!";
        }
    }else{
        $returnData["status"]="warning";
        $returnData["message"]="Something went wrong, Try again...!";
    }
    return $returnData;
}

//*************************************/UPDATE STATUS/******************************************//
function ChangeStatusfunctionalities($data = [], $tableKeyField = "", $tableStatusField = "status")
{
    global $dbCon;
	$tableName=ERP_COMPANY_FUNCTIONALITIES;
    $returnData["status"] = null;
    $returnData["message"] = null;
    if (!empty($data)) {
        $id = isset($data["id"]) ? $data["id"] : 0;
        $prevSql = "SELECT * FROM `" . $tableName . "` WHERE `" . $tableKeyField . "`='" . $id . "'";
        $prevExeQuery = mysqli_query($dbCon, $prevSql);
        $prevNumRecords = mysqli_num_rows($prevExeQuery);
        if ($prevNumRecords > 0) {
            $prevData = mysqli_fetch_assoc($prevExeQuery);
            $newStatus = "deleted";
            if ($data["changeStatus"] == "active_inactive") {
                $newStatus = ($prevData[$tableStatusField] == "active") ? "inactive" : "active";
            }
            $changeStatusSql = "UPDATE `" . $tableName . "` SET `" . $tableStatusField . "`='" . $newStatus . "' WHERE `" . $tableKeyField . "`=" . $id;
            if (mysqli_query($dbCon, $changeStatusSql)) {
                $returnData["status"] = "success";
                $returnData["message"] = "Status has been changed to " . strtoupper($newStatus);
            } else {
                $returnData["status"] = "error";
                $returnData["message"] = "Something went wrong, Try again...!";
            }
            $returnData["changeStatusSql"] = $changeStatusSql;
        } else {
            $returnData["status"] = "warning";
            $returnData["message"] = "Something went wrong, Try again...!";
        }
    } else {
        $returnData["status"] = "warning";
        $returnData["message"] = "Please provide all valid data...!";
    }
    return $returnData;
}

//*************************************/END/******************************************//