<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit060734ec91cff3c418f9433236b10b5e
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit060734ec91cff3c418f9433236b10b5e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit060734ec91cff3c418f9433236b10b5e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit060734ec91cff3c418f9433236b10b5e::$classMap;

        }, null, ClassLoader::class);
    }
}
