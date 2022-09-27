<?php
include("../app/v1/connection-branch-admin.php");
include("common/header.php");
include("common/navbar.php");
include("common/sidebar.php");
require_once("common/pagination.php");
include("../app/v1/functions/branch/func-goods-controller.php");

administratorAuth();

if (isset($_POST["changeStatus"])) {
  $newStatusObj = ChangeStatus($_POST, "fldAdminKey", "fldAdminStatus");
  swalToast($newStatusObj["status"], $newStatusObj["message"]);
}


if (isset($_POST["create"])) {
  $addNewObj = createData($_POST + $_FILES);
  swalToast($addNewObj["status"], $addNewObj["message"]);
}

if (isset($_POST["edit"])) {
  $editDataObj = updateData($_POST);

  swalToast($editDataObj["status"], $editDataObj["message"]);
}



?>

<form name="frm_opts" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
  <input type="hidden" name="mode" value="">
  <input type="hidden" name="pageNo" value="<?php if (isset($_REQUEST['pageNo'])) {
                                              echo  $_REQUEST['pageNo'];
                                            } ?>">
  <input type="hidden" name="url" value="<?php echo $_SERVER['PHP_SELF'] ?>">
  <input type="hidden" name="id" value="">
  <input type="hidden" name="hold_page" value="">
  <input type="hidden" name="menu_cat" id="menu_cat" />
  <input type="hidden" name="menu_subcat" id="menu_subcat" />
