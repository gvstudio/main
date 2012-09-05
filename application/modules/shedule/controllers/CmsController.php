<?php

class Shedule_CmsController extends Rastor_Controller_Cms_ActionTable {

    protected $_modelClassName = 'Shedule_Model_Shedule';
    protected $_tableParams = array('id', 'name');
    protected $_tableColumns = array('id', 'Название');
    protected $_tableColumnsWidth = array(40, 0);

    public function addAction() {
        Core_View_Helper_CmsTitle::getTitle('Новый материал');
        $form = new Content_Form_CmsContent();
        
        if (!$this->getRequest()->isPost()) {
            $this->view->form = $form;
        } else {
            if (!$form->isValid($_POST)) {
                $this->view->form = $form;
            } else {
                $formData = $form->getValues();

                if ($this->getModel()->getDbTable()->insert($formData)) {
                    $messager = new Rastor_Controller_Cms_Messager();
                    $messager->setAction('successfully_added');
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'shedule', 'controller' => 'cms', 'action' => 'showlist')));
                }
            }
        }
    }

    public function editAction() {
        Core_View_Helper_CmsTitle::getTitle('Редактирование материала');
        $id = $this->_getParam('id', 0);

        if ($data = $this->getModel()->getDbTable()->getRecord($id)) {
            $form = new Content_Form_CmsContent();
            $form->setValues($data);
            $form->getElement('submit')->setLabel('Изменить');

            if (!$this->getRequest()->isPost()) {
                $this->view->form = $form;
            } else {
                if (!$form->isValid($_POST)) {
                    $this->view->form = $form;
                } else {
                    $formData = $form->getValues();
                    
                    if ($this->getModel()->getDbTable()->update($formData, $id)) {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('successfully_changed');
                        Rastor_Callback::callback();
                    } else {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('not_changed');
                    }
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'shedule', 'controller' => 'cms', 'action' => 'showlist')));
                }
            }
        } else {
            $messager = new Rastor_Controller_Cms_Messager();
            $messager->setAction('not_found');
            $this->_redirect(Rastor_Url::get('admin', array('module' => 'shedule', 'controller' => 'cms', 'action' => 'showlist')));
        }
    }
	
	public function editfilialAction() {
        Core_View_Helper_CmsTitle::getTitle('Редактирование материала');
        $id = $this->_getParam('id', 0);
		//$data = $this->getModel()->getDbTable();
		//$data->filialDb();
        if ($data=$this->getModel()->getDbTable()->getFilial($id)) {
            $form = new Shedule_Form_CmsEditFilial();
			//Zend_Debug::dump($data);
            $form->setValues($data);
            $form->getElement('submit')->setLabel('Изменить');

            if (!$this->getRequest()->isPost()) {
                $this->view->form = $form;
            } else {
                if (!$form->isValid($_POST)) {
                    $this->view->form = $form;
                } else {
                    $formData = $form->getValues();
                    
                    if ($this->getModel()->getDbTable()->update($formData, $id)) {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('successfully_changed');
                        Rastor_Callback::callback();
                    } else {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('not_changed');
                    }
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'shedule', 'controller' => 'cms', 'action' => 'showlist')));
                }
            }
        } else {
            $messager = new Rastor_Controller_Cms_Messager();
            $messager->setAction('not_found');
            $this->_redirect(Rastor_Url::get('admin', array('module' => 'shedule', 'controller' => 'cms', 'action' => 'showlist')));
        }
    }
	
	
	public function filialAction()
	{
		Core_View_Helper_CmsTitle::getTitle('Добавить филиал');
		
		 $form = new Shedule_Form_CmsShedule();
        
        if (!$this->getRequest()->isPost()) {
            $this->view->form = $form;
        } else {
            if (!$form->isValid($_POST)) {
                $this->view->form = $form;
            } else {
                $formData = $form->getValues();
				$dbObj = $this->getModel()->getDbTable();
				Zend_Debug::dump($dbObj);
				$dbObj->filialDb();
                if ($dbObj->insert($formData)) {
                    $messager = new Rastor_Controller_Cms_Messager();
                    $messager->setAction('successfully_added');
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'shedule', 'controller' => 'cms', 'action' => 'showlist')));
                }
            }
        }
	}
	
	public function addsheduleAction()
	{
		Core_View_Helper_CmsTitle::getTitle('Добавить расписание');
		
		 $form = new Shedule_Form_CmsAddShedule();
        
        if (!$this->getRequest()->isPost()) {
            $this->view->form = $form;
        } else {
            if (!$form->isValid($_POST)) {
                $this->view->form = $form;
            } else {
                $formData = $form->getValues();
				$dbObj = $this->getModel()->getDbTable();
				//Zend_Debug::dump($dbObj);
				$dbObj->shedulesDb();
                if ($dbObj->insert($formData)) {
                    $messager = new Rastor_Controller_Cms_Messager();
                    $messager->setAction('successfully_added');
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'shedule', 'controller' => 'cms', 'action' => 'showlistshedules')));
                }
            }
        }
	}
	public function showlistshedulesAction() {
		//die;
		$this->getModel()->getDbTable()->shedulesDb();
		//$model->
        Core_View_Helper_CmsTitle::getTitle();

        $object = $this->_getJSONTableObjectDForEditShedule();
        Rastor_View_Helper_RastorTable::setTableObject($object);
    }
	
	public function editshedulerAction()
	{
		Core_View_Helper_CmsTitle::getTitle('Редактирование материала');
        $id = $this->_getParam('id', 0);
		//$data = $this->getModel()->getDbTable();
		//$data->filialDb();
        if ($data=$this->getModel()->getDbTable()->getShedule($id)) {
            $form = new Shedule_Form_CmsAddShedule();
			//Zend_Debug::dump($data);
            $form->setValues($data);
            $form->getElement('submit')->setLabel('Изменить');

            if (!$this->getRequest()->isPost()) {
                $this->view->form = $form;
            } else {
                if (!$form->isValid($_POST)) {
                    $this->view->form = $form;
                } else {
                    $formData = $form->getValues();
                    $modelDb = $this->getModel()->getDbTable();
					$modelDb->shedulesDb();
                    if ($modelDb->update($formData, $id)) {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('successfully_changed');
                        Rastor_Callback::callback();
                    } else {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('not_changed');
                    }
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'shedule', 'controller' => 'cms', 'action' => 'showlistshedules')));
                }
            }
        } else {
            $messager = new Rastor_Controller_Cms_Messager();
            $messager->setAction('not_found');
            $this->_redirect(Rastor_Url::get('admin', array('module' => 'shedule', 'controller' => 'cms', 'action' => 'showlist')));
        }
	}
	
	protected function _getJSONTableObjectDForEditShedule() {
        $this->getTableTranslations();
        $this->getTableColumns();

        $messager = new Rastor_Controller_Cms_Messager();
        $message = $messager->getAsArray();

        $result = array(
            //'sortable' => $this->_tableSortable,
            //'orderEnabled' => $this->_tableOrderEnabled,
            'buttons' => $this->_tableButtons,
            'columns' => $this->_tableColumns,
            'colWidth' => $this->_tableColumnsWidth,
            'colWidth' => $this->_tableColumnsWidth,
            'msgShowTime' => $this->_tableMessageShowTime,
            'startMsg' => $message,
            'reloadUrl' => '/admin/shedule/cms/shedulelist',
            'requestParams' => $this->_tableRequestParams,
            'translation' => $this->_tableTranslations
        );
		//
        if (in_array('remove', $this->_tableButtons)) {
            $result['removeUrl'] = $this->_getTableRemoveUrl();
        }

        if ($this->_tableSortable) {
            $result['sortUrl'] = $this->_getTableSortUrl();
        }
		//Zend_Debug::dump($result);
        return Zend_Json::encode($result);
    }

	public function shedulelistAction()
	{
		$this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        define('NO_DEBUG', true);

        $tableOptions = array(
            'page' => $this->_getParam('page', 1),
            'order' => $this->_getParam('order', -1),
            'orderDirection' => $this->_getParam('orderdirection', 0),
            'sort' => $this->_getParam('sort', 0)
        );

        $this->_tableRequestParams = $this->_getParam('requestparams', array());
		
		$tableModel = $this->getModel();//->getDbTable();
		$tableModel->getDbTable()->shedulesDb();
		$data = $tableModel->getTableData($this->_tableParams, array_merge($tableOptions, $this->_tableOptions), $this->_tableRequestParams);
		//Zend_Debug::dump($data);
		$data=preg_replace("/editfilial/", "editsheduler", $data);
		//Zend_Debug::dump($data);
        echo $data;//$tableModel->getTableData($this->_tableParams, array_merge($tableOptions, $this->_tableOptions), $this->_tableRequestParams);       
	}

}