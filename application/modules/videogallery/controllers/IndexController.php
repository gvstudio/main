<?php

class VideoGallery_IndexController extends Rastor_Controller_Action {

    public function indexAction() {
        $articlesModel = new VideoGallery_Model_VideoGallery();

        $page = $this->_getParam('page');
        $this->view->paginator = $articlesModel->getPaginator($page, $this->_itemsPerPage, $this->_pageRange, $this->_getLocale()->getLanguage());
		//Zend_Debug::dump($this->view->paginator);
        $this->view->headTitle($this->_getTranslator()->_('Статьи'));
    }

    public function lastAction(){
        $articleModel = new VideoGallery_Model_VideoGallery();
        
        $count = $this->_getParam('count', 2);
        
        $this->view->records = $articleModel->buildParams($articleModel->getDbTable()->getLastRecords($count), $this->_getLocale()->getLanguage(), true);
    }
    
    public function viewAction() {
        $articleModel = new VideoGallery_Model_VideoGallery();

        $uri = $this->_getParam('uri');

        $article = $articleModel->getDbTable()->getRecordByUri($uri);

        if ($article) {
            $article = $articleModel->buildParams($article, $this->_getLocale()->getLanguage());
            $articleModel->buildHead($article, $this->view);

            $this->view->article = $article;
        } else {
            throw new Exception('Content not found');
        }
    }
	public function benefitsAction()
	{
		$id = $this->_getParam('idnews');
		
	}

}

