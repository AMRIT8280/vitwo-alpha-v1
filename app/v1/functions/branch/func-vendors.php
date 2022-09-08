<?php
//*************************************/INSERT/******************************************//
function createDataVendor($POST = [])
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
        $admin["tablename"] = 'tbl_vendor_admin_details';
        $admin["adminPassword"] = $POST["adminPassword"];
        $admin["fldAdminCompanyId"] =$POST["company_id"];
        $admin["fldAdminBranchId"] =$POST["company_branch_id"];

        if($POST["createdata"]=='add_post'){
        $vendor_status = 'active';
        }else{
        $vendor_status = 'draft';

        }


        $company_id = $POST["company_id"];
        $company_branch_id = $POST["company_branch_id"];
        $vendor_code = getRandCodeNotInTable(ERP_VENDOR_DETAILS,'vendor_code');
        $vendor_name = $POST["vendor_name"];
        $vendor_pan = $POST["vendor_pan"];
        $vendor_tan = $POST["vendor_tan"];
        $vendor_gstin = $POST["vendor_gstin"];
        $vendor_opening_balance = $POST["vendor_opening_balance"];
        $vendor_phone = $POST["vendor_phone"];
        $vendor_alt_phone = $POST["vendor_alt_phone"];
        $vendor_email = $POST["vendor_email"];
        $vendor_alt_email = $POST["vendor_alt_email"];

        //$adminAvatar = uploadFile($POST["adminAvatar"], "../public/storage/avatar/",["jpg","jpeg","png"]);

        $sql = "SELECT * FROM `".$admin["tablename"]."` WHERE `fldAdminEmail`='" . $admin["adminEmail"] . "' AND `fldAdminStatus`!='deleted'";
        if ($res = mysqli_query($dbCon, $sql)) {
            if (mysqli_num_rows($res) == 0) {

                $ins = "INSERT INTO `".ERP_VENDOR_DETAILS."` 
                            SET
                                `company_id`='" . $company_id . "',
                                `company_branch_id`='" . $company_branch_id . "',
                                `vendor_name`='" . $vendor_name . "',
                                `vendor_code`='" . $vendor_code['data'] . "',
                                `vendor_pan`='" . $vendor_pan . "',
                                `vendor_tan`='" . $vendor_tan . "',
                                `vendor_gstin`='" . $vendor_gstin . "',
                                `vendor_opening_balance`='" . $vendor_opening_balance . "',
                                `vendor_phone`='" . $vendor_phone . "',
                                `vendor_alt_phone`='" . $vendor_alt_phone . "',
                                `vendor_email`='" . $vendor_email . "',
                                `vendor_alt_email`='" . $vendor_alt_email . "',
                                `vendor_status`='" . $vendor_status . "'";

                if (mysqli_query($dbCon, $ins)) {
                    $last_id = mysqli_insert_id($dbCon);
                    $admin["fldAdminVendorId"] =$last_id;
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
function updateDataVendor($POST)
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

        $sql = "SELECT * FROM `".ERP_VENDOR_DETAILS."` WHERE `fldAdminKey`='" . $adminKey . "'";
        if ($res = mysqli_query($dbCon, $sql)) {
            if (mysqli_num_rows($res) > 0) {
                $ins = "UPDATE `".ERP_VENDOR_DETAILS."` 
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
function getAllDataVendor()
{
    global $dbCon;
    $returnData = [];
    $sql = "SELECT * FROM `".ERP_VENDOR_DETAILS."` WHERE `status`!='deleted'";
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
    $sql = "SELECT * FROM `".ERP_VENDOR_DETAILS."` WHERE `status`!='deleted' AND `fldRoleKey`=" . $key . "";
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
function ChangeStatusVendor($data = [], $tableKeyField = "", $tableStatusField = "status")
{
    global $dbCon;
	$tableName=ERP_VENDOR_DETAILS;
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