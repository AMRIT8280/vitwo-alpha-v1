<?php
//*************************************/INSERT/******************************************//
function createDataBranches($POST = [])
{
    global $dbCon;
    $returnData = [];
    $isValidate = validate($POST, [
        "adminName" => "required",
        "adminEmail" => "required|email",
        "adminPhone" => "required|min:10|max:15",
        "adminPassword" => "required|min:4"
    ], [
        "adminName" => "Enter name",
        "adminEmail" => "Enter valid email",
        "adminPhone" => "Enter valid phone",
        "adminPassword" => "Enter password(min:4 character)"
    ]);

    if ($isValidate["status"] == "success") {
        $admin=array();
        $admin["adminName"] = $POST["adminName"];
        $admin["adminEmail"] = $POST["adminEmail"];
        $admin["adminPhone"] = $POST["adminPhone"];
        $admin["adminPassword"] = $POST["adminPassword"];
        $admin["tablename"] = 'tbl_branch_admin_details';
        $admin["adminPassword"] = $POST["adminPassword"];

        if($POST["createdata"]=='add_post'){
        $branch_status = 'active';
        }else{
        $branch_status = 'draft';

        }

        $branch_name = $POST["branch_name"];
        $branch_gstin = $POST["branch_gstin"];
        $con_business = $POST["con_business"];
        $build_no = $POST["build_no"];
        $flat_no = $POST["flat_no"];
        $street_name = $POST["street_name"];
        $pincode = $POST["pincode"];
        $location = $POST["location"];
        $city = $POST["city"];
        $district = $POST["district"];
        $state = $POST["state"];
        $company_id=$POST["fldAdminCompanyId"];

        $branch_code = getRandCodeNotInTable(ERP_BRANCHES,'branch_code');

        //$adminAvatar = uploadFile($POST["adminAvatar"], "../public/storage/avatar/",["jpg","jpeg","png"]);

        $sql = "SELECT * FROM `".$admin["tablename"]."` WHERE `fldAdminEmail`='" . $admin["adminEmail"] . "' AND `fldAdminStatus`!='deleted'";
        if ($res = mysqli_query($dbCon, $sql)) {
            if (mysqli_num_rows($res) == 0) {

                $ins = "INSERT INTO `".ERP_BRANCHES."` 
                            SET
                                `branch_name`='" . $branch_name . "',
                                `company_id`='" . $company_id . "',
                                `branch_code`='" . $branch_code['data'] . "',
                                `branch_gstin`='" . $branch_gstin . "',
                                `con_business`='" . $con_business . "',
                                `build_no`='" . $build_no . "',
                                `flat_no`='" . $flat_no . "',
                                `street_name`='" . $street_name . "',
                                `pincode`='" . $pincode . "',
                                `location`='" . $location . "',
                                `city`='" . $city . "',
                                `district`='" . $district . "',
                                `state`='" . $state . "',
                                `branch_status`='" . $branch_status . "'";

                if (mysqli_query($dbCon, $ins)) {
                    $last_id = mysqli_insert_id($dbCon);
                    $admin["fldAdminCompanyId"] =$company_id;
                    $admin["fldAdminBranchId"] =$last_id;
                    addNewAdministratorUserGlobal($admin);
                    $returnData['status'] = "success";
                    $returnData['message'] = "Admin added success";
                } else {
                    $returnData['status'] = "warning";
                    $returnData['message'] = "Admin added failed";
                }
            } else {
                $returnData['status'] = "warning";
                $returnData['message'] = "Admin already exist";
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
function updateDataBranches($POST)
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

        $sql = "SELECT * FROM `".ERP_BRANCHES."` WHERE `fldAdminKey`='" . $adminKey . "'";
        if ($res = mysqli_query($dbCon, $sql)) {
            if (mysqli_num_rows($res) > 0) {
                $ins = "UPDATE `".ERP_BRANCHES."` 
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
function getAllDataBranches($fldAdminCompanyId)
{
    global $dbCon;
    $returnData = [];
    $sql = "SELECT * FROM `".ERP_BRANCHES."` WHERE `status`!='deleted' AND fldAdminCompanyId='".$fldAdminCompanyId."'";
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
    $sql = "SELECT * FROM `".ERP_BRANCHES."` WHERE `status`!='deleted' AND `fldRoleKey`=" . $key . "";
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
//*************************************************Visit Branches*********************************************** */

function VisitBranches($POST){
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
function ChangeStatusBranches($data = [], $tableKeyField = "", $tableStatusField = "status")
{
    global $dbCon;
	$tableName=ERP_BRANCHES;
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