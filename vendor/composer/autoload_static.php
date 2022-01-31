<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitef393b37dd15303906fa9219f0d9798b
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Store\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Store\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitef393b37dd15303906fa9219f0d9798b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitef393b37dd15303906fa9219f0d9798b::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitef393b37dd15303906fa9219f0d9798b::$classMap;

        }, null, ClassLoader::class);
    }
}