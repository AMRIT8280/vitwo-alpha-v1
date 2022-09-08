<?php

/**
 * Name:				insert_database_log()
 * Params:			void
 * Returns:			
 * Description:		
 *
 */

function create_log($query_sql, $data = array(), $readystmnt = '', $tableName)
{
    global $dbCon;
    $prepareData         =    serialize($data);
    $val = mysql_query('select 1 from `' . $tableName . '_log` LIMIT 1');
    if ($val !== TRUE) {
        $sql    =    "CREATE TABLE IF NOT EXISTS `" . $tableName . "_log` (
							  `id` int(20) NOT NULL AUTO_INCREMENT,
							  `date` varchar(255) DEFAULT NULL,
							  `ipAddress` varchar(255) DEFAULT NULL,
							  `tableName` varchar(255) DEFAULT NULL,
							  `primary_id` int(20) DEFAULT NULL,
							  `type` varchar(255) DEFAULT NULL,
							  `query` varchar(255) DEFAULT NULL,
							  `prepareData` text DEFAULT NULL,
							  `userId` varchar(255) DEFAULT NULL,
							  `status` enum('active','inactive','deleted') NOT NULL DEFAULT 'active',
							  `createdDate` datetime DEFAULT NULL DEFAULT current_timestamp(),
							  `createdIp` varchar(255) DEFAULT NULL,
							  `createdSessionId` varchar(255) DEFAULT NULL,
							  `modifiedDate` datetime DEFAULT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
							  `modifiedIp` varchar(255) DEFAULT NULL,
							  `modifiedSessionId` varchar(255) DEFAULT NULL,
							  PRIMARY KEY (`id`)
							) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

        mysqli_query($dbCon, $sql);
    }

    $sqlInsert    =    "INSERT INTO `" . $tableName . "_log`
							SET
							`date`				=	'" . date('Y-m-d') . "',
							`ipAddress`			=	'" . $_SERVER['REMOTE_ADDR'] . "',
							`type`				=	'" . $query_type . "',
							`query`				=	'" . $execute_query . "',
							`prepareData`		=	'" . $prepareData . "',
							`remarks`			=	'QUERY EXECUTED RECORD',
							`userId`			=	'" . $_SESSION['login_id'] . "',
							`createdSessionId`	=	'" . session_id() . "'";

    mysqli_query($dbCon, $sqlInsert);
}

//*************************************/UPDATE/INSERT - TABLE SETTINGS/******************************************//
function updateInsertTableSettings($POST,$adminId)
{
    global $dbCon;
    $isValidate = count($_POST['settingsCheckbox']);

    if ($isValidate >= 5) {

        $tablename = $POST["tablename"];
        $pageTableName = $POST["pageTableName"];
        $settingsCheckbox = serialize($POST["settingsCheckbox"]);

        $sql = "SELECT * FROM `" . $tablename . "` WHERE `pageTableName`='" . $pageTableName . "' AND `createdBy`='" . $adminId . "'";
        if ($res = mysqli_query($dbCon, $sql)) {
            if (mysqli_num_rows($res) > 0) {
                $updt = "UPDATE `" . $tablename . "` 
                            SET
                                `pageTableName`='" . $pageTableName . "',
                                `settingsCheckbox`='" . $settingsCheckbox . "',
                                `updatedBy`='" . $adminId . "'
							 WHERE `pageTableName`='" . $pageTableName . "'
							 	AND `createdBy`='" . $adminId . "'";

                if (mysqli_query($dbCon, $updt)) {
                    $returnData['status'] = "success";
                    $returnData['message'] = "Modified successfully";
                } else {
                    $returnData['status'] = "warning";
                    $returnData['message'] = "Modified failed";
                }
            } else {
                $ins = "INSERT INTO `" . $tablename . "` 
							SET
								`pageTableName`='" . $pageTableName . "',
                                `settingsCheckbox`='" . $settingsCheckbox . "',
                                `updatedBy`='" . $adminId . "',
                                `createdBy`='" . $adminId . "'";
                if (mysqli_query($dbCon, $ins)) {
                    $returnData["status"] = "success";
                    $returnData["message"] = "Modified successfully.";
                } else {
                    $returnData["status"] = "warning";
                    $returnData["message"] = "Modify failed!";
                }
            }
        } else {
            $returnData['status'] = "warning";
            $returnData['message'] = "Somthing went wrong";
        }
    } else {
        $returnData['status'] = "warning";
        $returnData['message'] = "Please Check Atlast 5";
    }
    return $returnData;
}


