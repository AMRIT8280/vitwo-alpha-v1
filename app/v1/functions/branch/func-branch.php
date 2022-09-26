<?php


// branch deatils
function getBranchDeatilsById($id=null) {
    
    $selSql = "SELECT `branch_id`, `company_id`, `branch_code`, `branch_name`, `branch_gstin`, `con_business`, `build_no`, `flat_no`, `street_name`, `pincode`, `location`, `city`, `district`, `state`, `branch_is_primary`, `branch_created_at`, `branch_created_by`, `branch_updated_at`, `branch_updated_by`, `branch_profile`, `branch_status` FROM `".ERP_BRANCHES."` WHERE `branch_id` = '".$id."'";

    return queryGet($selSql, true);
}




?>