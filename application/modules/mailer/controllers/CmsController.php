<?php

class Mailer_CmsController extends Rastor_Controller_Cms_ActionTableMail{

    protected $_modelClassName = 'Mailer_Model_Mailer';
    protected $_tableParams = array('id', 'email', 'enable');
    protected $_tableColumns = array('id', 'e-mail', 'Активность');
    protected $_tableColumnsWidth = array(40, 0, 100);
	
	/*public function showlistAction()
	{
		
	}*/
	
	public function editmessagesAction()
	{
		Core_View_Helper_CmsTitle::getTitle('Редактирование cообщений');
		$form = new Mailer_Form_CmsText();
		$this->view->form = $form;
		$data = $this->getModel()->getDbTable();
		$data->changeDbtoMassage();
		if ($values=$data->getRecords())
		{
			$form->setValues($values[0]);
			if (!$this->getRequest()->isPost()) {
                		$this->view->form = $form;
            		} else {
                		if (!$form->isValid($_POST)) {
                    			$this->view->form = $form;
                		} else {
						$formData = $form->getValues();
						if ($this->getModel()->getDbTable()->update($formData, 1)) {
                        				$messager = new Rastor_Controller_Cms_Messager();
                        				$messager->setAction('successfully_changed');
                       					Rastor_Callback::callback();
                    				} else {
                        				$messager = new Rastor_Controller_Cms_Messager();
                        				$messager->setAction('not_changed');
                    				}
                    					//$this->_redirect(Rastor_Url::get('admin', array('module' => 'mailer', 'controller' => 'cms', 'action' => 'showlist')));
							  
					}
			}
		}
		
		
	}
	
	public function editAction()
	{
		Core_View_Helper_CmsTitle::getTitle('Редактирование контакт');
		$id = $this->_getParam('id', 0);
		 if ($data = $this->getModel()->getDbTable()->getRecord($id)) {
			$form = new Mailer_Form_CmsMailer();
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
                    					$this->_redirect(Rastor_Url::get('admin', array('module' => 'mailer', 'controller' => 'cms', 'action' => 'showlist')));
						}	       
					}
		 }
	}
}
