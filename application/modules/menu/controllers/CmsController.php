<?php

class Menu_CmsController extends Rastor_Controller_Cms_Action {

    protected $_modelClassName = 'Menu_Model_MenuItem';
	protected $_tableTranslations = array(
        'removeOne' => 'Удалить запись?',
        'removeOneConfirm' => 'Вы действительно хотите удалить запись?',
        'removeMany' => 'Удалить записи?',
        'removeManyConfirm' => 'Вы действительно хотите удалить выбраные записи?',
        'removeChecked' => 'Удалить отмеченные',
        'reload' => 'Обновить',
        'saveChanges' => 'Сохранить изменения',
        'viewTitle' => 'Смотреть',
        'editTitle' => 'Редактировать',
        'sortTitle' => 'Сортировать',
        'backToSort' => 'Вернуться к сортировке',
        'removeTitle' => 'Удалить',
        'buttonYes' => 'Да',
        'buttonNo' => 'Нет'
    );
    public function addAction() {

        Core_View_Helper_CmsTitle::getTitle('Новый пункт меню');
        $id = $this->_getParam('id');
		
        $form = new Menu_Form_CmsMenuItem();

        if (!$this->getRequest()->isPost()) {
            $this->view->form = $form;
        } else {
            if (!$form->isValid($_POST)) {
                $this->view->form = $form;
            } else {
                $formData = $form->getValues();

                $formData['sort'] = $this->getModel()->getDbTable()->getNextSortValue();

                if ($this->getModel()->getDbTable()->insert(array_merge($formData, $this->getModel()->getInsertParams($formData['href'], $formData['url'])))) {
                    $messager = new Rastor_Controller_Cms_Messager();
                    $messager->setAction('successfully_added');
                    $this->getModel()->rebuildMenuItems();
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'show')));
                }
            }
        }
    }
	
	public function addnewmenuAction(){
		 Core_View_Helper_CmsTitle::getTitle('Новое меню');
		  $id = $this->_getParam('id');
		$form = new Menu_Form_CmsNewMenu();
		
		if (!$this->getRequest()->isPost()) {
            $this->view->form = $form;
        } else {
        	 $formData = $form->getValues();
			 
			if (!$form->isValid($_POST)) {
				
                $this->view->form = $form;
            } else {
            	
            	//$this->getModel()->changeTable();
            	$var = $this->getModel()->getDbTable();
				$var->changeTable();
				$var->insert(array('name'=>$_POST['name']));
				//Zend_Debug::dump($_POST);
			}
		}
		
	}
	

    public function editAction() {
        Core_View_Helper_CmsTitle::getTitle('Редактирование пункта меню');
       	$id = $this->_getParam('id');		
        if ($data = $this->getModel()->getDbTable()->getRecord($id)) {
            $form = new Menu_Form_CmsMenuItem();
            $form->getElement('submit')->setLabel('Сохранить');
            $form->setValues($data);

            if (!$this->getRequest()->isPost()) {
                $this->view->form = $form;
            } else {
                if (!$form->isValid($_POST)) {
                    $this->view->form = $form;
                } else {
                    $formData = $form->getValues();
                    
                    if ($this->getModel()->getDbTable()->update(array_merge($formData, $this->getModel()->getInsertParams($formData['href'], $formData['url'])), $id)) {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('successfully_changed');
                        $this->getModel()->rebuildMenuItems();
                    } else {
                        $messager = new Rastor_Controller_Cms_Messager();
                        $messager->setAction('not_changed');
                    }
                    $this->_redirect(Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'show')));
                }
            }
        } else {
            $messager = new Rastor_Controller_Cms_Messager();
            $messager->setAction('not_found');
            $this->_redirect(Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'show')));
        }
    }

    public function showAction() {
        Core_View_Helper_CmsTitle::getTitle();

        $tree = new Core_Model_Tree(array(
                    'saveUrl' => Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'save')),
                    'reloadUrl' => Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'treedata')),
                    'removeUrl' => Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'remove')),
                    'editUrl' => substr(Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'edit', 'id' => '0')), 0, -1),
                    'addUrl' => Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'add'))
                ));
				//$this->view->json = 
			//	$tree = $tree->getJSONObject();
				//Zend_Json::encode($tree);
				//Zend_Debug::dump($tree); die;
		$result = array(
            'sortable' => FALSE,
            'orderEnabled' => TRUE,
            'buttons' => array('edit','remove'),
            'columns' => array('id','Название'),
            'colWidth' => array(40,0,100),            
            'msgShowTime' => 3000,
            'startMsg' => array('msg'=>'','type'=>''),
            'reloadUrl' => '/admin/menu/cms/my',
            'requestParams' => array(),
            'translation' => $this->_tableTranslations,
            'removeUrl' => '/admin/menu/cms/removemenu'
        );
		//Zend_Debug::dump($result);die;
		$obj = Zend_Json::encode($result);
		//Zend_Debug::dump($obj);die;
		Rastor_View_Helper_RastorTable::setTableObject($obj);
		//echo $this->getModel();
      //  $this->view->json = $tree->getJSONObject();
       //$obj = $tree->getJSONObject();
		//Rastor_View_Helper_RastorTable::setTableObject($obj);
		//Zend_Debug::dump($this->view->json); die;
    }

    public function saveAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $menuItemModel = new Menu_Model_MenuItem();
        $data = $this->_getParam('data');

        $sort = 1;
        foreach ($data as $value) {
            if ($value['depth'] >= 0) {
                if ($value['parent_id'] == 'none') {
                    $updateData = array(
                        'id' => $value['item_id'],
                        'parent_id' => 0,
                        'depth' => $value['depth'],
                        'sort' => $sort
                    );
                } else {
                    $updateData = array(
                        'id' => $value['item_id'],
                        'parent_id' => $value['parent_id'],
                        'depth' => $value['depth'],
                        'sort' => $sort
                    );
                }
                $sort++;

                $menuItemModel->getDbTable()->update($updateData, $value['item_id']);
            }
        }
    }

    public function treedataAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
		$id = $this->_getParam('id');
		//Zend_Debug::dump($id); die;
        $menuItemModel = new Menu_Model_MenuItem();
        echo $menuItemModel->getJSONMenuList($id);
    }
	
	public function removeAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $id = $this->_getParam('id');

        $messager = new Rastor_Controller_Cms_Messager();
        $this->getModel()->getDbTable()->recursiveDelete($id, true);
        echo $messager->getJSONMessage('successfully_deleted', array());
    }

    public function removemenuAction() {
        $this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);

        $id = $this->_getParam('ids');

        $messager = new Rastor_Controller_Cms_Messager();
		
        $datamodel = $this->getModel()->getDbTable();
		$datamodel->changeTable();
		$datamodel->deleteFromMenu($id);
       // recursiveDelete($id, true);
        echo $messager->getJSONMessage('successfully_deleted', array());
    }
	
	public function myAction()
	{
		$this->_helper->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
        define('NO_DEBUG', true);
		//Zend_Debug::dump($this->getModel());
		$var = $this->getModel()->getDbTable();
		$var->changeTable();
		echo $var->getTableData(array('id','name'),array('page'=>1,'order'=>-1,'orderDirection'=>0,'sort'=>0,'rebuildParams'=>TRUE,'removeParams'=>TRUE,'pageRange'=>2	),array());
		//Zend_Debug::dump($var);
		//$var->insert(array('name'=>$_POST['name']));
		//echo "hellosdsd";
	}	
	
	public function editmenuAction(){
		$form = new Menu_Form_CmsMenuEdit();
		$this->view->form = $form;
		
		
		Core_View_Helper_CmsTitle::getTitle();
		$id = $this->_getParam('id');
		//Zend_Debug::dump($id);
        $tree = new Core_Model_Tree(array(
                    'saveUrl' => Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'save')),
                    'reloadUrl' => Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'treedata', 'id'=>$id)),
                    'removeUrl' => Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'remove')),
                    'editUrl' => substr(Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'edit', 'id' => '0')), 0, -1),
                    'addUrl' => Rastor_Url::get('admin', array('module' => 'menu', 'controller' => 'cms', 'action' => 'add'))
                ));
		$tree->reloadUrl="/menu_id/".$id;
		//Zend_Debug::dump($tree);
        $this->view->json = $tree->getJSONObject();
	}
}