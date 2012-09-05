<?php
return array(
	'routes' => array(
        'mail' => new Zend_Controller_Router_Route(
                'mailer',
                array(
                    'module' => 'mailer',
                    'controller' => 'index',
                    'action' => 'index'
                    
                )
        ),
	'confirm' => new Zend_Controller_Router_Route(
                'mailer/:mid',
                array(
                    'module' => 'mailer',
                    'controller' => 'index',
                    'action' => 'confirm'
                    
                )
        ),
	'refuse' => new Zend_Controller_Router_Route(
                'mailer/refuse/:mid',
                array(
                    'module' => 'mailer',
                    'controller' => 'index',
                    'action' => 'refuse'
                    
                )
        ),
	'ref' => new Zend_Controller_Router_Route(
                'mailer/ref',
                array(
                    'module' => 'mailer',
                    'controller' => 'index',
                    'action' => 'ref'
                    
                )
        ),
	'conf' => new Zend_Controller_Router_Route(
                'mailer/conf',
                array(
                    'module' => 'mailer',
                    'controller' => 'index',
                    'action' => 'conf'
                    
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
            'label' => 'Рассылка',
            'uri' => '#',
            'order' => 14,
            'pages' => array(
                array(
                    'label' => 'Список подписчиков',
                    'module' => 'mailer',
                    'controller' => 'cms',
                    'action' => 'showlist',
                ),
                array(
                    'label' => 'Редактировать сообщения',
                    'module' => 'mailer',
                    'controller' => 'cms',
                    'action' => 'editmessages',
                )
            )
        )
    ),
    'model' => 'Mailer_Model_Mailer'
);
