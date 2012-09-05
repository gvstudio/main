<?php

class Gallery_Model_GalleryPictures extends Rastor_Model_TableAbstract {

    protected $_dbTableClassName = 'Gallery_Model_DbTable_GalleryPictures';

    protected function _getViewUrl($record) {
        return Rastor_Url::get('gallery', array('uri' => $record->uri));
    }

    protected function _getEditUrl($record) {
        return Rastor_Url::get('admin', array('module' => 'gallery', 'controller' => 'cms', 'action' => 'edit', 'id' => $record->id));
    }

    public function issetUri($uri, $id = 0) {
        $record = $this->getDbTable()->getRecordByUri($uri);

        if (isset($record->id)) {
            return $record->id != $id;
        } else {
            return false;
        }
    }
}
