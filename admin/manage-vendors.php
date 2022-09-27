<?php
include("../app/v1/connection-admin.php");
include("common/header.php");
include("common/navbar.php");
include("common/sidebar.php");

$gstin = (isset($_GET["gstin"]) && !empty($_GET["gstin"])) ? $_GET["gstin"] : "";
$vendorPan = strlen($gstin) >= 10 ? substr($gstin, 2, 10) : "";
if ($gstin != "") {
    if (!isset($_SESSION["gstDetails"][$gstin])) {
        $gstResponseObj = file_get_contents("http://localhost/projects/vitwo/webmaster/ajax-gst-details.php?gstin=" . $gstin);
        $gstResponseData = json_decode($gstResponseObj, true);
        $_SESSION["gstDetails"][$gstin] = isset($gstResponseData["data"]) ? $gstResponseData["data"] : [];
        //console($gstResponseData);
    } else {
        echo "getting data from session!";
        //console($_SESSION["gstDetails"][$gstin]);
    }
}

if (isset($_SESSION["gstDetails"][$gstin])) {
    $gstDetails = $_SESSION["gstDetails"][$gstin];
} else {
    $gstDetails = [];
}


?>
<!-- Content Wrapper. Contains page content -->
<<style>
.customFields{
  height:70vh;
  overflow-y:auto;
  overflow-x:hidden;
}
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header mb-2 p-0  border-bottom">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>" class="text-dark"><i class="fas fa-home"></i> Home</a></li>
                <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Manage Vendors</a></li>
            </ol>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card2 card-primary">
                        <div class="card-header2 pb-5">
                            <h3 class="card-title">Create New Vendor</h3>
                        </div>
                        <div class="card-body p-0 gstfield" id="gstform">
                            <div class="row p-0 m-0">
                                <?php
                                
                                ?>
                            </div>
                            <div class="row m-0 p-0 mt-3">
                                <div class="card gst-card ml-auto mr-auto">
                                    <div class="card-header text-center h4 text-bold">Verify GSTIN</div>
                                    <div class="card-body pt-4 pb-5">
                                        <h6 class="mt-2 mb-3 text-muted text-center">Put your GSTIN and click on below verify button<br> to get your Bussiness details!</h6>
                                        <div class="input-group mb-3">
					  <input type="text" name="vendorGstNoInput" class="m-input" id="vendorGstNoInput">
					  <label>Enter your GSTIN number</label>
                      <!-- <span class="btn-block2 send-btn" id="checkAndVerifyGstinBtn"> -->
                      <span class="btn-block2 send-btn">
                      <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                                </span>
					</div>
                                        
                                        
                                        <div class="row mt-2 ml-auto mr-auto">
                                            <div>
                                                <span>Don't have GSTIN? Check me </span>
                                                <div class="icheck-primary d-inline ml-2">
                                                    <input type="checkbox" id="isGstRegisteredCheckBoxBtn" class="checkbox">
                                                    <label for="isGstRegisteredCheckBoxBtn">
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row m-2" id="vendorCreateMainForm"></div> -->
                        </div>

                        <!--multisteps-form-->
          <div class="multisteps-form" id="multistepform" style="display:none;">
        <!--progress bar-->
        <div class="row">
          <div class="col-12 col-lg-8 ml-auto mr-auto mb-4">
            <div class="multisteps-form__progress">
              <button class="multisteps-form__progress-btn js-active" type="button" title="User Info">Basic Details</button>
              <button class="multisteps-form__progress-btn" type="button" title="Address">Other Business Address</button>
              <button class="multisteps-form__progress-btn" type="button" title="Order Info">Bank Details</button>
              <button class="multisteps-form__progress-btn" type="button" title="Comments">Other Details</button>
            </div>
          </div>
        </div>
        <!--form panels-->
        <div class="row">
          <div class="col-12 col-lg-8 m-auto">
            <form class="multisteps-form__form">
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 bg-white js-active" data-animation="scaleIn">
                <h4 class="multisteps-form__title">Basic Details</h4>
                <div class="multisteps-form__content">
                <div class="row">
		<div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="vid" class="m-input" id="vid">
					 
					  <label>Vendor ID</label>
					</div>
					   
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="number" name="op_blance" class="m-input" id="op_blance">
					 
					  <label>Opening Blance</label>
					</div>
					   
					  </div>  
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="pan" class="m-input" id="pan">
					 
					  <label>Pan *</label>
					</div>
					   
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="tan" class="m-input" id="tan">
					 
					  <label>TAN</label>
					</div>
					   
					  </div> 
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="name" class="m-input" id="name">
					 
					  <label>Name</label>
					</div>
					   
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="email" class="m-input" id="email">
					  <label>Email</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="trade_name" class="m-input" id="trade_name">
					  <label>Trade Name</label>
					</div>
					  </div> 
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="con_business" class="m-input" id="con_business">
					  <label>Constitution of Business</label>
					</div>
					  </div>  
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="build_no" class="m-input" id="build_no">
					  <label>Building Number</label>
					</div>
					  </div> 
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="flat_no" class="m-input" id="flat_no">
					  <label>Flat Number</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="street_name" class="m-input" id="street_name">
					  <label>Street Name</label>
					</div>
					  </div>  
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="number" name="pincode" class="m-input" id="pincode">
					  <label>Pin Code</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="location" class="m-input" id="location">
					  <label>Location</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="city" class="m-input" id="city">
					  <label>City</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="district" class="m-input" id="district">
					  <label>District</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="state" class="m-input" id="state">
					  <label>State</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="al_email" class="m-input" id="al_email">
					  <label>Alternate Email</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="status" class="m-input" id="status">
					  <label>Status</label>
					</div>
					  </div>
		</div>
                  <div class="button-row d-flex mt-4">
                  <div>
                                                <span>Back </span>
                                                <div class="icheck-primary d-inline ml-2">
                                                    <input type="checkbox" id="checkbox2" class="checkbox2">
                                                    <label for="checkbox2">
                                                    </label>
                                                </div>
                                            </div>
                    <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white step2" data-animation="scaleIn">
                <h4 class="multisteps-form__title">Other Business Address</h4>
                <div class="multisteps-form__content">
                 <!-- <div class="row">
                 <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="legal_name" class="m-input" id="legal_name">
					  <label>GST Legal Name</label>
					</div>
					   
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="number" name="trade_name" class="m-input" id="op_blance">
					  <label>GST Trade Name</label>
					</div>
					   
					  </div>  
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="ct_business" class="m-input" id="ct_business">
					  <label>Constitution of Business</label>
					</div>
					   
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="bd_no" class="m-input" id="tan">
					  <label>Building Number</label>
					</div>
					   
					  </div> 
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="flat_number" class="m-input" id="flat_number">
					  <label>Flat Number</label>
					</div>
					   
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="st_name" class="m-input" id="email">
					  <label>Street Name</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="pin_code" class="m-input" id="pin_code">
					  <label>Pin Code</label>
					</div>
					  </div> 
					  
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="city" class="m-input" id="city">
					  <label>City</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="district" class="m-input" id="district">
					  <label>District</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="state" class="m-input" id="state">
					  <label>State</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="al_email" class="m-input" id="al_email">
					  <label>Alternate Email</label>
					</div>
					  </div>
					  <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="status" class="m-input" id="status">
					  <label>Status</label>
					</div>
					  </div>
                 </div> -->
                 <div class="form-table customFields">
                 <a href="javascript:void(0);" class="addCF btn btn-primary btnstyle mb-4">Add</a>
	<div class="row">
		<div class="col-md-6">
           <div class="input-group">
					  <input type="text" name="legal_name" class="m-input" id="legal_name">
					  <label>GST Legal Name</label>
					</div>
          <div class="input-group">
					  <input type="text" name="ct_business" class="m-input" id="ct_business">
					  <label>Constitution of Business</label>
					</div>
          <div class="input-group">
					  <input type="text" name="flat_number" class="m-input" id="flat_number">
					  <label>Flat Number</label>
					</div>
          <div class="input-group">
					  <input type="text" name="pin_code" class="m-input" id="pin_code">
					  <label>Pin Code</label>
					</div>
          <div class="input-group">
					  <input type="text" name="district" class="m-input" id="district">
					  <label>District</label>
					</div>
          <div class="input-group">
					  <input type="text" name="al_email" class="m-input" id="al_email">
					  <label>Alternate Email</label>
					</div>