function getTableSettings($tablename, $pageTableName,$adminId)
{
    global $dbCon;
    $returnData = [];
    $sql = "SELECT * FROM `" . $tablename . "` WHERE `pageTableName`='" . $pageTableName . "' AND `createdBy`='" . $adminId . "'";
    if ($res = mysqli_query($dbCon, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            $returnData['status'] = "success";
            $returnData['message'] = "Data found";
            $returnData['data'] = mysqli_fetch_all($res, MYSQLI_ASSOC);
        } else {
            $sql2 = "SELECT * FROM `" . $tablename . "` WHERE `pageTableName`='" . $pageTableName . "' AND `createdBy`='0'";
            if ($res2 = mysqli_query($dbCon, $sql2)) {
                if (mysqli_num_rows($res2) > 0) {
                    $returnData['status'] = "success";
                    $returnData['message'] = "Data found2";
                    $returnData['data'] = mysqli_fetch_all($res2, MYSQLI_ASSOC);
                } else {
                    $settingsCheckbox = 'a:5:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"3";i:3;s:1:"4";i:4;s:1:"5";}';
                    $ins = "INSERT INTO `" . $tablename . "` 
							SET
								`pageTableName`='" . $pageTableName . "',
                                `settingsCheckbox`='" . $settingsCheckbox . "',
                                `updatedBy`='0',
                                `createdBy`='0'";
                    mysqli_query($dbCon, $ins);
                    $sql3 = "SELECT * FROM `" . $tablename . "` WHERE `pageTableName`='" . $pageTableName . "' AND `createdBy`='0'";
                    $res3 = mysqli_query($dbCon, $sql3);
                    if (mysqli_num_rows($res3) > 0) {
                        $returnData['status'] = "success";
                        $returnData['message'] = "Data found2";
                        $returnData['data'] = mysqli_fetch_all($res3, MYSQLI_ASSOC);
                    } else {
                        $returnData['status'] = "warning";
                        $returnData['message'] = "Data not found2";
                        $returnData['data'] = [];
                    }
                }
            } else {
                $returnData['status'] = "danger";
                $returnData['message'] = "Somthing went wrong2";
                $returnData['data'] = [];
            }
        }
    } else {
        $returnData['status'] = "danger";
        $returnData['message'] = "Somthing went wrong1";
        $returnData['data'] = [];
    }
    return $returnData;
}

//*****************************************************************************************

function getSetAlertMessage($data = [])
{
    if (isset($data["status"]) && isset($data["message"])) {
        $_SESSION["alertMessage"]["status"] = $data["status"];
        $_SESSION["alertMessage"]["message"] = $data["message"];
    } else {
        $returnData = [];
        if (isset($_SESSION["alertMessage"])) {
            $returnData = $_SESSION["alertMessage"];
            unset($_SESSION["alertMessage"]);
        }
        return $returnData;
    }
    return 1;
}

function console($data = null)
{
    if ($data != null) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}


function redirect($url = null)
{
    if ($url != null) {
?>
        <script>
            window.location.href = `<?= $url ?>`;
        </script>
    <?php
    }
}

function swalToast($icon = null, $title = null, $url = null)
{
    if ($icon != null && $title != null) {
        if ($url != null) {
    ?>
        <script>
            $(document).ready(function() {
                let Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: `<?= $icon ?>`,
                    title: `&nbsp;<?= $title ?>`
                }).then(function() {
                        window.location.href = `<?= $url ?>`;
                });
            });
        </script>
        <?php
        }else{?>
        <script>
            $(document).ready(function() {
                let Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: `<?= $icon ?>`,
                    title: `&nbsp;<?= $title ?>`
                });
            });
        </script>
            
      <?php  }
    }
}

function swalAlert($icon = null, $title = null, $text = null, $url = null)
{
    if ($icon != null && $text != null) {
        if ($url != null) {
        ?>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: `<?= $icon ?>`,
                        title: `<?= $title ?>`,
                        text: `<?= $text ?>`,
                    }).then(function() {
                        window.location.href = `<?= $url ?>`;
                    });
                });
            </script>
        <?php
        } else {
        ?>
            <script>
                $(document).ready(function() {
                    Swal.fire({
                        icon: `<?= $icon ?>`,
                        title: `<?= $title ?>`,
                        text: `<?= $text ?>`,
                    });
                });
            </script>
<?php
        }
    }
}

