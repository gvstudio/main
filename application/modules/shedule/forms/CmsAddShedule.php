<?php

class Shedule_Form_CmsAddShedule extends Rastor_Form {

    public function __construct(Array $data = array()) {
        parent::__construct();

        $this->setAction('')
                ->setMethod('post');
        $info = array();
		
		
		$menuModel = new Shedule_Model_Shedule();
        $select = $menuModel->getDbTable();
		$select->filialDb();
		
		$filial = $this->createElement('select', 'filial_id', array('required' => false, 'label' => 'Филилал'));
        $filial->addDecorator('errors', array('class' => 'error msg'))
                ->setMultiOptions($select->selectFilial());
		//$select->shedulesDb();
		//Zend_Debug::dump($select);
		
		$name = $this->createElement('text', 'name_ru', array('label' => 'Название зала'));
        $name->addDecorator('errors', array('class' => 'error msg'))
                    ->setAttrib('class', 'big')
					->setRequired();;

		$this->addElements(array($filial,$name));
      	
		$curr_week = $this->createElement('textarea', 'curr_week', array('label' => 'текущая неделя'));
        $curr_week->addDecorator('errors', array('class' => 'error msg'))
                    ->setAttrib('class', 'wyswisg')
                    ->setRequired();

        $this->addElement($curr_week);

        //$info[] = 'curr_week';
		
		$next_week = $this->createElement('textarea', 'next_week', array('label' => 'Следующая неделя'));
        $next_week->addDecorator('errors', array('class' => 'error msg'))
                    ->setAttrib('class', 'wyswisg')
                    ->setRequired();

        $this->addElement($next_week);

       // $info[] = 'next_week';
		
		$prev_week = $this->createElement('textarea', 'prev_week', array('label' => 'Предыдущая неделя'));
        $prev_week->addDecorator('errors', array('class' => 'error msg'))
                    ->setAttrib('class', 'wyswisg')
                    ->setRequired();

        $this->addElement($prev_week);

       // $info[] = 'prev_week';
		
		
		$submit = $this->createElement('submit', 'submit', array('disableLoadDefaultDecorators' => true, 'required' => true, 'label' => 'Добавить'));
        $submit->addDecorator('viewHelper')
                ->addDecorator('errors')
                ->setAttrib('class', 'submit_margin')
                ->addDecorator('htmlTag', array('tag' => 'p'));
		$this->addElement($submit);
    }

}
