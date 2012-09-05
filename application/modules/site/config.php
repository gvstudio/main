<?php

return array(
    'routes' => array(       
        'mysite' => new Zend_Controller_Router_Route(
                'site/:page',
                array(
                    'module' => 'site',
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
   
    //'model' => 'Articles_Model_Article'
    //'model' => 'Faq_Model_Faq'
);
