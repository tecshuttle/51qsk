<?php

class DeliveryAddressController extends XUserBase
{

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/host';

    public function actionDynamiccities()
    {
        echo $_POST['AddressResult_state'];
        $data = Area::model()->findAll("parent_id=:parent_id", array(":parent_id" => $_POST['AddressResult_state']));

        $data = CHtml::listData($data, "area_id", "name");
        echo CHtml::tag("option", array("value" => ''), '', true);
        foreach ($data as $value => $name) {
            echo CHtml::tag("option", array("value" => $value), CHtml::encode($name), true);
        }
    }

    public function actionDynamicdistrict()
    {
        if ($_POST["AddressResult_city"]) {
            $data = Area::model()->findAll("parent_id=:parent_id", array(":parent_id" => $_POST["AddressResult_city"]));

            $data = CHtml::listData($data, "area_id", "name");
            echo CHtml::tag("option", array("value" => ''), '', true);
            foreach ($data as $value => $name) {
                echo CHtml::tag("option", array("value" => $value), CHtml::encode($name), true);
            }
        }
    }


}

//end file