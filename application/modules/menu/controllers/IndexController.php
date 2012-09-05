<?php

class Menu_IndexController extends Rastor_Controller_Action {

    public function showAction() {
	//$view = $this->getResource('layout');
		//$id=$this->_getAllParams();
		$id = $this->_getParam('menuId');
		//Zend_Debug::dump($id);
        $menuModel = new Menu_Model_MenuItem();
        //$my = new Zend_Navigation($menuModel->getNavigationArray($this->view->url(), $this->_getLocale()->getLanguage()));
        $this->view->menu = new Zend_Navigation($menuModel->getNavigationArray($this->view->url(), $this->_getLocale()->getLanguage(),$id));
	//$view->navigation($my);
    }

}

