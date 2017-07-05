<?php
/**
 *  @package    TB Asset Management
 *  @author     Tony Bogdanov <support@tonybogdanov.com>
 *  @license    MIT http://www.opensource.org/licenses/mit-license.php
 *  @copyright  Copyright (c) 2017. www.tonybogdanov.com. All Rights Reserved.
 */

namespace TB\AssetManagement;

use TB\Framework\Bundle\AbstractBundle;
use TB\Framework\Bundle as FrameworkBundle;

class Bundle extends AbstractBundle
{
    /**
     * @inheritDoc
     */
    protected function getBaseUrl()
    {
        /** @var FrameworkBundle $frameworkBundle */
        $frameworkBundle = $this->getContainer()->get(FrameworkBundle::class);
        return $frameworkBundle->getUrl();
    }

    /**
     * @inheritDoc
     */
    protected function getBasePath()
    {
        return __DIR__ . '/..';
    }

    /**
     * @inheritDoc
     */
    public function getConfig()
    {
        return [
            __DIR__ . '/../config/services.yml'
        ];
    }
}