</div>
<div class="col-md-6">

         <div class="input-group">
					  <input type="number" name="trade_name" class="m-input" id="op_blance">
					  <label>GST Trade Name</label>
					</div>

          <div class="input-group">
					  <input type="text" name="bd_no" class="m-input" id="tan">
					  <label>Building Number</label>
					</div>

          <div class="input-group">
					  <input type="text" name="st_name" class="m-input" id="email">
					  <label>Street Name</label>
					</div>

          <div class="input-group">
					  <input type="text" name="city" class="m-input" id="city">
					  <label>City</label>
					</div>

          <div class="input-group">
					  <input type="text" name="state" class="m-input" id="state">
					  <label>State</label>
					</div>

          <div class="input-group">
					  <input type="text" name="status" class="m-input" id="status">
					  <label>Status</label>
					</div>
</div>
     
</div>
</div>

                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-outline-secondary btnstyle js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-primary btnstyle ml-auto js-btn-next" type="button" title="Next">Next</button>
                  </div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h4 class="multisteps-form__title"> Bank Details</h4>
                <div class="multisteps-form__content">
                <div class="row">
                 <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="ifsc" class="m-input" id="ifsc">
					  <label>IFSC</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="bank_name" class="m-input" id="bank_name">
					  <label>Bank Name</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="branch_name" class="m-input" id="branch_name">
					  <label>Bank Branch Name</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="bank_address" class="m-input" id="bank_address">
					  <label>Bank Address</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="account_number" class="m-input" id="account_number">
					  <label>Bank Account Number</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
					  <input type="file" name="chaque" class="m-input" id="chaque" placeholder="Upload Cancelled Chaque">
					  <label></label>
					</div>
					  </div>
                 </div>
                  <div class="row">
                    <div class="button-row d-flex mt-4 col-12">
                      <button class="btn btn-outline-secondary js-btn-prev" type="button" title="Prev">Prev</button>
                      <button class="btn btn-primary ml-auto js-btn-next" type="button" title="Next">Next</button>
                    </div>
                  </div>
                </div>
              </div>
              <!--single form panel-->
              <div class="multisteps-form__panel shadow p-4 rounded bg-white" data-animation="scaleIn">
                <h4 class="multisteps-form__title">Other Details</h4>
                <div class="multisteps-form__content">
                <div class="row">
                 <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="fssai" class="m-input" id="fssai">
					  <label>FSSAI</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="creadit" class="m-input" id="creadit">
					  <label>Creadit Period</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="auth_person" class="m-input" id="auth_person">
					  <label>Name of Authorised Person</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="al_email" class="m-input" id="al_email">
					  <label>Alternate Email</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="phone_no" class="m-input" id="phone_no">
					  <label>Phone Number</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="website" class="m-input" id="website">
					  <label>Website</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="picture" class="m-input" id="picture">
					  <label>Picture</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
					  <input type="text" name="designation" class="m-input" id="designation">
					  <label>Designation</label>
					</div>
					  </div>
                      <div class="col-md-6">
					  <div class="input-group">
                      <select id="" name="goodsType" class="select2 form-control form-control-border borderColor">
                                    <option value="">Enabled</option>
                                    <option value="A">Yes</option>
                                    <option value="B">No</option>
                                  </select>
					</div>
					  </div>
                 </div>
                  <div class="button-row d-flex mt-4">
                    <button class="btn btn-outline-secondary js-btn-prev" type="button" title="Prev">Prev</button>
                    <button class="btn btn-primary ml-auto" type="button" title="Send">Submit</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.Content Wrapper. Contains page content -->