function uploadFile($file = [], $dir = "", $allowedExtensions = [], $maxSize = 0, $minSize = 0)
{
    $validationError = "";
    $fileExtension = pathinfo($file["name"], PATHINFO_EXTENSION);
    $fileNewName = time() . rand(10000, 99999) . "." . $fileExtension;
    if (sizeof($allowedExtensions) > 0) {
        if (!in_array(strtolower($fileExtension), $allowedExtensions)) {
            $validationError = "Extension not allowed";
        }
    }
    if ($file["size"] <= 0) {
        $validationError = "Invalid file";
    }
    if ($maxSize > 0) {
        if ($file["size"] > $maxSize) {
            $validationError = "File size should be less then " . number_format($maxSize / 1024, 0) . " kb";
        }
    }
    if ($minSize > 0) {
        if ($file["size"] < $minSize) {
            $validationError = "File size should be grater then " . number_format($minSize / 1024, 0) . " kb";
        }
    }
    //upload
    if ($validationError == "") {
        if (move_uploaded_file($file["tmp_name"], $dir . $fileNewName)) {
            $returnData["status"] = "success";
            $returnData["message"] = "Upload success";
            $returnData["data"] = $fileNewName;
        } else {
            $returnData["status"] = "error";
            $returnData["message"] = "Upload fail";
            $returnData["data"] = "";
        }
    } else {
        $returnData["status"] = "error";
        $returnData["message"] = $validationError;
        $returnData["data"] = "";
    }
    return $returnData;
}


function getRandCodeNotInTable($tablename,$fildName)
{
    global $dbCon;
    $rand=rand(11111111,99999999);
    $sql = "SELECT * FROM `" .$tablename. "` WHERE `".$fildName."`='".$rand."'";
    if ($res = mysqli_query($dbCon, $sql)) {
        if (mysqli_num_rows($res) > 0) {           
            getRandCodeNotInTable($tablename,$fildName);
            $returnData['status'] = "warning";
            $returnData['message'] = "Data found";
            $returnData['data'] = ''; 
        } else {
            $returnData['status'] = "success";
            $returnData['message'] = "Data not found";
            $returnData['data'] = $rand;
        }
    } else {
        $returnData['status'] = "danger";
        $returnData['message'] = "Somthing went wrong";
        $returnData['data'] = '';
    }
    return $returnData;
}

function getAllCurrencyType()
{
    global $dbCon;
    $returnData = [];
    $sql = "SELECT * FROM `" . ERP_CURRENCY_TYPE . "` WHERE `currency_status`='active' ORDER BY `currency_id` ASC";
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
        $returnData['status'] = "danger";
        $returnData['message'] = "Somthing went wrong";
        $returnData['data'] = [];
    }
    return $returnData;
}
function getAllLanguage()
{
    global $dbCon;
    $returnData = [];
    $sql = "SELECT * FROM `" . ERP_LANGUAGE . "` WHERE `language_status`='active' ORDER BY `language_id` ASC";
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
        $returnData['status'] = "danger";
        $returnData['message'] = "Somthing went wrong";
        $returnData['data'] = [];
    }
    return $returnData;
}


function addNewAdministratorUserGlobal($POST = [])
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

        $adminName = $POST["adminName"];
        $adminEmail = $POST["adminEmail"];
        $adminPhone = $POST["adminPhone"];
        $adminPassword = $POST["adminPassword"];
        $adminRole = 1;
        $tableName = $POST["tablename"];
        

        $sql = "SELECT * FROM `" . $tableName . "` WHERE `fldAdminEmail`='" . $adminEmail . "' AND `fldAdminStatus`!='deleted'";
        if ($res = mysqli_query($dbCon, $sql)) {
            if (mysqli_num_rows($res) == 0) {

                 $ins = "INSERT INTO `" . $tableName . "`
                            SET
                                `fldAdminName`='" . $adminName . "',
                                `fldAdminEmail`='" . $adminEmail . "',
                                `fldAdminPassword`='" . $adminPassword . "',
                                `fldAdminPhone`='" . $adminPhone . "',
                                `fldAdminRole`='" . $adminRole . "'";
                    if (isset($POST["fldAdminCompanyId"])) {
                        $fldAdminCompanyId = $POST["fldAdminCompanyId"];
                        $ins.= ", `fldAdminCompanyId`='" . $fldAdminCompanyId . "'";
                    }
                    if (isset($POST["fldAdminBranchId"])) {
                        $fldAdminBranchId = $POST["fldAdminBranchId"];
                        $ins.= ", `fldAdminBranchId`='" . $fldAdminBranchId . "'";
                    }
                    if (isset($POST["fldAdminVendorId"])) {
                        $fldAdminVendorId = $POST["fldAdminVendorId"];
                        $ins .= ", `fldAdminVendorId`='" . $fldAdminVendorId . "'";
                    }
                    if (isset($POST["fldAdminCustomerId"])) {
                        $fldAdminCustomerId = $POST["fldAdminCustomerId"];
                        $ins .= ", `fldAdminCustomerId`='" . $fldAdminCustomerId . "'";
                    }
                        
                if (mysqli_query($dbCon, $ins)) {
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
    // return $returnData;
}
// End Administrator User

?>