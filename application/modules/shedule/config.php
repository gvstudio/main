<?php

return array(
    'routes' => array(
        'shedule' => new Zend_Controller_Router_Route(
                'shedule/:id',
                array(
                    'module' => 'shedule',
                    'controller' => 'index',
                    'action' => 'index'
                )
        ),
        /*'error' => new Zend_Controller_Router_Route(
                'error',
                array(
                    'module' => 'shedule',
                    'controller' => 'index',
                    'action' => 'error'
                )
        )*/
    ),
    'acl' => array(
        'resources' => array(
          //  new Zend_Acl_Resource('shedule_index'),
          //  new Zend_Acl_Resource('shedule_cms')
        ),
        'allow' => array(
            //array('moderator', 'shedule_cms', null),
            //array(null, 'shedule_index', null)
        ),
        'deny' => array()
    ),
    'cmsMenu' => array(
        array(
            'label' => 'Рассписание',
            'uri' => '#',
            'order' => 2,
            'pages' => array(
                array(
                    'label' => 'Список Филиалов',
                    'module' => 'shedule',
                    'controller' => 'cms',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Добавить расписние',
                    'module' => 'shedule',
                    'controller' => 'cms',
                    'action' => 'addshedule',
                ),
                array(
                    'label' => 'Добавить филиал',
                    'module' => 'shedule',
                    'controller' => 'cms',
                    'action' => 'filial',
                ),
				 array(
                    'label' => 'Список рассписаний',
                    'module' => 'shedule',
                    'controller' => 'cms',
                    'action' => 'showlistshedules',
                )
            )
        )
    ),
    'model' => 'Shedule_Model_Shedule'
);
