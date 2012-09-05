<?php

class Shedule_Form_CmsShedule extends Rastor_Form {

    public function __construct(Array $data = array()) {
        parent::__construct();

        $this->setAction('')
                ->setMethod('post');
        $info = array();
		
		$name = $this->createElement('text', 'name', array('label' => 'Название'));
        $name->addDecorator('errors', array('class' => 'error msg'))
                    ->setAttrib('class', 'big')
					->setRequired();;

        $this->addElement($name);

        $info[] = $this->getParmLang('name', $lang);
		
		$submit = $this->createElement('submit', 'submit', array('disableLoadDefaultDecorators' => true, 'required' => true, 'label' => 'Добавить'));
        $submit->addDecorator('viewHelper')
                ->addDecorator('errors')
                ->setAttrib('class', 'submit_margin')
                ->addDecorator('htmlTag', array('tag' => 'p'));
		$this->addElement($submit);
    }

}
