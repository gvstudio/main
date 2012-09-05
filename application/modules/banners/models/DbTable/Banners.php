<?php

class Banners_Model_DbTable_Banners extends Rastor_Model_DbTable_Abstract {

    protected $_name = 'banners';
    protected $_primary = 'id';
    protected $_sequence = true;

    public function getBannersByPosition($position){
        $select = $this->select()
                ->where('enable = 1')
                ->where('position = ?', $position);
        
        return $this->getAdapter()->fetchAll($select, null, Zend_Db::FETCH_OBJ);
    }

}