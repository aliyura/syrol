<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitaee730d89d9a9131adfa4abcb380b1b7
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitaee730d89d9a9131adfa4abcb380b1b7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitaee730d89d9a9131adfa4abcb380b1b7::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
