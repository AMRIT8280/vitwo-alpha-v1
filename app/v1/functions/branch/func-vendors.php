<?php
//*************************************/INSERT/******************************************//

function createVendorOtherBusinessAddr($vendorId, $ADDRESSES = [])
{
    global $dbCon;
    $returnData = [];

    $noOfAddresses = count($ADDRESSES);
    $noOfSuccessAdded = 0;
    //console($ADDRESSES);

    foreach ($ADDRESSES as $oneAddress) {

        // console($oneAddress["vendor_business_legal_name"]);

        $ins = "INSERT INTO `" . ERP_VENDOR_BUSINESS_PLACES . "`
                         SET 
                            `vendor_id`='$vendorId',
                            `vendor_business_primary_flag`='0',
                            `vendor_business_legal_name`='" . $oneAddress['vendor_business_legal_name'] . "',
                            `vendor_business_constitution`='" . $oneAddress['vendor_business_constitution'] . "',
                            `vendor_business_flat_no`='" . $oneAddress['vendor_business_flat_no'] . "',
                            `vendor_business_pin_code`='" . $oneAddress['vendor_business_pin_code'] . "',
                            `vendor_business_district`='" . $oneAddress['vendor_business_district'] . "',
                            `vendor_business_location`='" . $oneAddress['vendor_business_location'] . "',
                            `vendor_business_trade_name`='" . $oneAddress['vendor_business_trade_name'] . "',
                            `vendor_business_building_no`='" . $oneAddress['vendor_business_building_no'] . "',
                            `vendor_business_street_name`='" . $oneAddress['vendor_business_street_name'] . "',
                            `vendor_business_city`='" . $oneAddress['vendor_business_city'] . "',
                            `vendor_business_state`='" . $oneAddress['vendor_business_state'] . "'";

        // console($ins);
        mysqli_query($dbCon, $ins);

        $noOfSuccessAdded++;
    }
}


