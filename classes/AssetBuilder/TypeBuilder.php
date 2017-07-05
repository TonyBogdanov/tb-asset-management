<?php
/**
 *  @package    TB Asset Management
 *  @author     Tony Bogdanov <support@tonybogdanov.com>
 *  @license    MIT http://www.opensource.org/licenses/mit-license.php
 *  @copyright  Copyright (c) 2017. www.tonybogdanov.com. All Rights Reserved.
 */

namespace TB\AssetManagement\AssetBuilder;

use TB\AssetManagement\Asset\Asset;
use TB\AssetManagement\AssetBuilder\UrlBuilder;

class TypeBuilder extends AbstractAssetBuilder
{
    /**
     * Assign the style type for the configured asset.
     *
     * @return UrlBuilder
     */
    public function style()
    {
        return new UrlBuilder($this->getBundle(), $this->getAsset()->setType(Asset::TYPE_STYLE));
    }

    /**
     * Assign the script type for the configured asset.
     *
     * @return UrlBuilder
     */
    public function script()
    {
        return new UrlBuilder($this->getBundle(), $this->getAsset()->setType(Asset::TYPE_SCRIPT));
    }

    /**
     * Assign the import type for the configured asset.
     *
     * @return UrlBuilder
     */
    public function import()
    {
        return new UrlBuilder($this->getBundle(), $this->getAsset()->setType(Asset::TYPE_IMPORT));
    }
}