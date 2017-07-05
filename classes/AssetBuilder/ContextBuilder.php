<?php
/**
 *  @package    TB Asset Management
 *  @author     Tony Bogdanov <support@tonybogdanov.com>
 *  @license    MIT http://www.opensource.org/licenses/mit-license.php
 *  @copyright  Copyright (c) 2017. www.tonybogdanov.com. All Rights Reserved.
 */

namespace TB\AssetManagement\AssetBuilder;

use TB\AssetManagement\Asset\Asset;

class ContextBuilder extends AbstractAssetBuilder
{
    /**
     * Assign the frontend context for the configured asset.
     *
     * @return TypeBuilder
     */
    public function frontend()
    {
        return new TypeBuilder($this->getBundle(), $this->getAsset()->setContext(Asset::CONTEXT_FRONTEND));
    }

    /**
     * Assign the backend context for the configured asset.
     *
     * @return TypeBuilder
     */
    public function backend()
    {
        return new TypeBuilder($this->getBundle(), $this->getAsset()->setContext(Asset::CONTEXT_BACKEND));
    }
}