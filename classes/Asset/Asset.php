<?php
/**
 *  @package    TB Asset Management
 *  @author     Tony Bogdanov <support@tonybogdanov.com>
 *  @license    MIT http://www.opensource.org/licenses/mit-license.php
 *  @copyright  Copyright (c) 2017. www.tonybogdanov.com. All Rights Reserved.
 */

namespace TB\AssetManagement\Asset;

use Slug\Slugifier;
use TB\Framework\Util\ExceptionHelper;

class Asset
{
    /**
     * Asset contexts.
     */
    const CONTEXT_FRONTEND  = 'frontend';
    const CONTEXT_BACKEND   = 'backend';

    /**
     * Asset types.
     */
    const TYPE_STYLE        = 'style';
    const TYPE_SCRIPT       = 'script';
    const TYPE_IMPORT       = 'import';

    /**
     * Asset context.
     *
     * @var string
     */
    protected $context;

    /**
     * Asset type.
     *
     * @var string
     */
    protected $type;

    /**
     * Asset slug (identifier).
     *
     * @var string
     */
    protected $slug;

    /**
     * Asset URL.
     *
     * @var string
     */
    protected $url;

    /**
     * Asset environment.
     *
     * @var string
     */
    protected $environment;

    /**
     * Asset requirements (slugs).
     *
     * @var array
     */
    protected $requirements = [];

    /**
     * @return string
     */
    public function getContext()
    {
        return $this->context;
    }

    /**
     * @param $context
     * @return $this
     * @throws AssetException
     */
    public function setContext($context)
    {
        if (!in_array($context, [
            self::CONTEXT_FRONTEND,
            self::CONTEXT_BACKEND
        ])) {
            throw new AssetException(ExceptionHelper::format('Invalid asset context: :context passed' .
                ' to :method. See CONTEXT_* constants in :class.', [
                'context' => $context,
                'method' => __METHOD__,
                'class' => __CLASS__
            ]));
        }
        $this->context = $context;
        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $type
     * @return $this
     * @throws AssetException
     */
    public function setType($type)
    {
        if (!in_array($type, [
            self::TYPE_STYLE,
            self::TYPE_SCRIPT,
            self::TYPE_IMPORT
        ])) {
            throw new AssetException(ExceptionHelper::format('Invalid asset type: :type passed' .
                ' to :method. See TYPE_* constants in :class.', [
                'type' => $type,
                'method' => __METHOD__,
                'class' => __CLASS__
            ]));
        }
        $this->type = $type;
        return $this;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;
        return $this;
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
     * @return array
     */
    public function getRequirements()
    {
        return $this->requirements;
    }

    /**
     * @param array $requirements
     * @return $this
     */
    public function setRequirements(array $requirements)
    {
        $this->requirements = $requirements;
        return $this;
    }
}