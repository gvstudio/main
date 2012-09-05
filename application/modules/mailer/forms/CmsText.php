<?php
class Mailer_Form_CmsText extends Rastor_Form {

    public function __construct(Array $data = array()) {
    	   parent::__construct();
		   $this->setAction('')
                ->setMethod('post');

       
	$info = array();	
	$greeting = $this->createElement('textarea', 'greeting',array('label'=>'Greeting'));			  
	      $greeting->setRequired(true)
			->setAttrib('class', 'wyswisg');

	$confirmation = $this->createElement('textarea', 'confirmation',array('label'=>'confirmation'));			  
	      $confirmation->setRequired(true)
				->setAttrib('class', 'wyswisg');
	$refused = $this->createElement('textarea', 'refused',array('label'=>'refused'));			  
	      $refused->setRequired(true)
				->setAttrib('class', 'wyswisg');

	
	


	$this->addElements(array(   
            $greeting,
	    $refused,
	   $confirmation
        ));		
	$this->addDisplayGroup(array_merge($info, array('greeting', 'confirmation', 'refused','my')), 'info')                
                ->setDisplayGroupDecorators(array('FormElements', 'fieldset'));
		
		$submit = $this->createElement('submit', 'submit', array('disableLoadDefaultDecorators' => true, 'required' => true, 'label' => 'Редактировать'));
        $submit->addDecorator('viewHelper')                
                ->setAttrib('class', 'button')
                ->addDecorator('htmlTag', array('tag' => 'dd'));
		 $this->addElement($submit);
   }
}
