<?php

class Menu_Form_CmsMenuItem extends Rastor_Form {

    public function __construct() {
        parent::__construct();

        $this->setAction('')
                ->setMethod('post');

        foreach ($this->getLocales() as $lang => $locale) {
            $name = $this->createElement('text', $this->getParmLang('name', $lang), array('label' => $this->getTranslator()->_('Название') . ' (' . $lang . ')'));
            $name->addDecorator('errors', array('class' => 'error msg'))
                    ->setAttrib('class', 'big');

            $this->addElement($name);
        }
        
        $menuModel = new Menu_Model_MenuItem();
        $select = $menuModel->getDbTable();
		$select->changeTable();
		$mainmenu = $this->createElement('select', 'menu_id', array('required' => false, 'label' => 'Меню'));
        $mainmenu->addDecorator('errors', array('class' => 'error msg'))
                ->setMultiOptions($select->selectmenu());
		//Zend_Debug::dump($select->selectmenu());// die;
		//Zend_Debug::dump($menuModel->getMenuLinks($this->getLanguage())); die;
        $link = $this->createElement('select', 'href', array('required' => false, 'label' => 'Ссылка'));
        $link->addDecorator('errors', array('class' => 'error msg'))
                ->setMultiOptions($menuModel->getMenuLinks($this->getLanguage()));
        //Zend_Debug::dump($link); die;
        $url = $this->createElement('text', 'url', array('label' => 'Внешняя ссылка'));
        $url->addDecorator('errors', array('class' => 'error msg'))
                    ->setAttrib('class', 'big');
        
        $enable = $this->createElement('checkbox', 'enable', array('required' => false, 'label' => 'Активность'));
        $enable->addDecorator('errors', array('class' => 'error msg'));

        $this->addElements(array($mainmenu, $link, $url, $enable));

        $submit = $this->createElement('submit', 'submit', array('disableLoadDefaultDecorators' => true, 'required' => true, 'label' => 'Создать'));
        $submit->addDecorator('viewHelper')
                ->addDecorator('errors')
                ->addDecorator('htmlTag', array('tag' => 'p'));

        $this->addElement($submit);
    }
}