<?php
include("common/footer.php");
?>


<script>
    var BASE_URL = `<?= BASE_URL ?>`;
    var ADMIN_URL = `<?= ADMIN_URL ?>`;
    $(document).ready(function() {
        $(document).on("change", "#isGstRegisteredCheckBoxBtn", function() {
            let isChecked = $(this).is(':checked');
            if (isChecked) {
                $("#vendorGstNoInput").attr("readonly", "readonly");
                $("#vendorPanNo").removeAttr("readonly");
                
                $.ajax({
                    type: "GET",
                    url: `${ADMIN_URL}ajaxs/ajax-vendor-with-out-verify-gstin.php`,
                    beforeSend: function() {
                        $('#checkAndVerifyGstinBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');
                        $("#checkAndVerifyGstinBtn").toggleClass("disabled");
                    },
                    success: function(response) {
                        $("#checkAndVerifyGstinBtn").toggleClass("disabled");
                        $('#checkAndVerifyGstinBtn').html("Re-Verify");
                        responseObj = (response);
                        $("#vendorCreateMainForm").html(responseObj);
                        console.log(responseObj);
                    }
                });

            } else {
                $("#vendorCreateMainForm").html("");
                $("#vendorGstNoInput").removeAttr("readonly");
                $("#vendorPanNo").attr("readonly", "readonly");
            }
            $("#checkAndVerifyGstinBtn").toggleClass("disabled");
        });

        $("#checkAndVerifyGstinBtn").click(function() {
            let vendorGstNo = $("#vendorGstNoInput").val();
            if (vendorGstNo != "") {
                $.ajax({
                    type: "GET",
                    url: `${ADMIN_URL}ajaxs/ajax-vendor-verify-gstin.php?gstin=${vendorGstNo}`,
                    beforeSend: function() {
                        $('#checkAndVerifyGstinBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');
                        $("#checkAndVerifyGstinBtn").toggleClass("disabled");
                    },
                    success: function(response) {
                        $("#checkAndVerifyGstinBtn").toggleClass("disabled");
                        $('#checkAndVerifyGstinBtn').html("Re-Verify");
                        responseObj = (response);
                        $("#vendorCreateMainForm").html(responseObj);
                        console.log(responseObj);
                    }
                });
            } else {
                let Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
                Toast.fire({
                    icon: `warning`,
                    title: `&nbsp;Please provide GSTIN No!`
                });
            }
        });
        // $("#checkAndVerifyGstinBtn").click(function() {
        //     let vendorGstNo = $("#vendorGstNo").val();
        //     if (vendorGstNo != "") {
        //         //window.location.href=`http://localhost/projects/vitwo/webmaster/ajax-gst-details.php?gstin=${vendorGstNo}`;
        //         window.location.href = `http://localhost/projects/vitwo/webmaster/manage-vendors.php?gstin=${vendorGstNo}`;
        //         $("#vendorPanNo").val(vendorGstNo.substr(2, 10));

        //         // $.ajax({
        //         //     type: "GET",
        //         //     url: `http://localhost/projects/vitwo/webmaster/ajax-gst-details.php?gstin=${vendorGstNo}`,
        //         //     beforeSend: function() {
        //         //         $('#checkGstinBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');
        //         //     },
        //         //     success: function(response){

        //         //         $('#checkGstinBtn').html("Re-Check Now");
        //         //         responseObj = JSON.parse(response);
        //         //         if(responseObj["status"]=="success"){
        //         //             responseData=responseObj["data"];

        //         //             console.log(responseData);

        //         //             $("#vendorStatus").val(responseData["sts"]);

        //         //         }else{
        //         //             let Toast = Swal.mixin({
        //         //                 toast: true,
        //         //                 position: 'top-end',
        //         //                 showConfirmButton: false,
        //         //                 timer: 3000
        //         //             });
        //         //             Toast.fire({
        //         //                 icon: `warning`,
        //         //                 title: `&nbsp;Invalid GSTIN No!`
        //         //             });
        //         //         }
        //         //     }
        //         // });
        //     } else {
        //         let Toast = Swal.mixin({
        //             toast: true,
        //             position: 'top-end',
        //             showConfirmButton: false,
        //             timer: 3000
        //         });
        //         Toast.fire({
        //             icon: `warning`,
        //             title: `&nbsp;Please provide GSTIN No!`
        //         });
        //     }
        //     console.log("clicked!!!!!!!!!!!!!!!!!!", vendorGstNo);
        // });


        $(document).on("click", ".deleteOtherAddressBtns", function() {
            let deleteAddNo = ($(this).attr("id")).split("_")[1];
            $(`#otherAddressItem_${deleteAddNo}`).remove();
        });

        let otherAddressItemCounter = 1;
        $(document).on("click", ".addNewOtherAddress", function() {
            otherAddressItemCounter += 1;
            let formHtml = `
                                                <div id="otherAddressItem_${otherAddressItemCounter}">
                                                    <div class="row m-0 p-2 bg-secondary">
                                                        <!-- <div class="h5 text-bold ml-1">1. Address</div> -->
                                                        <div class="ml-auto mr-2">
                                                            <span class="btn btn-warning btn-sm text-light deleteOtherAddressBtns" id="deleteOtherAddressBtn_${otherAddressItemCounter}">Delete</span>
                                                            <span class="btn btn-success btn-sm addNewOtherAddress">Add New</span>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">GST Legal Name</label>
                                                                <input type="text" class="form-control" placeholder="GST Legal Name" name="vendorBranchGstLegalName[]" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">GST Trade Name</label>
                                                                <input type="text" class="form-control" placeholder="GST Trade Name" name="vendorBranchGstTradeName[]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Constitution of Business</label>
                                                                <input type="text" class="form-control" placeholder="GST Legal Name" name="vendorBranchConstitutionBusiness[]" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Building Number</label>
                                                                <input type="text" class="form-control" placeholder="Building Number" name="vendorBranchBuildingNumber[]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Flat Number</label>
                                                                <input type="text" class="form-control" placeholder="Flat Number" name="vendorBranchFlatNumber[]" required>
                                                            </div>

                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Street Name</label>
                                                                <input type="text" class="form-control" placeholder="Street Name" name="vendorBranchStreetName[]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Pin Code</label>
                                                                <input type="text" class="form-control" placeholder="Pin Code" name="vendorBranchPinCode[]" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Location</label>
                                                                <input type="text" class="form-control" placeholder="Location" name="vendorBranchLocation[]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">City</label>
                                                                <input type="text" class="form-control" placeholder="City" name="vendorBranchCity[]" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">District</label>
                                                                <input type="text" class="form-control" placeholder="District" name="vendorBranchDistrict[]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row m-0 p-0">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">State</label>
                                                                <input type="text" class="form-control" placeholder="State" name="vendorBranchState[]" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="text-muted">Status</label>
                                                                <input type="text" class="form-control" placeholder="Status" name="vendorBranchStatus[]" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>`;
            $("#otherAddressesListDiv").append(formHtml);
        });

    });

    $(document).ready(function(){
	$(".addCF").click(function(){
		$(".customFields").append('<div class="row"><div class="col-md-12 mt-3"><a href="javascript:void(0);" class="remCF btn btn-danger btnstyle">Remove</a></div><div class="col-md-6"><div class="input-group"><input type="text" name="legal_name" class="m-input" id="legal_name"><label>GST Legal Name</label></div><div class="input-group"><input type="text" name="ct_business" class="m-input" id="ct_business"><label>Constitution of Business</label></div><div class="input-group"><input type="text" name="flat_number" class="m-input" id="flat_number"><label>Flat Number</label></div><div class="input-group"><input type="text" name="pin_code" class="m-input" id="pin_code"><label>Pin Code</label></div><div class="input-group"><input type="text" name="district" class="m-input" id="district"><label>District</label></div><div class="input-group"><input type="text" name="al_email" class="m-input" id="al_email"><label>Alternate Email</label></div></div> <div class="col-md-6"><div class="input-group"><input type="number" name="trade_name" class="m-input" id="op_blance"><label>GST Trade Name</label></div><div class="input-group"><input type="text" name="bd_no" class="m-input" id="tan"><label>Building Number</label></div><div class="input-group"><input type="text" name="st_name" class="m-input" id="email"><label>Street Name</label></div><div class="input-group"><input type="text" name="city" class="m-input" id="city"><label>City</label></div><div class="input-group"><input type="text" name="state" class="m-input" id="state"><label>State</label></div><div class="input-group"><input type="text" name="status" class="m-input" id="status"><label>Status</label></div></div> </div>');
	});
    $(".customFields").on('click','.remCF',function(){
        $(this).parent().parent().remove();
    });
});
</script>
