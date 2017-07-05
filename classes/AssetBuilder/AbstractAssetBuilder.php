<?php
/**
 *  @package    TB Asset Management
 *  @author     Tony Bogdanov <support@tonybogdanov.com>
 *  @license    MIT http://www.opensource.org/licenses/mit-license.php
 *  @copyright  Copyright (c) 2017. www.tonybogdanov.com. All Rights Reserved.
 */

namespace TB\AssetManagement\AssetBuilder;

use TB\AssetManagement\Asset\Asset;
use TB\Framework\Bundle\AbstractBundle;

abstract class AbstractAssetBuilder
{
    /**
     * The bundle owner of the asset.
     *
     * @var AbstractBundle
     */
    protected $bundle;

    /**
     * The asset being configured.
     *
     * @var Asset
     */
    protected $asset;

    /**
     * AbstractAssetBuilder constructor.
     *
     * @param AbstractBundle $bundle
     * @param Asset|null $asset
     */
    public function __construct(AbstractBundle $bundle, Asset $asset = null)
    {
        $this->setBundle($bundle);
        if (isset($asset)) {
            $this->setAsset($asset);
        }
    }

    /**
     * @return AbstractBundle
     */
    public function getBundle()
    {
        return $this->bundle;
    }

    /**
     * @param AbstractBundle $bundle
     * @return $this
     */
    public function setBundle(AbstractBundle $bundle)
    {
        $this->bundle = $bundle;
        return $this;
    }

    /**
     * @return Asset
     */
    public function getAsset()
    {
        return $this->asset;
    }

    /**
     * @param Asset $asset
     * @return $this
     */
    public function setAsset(Asset $asset)
    {
        $this->asset = $asset;
        return $this;
    }
}