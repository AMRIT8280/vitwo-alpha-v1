<?php
include("../app/v1/connection-branch-admin.php");
include("common/header.php");
include("common/navbar.php");
include("common/sidebar.php");
require_once("common/pagination.php");
include("../app/v1/functions/branch/func-vendors.php");

administratorAuth();

if (isset($_POST["changeStatus"])) {
  $newStatusObj = ChangeStatusVendor($_POST, "vendor_id", "vendor_status");
  swalToast($newStatusObj["status"], $newStatusObj["message"]);
}


if (isset($_POST["createdata"])) {
  $addNewObj = createDataVendor($_POST);
  swalToast($addNewObj["status"], $addNewObj["message"]);
}

if (isset($_POST["editdata"])) {
  $editDataObj = updateDataVendor($_POST);

  swalToast($editDataObj["status"], $editDataObj["message"]);
}

if (isset($_POST["add-table-settings"])) {
	$editDataObj = updateInsertTableSettings($_POST, $_SESSION["logedBranchAdminInfo"]["adminId"]);	
  swalToast($editDataObj["status"], $editDataObj["message"]);
}

if (isset($_GET['create'])) {
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header mb-2 p-0  border-bottom">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?= BRANCH_URL ?>" class="text-dark"><i class="fas fa-home"></i> Home</a></li>
          <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Manage Vendors</a></li>
          <li class="breadcrumb-item active">Create New Vendor</li>
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
                <!-- <h3 class="card-title">Create New Vendor</h3>-->
              </div>
              <div class="card-body p-0 gstfield" id="gstform">
                <div class="row p-0 m-0">
                  <?php

                  ?>
                </div>
                <div class="row m-0 p-0 mt-3" id="VerifyGstinBtnDiv">
                  <div class="card gst-card ml-auto mr-auto">
                    <div class="card-header text-center h4 text-bold">Verify GSTIN</div>
                    <div class="card-body pt-4 pb-5">
                      <h6 class="mt-2 mb-3 text-muted text-center">Put your GSTIN and click on below verify button<br> to get your Bussiness details!</h6>
                      <div class="input-group mb-3">
                        <input type="text" name="vendorGstNoInput" class="m-input" id="vendorGstNoInput">
                        <label>Enter your GSTIN number</label>
                        <!-- <span class="btn-block2 send-btn" id="checkAndVerifyGstinBtn"> -->
                        <span class="btn-block2 send-btn checkAndVerifyGstinBtn">
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
                <!--<div id="vendorCreateMainForm"></div>-->
                
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
<?php } else {
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- row -->
        <div class="row p-0 m-0">
          <div class="col-12 mt-2 p-0">
            <div class="card card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist">
                  <li class="pt-2 px-3 d-flex justify-content-between align-items-center" style="width:100%">
                    <h3 class="card-title">Manage Vendor</h3>
                    <a href="<?php echo basename($_SERVER['PHP_SELF']) ?>?create" class="btn btn-sm btn-primary btnstyle m-2"><i class="fa fa-plus"></i> Add New</a>
                  </li>
                </ul>
              </div>
              <form name="search" id="search" action="<?php $_SERVER['PHP_SELF']; ?>" method="get" onsubmit="return srch_frm();">
                <div class="card-body">
                  <div class="filter-col">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="input-group">
                          <select name="vendor_status_s" id="vendor_status_s" class="form-control form-control-border borderColor">
                            <option value="">--- Status --</option>
                            <option value="active" <?php if (isset($_REQUEST['vendor_status_s']) && 'active' == $_REQUEST['vendor_status_s']) {
                                                      echo 'selected';
                                                    } ?>>Active</option>
                            <option value="inactive" <?php if (isset($_REQUEST['vendor_status_s']) && 'inactive' == $_REQUEST['vendor_status_s']) {
                                                        echo 'selected';
                                                      } ?>>Inactive</option>
                            <option value="draft" <?php if (isset($_REQUEST['vendor_status_s']) && 'draft' == $_REQUEST['vendor_status_s']) {
                                                    echo 'selected';
                                                  } ?>>Draft</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="input-group"> <input class="fld" type="date" name="form_date_s" id="form_date_s" value="<?php if (isset($_REQUEST['form_date_s'])) {
                                                                                                                              echo $_REQUEST['form_date_s'];
                                                                                                                            } ?>" />
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="input-group"> <input class="fld" type="date" name="to_date_s" id="to_date_s" value="<?php if (isset($_REQUEST['to_date_s'])) {
                                                                                                                          echo $_REQUEST['to_date_s'];
                                                                                                                        } ?>" />
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="input-group">
                          <input type="text" name="keyword" class="m-input" id="keyword" placeholder="Enter Keyword" value="<?php if (isset($_REQUEST['keyword'])) {
                                                                                                                              echo $_REQUEST['keyword'];
                                                                                                                            } ?>">
                          <!--<label>Keyword</label>-->
                        </div>
                      </div>
                      <div class="col-md-3" style="display: flex;">
                        <button type="submit" class="btn btn-primary btnstyle">Search</button> &nbsp;
                        <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-danger btnstyle">Reset</a>
                      </div>
                    </div>
                  </div>
              </form>
              <a type="button" class="btn add-col" data-toggle="modal" data-target="#myModal2" style="position:absolute;z-index:999;"> <i class="fa fa-cog" aria-hidden="true"></i></a>
              <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade show active" id="listTabPan" role="tabpanel" aria-labelledby="listTab">
                  <?php
                  $cond = '';

                  $sts = " AND `vendor_status` !='deleted'";
                  if (isset($_REQUEST['vendor_status_s']) && $_REQUEST['vendor_status_s'] != '') {
                    $sts = ' AND vendor_status="' . $_REQUEST['vendor_status_s'] . '"';
                  }

                  if (isset($_REQUEST['form_date_s']) && $_REQUEST['form_date_s'] != '') {
                    $cond .= " AND branch_created_at between '" . $_REQUEST['form_date_s'] . " 00:00:00' AND '" . $_REQUEST['to_date_s'] . " 23:59:59'";
                  }

                  if (isset($_REQUEST['keyword']) && $_REQUEST['keyword'] != '') {
                    $cond .= " AND (`vendor_code` like '%" . $_REQUEST['keyword'] . "%' OR `vendor_name` like '%" . $_REQUEST['keyword'] . "%' OR `vendor_gstin` like '%" . $_REQUEST['keyword'] . "%')";
                  }

                  $sql_list = "SELECT * FROM `" . ERP_VENDOR_DETAILS . "` WHERE 1 " . $cond . "  AND company_id='".$_SESSION["logedBranchAdminInfo"]["fldAdminCompanyId"]."' " . $sts . "  ORDER BY vendor_id desc limit " . $GLOBALS['start'] . "," . $GLOBALS['show'] . " ";
                  $qry_list = mysqli_query($dbCon, $sql_list);
                  $num_list = mysqli_num_rows($qry_list);


                  $countShow = "SELECT count(*) FROM `" . ERP_VENDOR_DETAILS . "` WHERE 1 " . $cond . " AND company_id='".$_SESSION["logedBranchAdminInfo"]["fldAdminCompanyId"]."' " . $sts . " ";
                  $countQry = mysqli_query($dbCon, $countShow);
                  $rowCount = mysqli_fetch_array($countQry);
                  $count = $rowCount[0];
                  $cnt = $GLOBALS['start'] + 1;
                  $settingsTable = getTableSettings(TBL_BRANCH_ADMIN_TABLESETTINGS, "ERP_VENDOR_DETAILS", $_SESSION["logedBranchAdminInfo"]["adminId"]);
                  $settingsCh = ($settingsTable['data'][0]['settingsCheckbox']);
                  $settingsCheckbox = unserialize($settingsCh);
                  if ($num_list > 0) {
                  ?>
                    <table id="mytable" class="table defaultDataTable table-hover text-nowrap p-0 m-0">
                      <thead>
                        <tr>
                          <th>#</th>
                          <?php if (in_array(1, $settingsCheckbox)) { ?>
                            <th>Vendor Code</th>
                          <?php }
                          if (in_array(2, $settingsCheckbox)) { ?>
                            <th>Vendor Name</th>
                          <?php }
                          if (in_array(3, $settingsCheckbox)) { ?>
                            <th>Vendor PAN</th>
                          <?php  }
                          if (in_array(4, $settingsCheckbox)) { ?>
                            <th>Vendor TAN</th>
                          <?php }
                          if (in_array(5, $settingsCheckbox)) { ?>
                            <th>GSTIN</th>
                          <?php  }
                          if (in_array(6, $settingsCheckbox)) { ?>
                            <th>Email</th>
                          <?php }
                          if (in_array(7, $settingsCheckbox)) { ?>
                            <th>Phone</th>
                          <?php  } ?>
                          <th>Status</th>

                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($qry_list)) {
                        ?>
                          <tr>
                            <td><?= $cnt++ ?></td>
                            <?php if (in_array(1, $settingsCheckbox)) { ?>
                              <td><?= $row['vendor_code'] ?></td>
                            <?php }
                            if (in_array(2, $settingsCheckbox)) { ?>
                              <td><?= $row['vendor_name'] ?></td>
                            <?php }
                            if (in_array(3, $settingsCheckbox)) { ?>
                              <td><?= $row['vendor_pan'] ?></td>
                            <?php }
                            if (in_array(4, $settingsCheckbox)) { ?>
                              <td><?= $row['vendor_tan'] ?></td>
                            <?php }
                            if (in_array(5, $settingsCheckbox)) { ?>
                              <td><?= $row['vendor_gstin'] ?></td>
                            <?php }
                            if (in_array(6, $settingsCheckbox)) { ?>
                              <td><?= $row['vendor_email'] ?></td>
                            <?php }
                            if (in_array(7, $settingsCheckbox)) { ?>
                              <td><?= $row['vendor_phone'] ?></td>
                            <?php } ?>
                            <td>
                              <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                                <input type="hidden" name="id" value="<?php echo $row['vendor_id'] ?>">
                                <input type="hidden" name="changeStatus" value="active_inactive">
                                <button <?php if ($row['vendor_status'] == "draft") { ?> type="button" style="cursor: inherit; border:none" <?php } else { ?>type="submit" onclick="return confirm('Are you sure change vendor_status?')" style="cursor: pointer; border:none" <?php } ?> class="p-0 m-0 ml-2" data-toggle="tooltip" data-placement="top" title="<?php echo $row['vendor_status'] ?>">
                                  <?php if ($row['vendor_status'] == "active") { ?>
                                    <span class="badge badge-success"><?php echo ucfirst($row['vendor_status']); ?></span>
                                  <?php } else if ($row['vendor_status'] == "inactive") { ?>
                                    <span class="badge badge-danger"><?php echo ucfirst($row['vendor_status']); ?></span>
                                  <?php } else if ($row['vendor_status'] == "draft") { ?>
                                    <span class="badge badge-warning"><?php echo ucfirst($row['vendor_status']); ?></span>
                                  <?php } ?>

                                </button>
                              </form>
                            </td>
                            <td>

                              <a href="<?= basename($_SERVER['PHP_SELF']) . "?view=" . $row['vendor_id']; ?>" style="cursor: pointer;" class="btn btn-sm"><i class="fa fa-eye"></i></a>
                              <a href="<?= basename($_SERVER['PHP_SELF']) . "?edit=" . $row['vendor_id']; ?>" style="cursor: pointer;" class="btn btn-sm"><i class="fa fa-edit"></i></a>
                              <form action="" method="POST" class="btn btn-sm">
                                <input type="hidden" name="id" value="<?php echo $row['vendor_id'] ?>">
                                <input type="hidden" name="changeStatus" value="delete">
                                <button type="submit" onclick="return confirm('Are you sure to delete?')" style="cursor: pointer; border:none"><i class='fa fa-trash '></i></button>
                              </form>
                            </td>
                          </tr>
                        <?php  } ?>
                      <tfoot>
                        <tr>
                          <td colspan="8">
                            <!-- Start .pagination -->

                            <?php
                            if ($count > 0 && $count > $GLOBALS['show']) {
                            ?>
                              <div class="pagination align-right">
                                <?php pagination($count, "frm_opts"); ?>
                              </div>

                              <!-- End .pagination -->

                            <?php  } ?>

                            <!-- End .pagination -->
                          </td>
                        </tr>
                      </tfoot>
                      </tbody>

                    </table>
                  <?php } else { ?>
                    <table id="mytable" class="table defaultDataTable table-hover text-nowrap">
                      <thead>
                        <tr>
                          <td>

                          </td>
                        </tr>
                      </thead>
                    </table>
                </div>
              <?php } ?>
              </div>

              <!---------------------------------Table settings Model Start--------------------------------->

              <div class="modal" id="myModal2">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Table Column Settings</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form name="table-settings" method="post" action="<?php $_SERVER['PHP_SELF']; ?>" onsubmit="return table_settings();">
                      <input type="hidden" name="tablename" value="<?= TBL_BRANCH_ADMIN_TABLESETTINGS; ?>" />
                      <input type="hidden" name="pageTableName" value="ERP_VENDOR_DETAILS" />
                      <div class="modal-body">
                        <div id="dropdownframe"></div>
                        <div id="main2">
                          <table>
                            <tr>
                              <td valign="top" style="width: 165px"><input type="checkbox" <?php echo (in_array(1, $settingsCheckbox) ? 'checked="checked"' : ''); ?> name="settingsCheckbox[]" id="settingsCheckbox1" value="1" />
                                Vendor Code</td>
                            </tr>
                            <tr>
                              <td valign="top" style="width: 165px"><input type="checkbox" <?php echo (in_array(2, $settingsCheckbox) ? 'checked="checked"' : ''); ?> name="settingsCheckbox[]" id="settingsCheckbox2" value="2" />
                                Vendor Name</td>
                            </tr>
                            <tr>
                              <td valign="top" style="width: 165px"><input type="checkbox" <?php echo (in_array(3, $settingsCheckbox) ? 'checked="checked"' : ''); ?> name="settingsCheckbox[]" id="settingsCheckbox3" value="3" />
                                Vendor PAN</td>
                            </tr>
                            <tr>
                              <td valign="top" style="width: 165px"><input type="checkbox" <?php echo (in_array(4, $settingsCheckbox) ? 'checked="checked"' : ''); ?> name="settingsCheckbox[]" id="settingsCheckbox3" value="3" />
                                Vendor TAN</td>
                            </tr>
                            <tr>
                              <td valign="top" style="width: 165px"><input type="checkbox" <?php echo (in_array(5, $settingsCheckbox) ? 'checked="checked"' : ''); ?> name="settingsCheckbox[]" id="settingsCheckbox3" value="3" />
                                GSTIN</td>
                            </tr>
                            <tr>
                              <td valign="top" style="width: 165px"><input type="checkbox" <?php echo (in_array(6, $settingsCheckbox) ? 'checked="checked"' : ''); ?> name="settingsCheckbox[]" id="settingsCheckbox3" value="3" />
                                Email</td>
                            </tr>
                            <tr>
                              <td valign="top" style="width: 165px"><input type="checkbox" <?php echo (in_array(7, $settingsCheckbox) ? 'checked="checked"' : ''); ?> name="settingsCheckbox[]" id="settingsCheckbox3" value="3" />
                                Phone</td>
                            </tr>
                          </table>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" name="add-table-settings" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <!---------------------------------Table Model End--------------------------------->

            </div>
          </div>
        </div>
      </div>
  </div>
  <!-- /.row -->
  </div>
  </section>
  <!-- /.content -->
  </div>
  <!-- /.Content Wrapper. Contains page content -->
  <!-- For Pegination------->
  <form name="frm_opts" action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
    <input type="hidden" name="pageNo" value="<?php if (isset($_REQUEST['pageNo'])) {
                                                echo  $_REQUEST['pageNo'];
                                              } ?>">
  </form>
  <!-- End Pegination from------->

