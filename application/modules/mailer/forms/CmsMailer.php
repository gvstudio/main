<?php
class Mailer_Form_CmsMailer extends Rastor_Form {

    public function __construct(Array $data = array()) {
    	  parent::__construct();
		   $this->setAction('')
                ->setMethod('post');

       
		
	$email = $this->createElement('text', 'email',array('label'=>'e-mail'));
        $email->setAttrib('class', 'big')			  
	      ->setRequired(FALSE);

	$enable = $this->createElement('checkbox', 'enable',array('label'=>'активность'));
        $enable->setRequired(FALSE);
	
	$this->addElements(array(   
            $email,
	   $enable
        ));		
		
		
		$submit = $this->createElement('submit', 'submit', array('disableLoadDefaultDecorators' => true, 'required' => true, 'label' => 'Подписаться'));
        $submit->addDecorator('viewHelper')                
                ->setAttrib('class', 'button')
                ->addDecorator('htmlTag', array('tag' => 'dd'));
		 $this->addElement($submit);
   }
}