</form>
<?php
if (isset($_GET['create'])) {
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header mb-2 p-0  border-bottom">
      <?php if (isset($msg)) { ?>
        <div style="z-index: 999; float:right" class="mx-3 p-1 alert-success rounded">
          <?= $msg ?>
        </div>
      <?php } ?>
      <div class="container-fluid">
        <div class="row pt-2 pb-2">
          <div class="col-md-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>" class="text-dark"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Manage Goods</a></li>
              <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Add Goods</a></li>
            </ol>
          </div>
          <div class="col-md-6" style="display: flex;">
            <button class="btn btn-danger btnstyle ml-2">Draft</button>
            <button class="btn btn-primary btnstyle gradientBtn ml-2"><i class="fa fa-plus fontSize"></i> Save</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="" method="POST">
          <div class="row">
            <div class="col-md-8">
              <button type="button" class="btn-position" data-toggle="modal" data-target="#myModal"><i class="fa fa-cog" aria-hidden="true"></i></button>
              <div id="accordion">
                <div class="card card-primary">
                  <div class="card-header cardHeader">
                    <h4 class="card-title w-100"> <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseOne"> Classification </a> </h4>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <div class="input-group">
                            <select id="goodTypeDropDown" name="goodsType" class="form-control form-control-border borderColor">
                              <option value="">Goods Type</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="input-group">
                            <select id="goodGroupDropDown" name="goodsGroup" class="form-control form-control-border borderColor">
                              <option value="">Goods Group</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <select name="purchaseGroup" class="select2 form-control form-control-border borderColor">
                              <option value="">Purchase Group</option>
                              <option value="">A</option>
                              <option value="">B</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="branh" class="m-input" id="exampleInputBorderWidth2">
                            <label>Branch</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <select name="availabilityCheck" class="select2 form-control form-control-border borderColor">
                              <option value="">Availability Check</option>
                              <option value="Daily">Daily</option>
                              <option value="Weekly">Weekly</option>
                              <option value="By Weekly">By Weekly</option>
                              <option value="Monthly">Monthly</option>
                              <option value="Qtr">Qtr</option>
                              <option value="Half Y">Half Y</option>
                              <option value="Year">Year</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-danger">
                  <div class="card-header cardHeader">
                    <h4 class="card-title w-100"> <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseTwo"> Basic Details </a> </h4>
                  </div>
                  <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="itemCode" class="m-input" id="exampleInputBorderWidth2">
                            <label>Item Code</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="itemName" class="m-input" id="exampleInputBorderWidth2">
                            <label>Item Name</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="netWeight" class="m-input" id="exampleInputBorderWidth2">
                            <label>Net Weight</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="grossWeight" class="m-input" id="exampleInputBorderWidth2">
                            <label>Gross Weight</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Volume :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="volume" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="volume">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">height :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="height" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="height">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">width :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="width" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="width">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">length :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="length" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="length">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Base Unit Of Measure :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="baseUnitMeasure" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="baseUnitOfMeasure">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Issue Unit :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="issueUnit" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="issueUnit">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <textarea type="text" name="itemDesc" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Item Description"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-success">

                  <div class="card-header cardHeader">
                    <h4 class="card-title w-100"> <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseThree"> Storage Details </a> </h4>
                  </div>
                  <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Storage Bin :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="storageBin" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Storage Bin">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Picking Area :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="pickingArea" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Picking Area">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Temp Control :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="tempControl" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Temp Control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Storage Control :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="storageControl" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Storage Control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Max Storage Period :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="maxStoragePeriod" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Max Storage Period">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Time Unit :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="timeUnit" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Time Unit">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Min Remain Self Life :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="minRemainSelfLife" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Min Remain Self Life">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-success">
                  <div class="card-header cardHeader">
                    <h4 class="card-title w-100"> <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseFour"> Purchase Details </a> </h4>
                  </div>
                  <div id="collapseFour" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Purchasing Value Key :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="purchasingValueKey" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Purchasing Value Key">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Home</a> </li>
                    <li class="nav-item"> <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Profile</a> </li>
                    <li class="nav-item"> <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Messages</a> </li>
                    <li class="nav-item"> <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Settings</a> </li>
                  </ul>
                </div>
                <div class="card-body fontSize">
                  <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab"> 90 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper
                      dui
                      molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam
                      odio
                      magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi,
                      vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et
                      malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta,
                      ante
                      et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta
                      sem.
                      Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non
                      consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras
                      lacinia erat eget sapien porta consectetur. </div>
                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab"> Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut
                      ligula
                      tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas
                      sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu
                      lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod
                      pellentesque diam. </div>
                    <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab"> Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue
                      id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac
                      tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                      condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus
                      tristique.
                      Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est
                      libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id
                      fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. </div>
                    <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab"> Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis
                      ac,
                      ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi
                      euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum
                      placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam.
                      Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet
                      accumsan ex sit amet facilisis. </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <div class="w-100 mt-3">
                <button type="submit" name="addInventoryItem" class="gradientBtn btn-success btn btn-block btn-sm"> <i class="fa fa-plus fontSize"></i> Add New </button>
              </div>
            </div>
          </div>
        </form>

        <!-- modal -->
        <div class="modal" id="addNewGoodTypesFormModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header py-1" style="background-color: #003060; color:white;">
                <h4 class="modal-title">Add New Good Type</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form action="" method="post" id="addNewGoodTypesForm">
                  <div class="col-md-12 mb-3">
                    <div class="input-group">
                      <input type="text" name="goodTypeName" class="m-input" required>
                      <label>Type Name</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group">
                      <input type="text" name="goodTypeDesc" class="m-input" required>
                      <label>Type Description</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group btn-col">
                      <button type="submit" id="addNewGoodTypesFormSubmitBtn" class="btn btn-primary btnstyle">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- modal end -->

        <!-- modal -->
        <div class="modal" id="addNewGoodGroupFormModal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header py-1" style="background-color: #003060; color:white;">
                <h4 class="modal-title">Add New Good Group</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <form action="" method="post" id="addNewGoodGroupForm">
                  <div class="col-md-12 mb-3">
                    <div class="input-group">
                      <input type="text" name="goodGroupName" class="m-input" required>
                      <label>Group Name</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group">
                      <input type="text" name="goodGroupDesc" class="m-input" required>
                      <label>Group Description</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="input-group btn-col">
                      <button type="submit" id="addNewGoodGroupFormSubmitBtn" class="btn btn-primary btnstyle">Submit</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- modal end -->

        <!-- modal -->
        <div class="modal" id="myModal4">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Heading4</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 mb-3">
                  <div class="input-group">
                    <select name="goodsGroup" class="form-control form-control-border borderColor">
                      <option value="">Goods Group</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-group">
                    <input type="text" name="itemCode" class="m-input" id="exampleInputBorderWidth2">
                    <label>Item Code</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-group btn-col">
                    <button type="submit" class="btn btn-primary btnstyle">Submit</button>
                  </div>
                </div>
              </div>
              <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> -->
            </div>
          </div>
        </div>
        <!-- modal end -->
      </div>
    </section>
    <!-- /.content -->
  </div>
<?php
} else if (isset($_GET['edit']) && $_GET["edit"] > 0) {
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header mb-2 p-0  border-bottom">
      <?php if (isset($msg)) { ?>
        <div style="z-index: 999; float:right" class="mx-3 p-1 alert-success rounded">
          <?= $msg ?>
        </div>
      <?php } ?>
      <div class="container-fluid">
        <div class="row pt-2 pb-2">
          <div class="col-md-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>" class="text-dark"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Manage Goods</a></li>
              <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Add Goods</a></li>
            </ol>
          </div>
          <div class="col-md-6" style="display: flex;">
            <button class="btn btn-danger btnstyle ml-2">Draft</button>
            <button class="btn btn-primary btnstyle gradientBtn ml-2"><i class="fa fa-plus fontSize"></i> Save</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="" method="POST">
          <div class="row">
            <div class="col-md-8">
              <button type="button" class="btn-position" data-toggle="modal" data-target="#myModal"><i class="fa fa-cog" aria-hidden="true"></i></button>
              <div id="accordion">
                <div class="card card-primary">
                  <div class="card-header cardHeader">
                    <h4 class="card-title w-100"> <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseOne"> Classification </a> </h4>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <div class="input-group">
                            <select id="" name="goodsType" class="select2 form-control form-control-border borderColor">
                              <option value="">Goods Type</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="input-group">
                            <select name="goodsGroup" class="select4 form-control form-control-border borderColor">
                              <option value="">Goods Group</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <select name="purchaseGroup" class="select2 form-control form-control-border borderColor">
                              <option value="">Purchase Group</option>
                              <option value="">A</option>
                              <option value="">B</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="branh" class="m-input" id="exampleInputBorderWidth2">
                            <label>Branch</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <select name="availabilityCheck" class="select2 form-control form-control-border borderColor">
                              <option value="">Availability Check</option>
                              <option value="Daily">Daily</option>
                              <option value="Weekly">Weekly</option>
                              <option value="By Weekly">By Weekly</option>
                              <option value="Monthly">Monthly</option>
                              <option value="Qtr">Qtr</option>
                              <option value="Half Y">Half Y</option>
                              <option value="Year">Year</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-danger">
                  <div class="card-header cardHeader">
                    <h4 class="card-title w-100"> <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseTwo"> Basic Details </a> </h4>
                  </div>
                  <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="itemCode" class="m-input" id="exampleInputBorderWidth2">
                            <label>Item Code</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="itemName" class="m-input" id="exampleInputBorderWidth2">
                            <label>Item Name</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="netWeight" class="m-input" id="exampleInputBorderWidth2">
                            <label>Net Weight</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="grossWeight" class="m-input" id="exampleInputBorderWidth2">
                            <label>Gross Weight</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Volume :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="volume" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="volume">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">height :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="height" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="height">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">width :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="width" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="width">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">length :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="length" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="length">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Base Unit Of Measure :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="baseUnitMeasure" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="baseUnitOfMeasure">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Issue Unit :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="issueUnit" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="issueUnit">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <textarea type="text" name="itemDesc" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Item Description"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-success">
                  <div class="card-header cardHeader">
                    <h4 class="card-title w-100"> <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseThree"> Storage Details </a> </h4>
                  </div>
                  <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Storage Bin :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="storageBin" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Storage Bin">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Picking Area :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="pickingArea" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Picking Area">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Temp Control :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="tempControl" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Temp Control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Storage Control :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="storageControl" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Storage Control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Max Storage Period :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="maxStoragePeriod" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Max Storage Period">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Time Unit :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="timeUnit" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Time Unit">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Min Remain Self Life :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="minRemainSelfLife" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Min Remain Self Life">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-success">
                  <div class="card-header cardHeader">
                    <h4 class="card-title w-100"> <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseFour"> Purchase Details </a> </h4>
                  </div>
                  <div id="collapseFour" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Purchasing Value Key :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="purchasingValueKey" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Purchasing Value Key">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                  <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Home</a> </li>
                    <li class="nav-item"> <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Profile</a> </li>
                    <li class="nav-item"> <a class="nav-link" id="custom-tabs-three-messages-tab" data-toggle="pill" href="#custom-tabs-three-messages" role="tab" aria-controls="custom-tabs-three-messages" aria-selected="false">Messages</a> </li>
                    <li class="nav-item"> <a class="nav-link" id="custom-tabs-three-settings-tab" data-toggle="pill" href="#custom-tabs-three-settings" role="tab" aria-controls="custom-tabs-three-settings" aria-selected="false">Settings</a> </li>
                  </ul>
                </div>
                <div class="card-body fontSize">
                  <div class="tab-content" id="custom-tabs-three-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab"> 90 Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada lacus ullamcorper
                      dui
                      molestie, sit amet congue quam finibus. Etiam ultricies nunc non magna feugiat commodo. Etiam
                      odio
                      magna, mollis auctor felis vitae, ullamcorper ornare ligula. Proin pellentesque tincidunt nisi,
                      vitae ullamcorper felis aliquam id. Pellentesque habitant morbi tristique senectus et netus et
                      malesuada fames ac turpis egestas. Proin id orci eu lectus blandit suscipit. Phasellus porta,
                      ante
                      et varius ornare, sem enim sollicitudin eros, at commodo leo est vitae lacus. Etiam ut porta
                      sem.
                      Proin porttitor porta nisl, id tempor risus rhoncus quis. In in quam a nibh cursus pulvinar non
                      consequat neque. Mauris lacus elit, condimentum ac condimentum at, semper vitae lectus. Cras
                      lacinia erat eget sapien porta consectetur. </div>
                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab"> Mauris tincidunt mi at erat gravida, eget tristique urna bibendum. Mauris pharetra purus ut
                      ligula
                      tempor, et vulputate metus facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Maecenas
                      sollicitudin, nisi a luctus interdum, nisl ligula placerat mi, quis posuere purus ligula eu
                      lectus. Donec nunc tellus, elementum sit amet ultricies at, posuere nec nunc. Nunc euismod
                      pellentesque diam. </div>
                    <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab"> Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue
                      id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac
                      tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit
                      condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus
                      tristique.
                      Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est
                      libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id
                      fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. </div>
                    <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab"> Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis
                      ac,
                      ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi
                      euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum
                      placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam.
                      Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet
                      accumsan ex sit amet facilisis. </div>
                  </div>
                </div>
                <!-- /.card -->
              </div>
              <div class="w-100 mt-3">
                <button type="submit" name="addInventoryItem" class="gradientBtn btn-success btn btn-block btn-sm"> <i class="fa fa-plus fontSize"></i> Add New </button>
              </div>
            </div>
          </div>
        </form>

        <!-- modal -->
        <div class="modal" id="myModal3">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Heading</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 mb-3">
                  <div class="input-group">
                    <select name="goodsGroup" class="form-control form-control-border borderColor">
                      <option value="">Goods Group</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-group">
                    <input type="text" name="itemCode" class="m-input" id="exampleInputBorderWidth2">
                    <label>Item Code</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-group btn-col">
                    <button type="submit" class="btn btn-primary btnstyle">Submit</button>
                  </div>
                </div>
              </div>
              <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> -->
            </div>
          </div>
        </div>
        <!-- modal end -->
        <!-- modal -->
        <div class="modal" id="myModal4">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">Heading4</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                <div class="col-md-12 mb-3">
                  <div class="input-group">
                    <select name="goodsGroup" class="form-control form-control-border borderColor">
                      <option value="">Goods Group</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-group">
                    <input type="text" name="itemCode" class="m-input" id="exampleInputBorderWidth2">
                    <label>Item Code</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="input-group btn-col">
                    <button type="submit" class="btn btn-primary btnstyle">Submit</button>
                  </div>
                </div>
              </div>
              <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div> -->
            </div>
          </div>
        </div>
        <!-- modal end -->
      </div>
    </section>
    <!-- /.content -->
  </div>
<?php
} else if (isset($_GET['view']) && $_GET["view"] > 0) {
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header mb-2 p-0  border-bottom">
      <?php if (isset($msg)) { ?>
        <div style="z-index: 999; float:right" class="mx-3 p-1 alert-success rounded">
          <?= $msg ?>
        </div>
      <?php } ?>
      <div class="container-fluid">
        <div class="row pt-2 pb-2">
          <div class="col-md-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>" class="text-dark"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Manage Goods</a></li>
              <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">View Goods</a></li>
            </ol>
          </div>
          <div class="col-md-6" style="display: flex;">
            <button class="btn btn-primary btnstyle gradientBtn ml-2"><i class="fa fa-plus fontSize"></i> Back</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <form action="" method="POST">
          <div class="row">
            <div class="col-md-8">
              <button type="button" class="btn-position" data-toggle="modal" data-target="#myModal"><i class="fa fa-cog" aria-hidden="true"></i></button>
              <div id="accordion">
                <div class="card card-primary">
                  <div class="card-header cardHeader">
                    <h4 class="card-title w-100"> <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseOne"> Classification </a> </h4>
                  </div>
                  <div id="collapseOne" class="collapse show" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6 mb-3">
                          <div class="input-group">
                            <select id="" name="goodsType" class="select2 form-control form-control-border borderColor">
                              <option value="">Goods Type</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <div class="input-group">
                            <select name="goodsGroup" class="select4 form-control form-control-border borderColor">
                              <option value="">Goods Group</option>
                              <option value="A">A</option>
                              <option value="B">B</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <select name="purchaseGroup" class="select2 form-control form-control-border borderColor">
                              <option value="">Purchase Group</option>
                              <option value="">A</option>
                              <option value="">B</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="branh" class="m-input" id="exampleInputBorderWidth2">
                            <label>Branch</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <select name="availabilityCheck" class="select2 form-control form-control-border borderColor">
                              <option value="">Availability Check</option>
                              <option value="Daily">Daily</option>
                              <option value="Weekly">Weekly</option>
                              <option value="By Weekly">By Weekly</option>
                              <option value="Monthly">Monthly</option>
                              <option value="Qtr">Qtr</option>
                              <option value="Half Y">Half Y</option>
                              <option value="Year">Year</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-danger">
                  <div class="card-header cardHeader">
                    <h4 class="card-title w-100"> <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseTwo"> Basic Details </a> </h4>
                  </div>
                  <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="itemCode" class="m-input" id="exampleInputBorderWidth2">
                            <label>Item Code</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="itemName" class="m-input" id="exampleInputBorderWidth2">
                            <label>Item Name</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="netWeight" class="m-input" id="exampleInputBorderWidth2">
                            <label>Net Weight</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="input-group">
                            <input type="text" name="grossWeight" class="m-input" id="exampleInputBorderWidth2">
                            <label>Gross Weight</label>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Volume :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="volume" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="volume">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">height :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="height" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="height">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">width :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="width" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="width">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">length :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="length" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="length">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Base Unit Of Measure :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="baseUnitMeasure" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="baseUnitOfMeasure">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Issue Unit :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="issueUnit" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="issueUnit">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <textarea type="text" name="itemDesc" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Item Description"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-success">
                  <div class="card-header cardHeader">
                    <h4 class="card-title w-100"> <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseThree"> Storage Details </a> </h4>
                  </div>
                  <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Storage Bin :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="storageBin" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Storage Bin">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Picking Area :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="pickingArea" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Picking Area">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Temp Control :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="tempControl" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Temp Control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Storage Control :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="storageControl" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Storage Control">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Max Storage Period :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="maxStoragePeriod" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Max Storage Period">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Time Unit :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="timeUnit" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Time Unit">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Min Remain Self Life :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="minRemainSelfLife" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Min Remain Self Life">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card card-success">
                  <div class="card-header cardHeader">
                    <h4 class="card-title w-100"> <a class="d-block w-100 text-dark" data-toggle="collapse" href="#collapseFour"> Purchase Details </a> </h4>
                  </div>
                  <div id="collapseFour" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="row">
                            <div class="col-md-6">
                              <label for="" class="form-control borderNone">Purchasing Value Key :</label>
                            </div>
                            <div class="col-md-6">
                              <input type="text" name="purchasingValueKey" class="form-control form-control-border borderColor" id="exampleInputBorderWidth2" placeholder="Purchasing Value Key">
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- /.content -->
  </div>
<?php
} else {
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- <div class="content-header mb-2 p-0  border-bottom">
            <div class="container-fluid">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= ADMIN_URL ?>" class="text-dark"><i class="fas fa-home"></i> Home</a></li>
                    <li class="breadcrumb-item active"><a href="<?= basename($_SERVER['PHP_SELF']); ?>" class="text-dark">Manage Goods</a></li>
                </ol>
            </div>
        </div> -->
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
                    <h3 class="card-title">Manage Goods</h3>
                    <a href="goods.php?create" class="btn btn-sm btn-primary btnstyle m-2"><i class="fa fa-plus"></i> Add New</a>
                  </li>
                </ul>
              </div>
              <form name="search" id="search" action="<?php $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return srch_frm();">

                <div class="card-body">
                  <div class="filter-col">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="input-group">
                          <select name="status_s" id="status_s" class="form-control form-control-border borderColor">
                            <option value="">---STATUS--</option>
                            <option value="active" <?php if (isset($_REQUEST['status_s']) && 'active' == $_REQUEST['status_s']) {
                                                      echo 'selected';
                                                    } ?>>Active</option>
                            <option value="inactive" <?php if (isset($_REQUEST['status_s']) && 'inactive' == $_REQUEST['status_s']) {
                                                        echo 'selected';
                                                      } ?>>Inactive</option>
                            <option value="draft" <?php if (isset($_REQUEST['status_s']) && 'draft' == $_REQUEST['status_s']) {
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
                      <div class="col-md-4">
                        <div class="input-group">
                          <input type="text" name="keyword" class="m-input" id="keyword" value="<?php if (isset($_REQUEST['keyword'])) {
                                                                                                  echo $_REQUEST['keyword'];
                                                                                                } ?>">
                          <label>Keyword</label>
                        </div>
                      </div>
                      <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btnstyle">Search</button>
                      </div>
                    </div>
                  </div>
              </form>
              <a type="button" class="btn add-col" data-toggle="modal" data-target="#myModal2" style="position:absolute;z-index:999;"> <i class="fa fa-cog" aria-hidden="true"></i></a>
              <div class="tab-content" id="custom-tabs-two-tabContent">
                <div class="tab-pane fade show active" id="listTabPan" role="tabpanel" aria-labelledby="listTab">
                  <?php
                  $cond = '';

                  $sts = " AND `status` !='deleted'";
                  if (isset($_REQUEST['status_s']) && $_REQUEST['status_s'] != '') {
                    $sts = ' AND status="' . $_REQUEST['status_s'] . '"';
                  }

                  if (isset($_REQUEST['form_date_s']) && $_REQUEST['form_date_s'] != '') {
                    $cond .= " AND createdAt between '" . $_REQUEST['form_date_s'] . " 00:00:00' AND '" . $_REQUEST['to_date_s'] . " 23:59:59'";
                  }

                  if (isset($_REQUEST['keyword']) && $_REQUEST['keyword'] != '') {
                    $cond .= " AND (`itemCode` like '%" . $_REQUEST['keyword'] . "%' OR `itemName` like '%" . $_REQUEST['keyword'] . "%' OR `netWeight` like '%" . $_REQUEST['keyword'] . "%')";
                  }

                  $sql_list = "SELECT * FROM erp_inventory_items WHERE 1 " . $cond . " " . $sts . "  ORDER BY itemId desc limit " . $GLOBALS['start'] . "," . $GLOBALS['show'] . " ";
                  $qry_list = mysqli_query($dbCon, $sql_list);
                  $num_list = mysqli_num_rows($qry_list);


                  $countShow = "SELECT count(*) FROM erp_inventory_items WHERE 1 " . $cond . " ";
                  $countQry = mysqli_query($dbCon, $countShow);
                  $rowCount = mysqli_fetch_array($countQry);
                  $count = $rowCount[0];
                  $cnt = $GLOBALS['start'] + 1;
                  if ($num_list > 0) { ?>
                    <table id="mytable" class="table defaultDataTable table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Item Code</th>
                          <th>Item Name</th>
                          <th>Net Weight</th>
                          <th>Volume</th>
                          <th>Goods Type</th>
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
                            <td><?= $row['itemCode'] ?></td>
                            <td><?= $row['itemName'] ?></td>
                            <td><?= $row['netWeight'] ?></td>
                            <td><?= $row['volume'] ?></td>
                            <td><?= $row['goodsType'] ?></td>
                            <td><?= $row['status'] ?></td>
                            <td><button class="btn btn-sm"><i class="fa fa-eye"></i></button>
                              <button class="btn btn-sm"><i class="fa fa-edit"></i></button>
                              <button class="btn btn-sm"><i class="fa fa-trash"></i></button>
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
                      <h4 class="modal-title">Modal Heading</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <div id="dropdownframe"></div>
                      <div id="main2">
                        <table>
                          <tr>
                            <td valign="top" style="width: 165px"><input type="checkbox" checked="checked" name="vehicle" value="0" />
                              Index</td>
                          </tr>
                          <tr>
                            <td valign="top" style="width: 165px"><input type="checkbox" checked="checked" name="vehicle" value="1" />
                              Parameter Name</td>
                          </tr>
                          <tr>
                            <td valign="top" style="width: 165px"><input type="checkbox" checked="checked" name="vehicle" value="2" />
                              Page Name</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Save</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
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

<?php
}
include("common/footer.php");
?>
<script>
  $(document).ready(function() {
    $('#goodTypeDropDown')
      .select2()
      .on('select2:open', () => {
        $(".select2-results:not(:has(a))").append(`<div class="btn-row"><a type="button" class="btn btn-primary add-btn" data-toggle="modal" data-target="#addNewGoodTypesFormModal">Add New</a></div>`);
      });
    //**************************************************************
    $('#goodGroupDropDown')
      .select2()
      .on('select2:open', () => {
        $(".select2-results:not(:has(a))").append(`<div class="btn-row"><a type="button" class="btn btn-primary add-btn" data-toggle="modal" data-target="#addNewGoodGroupFormModal">Add New</a></div>`);
      });
  });
</script>
<script>
  function leaveInput(el) {
    if (el.value.length > 0) {
      if (!el.classList.contains('active')) {
        el.classList.add('active');
      }
    } else {
      if (el.classList.contains('active')) {
        el.classList.remove('active');
      }
    }
  }

  var inputs = document.getElementsByClassName("m-input");
  for (var i = 0; i < inputs.length; i++) {
    var el = inputs[i];
    el.addEventListener("blur", function() {
      leaveInput(this);
    });
  }

  // *** autocomplite select *** //
  wow = new WOW({
    boxClass: 'wow', // default
    animateClass: 'animated', // default
    offset: 0, // default
    mobile: true, // default
    live: true // default
  })
  wow.init();
</script>


<script>
  $(document).ready(function() {
    function loadGoodTypes() {
      $.ajax({
        type: "GET",
        url: `ajaxs/items/ajax-good-types.php`,
        beforeSend: function() {
          $("#goodTypeDropDown").html(`<option value="">Loding...</option>`);
        },
        success: function(response) {
          $("#goodTypeDropDown").html(response);
        }
      });
    }
    loadGoodTypes();
    $(document).on('submit', '#addNewGoodTypesForm', function(event) {
      event.preventDefault();
      let formData = $("#addNewGoodTypesForm").serialize();
      $.ajax({
        type: "POST",
        url: `ajaxs/items/ajax-good-types.php`,
        data: formData,
        beforeSend: function() {
          $("#addNewGoodTypesFormSubmitBtn").toggleClass("disabled");
          $("#addNewGoodTypesFormSubmitBtn").html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Submitting...');
        },
        success: function(response) {
          $("#goodTypeDropDown").html(response);
          $('#addNewGoodTypesForm').trigger("reset");
          $("#addNewGoodTypesFormModal").modal('toggle');
          $("#addNewGoodTypesFormSubmitBtn").html("Submit");
          $("#addNewGoodTypesFormSubmitBtn").toggleClass("disabled");
        }
      });
    });

    function loadGoodGroup() {
      $.ajax({
        type: "GET",
        url: `ajaxs/items/ajax-good-groups.php`,
        beforeSend: function() {
          $("#goodGroupDropDown").html(`<option value="">Loding...</option>`);
        },
        success: function(response) {
          $("#goodGroupDropDown").html(response);
        }
      });
    }
    loadGoodGroup();
    $(document).on('submit', '#addNewGoodGroupForm', function(event) {
      event.preventDefault();
      let formData = $("#addNewGoodGroupForm").serialize();
      $.ajax({
        type: "POST",
        url: `ajaxs/items/ajax-good-groups.php`,
        data: formData,
        beforeSend: function() {
          $("#addNewGoodGroupFormSubmitBtn").toggleClass("disabled");
          $("#addNewGoodGroupFormSubmitBtn").html('<span class="spinner-border spinner-border-sm mr-2" role="status" aria-hidden="true"></span>Submitting...');
        },
        success: function(response) {
          $("#goodGroupDropDown").html(response);
          $('#addNewGoodGroupForm').trigger("reset");
          $("#addNewGoodGroupFormModal").modal('toggle');
          $("#addNewGoodGroupFormSubmitBtn").html("Submit");
          $("#addNewGoodGroupFormSubmitBtn").toggleClass("disabled");
        }
      });
    });




  });
</script>