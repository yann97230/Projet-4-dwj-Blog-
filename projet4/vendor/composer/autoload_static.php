<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb261006a5a04f231a7c2227eb620a56d
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\Models\\' => 11,
            'App\\Controllers\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Model',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App/Controller',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb261006a5a04f231a7c2227eb620a56d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb261006a5a04f231a7c2227eb620a56d::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}