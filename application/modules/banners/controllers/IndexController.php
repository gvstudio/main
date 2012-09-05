<?php

class Banners_IndexController extends Rastor_Controller_Action {

    public function showAction() {
        $bannersModel = new Banners_Model_Banners();

        $position = $this->_getParam('position');

        $banner = $bannersModel->getBanner($position);

        if ($banner) {
            if (strlen($banner->url)) {
                $this->view->data = '<a href="' . $banner->url . '">' . $banner->html . '</a>';
            } else {
                $this->view->data = $banner->html;
            }
        } else {
            $this->view->data = '';
        }
    }

}

