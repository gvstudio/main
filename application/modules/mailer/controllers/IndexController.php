<?php

class Mailer_IndexController extends Rastor_Controller_Action{
	
	public function indexAction(){
		$mailModel = new Mailer_Model_Mailer();		
		$form = new Mailer_Form_Mailer();		
		$this->view->form=$form;
		//$this->view->views="sdasd";
				
	 if (!$this->getRequest()->isPost()) {
		
	            $this->view->form = $form;
		
        } else {
		if (!$form->isValid($_POST)) {
        	        $this->view->form = $form;
			
			
        	}
		else {
			if(!$formData = $form->refuse->getValue()){
				$formData = $form->getValues();
				$get = $mailModel->getDbTable()->getEmail($formData['email']);
				if(is_object($get)) $this->view->views="Ваш e-mail находится в БД";
				else{
			 		$mid = md5($formData['email'].date('H-i-s'));
					$data = array('email'=>$formData['email'], 'mid'=>$mid);
					$mailModel->getDbTable()->insertNewEmail($data);
				
					$greet = $mailModel->getDbTable()->getConfirmText();
				
					$mail = new Zend_Mail('utf-8');
					$text = $greet->greeting."<br/>\nДля подтверждения пройдите по этой <a href='457.org.ua/mailer/".$mid."'>ссылке</a>";
					$mail->setBodyHtml($text);
					$mail->setSubject('Сообщение с сайта');
					$mail->addTo($formData['email']);
					$mail->send();
					header('location: /mailer/conf');
				
				}
			}
			else{
				$formData = $form->getValues();
				//echo $this->view->views="elssssssss";die;
				$get = $mailModel->getDbTable()->getMid($formData['email']);
				if(is_object($get)){
					$mail = new Zend_Mail('utf-8');
					$text = "Чтоб отписатся пройдите по этой <a href='457.org.ua/mailer/refuse/".$get->mid."'>ссылке</a>";
					$mail->setBodyHtml($text);
					$mail->setSubject('Сообщение с сайта');
					$mail->addTo($formData['email']);
					$mail->send();
					header('location: /mailer/ref');
					$this->view->views="на указанный e-mail было выслано сообщение, для подтверждении отписки";
				}
				else{
					$this->view->views="на указанный e-mail было выслано сообщение, для подтверждении отписки";
				}
			}
			//header('location: /mailer');
			//$this->_redirect(Rastor_Url::get(array('module' => 'mailer', 'controller' => 'index', 'action' => 'index')));
		}
	}	
  }
	public function formAction(){
				$form = new Mailer_Form_Mailer();		
				$this->view->form=$form;
			}
	public function confirmAction(){
		$mailModel = new Mailer_Model_Mailer();	
		$mid = $this->_getParam('mid');
		if($mailModel->getDbTable()->enableEmail($mid))
		{
			echo "Вы удачно подтвердили";
			$confirm = $mailModel->getDbTable()->getConfirmText();
			$email=$mailModel->getDbTable()->getEmailByMid($mid);
			$mail = new Zend_Mail('utf-8');
			$text = $confirm->confirmation."<br/>\nЧтоб отписатся пройдите по этой <a href='457.org.ua/mailer/refuse/".$mid."'>ссылке</a>";
			$mail->setBodyHtml($text);
			$mail->setSubject('Сообщение с сайта');
			$mail->addTo($email->email);
			$mail->send();
		}
	}
	public function refuseAction(){
		$mailModel = new Mailer_Model_Mailer();	
		$mid = $this->_getParam('mid');
		if($mailModel->getDbTable()->disableEmail($mid))
		{
			$this->view->views = "Вы отписались";
			/*$refuse = $mailModel->getDbTable()->getRefuseText();
			$email=$mailModel->getDbTable()->getEmailByMid($mid);
			$mail = new Zend_Mail('utf-8');
			$text = $refuse->refused;
			$mail->setBodyHtml($text);
			$mail->setSubject('Сообщение с сайта');
			$mail->addTo($email->email);
			$mail->send();*/
		}
	}	
	public function confAction(){
	}	
	public function refAction(){
	}
}
