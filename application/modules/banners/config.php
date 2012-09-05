<?php

return array(
    'routes' => array(
        'newsview' => new Zend_Controller_Router_Route(
                'newsview/:id',
                array(
                    'module' => 'news',
                    'controller' => 'index',
                    'action' => 'view'
                )
        ),
        'news' => new Zend_Controller_Router_Route(
                'news/:page',
                array(
                    'module' => 'news',
                    'controller' => 'index',
                    'action' => 'index',
                    'page' => 1
                )
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
            'label' => 'Баннеры',
            'uri' => '#',
            'order' => 6,
            'pages' => array(
                array(
                    'label' => 'Список баннеров',
                    'module' => 'banners',
                    'controller' => 'cms',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Создать баннер',
                    'module' => 'banners',
                    'controller' => 'cms',
                    'action' => 'add',
                )
            )
        )
    ),
    //'model' => 'Articles_Model_Article'
);
