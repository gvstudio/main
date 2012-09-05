<?php

return array(
    'routes' => array(
        'action' => new Zend_Controller_Router_Route_Regex(
                'action/(.+)\.htm',
                array(
                    'module' => 'actions',
                    'controller' => 'index',
                    'action' => 'view'
                ),
                array(
                    1 => 'uri'
                ),
                'action/%s.htm'
        ),
        'actions' => new Zend_Controller_Router_Route(
                'actions/:page',
                array(
                    'module' => 'actions',
                    'controller' => 'index',
                    'action' => 'index',
                    'page' => 1
                )
        ),	
		'main' => new Zend_Controller_Router_Route_Regex(
                'action/main.htm',
                array(
                    'module' => 'actions',
                    'controller' => 'index',
                    'action' => 'main'
                ),
                array(
                    1 => 'uri'
                ),
                'action/main.htm'
        ),
 		
    ),
    'acl' => array(
        'resources' => array(
            //new Zend_Acl_Resource('content_index'),
            //new Zend_Acl_Resource('content_cms')
        ),
        'allow' => array(
            //array('moderator', 'content_cms', null),
            //array(null, 'content_index', null)
        ),
        'deny' => array()
    ),
    'cmsMenu' => array(
        array(
            'label' => 'Акции',
            'uri' => '#',
            'order' => 3,
            'pages' => array(
                array(
                    'label' => 'Список акций',
                    'module' => 'actions',
                    'controller' => 'cms',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Создать акцию',
                    'module' => 'actions',
                    'controller' => 'cms',
                    'action' => 'add',
                )
            )
        )
    ),
    'model' => 'Actions_Model_Action'
);
