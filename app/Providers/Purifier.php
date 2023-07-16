<?php

namespace App\Providers;

use HTMLPurifier, HTMLPurifier_Config;

class Purifier
{
    public static function clean($user_input): string
    {
        require base_path('vendor/ezyang/htmlpurifier/library/') . 'HTMLPurifier.auto.php';
        $config = HTMLPurifier_Config::createDefault();
        $config->set('Core.Encoding', 'UTF-8');
        $config->set('HTML.Allowed', 'p,em,strong,a[href],');
        $def = $config->getHTMLDefinition(true);
        $def->addAttribute('a', 'target', 'Enum#_blank,_self,_target,_top');
        $purifier = new HTMLPurifier($config);
        return $purifier->purify($user_input);
    }

    public static function cleanFull($user_input): string
    {
        require base_path('vendor/ezyang/htmlpurifier/library/') . 'HTMLPurifier.auto.php';
        $config = HTMLPurifier_Config::createDefault();
        $config->set('Core.Encoding', 'UTF-8');
        $config->set('HTML.Allowed', '');
        $purifier = new HTMLPurifier($config);
        return $purifier->purify($user_input);
    }
}
