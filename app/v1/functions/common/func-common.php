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

function queryGet($query, $isMultipleRows = false)
{
    global $dbCon;
    $returnData = [];
    if ($res = mysqli_query($dbCon, $query)) {
        $numRows = mysqli_num_rows($res);
        if ($numRows > 0) {
            $returnData = [
                "status" => "success",
                "message" => ($numRows > 1) ? $numRows . " records found successfully" : $numRows . "record found successfully",
                "numRows" => $numRows,
                "data" => ($isMultipleRows) ? mysqli_fetch_all($res, MYSQLI_ASSOC) : mysqli_fetch_assoc($res)
            ];
        } else {
            $returnData = [
                "status" => "warning",
                "message" => "Record not found",
                "numRows" => 0,
                "data" => []
            ];
        }
    } else {
        $returnData = [
            "status" => "failed",
            "message" => "Something went wrong, try again later",
            "numRows" => 0,
            "query" => $query,
            "data" => []
        ];
    }
    return $returnData;
}

//*************************************/UPDATE/INSERT - TABLE SETTINGS/******************************************//
function updateInsertTableSettings($POST, $adminId)
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


function getTableSettings($tablename, $pageTableName, $adminId)
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

//*****************************************************************************************//

function WordLimiter($text, $limit)
{
    $explode = explode(' ', $text);
    $string  = '';
    $dots = '...';
    if (count($explode) <= $limit) {
        $dots = '';
        for ($i = 0; $i < count($explode); $i++) {
            $string .= $explode[$i] . " ";
        }
    } else {

        for ($i = 0; $i < $limit; $i++) {

            $string .= $explode[$i] . " ";
        }
    }

    return $string . $dots;
}

function dateDifference($date_1 , $date_2)
{
	$dateFrom	= strtotime($date_1); // or your date as well
	$dateTo		= strtotime($date_2);
	$datediff 	= $dateTo - $dateFrom;
	return floor($datediff / (60 * 60 * 24));
}

function formatPrice($price)
{
	if($price!='')
		return number_format($price,2);
	else
		return 0.00;
}

function formatDateWeb($date)
{
	global $cfg,$mycms,$mycommoncms;
	if ($date!='') {
		return date('d-m-Y',strtotime($date));
	} else {
		return '';
	}
}

function formatDate($date)
{
	global $cfg,$mycms,$mycommoncms;
	if ($date!='') {
		return date('M j, Y',strtotime($date));
	} else {
		return '';
	}
}

function formatTime($time)
{
	global $cfg,$mycms;
	return date('h:i A',strtotime($time));
}

function formatDateTime($datetime)
{
	global $cfg,$mycms;
	if ($datetime!='') {
		return date('M j, Y h:i A',strtotime($datetime));
	} else {
		return '';
	}
}

function getNoOfDays($fromdate,$todate)
{
	$start		=	strtotime($fromdate);
	$end		=	strtotime($todate);	
	$noOfDays	=	ceil(abs($end - $start) / 86400);
	return $noOfDays;
}

function getAge($then) {
    $then_ts = strtotime($then);
    $then_year = date('Y', $then_ts);
    $age = date('Y') - $then_year;
    if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
    return $age;
}

function randomNumber($length = 6, $seeds = 'alphanum')
{
	// Possible seeds
	$seedings['alpha'] = 'abcdefghijklmnopqrstuvwqyz';
	$seedings['numeric'] = '0123456789';
	$seedings['alphanum'] = 'abcdefghijkl0123456789mnopqrstuvwxyz';
	$seedings['hexidec'] = '0123456789abcdef';
	// Choose seed
	if (isset($seedings[$seeds])){
		$seeds = $seedings[$seeds];
	}
	// Seed generator
	list($usec, $sec) = explode(' ', microtime());
	$seed = (float) $sec + ((float) $usec * 100000);
	mt_srand($seed);

	// Generate
	$str = '';
	$seeds_count = strlen($seeds);
	
	for ($i = 0; $length > $i; $i++){
		$str .= $seeds{mt_rand(0, $seeds_count - 1)};
	}
	return $str;
}






