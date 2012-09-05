<?php

return array(
    'routes' => array(
        'vgallery' => new Zend_Controller_Router_Route_Regex(
                'vgallery/(.+)\.htm',
                array(
                    'module' => 'videogallery',
                    'controller' => 'index',
                    'action' => 'view'
                ),
                array(
                    1 => 'uri'
                ),
                'vgallery/%s.htm'
        ),
        'vgalleries' => new Zend_Controller_Router_Route(
                'vgalleries/:page',
                array(
                    'module' => 'videogallery',
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
            'label' => 'Видео галерея',
            'uri' => '#',
            'order' => 3,
            'pages' => array(
                array(
                    'label' => 'Список',
                    'module' => 'videogallery',
                    'controller' => 'cms',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Создать видеоматериал',
                    'module' => 'videogallery',
                    'controller' => 'cms',
                    'action' => 'add',
                )
            )
        )
    ),
    'model' => 'VideoGallery_Model_VideoGallery'
);
