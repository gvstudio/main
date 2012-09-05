<?php

class Gallery_IndexController extends Rastor_Controller_Action {
	protected $_itemsPerPage=12;
    public function indexAction() {
		$galleryModel = new Gallery_Model_Gallery();

		$page = $this->_getParam('page');
		$this->view->paginator = $galleryModel->getPaginator($page, $this->_itemsPerPage, $this->_pageRange, $this->_getLocale()->getLanguage());
		$this->view->headTitle($this->_getTranslator()->_('Галерея'));
    }

    public function viewAction() {
		$galleryModel = new Gallery_Model_GalleryPictures();

		$id = $this->_getParam('id');

		//$gallery = $galleryModel->getEnableRecord($id);

		//if ($gallery) {
			//$gallery = $galleryModel->buildParams($gallery, $this->_getLocale()->getLanguage());
			//$galleryModel->buildHead($gallery, $this->view);

			$page = $this->_getParam('page');
			$this->view->paginator = $galleryModel->getPaginator($page, $this->_itemsPerPage, $this->_pageRange, $this->_getLocale()->getLanguage(), array('id' => $id));

			$this->view->gallery = $gallery;
		/*} else {
			throw new Exception('Content not found');
		}*/
    }

}

