<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite3858311d4d34b577717e83c23775b9b
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite3858311d4d34b577717e83c23775b9b::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite3858311d4d34b577717e83c23775b9b::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
