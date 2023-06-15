<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbbfe6c4c11ac546e5c3a855d1742a8cf
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Model\\' => 6,
            'MVC\\' => 4,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/models',
        ),
        'MVC\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbbfe6c4c11ac546e5c3a855d1742a8cf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbbfe6c4c11ac546e5c3a855d1742a8cf::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbbfe6c4c11ac546e5c3a855d1742a8cf::$classMap;

        }, null, ClassLoader::class);
    }
}
