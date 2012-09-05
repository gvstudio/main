<?php

class Gallery_Model_DbTable_GalleryPictures extends Rastor_Model_DbTable_Abstract {

    protected $_name = 'gallery_pictures';
    protected $_primary = 'id';
    protected $_sequence = true;

    /**
     * Get select query for pagination.
     * 
     * @param array $options
     * @return Zend_Db_Table_Select
     */
    protected function _getPaginatorSelect($options) {
        $select = $this->select()
                ->where('enable = 1');

        if (isset($options['order'])) {
            $select->order($options['order']);
        }
	
	if (isset($options['gallery_id'])) {
            $select->where('gallery_id = ?', $options['gallery_id']);
        }

        return $select;
    }
    
    function getPaginatorAdapter($options) {
        $select = $this->select()
                ->where('gallery_id = ?', $options['id']);

        return new Zend_Paginator_Adapter_DbSelect($select);
    }

}