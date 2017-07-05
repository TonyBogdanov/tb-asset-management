<?php
/**
 *  @package    TB Asset Management
 *  @author     Tony Bogdanov <support@tonybogdanov.com>
 *  @license    MIT http://www.opensource.org/licenses/mit-license.php
 *  @copyright  Copyright (c) 2017. www.tonybogdanov.com. All Rights Reserved.
 */

namespace TB\AssetManagement\AssetBuilder;

class UrlBuilder extends AbstractAssetBuilder
{
    /**
     * Assign the URL for the configured asset.
     *
     * @param string $url
     * @return FinalizerBuilder
     */
    public function url($url)
    {
        return new FinalizerBuilder($this->getBundle(), $this->getAsset()->setUrl($url));
    }
}