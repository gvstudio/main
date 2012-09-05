<?php

class Actions_IndexController extends Rastor_Controller_Action {

    public function indexAction() {
        $articlesModel = new Actions_Model_Action();
//die;
//Zend_Debug::dump($articlesModel);
        $page = $this->_getParam('page');
        $this->view->paginator = $articlesModel->getPaginator($page, $this->_itemsPerPage, $this->_pageRange, $this->_getLocale()->getLanguage());
		//Zend_Debug::dump($this->view->paginator);
        $this->view->headTitle($this->_getTranslator()->_('Акции'));
    }

    public function lastAction(){
        $articleModel = new Actions_Model_Action();
        
        $count = $this->_getParam('count', 2);
        
        $this->view->records = $articleModel->buildParams($articleModel->getDbTable()->getLastRecords($count), $this->_getLocale()->getLanguage(), true);
    }
    
    public function viewAction() {
        $articleModel = new Actions_Model_Action();

        $uri = $this->_getParam('uri');
//Zend_Debug::dump($uri);die;
        $article = $articleModel->getDbTable()->getRecordByUri($uri);
//Zend_Debug::dump($article);die;
        if ($article) {
            $article = $articleModel->buildParams($article, $this->_getLocale()->getLanguage());
            $articleModel->buildHead($article, $this->view);
//Zend_Debug::dump($article);die;
            $this->view->article = $article;
        } else {
            throw new Exception('Content not found');
        }
    }
	
	public function mainAction()
	{
		
		$this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        define('NO_DEBUG', true);
		$newsModel = new Actions_Model_Action();
		//$my =  array('title'=>'privet ot menya','text'=>'adasdasdas asdasd');
		//$my = '{title:"privet ot menya",text:"adasdasdas asdasd"}';
		//$my = '({"name":"Valik","age":"20","country":"Moldova"})';
		
		$my = $newsModel->getDbTable()->getLastRecords(2);
		 $my[0]->date = date('d.m.Y',$my[0]->date);
		 $my[1]->date = date('d.m.Y',$my[1]->date);
		//Zend_Debug::dump($my);
		echo "(".Zend_Json::encode($my).")";
		//die;
	}
	

}

