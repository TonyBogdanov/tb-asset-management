<?php
/**
 *  @package    TB Asset Management
 *  @author     Tony Bogdanov <support@tonybogdanov.com>
 *  @license    MIT http://www.opensource.org/licenses/mit-license.php
 *  @copyright  Copyright (c) 2017. www.tonybogdanov.com. All Rights Reserved.
 */

namespace TB\AssetManagement\AssetBuilder;

use TB\Framework\Bundle\AbstractBundle;

class FinalizerBuilder extends AbstractAssetBuilder
{
    /**
     * Assigns asset requirements.
     *
     * @param array $slugs
     * @return $this
     */
    public function requires(array $slugs)
    {
        $this->getAsset()->setRequirements($slugs);
        return $this;
    }

    /**
     * Assigns asset slug.
     *
     * @param string $slug
     * @return $this
     */
    public function slug($slug)
    {
        $this->getAsset()->setSlug($slug);
        return $this;
    }

    /**
     * Assigns asset environment.
     *
     * @param string $environment
     * @return $this
     */
    public function env($environment)
    {
        $this->getAsset()->setEnvironment($environment);
        return $this;
    }
}