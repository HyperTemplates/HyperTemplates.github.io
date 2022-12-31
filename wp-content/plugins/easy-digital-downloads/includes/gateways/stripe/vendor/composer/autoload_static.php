<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita1abe13511edc0d0d2f910910593934f
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita1abe13511edc0d0d2f910910593934f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita1abe13511edc0d0d2f910910593934f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita1abe13511edc0d0d2f910910593934f::$classMap;

        }, null, ClassLoader::class);
    }
}