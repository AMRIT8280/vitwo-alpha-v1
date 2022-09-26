<?php
//*************************************/INSERT/******************************************//
function createDataBranchLocation($POST = [])
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

        $adminrole=$POST["adminRole"];

        if($POST["createdata"]=='add_post'){
        $othersLocation_status = 'active';
        }else{
        $othersLocation_status = 'draft';
        }

        $company_id = $POST["company_id"];
        $branch_id = $POST["branch_id"];
        $othersLocation_name = $POST["othersLocation_name"];
        $othersLocation_building_no = $POST["othersLocation_building_no"];
        $othersLocation_flat_no = $POST["othersLocation_flat_no"];
        $othersLocation_street_name = $POST["othersLocation_street_name"];
        $othersLocation_pin_code = $POST["othersLocation_pin_code"];
        $othersLocation_location = $POST["othersLocation_location"];
        $othersLocation_city = $POST["othersLocation_city"];
        $othersLocation_district = $POST["othersLocation_district"];
        $othersLocation_state = $POST["othersLocation_state"];

        $othersLocation_code = getRandCodeNotInTable(ERP_BRANCH_OTHERSLOCATION,'othersLocation_code');

        //$adminAvatar = uploadFile($POST["adminAvatar"], "../public/storage/avatar/",["jpg","jpeg","png"]);

        $sql = "SELECT * FROM `".$admin["tablename"]."` WHERE `fldAdminEmail`='" . $admin["adminEmail"] . "' AND `fldAdminStatus`!='deleted'";
        if ($res = mysqli_query($dbCon, $sql)) {
            if (mysqli_num_rows($res) == 0) {

                $ins = "INSERT INTO `".ERP_BRANCH_OTHERSLOCATION."` 
                            SET
                                `company_id`='" . $company_id . "',
                                `branch_id`='" . $branch_id . "',
                                `othersLocation_name`='" . $othersLocation_name . "',
                                `othersLocation_code`='" . $othersLocation_code['data'] . "',
                                `othersLocation_building_no`='" . $othersLocation_building_no . "',
                                `othersLocation_flat_no`='" . $othersLocation_flat_no . "',
                                `othersLocation_street_name`='" . $othersLocation_street_name . "',
                                `othersLocation_pin_code`='" . $othersLocation_pin_code . "',
                                `othersLocation_location`='" . $othersLocation_location . "',
                                `othersLocation_city`='" . $othersLocation_city . "',
                                `othersLocation_district`='" . $othersLocation_district . "',
                                `othersLocation_state`='" . $othersLocation_state . "',
                                `othersLocation_status`='" . $othersLocation_status . "'";

                if (mysqli_query($dbCon, $ins)) {
                    $last_id = mysqli_insert_id($dbCon);
                    $admin["fldAdminCompanyId"] =$company_id;
                    $admin["fldAdminBranchId"] =$branch_id;
                    $admin["fldAdminBranchLocationId"] =$last_id;
                    addNewAdministratorUserGlobal($admin,$adminrole);
                    $returnData['status'] = "success";
                    $returnData['message'] = "Data added success";
                } else {
                    $returnData['status'] = "warning";
                    $returnData['message'] = "Data added failed";
                }
          } else {
                $returnData['status'] = "warning";
                $returnData['message'] = "Data already exist";
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
function updateDataBranchLocation($POST)
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

        $sql = "SELECT * FROM `".ERP_BRANCH_OTHERSLOCATION."` WHERE `fldAdminKey`='" . $adminKey . "'";
        if ($res = mysqli_query($dbCon, $sql)) {
            if (mysqli_num_rows($res) > 0) {
                $ins = "UPDATE `".ERP_BRANCH_OTHERSLOCATION."` 
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
function getAllDataBranchLocation()
{
    global $dbCon;
    $returnData = [];
    $sql = "SELECT * FROM `".ERP_BRANCH_OTHERSLOCATION."` WHERE `status`!='deleted'";
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
    $sql = "SELECT * FROM `".ERP_BRANCH_OTHERSLOCATION."` WHERE `status`!='deleted' AND `fldRoleKey`=" . $key . "";
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


//*************************************/UPDATE STATUS/******************************************//
function ChangeStatusBranchLocation($data = [], $tableKeyField = "", $tableStatusField = "status")
{
    global $dbCon;
	$tableName=ERP_BRANCH_OTHERSLOCATION;
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