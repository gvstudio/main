<?php

class Menu_Model_DbTable_MenuItem extends Rastor_Model_DbTable_Abstract {

    protected $_name = 'menu_items';
    protected $_primary = 'id';
    protected $_sequence = true;

    public function getRecords() {
        $select = $this->select()
                ->order('sort');
        return $this->getAdapter()->fetchAll($select);
    }	
	
    
	public function getmenu()
	{
		$select = $this->select();                
        return $this->getAdapter()->fetchAll($select);
	}
	
    public function getEnableRecords($id) {
    	$ids = (int)$id;
       	$select = $this->select()
                ->where('menu_id = ?',$ids)
                ->where('enable = 1')
				//->where('menu_id = ?', $id)
                ->order('sort');
				//Zend_Debug::dump($id);die;
        return $this->getAdapter()->fetchAll($select);
    }
    
    public function getNextSortValue() {
        $select = $this->select()
                ->from($this->_name, array(new Zend_Db_Expr('max(sort) as max')));

        $row = $this->getAdapter()->fetchRow($select);

        return $row->max + 1;
    }
	
	public function getMenuItems($id)
	{
		//$id = 13;
		$select = $this->select()
                ->where('menu_id = ?',$id);
				            
        return $this->getAdapter()->fetchAll($select);    
	}

    public function getChildrenRecords($id) {
        $select = $this->select()
                ->where('parent_id = ?', $id)
                ->order('sort');

        return $this->getAdapter()->fetchAll($select);
    }

    public function recursiveDelete($id, $firstCall = false) {
        $record = $this->getRecord($id);

        if ($this->delete($id)) {
            $records = $this->getChildrenRecords($id);
            foreach ($records as $value) {
                $this->recursiveDelete($value->id);
            }
        }
    }
	
	public function changeTable()
	{
		$this->_name ="menu";
	}
	
	public function getTableData($viewparams, $options = array(), $requestParams = array())
	{
		 //$this->_getTableLanguage();
        
       /* if ((isset($options['rebuildParams'])) && ($options['rebuildParams'] == true)) {
            $viewparams = $this->_getTableViewParams($viewparams, $options['removeParams']);
        }

        if (isset($viewparams[$options['order']]) && ($this->_canOrder($viewparams[$options['order']]))) {
            $order = $viewparams[$options['order']];
        } else {
            if ($options['sort']) {
                $order = 'sort';
            } else {
                $order = '';
            }
        }*/

        /*$paginator = $this->_getRastorTablePaginator($order, $options['orderDirection'], $requestParams);
        $paginator->setCurrentPageNumber($options['page'])
                ->setItemCountPerPage($this->_getItemCountPerPage())
                ->setPageRange($options['pageRange']);*/
                

        /*$pages = $paginator->getPages();
        $pages->pagesInRange = array_values($pages->pagesInRange);
		
        $result->pages = $pages;
		
        $result->data = array();
		//Zend_Debug::dump($paginator->getIterator());die;
        foreach ($paginator->getIterator() as $record) {
            $list = array();
            foreach ($viewparams as $param) {
                $list[] = $this->_getRecordParam($record, $param);
            }
            $result->data[] = $list;
        }//Zend_Debug::dump($viewparams);die;

        $result->viewLinks = array();
        $result->editLinks = array();
        foreach ($paginator->getIterator() as $record) {
            $result->viewLinks[] = $this->_getViewUrl($record);
            $result->editLinks[] = $this->_getEditUrl($record);
        }
        //Zend_Debug::dump($result); die;
        return Zend_Json::encode($result);*/
        $select = $this->select()
                ->order('id');
        $datas = $this->getAdapter()->fetchAll($select);
		$result->data = array();
		foreach($datas as $item)
		{
			$list = array();
            foreach ($viewparams as $param) {
                $list[] = $this->_getRecordParam($item, $param);
            }
            $result->data[] = $list;
		}
		 $result->editLinks = array();
        foreach ($datas as $item) {           
            $result->editLinks[] = '/admin/menu/cms/editmenu/id/'.$item->id;
        }
		$this->_getRecordParam();
		return Zend_Json::encode($result);
		//Zend_Debug::dump($result);
	}

	 protected function _getRecordParam($record, $param) {
        switch ($param) {
            case 'enable':
                return $record->enable ? "+" : "-";
            case 'datetime':
                return date('d.m.Y H:i:s', $record->$param);
            case 'date':
                return date('d.m.Y', $record->$param);
            default:
                return $record->$param;
        }
    }
	public function deleteFromMenu($id)
	{
		$this->delete($id);
		$this->_name = 'menu_items';
		$menuItems = $this->getMenuItems($id);	
		foreach($menuItems as $item)
		{
			$this->recursiveDelete($item->id,TRUE);
		}
    
	}
	public function selectMenu()
	{
		$menu = $this->getmenu();
		$result = array();
		foreach($menu as $item)
		{
			$result[$item->id] = $item->name;
		}
		return $result;
	}

}