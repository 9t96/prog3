<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit936daf824000e3ad388e71e4aa938cb8
{
    public static $prefixesPsr0 = array (
        'S' => 
        array (
            'Slim' => 
            array (
                0 => __DIR__ . '/..' . '/slim/slim',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixesPsr0 = ComposerStaticInit936daf824000e3ad388e71e4aa938cb8::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