function createDataVendor($POST = [])
{
    global $dbCon;
    $returnData = [];
    $isValidate = validate($POST, [
        "vendor_authorised_person_name" => "required",
        "vendor_authorised_person_email" => "required|email",
        "vendor_authorised_person_phone" => "required|min:10|max:15",
        "adminPassword" => "required|min:4"
    ], [
        "vendor_authorised_person_name" => "Enter name",
        "vendor_authorised_person_email" => "Enter valid email",
        "vendor_authorised_person_phone" => "Enter valid phone",
        "adminPassword" => "Enter password(min:4 character)"
    ]);

    if ($isValidate["status"] == "success") {
        $admin = array();
        $admin["adminName"] = $POST["vendor_authorised_person_name"];
        $admin["adminEmail"] = $POST["vendor_authorised_person_email"];
        $admin["adminPhone"] = $POST["vendor_authorised_person_phone"];
        $admin["adminPassword"] = $POST["adminPassword"];
        $admin["tablename"] = 'tbl_vendor_admin_details';
        $admin["adminPassword"] = $POST["adminPassword"];
        $admin["fldAdminCompanyId"] = $POST["company_id"];
        $admin["fldAdminBranchId"] = $POST["company_branch_id"];

        if ($POST["createdata"] == 'add_post') {
            $vendor_status = 'active';
        } else {
            $vendor_status = 'draft';
        }

        $company_id = $POST["company_id"];
        $company_branch_id = $POST["company_branch_id"];
        // $vendor_code = getRandCodeNotInTable(ERP_VENDOR_DETAILS,'vendor_code');
        $vendor_code = $POST["vendor_code"];
        $vendor_pan = $POST["vendor_pan"];
        $vendor_gstin = $POST["vendor_gstin"];
        $trade_name = $POST["trade_name"];
        $constitution_of_business = $POST["con_business"];
        $vendor_opening_balance = $POST["vendor_opening_balance"];

        $vendor_authorised_person_name = $POST["vendor_authorised_person_name"];
        $vendor_authorised_person_designation = $POST["vendor_authorised_person_designation"];
        $vendor_authorised_person_phone = $POST["vendor_authorised_person_phone"];
        $vendor_authorised_alt_phone = $POST["vendor_authorised_alt_phone"];
        $vendor_authorised_person_email = $POST["vendor_authorised_person_email"];
        $vendor_authorised_alt_email = $POST["vendor_authorised_alt_email"];

        // other address
        $state = $POST["state"];
        $city = $POST["city"];
        $district = $POST["district"];
        $location = $POST["location"];
        $build_no = $POST["build_no"];
        $flat_no = $POST["flat_no"];
        $street_name = $POST["street_name"];
        $pincode = $POST["pincode"];
        
        // accounting
        $opening_balance = $POST["opening_balance"];
        $currency = $POST["currency"];
        $credit_period = $POST["credit_period"];
        $vendor_bank_cancelled_cheque = $POST["vendor_bank_cancelled_cheque"];
        $vendor_bank_ifsc = $POST["vendor_bank_ifsc"];
        $vendor_bank_name = $POST["vendor_bank_name"];
        $vendor_bank_branch = $POST["vendor_bank_branch"];
        $vendor_bank_address = $POST["vendor_bank_address"];
        $vendor_bank_account_no = $POST["vendor_bank_account_no"];

        // $vendor_picture = $POST["vendor_picture"];
        $vendor_visible_to_all = $POST["vendor_visible_to_all"];
        //$adminAvatar = uploadFile($POST["adminAvatar"], "../public/storage/avatar/",["jpg","jpeg","png"]);

        $sql = "SELECT * FROM `" . $admin["tablename"] . "` WHERE `fldAdminEmail`='" . $admin["adminEmail"] . "' AND `fldAdminStatus`!='deleted'";
        if ($res = mysqli_query($dbCon, $sql)) {
            if (mysqli_num_rows($res) == 0) {
                // console($POST);
                $ins = "INSERT INTO `" . ERP_VENDOR_DETAILS . "` 
                            SET
                                `company_id`='" . $company_id . "',
                                `company_branch_id`='" . $company_branch_id . "',
                                `vendor_code`='" . $vendor_code . "',
                                `vendor_pan`='" . $vendor_pan . "',
                                `vendor_gstin`='" . $vendor_gstin . "',
                                `trade_name`='" . $trade_name . "',
                                `constitution_of_business`='" . $constitution_of_business . "',
                                `vendor_opening_balance`='" . $vendor_opening_balance . "',
                                `vendor_authorised_person_name`='" . $vendor_authorised_person_name . "',
                                `vendor_authorised_person_designation`='" . $vendor_authorised_person_designation . "',
                                `vendor_authorised_person_phone`='" . $vendor_authorised_person_phone . "',
                                `vendor_authorised_alt_phone`='" . $vendor_authorised_alt_phone . "',
                                `vendor_authorised_person_email`='" . $vendor_authorised_person_email . "',
                                `vendor_authorised_alt_email`='" . $vendor_authorised_alt_email . "',
                                `vendor_visible_to_all`='" . $vendor_visible_to_all . "',
                                `vendor_status`='" . $vendor_status . "'";

                if (mysqli_query($dbCon, $ins)) {
                    $vendorId = mysqli_insert_id($dbCon);
                    $admin["fldAdminVendorId"] = $vendorId;

                    // insert to admin details
                    addNewAdministratorUserGlobal($admin);

                    // insert to ERP_VENDOR_BUSINESS_PLACES from basic details
                    $ins = "INSERT INTO `" . ERP_VENDOR_BUSINESS_PLACES . "`
                    SET 
                            `vendor_id`='$vendorId',
                            `vendor_business_primary_flag`='1',
                            `vendor_business_building_no`='$build_no',
                            `vendor_business_flat_no`='$flat_no',
                            `vendor_business_street_name`='$street_name',
                            `vendor_business_pin_code`='$pincode',
                            `vendor_business_location`='$location',
                            `vendor_business_city`='$city',
                            `vendor_business_district`='$district',
                            `vendor_business_state`='$state'
                            ";
                    mysqli_query($dbCon, $ins);

                    // insert to ERP_VENDOR_BUSINESS_PLACES from other addresses
                    createVendorOtherBusinessAddr($vendorId, $POST['vendorOtherAddress']);

                    // insert to ERP_VENDOR_BUSINESS_PLACES from other addresses
                    $insAcc = "INSERT INTO `" . ERP_VENDOR_BANK_DETAILS . "` 
                            SET
                                `vendor_id`='$vendorId',
                                `opening_balance`='$opening_balance',
                                `currency`='$currency',
                                `credit_period`='$credit_period',
                                `vendor_bank_name`='$vendor_bank_name',
                                `vendor_bank_account_no`='$vendor_bank_account_no',
                                `vendor_bank_ifsc`='$vendor_bank_ifsc',
                                `vendor_bank_branch`='$vendor_bank_branch',
                                `vendor_bank_address`='$vendor_bank_address',
                                `vendor_bank_cancelled_cheque`='$vendor_bank_cancelled_cheque'
                    ";
                    mysqli_query($dbCon, $insAcc);

                    $returnData['status'] = "success";
                    $returnData['message'] = "Vendor added success";
                } else {
                    $returnData['status'] = "warning";
                    $returnData['message'] = "Vendor added failed";
                }
            } else {
                $returnData['status'] = "warning";
                $returnData['message'] = "Vendor already exist";
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

        $sql = "SELECT * FROM `" . ERP_VENDOR_DETAILS . "` WHERE `fldAdminKey`='" . $adminKey . "'";
        if ($res = mysqli_query($dbCon, $sql)) {
            if (mysqli_num_rows($res) > 0) {
                $ins = "UPDATE `" . ERP_VENDOR_DETAILS . "` 
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
    $sql = "SELECT * FROM `" . ERP_VENDOR_DETAILS . "` WHERE `status`!='deleted'";
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
    $sql = "SELECT * FROM `" . ERP_VENDOR_DETAILS . "` WHERE `status`!='deleted' AND `fldRoleKey`=" . $key . "";
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
    $tableName = ERP_VENDOR_DETAILS;
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