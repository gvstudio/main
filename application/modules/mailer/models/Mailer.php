<?php

class Mailer_Model_Mailer extends Rastor_Model_TableAbstract {

        protected $_dbTableClassName = 'Mailer_Model_DbTable_Mailer';

	/*protected function _getViewUrl($record) {
       		 return Rastor_Url::get('article', array('uri' => $record->uri));
   	}*/

   	protected function _getEditUrl($record) {
        	return Rastor_Url::get('admin', array('module' => 'mailer', 'controller' => 'cms', 'action' => 'edit', 'id' => $record->id));
    }
}
