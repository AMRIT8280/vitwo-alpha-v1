<?php
include_once("../../../app/v1/connection-branch-admin.php");
include("../../../app/v1/functions/branch/func-goods-controller.php");

$headerData = array('Content-Type: application/json');
$responseData = [];

$goodsObj = new GoodsController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //POST REQUEST
    $_POST["companyId"] = 12;

    $createNewGoodGroupObj = $goodsObj->createGoodGroup($_POST);

    $responseData = $createNewGoodGroupObj;

    if($responseData["status"]=="success") {
        $getAllGoodGroupObj = $goodsObj->getAllGoodGroups();
        
        if($getAllGoodGroupObj["status"]=="success"){
            $goodTypeList = $getAllGoodGroupObj["data"];
            $numGoodTypes = count($goodTypeList);
            echo '<option value="">Goods Group</option>';
            for($i=0; $i<$numGoodTypes; $i++){
                $oneGoodGroup = $goodTypeList[$i];
                if($i == $numGoodTypes-1){
                    echo '<option selected value="'.$oneGoodGroup["goodGroupId"].'">'.$oneGoodGroup["goodGroupName"].'</option>';
                }else{
                    echo '<option value="'.$oneGoodGroup["goodGroupId"].'">'.$oneGoodGroup["goodGroupName"].'</option>';
                }
            }
        }else{
            echo '<option value="">Goods Group</option>';
        }
    }



}elseif($_SERVER['REQUEST_METHOD'] === 'GET') {
    //GET REQUEST

    $getAllGoodGroupObj = $goodsObj->getAllGoodGroups();
    
    if($getAllGoodGroupObj["status"]=="success"){
        echo '<option value="">Goods Group</option>';
        foreach($getAllGoodGroupObj["data"] as $oneGoodGroup){
            ?>
                <option value="<?= $oneGoodGroup["goodGroupId"] ?>"><?= $oneGoodGroup["goodGroupName"] ?></option>
            <?php
        }
    }else{
        echo '<option value="">Goods Group</option>';
    }

}else{
    echo "Something wrong, try again!";
}