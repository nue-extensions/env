<?php

namespace Nue\Env;

use Novay\Nue\Extension;

class Env extends Extension
{
    public $name = 'env';

    public $views = __DIR__.'/../resources/views';

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('Env Manager', 'env', 'file-icons:dotenv');

        parent::createPermission('Env Manager', 'ext.env', 'env*');
    }
}