<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit49ae3c16b753d334d0a528fbaebb9de4
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
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit49ae3c16b753d334d0a528fbaebb9de4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit49ae3c16b753d334d0a528fbaebb9de4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit49ae3c16b753d334d0a528fbaebb9de4::$classMap;

        }, null, ClassLoader::class);
    }
}
