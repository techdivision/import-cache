<?php

/**
 * TechDivision\Import\Cache\Utils\CacheKeysInterface
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2021 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-cache
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Cache\Utils;

/**
 * Interface for cache key implementations.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2021 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-cache
 * @link      http://www.techdivision.com
 */
interface CacheKeysInterface extends \ArrayAccess
{

    /**
     * Query whether or not the passed cache key is valid.
     *
     * @param string $cacheKey The cache key to query for
     *
     * @return boolean TRUE if the cache key is valid, else FALSE
     */
    public function isCacheKey($cacheKey);

    /**
     * Returns the cache key of the actual instance.
     *
     * @return string The cache key
     */
    public function getCacheKey();
}
