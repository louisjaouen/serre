<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit50df26a723553f2fcf1a245df2008b9f
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Hybridauth\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Hybridauth\\' => 
        array (
            0 => __DIR__ . '/..' . '/hybridauth/hybridauth/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit50df26a723553f2fcf1a245df2008b9f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit50df26a723553f2fcf1a245df2008b9f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