function calculateTime($date)
{
	//echo $date;
	$dt=explode(" ",$date);
	$to_time = strtotime($date);
	$from_time = strtotime(date('Y-m-d H:i:s'));
	$diff=strtotime($date)-strtotime($from_time) ;
	//echo $min=$diff/86400;
	$minutesago=round(abs($to_time - $from_time) / 60);
	$Minutes=round(abs($to_time - $from_time) / 60);
	$time=($Minutes=='0' || $Minutes=='1')?'a few secs':$Minutes." Mins";
	if($Minutes>=60)
	{
		//echo '=====';
		if ($Minutes < 0)
		{
			$Min = Abs($Minutes);
		}
		else
		{
			$Min = $Minutes;
		}
		$iHours = Floor($Min / 60);
		$Minutes = ($Min - ($iHours * 60)) / 100;
		$tHours = $iHours + $Minutes;
		if ($Minutes < 0)
		{
			$tHours = $tHours * (-1);
		}
		$aHours = explode(".", $tHours);
		$iHours = $aHours[0];
		if (empty($aHours[1]))
		{
			$aHours[1] = "00";
		}
		$Minutes = $aHours[1];
		if (strlen($Minutes) < 2)
		{
			$Minutes = $Minutes ."0";
		}
		if($iHours==1){
			$hourString 	=	'Hr';
		}
		else {
			$hourString 	=	'Hrs';
		}
		if($Minutes==1 || $Minutes=='01'){
			$minuteString 	=	'Min';
		}
		else {
			$minuteString 	=	'Mins';
		}
		$tHours = $iHours ." ".$hourString." ". $Minutes." ".$minuteString;

		$hoursago=$tHours;
		/*$day=explode(' ',$date);
		$daysago=date('Y-m-d') - $day[0];*/
		$time=$hoursago;
	}
	if($iHours>=24)
	{
		$daysago = floor ($minutesago / 1440);
		$h = floor (($minutesago - $d * 1440) / 60);
		$m = $minutesago - ($d * 1440) - ($h * 60);
		if($daysago==1){
			$dayString 	=	'Day';
		}
		else {
			$dayString 	=	'Days';
		}
		$time=$daysago." ".$dayString;
	}
	if($daysago>10)
	{
		$dt=explode(" ",$date);;
        $time=date('F j',strtotime($date))." at ".getTimeFormat($dt[1]);
	}
	return $time;
}

function getTimeFormat($time)
{
	if($time=='00:00' || $time=='00:00:00')
	{
		$tm='12:00 AM';
	}
	else
	{
		$tms = array();
		$tms = explode(':',$time);
		if($tms[0]==12)
		{
			$tms1 = $tms[0];
			$tm = $tms1.':'.$tms[1].' PM';
		}
		if($tms[0] > 12){
		$tms1 = $tms[0] - 12;
		$tm = $tms1.':'.$tms[1].' PM';
		}
		if($tms[0] < 12){
		$tms1 = $tms[0];
		$tm = $tms1.':'.$tms[1].' AM';
		}
	}
	return $tm;
}

function number_pad($number,$places)
{
		return str_pad((int) $number, $places, "0", STR_PAD_LEFT);
}

function convertNumberToWords($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convertNumberToWords only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convertNumberToWords(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convertNumberToWords($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convertNumberToWords($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convertNumberToWords($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

//************************************************** */

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
        } else { ?>
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


function getRandCodeNotInTable($tablename, $fildName)
{
    global $dbCon;
    $rand = rand(11111111, 99999999);
    $sql = "SELECT * FROM `" . $tablename . "` WHERE `" . $fildName . "`='" . $rand . "'";
    if ($res = mysqli_query($dbCon, $sql)) {
        if (mysqli_num_rows($res) > 0) {
            getRandCodeNotInTable($tablename, $fildName);
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


function addNewAdministratorUserGlobal($POST = [],$adminrole=null)
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
        if(!empty($adminrole)){
            $adminRole = $adminrole;
        }else{
            $adminRole = 1;
        }
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
                    $ins .= ", `fldAdminCompanyId`='" . $fldAdminCompanyId . "'";
                }
                if (isset($POST["fldAdminBranchId"])) {
                    $fldAdminBranchId = $POST["fldAdminBranchId"];
                    $ins .= ", `fldAdminBranchId`='" . $fldAdminBranchId . "'";
                }
                if (isset($POST["fldAdminVendorId"])) {
                    $fldAdminVendorId = $POST["fldAdminVendorId"];
                    $ins .= ", `fldAdminVendorId`='" . $fldAdminVendorId . "'";
                }
                if (isset($POST["fldAdminCustomerId"])) {
                    $fldAdminCustomerId = $POST["fldAdminCustomerId"];
                    $ins .= ", `fldAdminCustomerId`='" . $fldAdminCustomerId . "'";
                }
                if (isset($POST["fldAdminBranchLocationId"])) {
                    $fldAdminBranchLocationId = $POST["fldAdminBranchLocationId"];
                    $ins .= ", `fldAdminBranchLocationId`='" . $fldAdminBranchLocationId . "'";
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

function queryInsert($query)
{
    global $dbCon;
    $returnData = [];
    if ($res = mysqli_query($dbCon, $query)) {
        $returnData = [
            "status" => "success",
            "message" => "Data saved successfully",
            "insertedId" => mysqli_insert_id($dbCon)
        ];
    } else {
        $returnData = [
            "status" => "failed",
            "message" => "Data saved failed, try again later",
            "insertedId" => ""
        ];
    }
    return $returnData;
}

function queryUpdate($query)
{
    global $dbCon;
    $returnData = [];
    if ($res = mysqli_query($dbCon, $query)) {
        $returnData = [
            "status" => "success",
            "message" => "Data modified successfully",
        ];
    } else {
        $returnData = [
            "status" => "failed",
            "message" => "Data modified failed, try again later",
        ];
    }
    return $returnData;
}

function queryDelete($query)
{
    global $dbCon;
    $returnData = [];
    if ($res = mysqli_query($dbCon, $query)) {
        $returnData = [
            "status" => "success",
            "message" => "Data deleted successfully",
        ];
    } else {
        $returnData = [
            "status" => "failed",
            "message" => "Data deleted failed, try again later",
        ];
    }
    return $returnData;
}



?>