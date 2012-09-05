<?php

class Faq_CmsController extends Rastor_Controller_Cms_ActionTable {

    protected $_modelClassName = 'Faq_Model_Faq';
    protected $_tableParams = array('id', 'name_ru', 'enable');
    protected $_tableColumns = array('id', 'Вопрос', 'Активность');
    protected $_tableColumnsWidth = array(40, 0, 100);

    public function addAction() {
        Core_View_Helper_CmsTitle::getTitle('New faq');
        $form = new Faq_Form_CmsFaq();

      /*  $picture = new Core_Model_Pictures(array(
                    'type' => 'picture',
                    'width' => 200,
                    'height' => 140,
                    'fixedThumbSize' => true
                ));*/

        //$this->view->json = $picture->getJSONObject();

        if (!$this->getRequest()->isPost()) {
            $this->view->form = $form;
        } else {
            if (!$form->isValid($_POST)) {
                $this->view->form = $form;
            } else {
                $formData = $form->getValues();
				//Zend_Debug::dump($formData); die;
                //$preview = Zend_Json::decode($formData['preview']);
                //unset($formData['preview']);
				//Zend_Debug::dump($this->getModel()); die;
                if ($this->getModel()->getDbTable()->insert($formData)) {
                    $messager = new Rastor_Controller_Cms_Messager();
                    $messager->setAction('successfully_added');
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'faq', 'controller' => 'cms', 'action' => 'showlist')));
                }
            }
        }
    }

    public function editAction() {
        Core_View_Helper_CmsTitle::getTitle('Редактирование статьи');
        $id = $this->_getParam('id', 0);
		//Zend_Debug::dump($this->getModel()); die;
        if ($data = $this->getModel()->getDbTable()->getRecord($id)) {
            $form = new Faq_Form_CmsFaq();
            $form->setValues($data);
            $form->getElement('submit')->setLabel('Изменить');

          /*  $picture = new Core_Model_Pictures(array(
                        'type' => 'picture',
                        'width' => 200,
                        'height' => 140,
                        'fixedThumbSize' => true
                    ));

            $picture->setData(Zend_Json::encode(array(
                        'picture' => $data->picture,
                        'thumb' => $data->thumb
                    )));

            $this->view->json = $picture->getJSONObject();*/

            if (!$this->getRequest()->isPost()) {
                $this->view->form = $form;
            } else {
                if (!$form->isValid($_POST)) {
                    $this->view->form = $form;
                } else {
                    $formData = $form->getValues();
                    
                    $preview = Zend_Json::decode($formData['preview']);
                    unset($formData['preview']);

                    if ($this->getModel()->getDbTable()->update($formData, $id)) {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('successfully_changed');
                        Rastor_Callback::callback();
                    } else {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('not_changed');
                    }
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'faq', 'controller' => 'cms', 'action' => 'showlist')));
                }
            }
        } else {
            $messager = new Rastor_Controller_Cms_Messager();
            $messager->setAction('not_found');
            $this->_redirect(Rastor_Url::get('admin', array('module' => 'faq', 'controller' => 'cms', 'action' => 'showlist')));
        }
    }

}