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
          'lastnews' => new Zend_Controller_Router_Route(
                'news/lastnews.htm',              
                array(
                    'module' => 'news',
                    'controller' => 'index',
                    'action' => 'lastnews',    
                    'page' => 1                
                )
        ),
    ),
    'acl' => array(
        'resources' => array(
           // new Zend_Acl_Resource('content_index'),
           // new Zend_Acl_Resource('content_cms')
        ),
        'allow' => array(
          //  array('moderator', 'content_cms', null),
          //  array(null, 'content_index', null)
        ),
        'deny' => array()
    ),
    'cmsMenu' => array(
        array(
            'label' => 'Новости',
            'uri' => '#',
            'order' => 3,
            'pages' => array(
                array(
                    'label' => 'Список новостей',
                    'module' => 'news',
                    'controller' => 'cms',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Создать новость',
                    'module' => 'news',
                    'controller' => 'cms',
                    'action' => 'add',
                )
            )
        )
    ),
    'model' => 'News_Model_News'
);
