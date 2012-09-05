<?php

class Site_IndexController extends Rastor_Controller_Action {

    public function indexAction() {
       $menuModel = new Menu_Model_MenuItem();
        $my = new Zend_Navigation($menuModel->getNavigationArray($this->view->url(), $this->_getLocale()->getLanguage()));
	$this->view->navigation($my);
        //$page = $this->_getParam('page');
        //$this->view->paginator = $faqModel->getPaginator($page, $this->_itemsPerPage, $this->_pageRange, $this->_getLocale()->getLanguage());
        //$this->view->headTitle($this->_getTranslator()->_('Faq'));
    }

  

}

