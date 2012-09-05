<?php
class Mailer_Form_CmsChange extends Rastor_Form {

    public function __construct(Array $data = array()) {
    	  parent::__construct();
		   $this->setAction('')
                ->setMethod('post');

       
	$info = array();	
	$greeting = $this->createElement('textarea', 'greeting',array('label'=>'Greeting'));			  
	      $greeting->setRequired(true);
	$confirmation = $this->createElement('textarea', 'confirmation',array('label'=>'confirmation'));			  
	      $confirmation->setRequired(true);
	$refused = $this->createElement('textarea', 'refused',array('label'=>'refused'));			  
	      $confirmation->setRequired(true);

	$enable = $this->createElement('checkbox', 'enable',array('label'=>'активность'));
        $enable->setRequired(FALSE);
	
	$this->addElements(array(   
            $greeting,
	    $refused,
	   $confirmation
        ));		
	$this->addDisplayGroup(array_merge($info, array('greeting', 'confirmation', 'refused')), 'info')                
                ->setDisplayGroupDecorators(array('FormElements', 'fieldset'));
		
		$submit = $this->createElement('submit', 'submit', array('disableLoadDefaultDecorators' => true, 'required' => true, 'label' => 'Подписаться'));
        $submit->addDecorator('viewHelper')                
                ->setAttrib('class', 'button')
                ->addDecorator('htmlTag', array('tag' => 'dd'));
		 $this->addElement($submit);
   }
}
