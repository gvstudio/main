<?php

class Banners_Model_Banners extends Rastor_Model_TableAbstract {

    protected $_dbTableClassName = 'Banners_Model_DbTable_Banners';

    protected function _getEditUrl($record) {
        return Rastor_Url::get('admin', array('module' => 'banners', 'controller' => 'cms', 'action' => 'edit', 'id' => $record->id));
    }

    public function getBanner($position) {
        $banners = $this->getDbTable()->getBannersByPosition($position);

        if ($count = count($banners)) {
            $num = rand(0, $count - 1);
            return $banners[$num];
        } else {
            return false;
        }
    }

}
