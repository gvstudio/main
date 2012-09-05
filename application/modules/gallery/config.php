<?php

return array(
    'routes' => array(
        'gallery_view' => new Zend_Controller_Router_Route(
                'gallery/:id/:page',
                array(
                    'module' => 'gallery',
                    'controller' => 'index',
                    'action' => 'view',
                    'page' => 1
                )
        ),
        'gallery' => new Zend_Controller_Router_Route(
                'galleries/:page',
                array(
                    'module' => 'gallery',
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
            'label' => 'Галереи',
            'uri' => '#',
            'order' => 14,
            'pages' => array(
                array(
                    'label' => 'Список галерей',
                    'module' => 'gallery',
                    'controller' => 'cms',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Создать галерею',
                    'module' => 'gallery',
                    'controller' => 'cms',
                    'action' => 'add',
                )
            )
        )
    ),
    'model' => 'Gallery_Model_Gallery'
);
