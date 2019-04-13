<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit18c12b39c409c444fde4efd3da94ebf3
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Recovery\\' => 9,
        ),
        'M' => 
        array (
            'Mouf\\NodeJsInstaller\\' => 21,
            'Manage\\' => 7,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Recovery\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
        'Mouf\\NodeJsInstaller\\' => 
        array (
            0 => __DIR__ . '/..' . '/mouf/nodejs-installer/src',
        ),
        'Manage\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controller',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Monolog' => 
            array (
                0 => __DIR__ . '/..' . '/monolog/monolog/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit18c12b39c409c444fde4efd3da94ebf3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit18c12b39c409c444fde4efd3da94ebf3::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit18c12b39c409c444fde4efd3da94ebf3::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
