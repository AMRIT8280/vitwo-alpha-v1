<?php
// --------------------Main Table 
$tablePrefix="tbl_";

if(!defined("TBL_WEBMASTER")) 						define("TBL_WEBMASTER",$tablePrefix."webmaster_login");
if(!defined("TBL_WEBMASTER_TYPES")) 				define("TBL_WEBMASTER_TYPES",$tablePrefix."webmaster_types");
if(!defined("TBL_SITEINFO")) 						define("TBL_SITEINFO",$tablePrefix."webmaster_site_info");

if(!defined("TBL_ADMIN_TABLESETTINGS")) 			define("TBL_ADMIN_TABLESETTINGS",$tablePrefix."admin_tablesettings");
if(!defined("TBL_COMPANY_ADMIN_TABLESETTINGS")) 	define("TBL_COMPANY_ADMIN_TABLESETTINGS",$tablePrefix."company_admin_tablesettings");
if(!defined("TBL_BRANCH_ADMIN_TABLESETTINGS")) 		define("TBL_BRANCH_ADMIN_TABLESETTINGS",$tablePrefix."branch_admin_tablesettings");
if(!defined("TBL_VENDOR_ADMIN_TABLESETTINGS")) 		define("TBL_VENDOR_ADMIN_TABLESETTINGS",$tablePrefix."vendor_admin_tablesettings");
if(!defined("TBL_CUSTOMER_ADMIN_TABLESETTINGS")) 	define("TBL_CUSTOMER_ADMIN_TABLESETTINGS",$tablePrefix."customer_admin_tablesettings");




// --------------------Others Table 
$tablePrefix="erp_";

if(!defined("ERP_ACC_JOURNAL")) 					define("ERP_ACC_JOURNAL",$tablePrefix."acc_journal");
if(!defined("ERP_ACC_CREDIT")) 					    define("ERP_ACC_CREDIT",$tablePrefix."acc_credit");
if(!defined("ERP_ACC_DEBIT")) 					    define("ERP_ACC_DEBIT",$tablePrefix."acc_debit");

if(!defined("ERP_INVENTORY_ITEMS")) 				define("ERP_INVENTORY_ITEMS",$tablePrefix."inventory_items");
if(!defined("ERP_INVENTORY_MASTR_GOOD_GROUPS")) 	define("ERP_INVENTORY_MASTR_GOOD_GROUPS",$tablePrefix."inventory_mstr_good_groups");
if(!defined("ERP_INVENTORY_MASTR_GOOD_TYPES")) 		define("ERP_INVENTORY_MASTR_GOOD_TYPES",$tablePrefix."inventory_mstr_good_types");
if(!defined("ERP_INVENTORY_MASTR_TIME_UNITS")) 		define("ERP_INVENTORY_MASTR_TIME_UNITS",$tablePrefix."inventory_mstr_time_units");
if(!defined("ERP_INVENTORY_MASTR_UOM")) 			define("ERP_INVENTORY_MASTR_UOM",$tablePrefix."inventory_mstr_uom");
if(!defined("ERP_INVENTORY_PURCHESING_VALUES")) 	define("ERP_INVENTORY_PURCHESING_VALUES",$tablePrefix."inventory_purchesing_values");

if(!defined("ERP_COMPANIES")) 						define("ERP_COMPANIES",$tablePrefix."companies");
if(!defined("ERP_BRANCHES")) 						define("ERP_BRANCHES",$tablePrefix."branches");
if(!defined("ERP_CUSTOMER")) 						define("ERP_CUSTOMER",$tablePrefix."customer");
if(!defined("ERP_VENDOR_DETAILS")) 					define("ERP_VENDOR_DETAILS",$tablePrefix."vendor_details");
if(!defined("ERP_CURRENCY_TYPE")) 					define("ERP_CURRENCY_TYPE",$tablePrefix."currency_type");
if(!defined("ERP_LANGUAGE")) 					    define("ERP_LANGUAGE",$tablePrefix."language");
if(!defined("ERP_CREDIT_TERMS")) 					define("ERP_CREDIT_TERMS",$tablePrefix."credit_terms");
if(!defined("ERP_COMPANY_FUNCTIONALITIES")) 	    define("ERP_COMPANY_FUNCTIONALITIES",$tablePrefix."company_functionalities");
if(!defined("ERP_BRANCH_OTHERSLOCATION")) 	    define("ERP_BRANCH_OTHERSLOCATION",$tablePrefix."branch_otherslocation");

if(!defined("ERP_PURCHASE_BILLS"))                  define("ERP_PURCHASE_BILLS",$tablePrefix."branch_bills");
if(!defined("ERP_PURCHASE_BILLS_ITEMS"))            define("ERP_PURCHASE_BILLS_ITEMS",$tablePrefix."branch_bills_items");
?>