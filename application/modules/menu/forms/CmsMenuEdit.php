<?php

class Menu_Form_CmsMenuEdit extends Rastor_Form {

    public function __construct() {
        parent::__construct();

        $this->setAction('')
                ->setMethod('post');
				
 		 $name = $this->createElement('text','name', array('label' => 'Название','required' => true));
         $name->addDecorator('errors', array('class' => 'error msg'))
                    		->setAttrib('class', 'big');

            $this->addElement($name);
        
       /* $url = $this->createElement('text', 'url', array('label' => 'Внешняя ссылка'));
        $url->addDecorator('errors', array('class' => 'error msg'))
                    ->setAttrib('class', 'big');
		$this->addElement($url);*/
        
        //$menuModel = new Menu_Model_MenuItem();
        
       /* $link = $this->createElement('select', 'href', array('required' => false, 'label' => 'Ссылка'));
        $link->addDecorator('errors', array('class' => 'error msg'))
                ->setMultiOptions($menuModel->getMenuLinks($this->getLanguage()));
        //Zend_Debug::dump($link); die;
        $url = $this->createElement('text', 'url', array('label' => 'Внешняя ссылка'));
        $url->addDecorator('errors', array('class' => 'error msg'))
                    ->setAttrib('class', 'big');
        
        $enable = $this->createElement('checkbox', 'enable', array('required' => false, 'label' => 'Активность'));
        $enable->addDecorator('errors', array('class' => 'error msg'));

        $this->addElements(array($link, $url, $enable));*/

        $submit = $this->createElement('submit', 'submit', array('disableLoadDefaultDecorators' => true, 'required' => true, 'label' => 'Создать'));
        $submit->addDecorator('viewHelper')
                ->addDecorator('errors')
                ->addDecorator('htmlTag', array('tag' => 'p'));

        $this->addElement($submit);
    }
}
