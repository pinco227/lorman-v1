<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit42089ef9e5c3f66fd6fe1bc0d34c683b
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit42089ef9e5c3f66fd6fe1bc0d34c683b::$classMap;

        }, null, ClassLoader::class);
    }
}
