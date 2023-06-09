<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd7e963fed0fb6f265509d81ca86d4226
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/clases',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd7e963fed0fb6f265509d81ca86d4226::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd7e963fed0fb6f265509d81ca86d4226::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd7e963fed0fb6f265509d81ca86d4226::$classMap;

        }, null, ClassLoader::class);
    }
}