<?php
}
include("common/footer.php");
?>
<script>
  

  function srch_frm() {
    if ($('#form_date_s').val().trim() != '' && $('#to_date_s').val().trim() === '') { //$("#phone_r_err").css('display','block');
      //$("#phone_r_err").html("Your Phone Number");
      alert("Enter To Date");
      $('#to_date_s').focus();
      return false;
    }
    if ($('#to_date_s').val().trim() != '' && $('#form_date_s').val().trim() === '') { //$("#phone_r_err").css('display','block');
      //$("#phone_r_err").html("Your Phone Number");
      alert("Enter From Date");
      $('#form_date_s').focus();
      return false;
    }

  }

  function table_settings() {
    var favorite = [];
    $.each($("input[name='settingsCheckbox[]']:checked"), function() {
      favorite.push($(this).val());
    });
    var check = favorite.length;
    if (check < 5) {
      alert("Please Check Atlast 5");
      return false;
    }

  }
  //********************************************************************************************************** */

  var BASE_URL = `<?= BASE_URL ?>`;
  var BRANCH_URL = `<?= BRANCH_URL ?>`;
  $(document).ready(function() {
    $(document).on("change", "#isGstRegisteredCheckBoxBtn", function() {
      let isChecked = $(this).is(':checked');
      if (isChecked) {
        $("#vendorGstNoInput").attr("readonly", "readonly");
        $("#vendorPanNo").removeAttr("readonly");

        $.ajax({
          type: "GET",
          url: `${BRANCH_URL}ajaxs/ajax-vendor-with-out-verify-gstin.php`,
          beforeSend: function() {
            $('.checkAndVerifyGstinBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Loading...');
            $(".checkAndVerifyGstinBtn").toggleClass("disabled");
          },
          success: function(response) {
            $(".checkAndVerifyGstinBtn").toggleClass("disabled");
           // $('.checkAndVerifyGstinBtn').html("Re-Verify");
            responseObj = (response);
             //  $('.checkAndVerifyGstinBtn').html("Re-Verify");
             responseObj = (response);
            //responseObj = JSON.parse(responseObj);
            $("#VerifyGstinBtnDiv").hide();
            $("#multistepform").show();
            $("#multistepform").html(responseObj);
           // console.log(responseObj);
          }
        });

      } else {
        $("#vendorCreateMainForm").html("");
        $("#vendorGstNoInput").removeAttr("readonly");
        $("#vendorPanNo").attr("readonly", "readonly");
      }
      $(".checkAndVerifyGstinBtn").toggleClass("disabled");
    });

    $(".checkAndVerifyGstinBtn").click(function() {
      let vendorGstNo = $("#vendorGstNoInput").val();
      if (vendorGstNo != "") {
        $.ajax({
          type: "GET",
          url: `${BRANCH_URL}ajaxs/ajax-vendor-verify-gstin.php?gstin=${vendorGstNo}`,
          beforeSend: function() {
            $('.checkAndVerifyGstinBtn').html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>');
            $(".checkAndVerifyGstinBtn").toggleClass("disabled");
          },
          success: function(response) {
            $(".checkAndVerifyGstinBtn").toggleClass("disabled");
            //  $('.checkAndVerifyGstinBtn').html("Re-Verify");
            responseObj = (response);
            //responseObj = JSON.parse(responseObj);
            $("#VerifyGstinBtnDiv").hide();
            $("#multistepform").show();
            $("#multistepform").html(responseObj);
            //console.log(responseObj);
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
    // $(".checkAndVerifyGstinBtn").click(function() {
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

  $(document).ready(function() {
    $(document).on("click", ".addCF", function() {
      $("#customFields").append('<div class="row"><div class="col-md-12 mt-1" style="text-align: right;"><a href="javascript:void(0);" class="remCF btn btn-danger ">Remove</a></div><div class="col-md-6"> <div class="input-group"> <input type="text" name="vendor_business_legal_name[]" class="m-input" id="vendor_business_legal_name"> <label>GST Legal Name</label> </div><div class="input-group"> <input type="text" name="vendor_business_constitution[]" class="m-input" id="vendor_business_constitution"> <label>Constitution of Business</label> </div><div class="input-group"> <input type="text" name="vendor_business_flat_no[]" class="m-input" id="vendor_business_flat_no"> <label>Flat Number</label> </div><div class="input-group"> <input type="text" name="vendor_business_pin_code[]" class="m-input" id="vendor_business_pin_code"> <label>Pin Code</label> </div><div class="input-group"> <input type="text" name="vendor_business_district[]" class="m-input" id="vendor_business_district"> <label>District</label> </div><div class="input-group"> <input type="text" name="vendor_business_location[]" class="m-input" id="vendor_business_location"> <label>Location</label> </div></div><div class="col-md-6"> <div class="input-group"> <input type="number" name="vendor_business_trade_name[]" class="m-input" id="vendor_business_trade_name"> <label>GST Trade Name</label> </div><div class="input-group"> <input type="text" name="vendor_business_building_no[]" class="m-input" id="vendor_business_building_no"> <label>Building Number</label> </div><div class="input-group"> <input type="text" name="vendor_business_street_name[]" class="m-input" id="vendor_business_street_name"> <label>Street Name</label> </div><div class="input-group"> <input type="text" name="vendor_business_city[]" class="m-input" id="vendor_business_city"> <label>City</label> </div><div class="input-group"> <input type="text" name="vendor_business_state[]" class="m-input" id="vendor_business_state"> <label>State</label> </div><div class="input-group"> <input type="text" name="vendor_business_status[]" class="m-input" id="vendor_business_status"> <label>Status</label> </div></div></div>');
    });


   $(document).on("click", '.remCF', function() {
      $(this).parent().parent().remove();
    });


    $(document).on("click",".add_data", function() {
    var data = this.value;
    $("#createdata").val(data);
   // confirm('Are you sure to Submit?')
    $("#add_frm").submit();
  });

  $(document).on("click",".edit_data", function() {
    var data = this.value;
    $("#editdata").val(data);
    alert(data);
    //$( "#edit_frm" ).submit();
  });



    $(document).on("click",".js-btn-next", function(){
      console.log("hi there!");
    });

  });
</script>