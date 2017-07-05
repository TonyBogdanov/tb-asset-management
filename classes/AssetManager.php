<?php
/**
 *  @package    TB Asset Management
 *  @author     Tony Bogdanov <support@tonybogdanov.com>
 *  @license    MIT http://www.opensource.org/licenses/mit-license.php
 *  @copyright  Copyright (c) 2017. www.tonybogdanov.com. All Rights Reserved.
 */

namespace TB\AssetManagement;

use TB\AssetManagement\Asset\Asset;
use TB\AssetManagement\AssetBuilder\ContextBuilder;
use TB\AssetManagement\AssetBuilder\FinalizerBuilder;
use TB\Framework\Bundle\AbstractBundle;
use TB\Framework\Transliterator\Transliterator;

class AssetManager
{
    /**
     * Current app environment.
     *
     * @var string
     */
    protected $environment;

    /**
     * Slug generator.
     *
     * @var Transliterator
     */
    protected $transliterator;

    /**
     * Asset builders collection.
     *
     * @var array
     */
    protected $builders = [];

    /**
     * AssetManager constructor.
     *
     * @param $environment
     * @param Transliterator $transliterator
     */
    public function __construct($environment, Transliterator $transliterator)
    {
        $this->setEnvironment($environment);
        $this->setTransliterator($transliterator);

        add_action('init', [$this, 'processAssets']);
    }

    /**
     * Process & load all registered assets.
     */
    public function processAssets()
    {
        /** @var FinalizerBuilder $builder */
        foreach ($this->builders as $builder) {
            $bundle = $builder->getBundle();
            $asset = $builder->getAsset();

            if (null !== $asset->getEnvironment() && $asset->getEnvironment() !== $this->getEnvironment()) {
                continue;
            }

            $context = $asset->getContext();
            $type = $asset->getType();
            $url = $bundle->getUrl($asset->getUrl());
            $requirements = $asset->getRequirements();
            $handle = $asset->getSlug();

            if (!isset($handle)) {
                $handle = $this->getTransliterator()->transliterate(substr($url, strlen($bundle->getUrl())));
            }

            switch ($context) {
                case Asset::CONTEXT_FRONTEND:
                    switch ($type) {
                        case Asset::TYPE_SCRIPT:
                            add_action('wp_enqueue_scripts', function () use ($handle, $url, $requirements) {
                                wp_enqueue_script($handle, $url, $requirements, null);
                            });
                            break;

                        case Asset::TYPE_STYLE:
                            add_action('wp_enqueue_scripts', function () use ($handle, $url, $requirements) {
                                wp_enqueue_style($handle, $url, $requirements, null);
                            });
                            break;

                        case Asset::TYPE_IMPORT:
                            add_action('wp_head', function () use ($url) {
                                echo '<link rel="import" href="' . esc_url($url) . '" />' . "\n";
                            });
                            break;
                    }
                    break;

                case Asset::CONTEXT_BACKEND:
                    switch ($type) {
                        case Asset::TYPE_SCRIPT:
                            add_action('admin_enqueue_scripts', function () use ($handle, $url, $requirements) {
                                wp_enqueue_script($handle, $url, $requirements, null);
                            });
                            break;

                        case Asset::TYPE_STYLE:
                            add_action('admin_enqueue_scripts', function () use ($handle, $url, $requirements) {
                                wp_enqueue_style($handle, $url, $requirements, null);
                            });
                            break;

                        case Asset::TYPE_IMPORT:
                            add_action('admin_head', function () use ($url) {
                                echo '<link rel="import" href="' . esc_url($url) . '" />' . "\n";
                            });
                            break;
                    }
                    break;
            }
        }
    }

    /**
     * Load a finalized asset builder.
     *
     * @return $this
     */
    public function load(FinalizerBuilder $builder)
    {
        if (1 < func_num_args()) {
            foreach (func_get_args() as $arg) {
                $this->load($arg);
            }
        } else {
            $this->builders[] = $builder;
        }
        return $this;
    }

    /**
     * Prepares a new asset expression builder.
     *
     * @param AbstractBundle $bundle
     * @return ContextBuilder
     */
    public function builder(AbstractBundle $bundle)
    {
        return new ContextBuilder($bundle, new Asset());
    }

    /**
     * @return string
     */
    public function getEnvironment()
    {
        return $this->environment;
    }

    /**
     * @param string $environment
     * @return $this
     */
    public function setEnvironment($environment)
    {
        $this->environment = $environment;
        return $this;
    }

    /**
     * @return Transliterator
     */
    public function getTransliterator()
    {
        return $this->transliterator;
    }

    /**
     * @param Transliterator $transliterator
     * @return $this
     */
    public function setTransliterator(Transliterator $transliterator)
    {
        $this->transliterator = $transliterator;
        return $this;
    }
}