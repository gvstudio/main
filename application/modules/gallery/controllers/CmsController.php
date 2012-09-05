<?php

class Gallery_CmsController extends Rastor_Controller_Cms_ActionTable {

    protected $_modelClassName = 'Gallery_Model_Gallery';
    protected $_tableParams = array('id', 'name', 'enable');
    protected $_tableColumns = array('id', 'Название', 'Активность');
    protected $_tableColumnsWidth = array(40, 0, 100);

    public function addAction() {
	Core_View_Helper_CmsTitle::getTitle('Новая статья');
	$form = new Gallery_Form_CmsGallery();

	$picture = new Core_Model_Pictures(array(
		    'type' => 'picture',
		    'previewWidth' => 197,
		    'previewHeight' => 197,
		    'fixedThumbSize' => true
		));

	$this->view->preview = $picture->getJSONObject();

	$gallery = new Core_Model_Pictures(array(
		    'type' => 'gallery',
		    'previewWidth' => 197,
		    'previewHeight' => 197,
		    'fixedThumbSize' => true,
		    'postData' => array(
			'name_en' => 'Название (ru)'		
		    ),
		    'showDataKey' => 'name_en'
		));

	$this->view->gallery = $gallery->getJSONObject();

	if (!$this->getRequest()->isPost()) {
	    $this->view->form = $form;
	} else {
	    if (!$form->isValid($_POST)) {
		$this->view->form = $form;
	    } else {
		$formData = $form->getValues();

		$preview = Zend_Json::decode($formData['preview']);
		unset($formData['preview']);
		$gallery = Zend_Json::decode($formData['gallery']);
		unset($formData['gallery']);

		if ($id = $this->getModel()->getDbTable()->insert($formData + $preview + array('date' => time()))) {
		    $galleryPicturesModel = new Gallery_Model_DbTable_GalleryPictures();
		    $galleryPicturesModel->insertRecords($gallery, $id, 'gallery_id');

		    $messager = new Rastor_Controller_Cms_Messager();
		    $messager->setAction('successfully_added');
		    $this->_redirect(Rastor_Url::get('admin', array('module' => 'gallery', 'controller' => 'cms', 'action' => 'showlist')));
		}
	    }
	}
    }

    public function editAction() {
	Core_View_Helper_CmsTitle::getTitle('Редактирование статьи');
	$id = $this->_getParam('id', 0);

	$galleryPicturesModel = new Gallery_Model_DbTable_GalleryPictures();

	if ($data = $this->getModel()->getDbTable()->getRecord($id)) {
	    $form = new Gallery_Form_CmsGallery();
	    $form->setValues($data);
	    $form->getElement('submit')->setLabel('Изменить');

	    $picture = new Core_Model_Pictures(array(
			'type' => 'picture',
			'previewWidth' => 197,
			'previewHeight' => 197,
			'fixedThumbSize' => true
		    ));

	    $picture->setData(Zend_Json::encode(array(
			'picture' => $data->picture,
			'thumb' => $data->thumb
		    )));

	    $this->view->preview = $picture->getJSONObject();

	    $gallery = new Core_Model_Pictures(array(
			'type' => 'gallery',
			'previewWidth' => 197,
			'previewHeight' => 197,
			'fixedThumbSize' => true,
			'postData' => array(
			    'name_en' => 'Название (ru)',			  
			),
			'showDataKey' => 'name_en'
		    ));

	    $gallery->setData(Zend_Json::encode($galleryPicturesModel->getOwnerRecords($id, 'gallery_id')));

	    $this->view->gallery = $gallery->getJSONObject();

	    if (!$this->getRequest()->isPost()) {
		$this->view->form = $form;
	    } else {
		if (!$form->isValid($_POST)) {
		    $this->view->form = $form;
		} else {
		    $formData = $form->getValues();

		    $preview = Zend_Json::decode($formData['preview']);
		    unset($formData['preview']);
		    $gallery = Zend_Json::decode($formData['gallery']);
		    unset($formData['gallery']);

		    if ($this->getModel()->getDbTable()->update($formData + $preview, $id) | $galleryPicturesModel->updateRecords($gallery, $id, 'gallery_id')) {
			$messager = new Rastor_Controller_Cms_Messager();
			$messager->setAction('successfully_changed');
			Rastor_Callback::callback();
		    } else {
			$messager = new Rastor_Controller_Cms_Messager();
			$messager->setAction('not_changed');
		    }
		    $this->_redirect(Rastor_Url::get('admin', array('module' => 'gallery', 'controller' => 'cms', 'action' => 'showlist')));
		}
	    }
	} else {
	    $messager = new Rastor_Controller_Cms_Messager();
	    $messager->setAction('not_found');
	    $this->_redirect(Rastor_Url::get('admin', array('module' => 'gallery', 'controller' => 'cms', 'action' => 'showlist')));
	}
    }

}
