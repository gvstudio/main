<?php

class News_IndexController extends Rastor_Controller_Action {

    public function indexAction() {
        $newsModel = new News_Model_News();

        $page = $this->_getParam('page');
        $this->view->paginator = $newsModel->getPaginator($page, $this->_itemsPerPage, $this->_pageRange, $this->_getLocale()->getLanguage());
        $this->view->headTitle($this->_getTranslator()->_('Новости'));
    }

    public function lastAction(){
        $newsModel = new News_Model_News();
        
        $count = $this->_getParam('count', 2);
        
        $this->view->records = $newsModel->buildParams($newsModel->getDbTable()->getLastRecords($count), $this->_getLocale()->getLanguage(), true);
    }
    
    public function viewAction() {
        $newsModel = new News_Model_News();

        $id = $this->_getParam('id');

        $news = $newsModel->getDbTable()->getEnableRecord($id);

        if ($news) {
            $news = $newsModel->buildParams($news, $this->_getLocale()->getLanguage());
            $newsModel->buildHead($news, $this->view);

            $this->view->article = $news;
        } else {
            throw new Exception('Content not found');
        }
    }
	
	public function lastnewsAction()
	{
		$this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        define('NO_DEBUG', true);
		$newsModel = new News_Model_News();
		$my =  array('title'=>'privet ot menya','text'=>'adasdasdas asdasd');
		//$my = '{title:"privet ot menya",text:"adasdasdas asdasd"}';
		//$my = '({"name":"Valik","age":"20","country":"Moldova"})';
		
		$my = $newsModel->getDbTable()->getLastRecords(1);
		$my->date=date('d.m.Y',$my->date);
		echo "(".Zend_Json::encode($my).")";
	}

}

