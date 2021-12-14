<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit6999c1876fed066e2ef2901a079340a9
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
        'App\\AddClient' => __DIR__ . '/../..' . '/App/AddClient.php',
        'App\\App' => __DIR__ . '/../..' . '/App/App.php',
        'App\\Connect' => __DIR__ . '/../..' . '/App/Connect.php',
        'App\\DeleteOrder' => __DIR__ . '/../..' . '/App/DeleteOrder.php',
        'App\\ViewOrder' => __DIR__ . '/../..' . '/App/ViewOrder.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit6999c1876fed066e2ef2901a079340a9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit6999c1876fed066e2ef2901a079340a9::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit6999c1876fed066e2ef2901a079340a9::$classMap;

        }, null, ClassLoader::class);
    }
}
