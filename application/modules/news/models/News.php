<?php

class News_Model_News extends Rastor_Model_TableAbstract {

    protected $_dbTableClassName = 'News_Model_DbTable_News';

    protected function _getViewUrl($record) {
        return Rastor_Url::get('newsview', array('id' => $record->id));
    }
	
    protected function _getEditUrl($record) {
        return Rastor_Url::get('admin', array('module' => 'news', 'controller' => 'cms', 'action' => 'edit', 'id' => $record->id));
    }
	
	public function issetUri($uri, $id = 0) {
        $record = $this->getDbTable()->getRecordByUri($uri);

        if (isset($record->id)) {
            return $record->id != $id;
        } else {
            return false;
        }
    }

    public function getTranslitUri($value) {
        $translitUrl = new Rastor_Filter_TranslitUrl();
        
        $uri = $translitUrl->filter($value);
        $i = 0;
        while ($this->issetUri($uri)) {
            $i++;
            $uri = $translitUrl->filter($value) . '_' . $i;
        }
        
        return $uri;
    }

    public function getMenuLinks($language) {
        $records = $this->getDbTable()->getRecords();
		
        $result = array('module=news|route=news' => '*Все новости');
        foreach ($records as $record) {
            $result['model=News_Model_News|params=id:' . $record->id] = $record->{$this->getParmLang('name', $language)};
        }
        $results = array('Новости' => $result);
        return $results;
    }
	
	public function getMenuItemParams($params) {
        foreach ($params as $key => $value) {
            if ($key == 'id') {
                $record = $this->getDbTable()->getEnableRecord($value);
                if (isset($record->id)) {
                    return array(
                        'route' => 'newsview',
                        'route_params' => 'uri:' . $record->uri
                    );
                }
            }
        }

        return array(
            'href' => 'route=default',
            'route' => 'default',
            'params' => '',
            'route_params' => '',
            'module' => '',
            'controller' => '',
            'model' => ''
        );
    }
}
