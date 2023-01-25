<?php

namespace {{vendor}}\{{module}};

use portalium\base\Event;
use {{vendor}}\{{module}}\components\TriggerActions;

class Module extends \portalium\base\Module
{
    public static $tablePrefix = '{{module}}_';
    
    public static $name = '{{module}}';

    public static $description = '{{module}} Module';

    public $apiRules = [
        [
            'class' => 'yii\rest\UrlRule',
            'controller' => [
                '{{module}}/default',
            ]
        ],
    ];
    
    public static function moduleInit()
    {
        self::registerTranslation('{{module}}','@{{vendor}}/{{module}}/messages',[
            '{{module}}' => '{{module}}.php',
        ]);
    }

    public static function t($message, array $params = [])
    {
        return parent::coreT('{{module}}', $message, $params);
    }

    /* public function registerEvents()
    {
        Event::on($this::className(), UserModule::EVENT_USER_DELETE_BEFORE, [new TriggerActions(), 'onUserDeleteBefore']);
    } */
}