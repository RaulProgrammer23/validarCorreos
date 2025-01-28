<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit05517bc6ec9db69e0998d4c988086fd3
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit05517bc6ec9db69e0998d4c988086fd3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit05517bc6ec9db69e0998d4c988086fd3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit05517bc6ec9db69e0998d4c988086fd3::$classMap;

        }, null, ClassLoader::class);
    }
}
