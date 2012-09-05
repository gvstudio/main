<?php

class Banners_Form_CmsBanners extends Rastor_Form {

    public function __construct(Array $data = array()) {
        parent::__construct();

        $this->setAction('')
                ->setMethod('post');

        $info = array();
        $seo = array();

        $name = $this->createElement('text', 'name', array('label' => 'Название'));
        $name->addDecorator('errors', array('class' => 'error msg'))
                ->setAttrib('class', 'big');

        $html = $this->createElement('textarea', 'html', array('label' => 'Контент'));
        $html->addDecorator('errors', array('class' => 'error msg'))
                ->setAttrib('lol', 'big')
                ->setRequired(false);
        
        $url = $this->createElement('text', 'url', array('label' => 'Url'));
        $url->addDecorator('errors', array('class' => 'error msg'))
                ->setAttrib('class', 'big')
                ->setRequired(false);

        $preview = $this->createElement('hidden', 'preview', array('required' => false));

        $enable = $this->createElement('checkbox', 'enable', array('required' => false, 'label' => 'Активность'));
        $enable->addDecorator('errors', array('class' => 'error msg'));


        $this->addElements(array(
            $name,
            $preview,
            $html,
			$url,
            $enable
        ));

        $auth = Rastor_Auth::getInstance();

        if ($auth->getIdentity()->accessLevel == 0) {
            $enable = $this->createElement('checkbox', 'protected', array('required' => false, 'label' => 'Защищенная запись'));
            $enable->addDecorator('errors', array('class' => 'error msg'));
            $this->addElement($enable);
        }

        $submit = $this->createElement('submit', 'submit', array('disableLoadDefaultDecorators' => true, 'required' => true, 'label' => 'Создать'));
        $submit->addDecorator('viewHelper')
                ->addDecorator('errors')
                ->addDecorator('htmlTag', array('tag' => 'p'));

        $this->addElement($submit);
    }

}
