<?php
abstract class Rastor_Controller_Cms_ActionTableMail extends Rastor_Controller_Cms_ActionTable
{
	public function sendMail($title,$text,$id)
	{	
		
		$data = $this;
		$mailModel = new Mailer_Model_Mailer();
		$mails = $mailModel->getDbTable()->getActiveMail();
		$count = count($mails);
		
		for($i=0;$i<$count;$i++)
		{
			$mail = new Zend_Mail('utf-8');
			$mail->setSubject('Сообщение с сайта');
			
			$text_m = $title."<br />".$text."<br/>\nЧтоб отписатся пройдите по этой <a href='457.org.ua/mailer/refuse/".$mails[$i]->mid."'>ссылке</a>";
			
			$mail->setBodyHtml($text_m);
			$mail->addTo($mails[$i]->email);
			$mail->send();
			unset($mail);
			unset($text_m);					
			//
		}

	}
}
