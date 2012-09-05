<?php
class Mailer_Form_Mailer extends Rastor_Form {

    public function __construct(Array $data = array()) {
    	  parent::__construct();
		   $this->setAction('')
                ->setMethod('post');

       
		
		$email = $this->createElement('text', 'email');
        $email->setAttrib('class', 'mail')
			  ->setAttrib('placeholder', 'Введите e-mail')
			  ->setRequired(FALSE);;
	
		 $this->addElements(array(   
            $email
        ));		
		
		
		$submit = $this->createElement('submit', 'submit', array('disableLoadDefaultDecorators' => true, 'required' => false, 'label' => 'Подписаться'));
		$ref = $this->createElement('submit', 'refuse', array('disableLoadDefaultDecorators' => true, 'required' => false, 'label' => 'Отписаться'));
        	$ref->addDecorator('viewHelper')                
                ->setAttrib('class', 'button')
                ->addDecorator('htmlTag', array('tag' => 'dd'));
	$submit->addDecorator('viewHelper')                
                ->setAttrib('class', 'button')
                ->addDecorator('htmlTag', array('tag' => 'dd'));
		 $this->addElement($submit);
		 $this->addElement($ref);
   }
}
