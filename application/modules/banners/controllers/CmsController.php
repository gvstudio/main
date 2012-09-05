<?php

class Banners_CmsController extends Rastor_Controller_Cms_ActionTable {

    protected $_modelClassName = 'Banners_Model_Banners';
    protected $_tableParams = array('id', 'name', 'enable');
    protected $_tableColumns = array('id', 'Название', 'Активность');
    protected $_tableColumnsWidth = array(40, 0, 100);

    public function addAction() {
        Core_View_Helper_CmsTitle::getTitle('Создать баннер');
        $form = new Banners_Form_CmsBanners();
        $form->removeElement('uri');

        $picture = new Core_Model_Pictures(array(
                    'type' => 'picture',
                    'crop' => false,
                    'callback' => 'function(){var a = $.parseJSON($("#preview").val()); $("#html").val(\'<img src="\' + a.picture + \'" alt="" />\');}'
                ));

        $this->view->json = $picture->getJSONObject();

        if (!$this->getRequest()->isPost()) {
            $this->view->form = $form;
        } else {
            if (!$form->isValid($_POST)) {
                $this->view->form = $form;
            } else {
                $formData = $form->getValues();

                unset($formData['preview']);

                if ($this->getModel()->getDbTable()->insert($formData)) {
                    $messager = new Rastor_Controller_Cms_Messager();
                    $messager->setAction('successfully_added');
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'banners', 'controller' => 'cms', 'action' => 'showlist')));
                }
            }
        }
    }

    public function editAction() {
        Core_View_Helper_CmsTitle::getTitle('Редактирование баннера');
        $id = $this->_getParam('id', 0);

        if ($data = $this->getModel()->getDbTable()->getRecord($id)) {
            $form = new Banners_Form_CmsBanners();
            $form->setValues($data);
            $form->getElement('submit')->setLabel('Изменить');

            $picture = new Core_Model_Pictures(array(
                        'type' => 'picture',
                        'crop' => false,
                        'callback' => 'function(){var a = $.parseJSON($("#preview").val()); $("#html").val(\'<img src="\' + a.picture + \'" alt="" />\');}'
                    ));

            $this->view->json = $picture->getJSONObject();

            if (!$this->getRequest()->isPost()) {
                $this->view->form = $form;
            } else {
                if (!$form->isValid($_POST)) {
                    $this->view->form = $form;
                } else {
                    $formData = $form->getValues();
                    unset($formData['preview']);

                    if ($this->getModel()->getDbTable()->update($formData, $id)) {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('successfully_changed');
                        Rastor_Callback::callback();
                    } else {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('not_changed');
                    }
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'banners', 'controller' => 'cms', 'action' => 'showlist')));
                }
            }
        } else {
            $messager = new Rastor_Controller_Cms_Messager();
            $messager->setAction('not_found');
            $this->_redirect(Rastor_Url::get('admin', array('module' => 'banners', 'controller' => 'cms', 'action' => 'showlist')));
        }
    }

}