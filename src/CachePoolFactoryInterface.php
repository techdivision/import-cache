<?php

/**
 * TechDivision\Import\Cache\CachePoolFactoryInterface
 *
 * PHP version 7
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2021 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-cache
 * @link      http://www.techdivision.com
 */

namespace TechDivision\Import\Cache;

/**
 * The interface for all cache pool factory implementations.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2021 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-cache
 * @link      http://www.techdivision.com
 */
interface CachePoolFactoryInterface
{

    /**
     * Create's and return's the cache pool to use.
     *
     * @return \Psr\Cache\CacheItemPoolInterface The initialized connection
     */
    public function createCachePool();
}
