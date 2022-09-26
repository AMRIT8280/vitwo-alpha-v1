<?php
include_once("../../../app/v1/connection-branch-admin.php");
include("../../../app/v1/functions/branch/func-goods-controller.php");
$headerData = array('Content-Type: application/json');
$responseData = [];

$goodsObj = new GoodsController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //POST REQUEST
    $_POST["companyId"] = 12;
    
    $createNewGoodTypeObj = $goodsObj->createGoodTypes($_POST);

    if($createNewGoodTypeObj["status"]=="success") {
        
        $getAllGoodTypesObj = $goodsObj->getAllGoodTypes();
        
        if($getAllGoodTypesObj["status"]=="success"){
            $goodTypeList = $getAllGoodTypesObj["data"];
            $numGoodTypes = count($goodTypeList);
            echo '<option value="">Goods Type</option>';
            for($i=0; $i<$numGoodTypes; $i++){
                $oneGoodType = $goodTypeList[$i];
                if($i == $numGoodTypes-1){
                    echo '<option selected value="'.$oneGoodType["goodTypeId"].'">'.$oneGoodType["goodTypeName"].'</option>';
                }else{
                    echo '<option value="'.$oneGoodType["goodTypeId"].'">'.$oneGoodType["goodTypeName"].'</option>';
                }
            }
        }else{
            echo '<option value="">Goods Type</option>';
        }
    }



}elseif($_SERVER['REQUEST_METHOD'] === 'GET') {
    //GET REQUEST
    $getAllGoodTypesObj = $goodsObj->getAllGoodTypes();
    
    if($getAllGoodTypesObj["status"]=="success"){
        echo '<option value="">Goods Type</option>';
        foreach($getAllGoodTypesObj["data"] as $oneGoodType){
            ?>
                <option value="<?= $oneGoodType["goodTypeId"] ?>"><?= $oneGoodType["goodTypeName"] ?></option>
            <?php
        }
    }else{
        echo '<option value="">Goods Type</option>';
    }

}else{
    echo "Something wrong, try again!";
}