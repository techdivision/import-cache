<?php

/**
 * TechDivision\Import\Cache\Configuration\ConfigurationInterface
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * PHP version 5
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2021 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-cache
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Cache\Configuration;

/**
 * Interface for a configuration implementation of the cache implementation.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2021 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-cache
 * @link      http://www.techdivision.com
 */
interface ConfigurationInterface
{

    /**
     * Return's the serial used as unique cache identifier.
     *
     * @return string The serial
     */
    public function getSerial();

    /**
     * Whether or not the cache functionality should be enabled.
     *
     * @return boolean TRUE if the cache has to be enabled, else FALSE
     */
    public function isCacheEnabled();
    /**
     * Return's the configuration for the caches.
     *
     * @return \Doctrine\Common\Collections\ArrayCollection The cache configurations
     */
    public function getCaches();

    /**
     * Return's the cache configuration for the passed type.
     *
     * @param string $type The cache type to return the configuation for
     *
     * @return \TechDivision\Import\Cache\Configuration\CacheConfigurationInterface The cache configuration
     */
    public function getCacheByType($type);
}
