<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitde73f57dc2ee883e40fcb49fd651a624
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Facebook\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitde73f57dc2ee883e40fcb49fd651a624::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitde73f57dc2ee883e40fcb49fd651a624::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitde73f57dc2ee883e40fcb49fd651a624::$classMap;

        }, null, ClassLoader::class);
    }
}
