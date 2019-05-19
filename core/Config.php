<?php

namespace Home;
class Config
{
    // this is public to allow better Unit Testing
    public static $config;

    public static function get($key)
    {
        if (!self::$config) {
            self::$config = self::read();

            $custom_config_file = self::$config['PATH_CONFIG'];
            if (file_exists($config_file)) {
                $custom_config = require $config_file;
                // merge
                self::$config = array_merge_recursive(self::$config, $custom_config);
            }
        }

        return self::$config[$key];
    }

    private static function read()
    {
        $base_url = '127.0.0.1';
        /**
         * Returns the default configuration.
         */
         return array(

             //
             'MAINTENANCE' => false,

         	// URL
             'URL' => 'http://'.$base_url.'/',
             'URL_ROOT' => 'http://'.$base_url,

             // META
             'SITE_LOCALE' => 'en_US',
             'SITE_NAME' => 'The Bit Twisters Home',
             'SITE_AUTHOR' => 'The Bit Twisters',
             'SITE_CAPTION' => 'A simple PHP MVC Framework - Home',
             'SITE_TITLE' => 'The Bit Twisters Home',
             'SITE_DESCRIPT' => 'A simple PHP MVC Framework - Home',
             'SITE_KEYWORDS' => 'php, home, thebittwisters, mvc, framework',
             'SITE_LOGO' => 'http://'.$base_url.'/img/home.png',
             'SITE_PREVIEW' => 'http://'.$base_url.'/img/home-preview.jpg',
             'SITE_TERMS' => 'http://'.$base_url.'/about/terms/',
             'SITE_PRIVACY' => 'http://'.$base_url.'/about/privacy/',

             // PATH
             'PATH_CONFIG' => realpath(dirname(__FILE__).'/../../') . '/config.php',
             'PATH_APPS' => realpath(dirname(__FILE__).'/../../') . '/apps/',

             // APP & ACTN
             'DEFAULT_APP' => 'home',
             'DEFAULT_ACTION' => 'index',

             // COOKIE
             'COOKIE_RUNTIME' => 604800,
             'COOKIE_PATH' => '/',
             'COOKIE_DOMAIN' => $base_url,
             'COOKIE_SECURE' => true,
             'COOKIE_HTTP' => true,
             'SESSION_RUNTIME' => 604800,

             // ENCRYPTION
             'ENCRYPTION_KEY' => 'D7gÊìcL6f$*+&C$f^1x',
             'HMAC_SALT' => '88z7nk#10q5t9c^4L6dM%',

         );
    }
}
