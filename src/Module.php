<?php

namespace portalium\template;

use portalium\base\Event;
use portalium\package\components\TriggerActions;

class Module extends \portalium\base\Module
{
    public $apiRules = [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                'template/default',
            ]
        ],
    ];
    
    public static function moduleInit()
    {
        self::registerTranslation('template','@portalium/template/messages',[
            'template' => 'template.php',
        ]);
    }

    public static function t($message, array $params = [])
    {
        return parent::coreT('template', $message, $params);
    }

    public function registerEvents()
    {
        Event::on($this::className(), UserModule::EVENT_USER_DELETE_BEFORE, [new TriggerActions(), 'onUserDeleteBefore']);
    }
}