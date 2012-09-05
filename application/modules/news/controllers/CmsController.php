<?php

class News_CmsController extends Rastor_Controller_Cms_ActionTableMail {

    protected $_modelClassName = 'News_Model_News';
    protected $_tableParams = array('id', 'name', 'enable');
    protected $_tableColumns = array('id', 'Название', 'Активность');
    protected $_tableColumnsWidth = array(40, 0, 100);

    public function addAction() {
        Core_View_Helper_CmsTitle::getTitle('Новая новость');
        $form = new News_Form_AddCmsNews();
       // $form->removeElement('uri');
        $picture = new Core_Model_Pictures(array(
                    'type' => 'picture',
                    'width' => 187,
                    'height' => 187,
                    'fixedThumbSize' => true
                ));

        $this->view->json = $picture->getJSONObject();

        if (!$this->getRequest()->isPost()) {
            $this->view->form = $form;
        } else {
            if (!$form->isValid($_POST)) {
                $this->view->form = $form;
            } else {
                $formData = $form->getValues();
		$mailer = $formData['mailer'];		
                $preview = Zend_Json::decode($formData['preview']);
                unset($formData['preview']);
		unset($formData['mailer']);
		 $formData['date'] =  strtotime($formData['date']);
                if ($this->getModel()->getDbTable()->insert($formData + $preview + array('date' => time()))) {
		    
			
		   if($mailer == 1){
			$last=$this->getModel()->getDbTable()->getLastRecords(1);			
			$this->sendMail($formData['name_ru'],$formData['smallcontent_ru'],$last->id);			
		    }
                    $messager = new Rastor_Controller_Cms_Messager();
                    $messager->setAction('successfully_added');
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'news', 'controller' => 'cms', 'action' => 'showlist')));
                }
            }
        }
    }

    public function editAction() {
        Core_View_Helper_CmsTitle::getTitle('Редактирование новости');
        $id = $this->_getParam('id', 0);

        if ($data = $this->getModel()->getDbTable()->getRecord($id)) {
            $form = new News_Form_CmsNews();
	    //unset($form->mailer);
	    //Zend_Debug::dump($data);die;
	    $data->date=date('d.m.Y',$data->date);
            $form->setValues($data);
            $form->getElement('submit')->setLabel('Изменить');

            $picture = new Core_Model_Pictures(array(
                        'type' => 'picture',
                        'width' => 133,
                        'height' => 133,
                        'fixedThumbSize' => true
                    ));

            $picture->setData(Zend_Json::encode(array(
                        'picture' => $data->picture,
                        'thumb' => $data->thumb
                    )));

            $this->view->json = $picture->getJSONObject();

            if (!$this->getRequest()->isPost()) {
                $this->view->form = $form;
            } else {
                if (!$form->isValid($_POST)) {
                    $this->view->form = $form;
                } else {
                    $formData = $form->getValues();
		    
		    $formData['date'] =  strtotime($formData['date']);
                    $preview = Zend_Json::decode($formData['preview']);
                    unset($formData['preview']);
		    unset($formData['mailer']);
		    if(empty($preview)){
			$preview['picture']="";
			$preview['thumb']="";
		    }
		   // Zend_Debug::dump($formData);die;
                    if ($this->getModel()->getDbTable()->update($formData + $preview, $id)) {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('successfully_changed');
                        Rastor_Callback::callback();
                    } else {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('not_changed');
                    }
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'news', 'controller' => 'cms', 'action' => 'showlist')));
                }
            }
        } else {
            $messager = new Rastor_Controller_Cms_Messager();
            $messager->setAction('not_found');
            $this->_redirect(Rastor_Url::get('admin', array('module' => 'news', 'controller' => 'cms', 'action' => 'showlist')));
        }
    }
    
}
