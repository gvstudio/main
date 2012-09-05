<?php

abstract class Rastor_Model_DbTable_GalleryAbstract extends Rastor_Model_DbTable_Abstract {    
    
    public function insertRecords($array, $ownerId){
        foreach ($array as $value) {
            parent::insert($value + array('owner_id' => $ownerId));
        }
    }
    
    public function updateRecords($array, $ownerId){
        foreach ($array as $value) {
            if (isset($value['id']) && ($this->getRecord($value['id']))){
                $this->update($value, $value['id']);
            } else {
                parent::insert($value + array('owner_id' => $ownerId));
            }
        }
    }

    public function getGalleryRecords($id){
        $select = $this->select()
                ->where('owner_id = ?', $id);
        
        return $this->getAdapter()->fetchAll($select);
    }

}