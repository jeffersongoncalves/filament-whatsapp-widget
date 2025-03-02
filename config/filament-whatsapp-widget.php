<?php

use JeffersonGoncalves\WhatsappWidget\Models\WhatsappAgent;
use JeffersonGoncalves\WhatsappWidget\Models\WhatsappLog;

return [
    'whatsapp_agent_resource' => [
        'cluster' => null,
        'model' => WhatsappAgent::class,
        'should_register_navigation' => true,
        'navigation_badge' => true,
        'navigation_sort' => -1,
        'slug' => 'whatsapp/whatsapp-agent',
    ],
    'whatsapp_log_resource' => [
        'cluster' => null,
        'model' => WhatsappLog::class,
        'should_register_navigation' => true,
        'navigation_badge' => true,
        'navigation_sort' => -1,
        'slug' => 'whatsapp/whatsapp-log',
    ],
];
