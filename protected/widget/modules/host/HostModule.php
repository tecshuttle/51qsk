<?php

class HostModule extends CWebModule
{
    public function init()
    {
        $this->setImport(array(
            'host.models.*',
            'host.components.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            return true;
        } else {
            return false;
        }
    }
}

//end file
