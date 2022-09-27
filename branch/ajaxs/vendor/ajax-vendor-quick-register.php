<?php
include_once("../../../app/v1/connection-branch-admin.php");

$headerData = array('Content-Type: application/json');



function quickRegVendor($INPUTS){
  $returnData = [];

  $loginCompanyId = "";
  $loginBranchId = "";
  $loginAdminId = "";

  if (!isset($_SESSION["logedBranchAdminInfo"]["fldAdminBranchId"]) || $_SESSION["logedBranchAdminInfo"]["fldAdminBranchId"] == "") {
    return [
      "status" => "error",
      "message" => "Please do login before continuing.",
      "vendorId" => ""
    ];
  }

  $loginCompanyId = $_SESSION["logedBranchAdminInfo"]["fldAdminCompanyId"];
  $loginBranchId = $_SESSION["logedBranchAdminInfo"]["fldAdminBranchId"];
  $loginAdminId = $_SESSION["logedBranchAdminInfo"]["adminId"];
  $loginAdminType = $_SESSION["logedBranchAdminInfo"]["adminType"];

  $vendorName = $INPUTS["quickRegVendorName"];
  $vendorAdd = $INPUTS["quickRegVendorAddress"];
  $vendorGstin = $INPUTS["quickRegVendorGstin"];
  $vendorPan = substr($vendorGstin,2,10);

  $vendorCode = "VEN".time().rand(100,999);
  
  if($vendorGstin!=""){
    $vendorCheckIfExistsObj = queryGet("SELECT * FROM `".ERP_VENDOR_DETAILS."` WHERE `company_id`='".$loginCompanyId."' AND `company_branch_id`='".$loginBranchId."' AND `vendor_gstin`='".$vendorGstin."'", false);
  
    if($vendorCheckIfExistsObj["numRows"]>0){
      return [
        "status" => "success",
        "message" => "Vendor already exists",
        "vendorId" => $vendorCheckIfExistsObj["data"]["vendor_id"]
      ];
      exit();
    }
  } 
 


  $vendorResObj = queryInsert("INSERT INTO `".ERP_VENDOR_DETAILS."` SET `company_id`='".$loginCompanyId."',`company_branch_id`='".$loginBranchId."',`vendor_code`='".$vendorCode."', `trade_name`='".$vendorName."',`vendor_pan`='".$vendorPan."', `vendor_gstin`='".$vendorGstin."', `vendor_status`='guest', `vendor_created_by`='".$loginAdminId."', `vendor_updated_by`='".$loginAdminId."'");

  if($vendorResObj["status"] == "success") {
    $returnData = [
      "status" => "success",
      "message" => "Vendor has been successfully created.",
      "vendorId" => $vendorResObj["insertedId"]
    ];
  }else{
    $returnData = [
      "status" => "warning",
      "message" => "Vendor created failed, please try again.",
      "vendorId" => ""
    ];
  }
  return $returnData;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //POST REQUEST
  $responseData = quickRegVendor($_POST);
}else{
  $responseData = [
    "status" => "error",
    "message" => "Invalid request method",
    "vendorId" => ""
  ];
}

echo json_encode($responseData);

?>