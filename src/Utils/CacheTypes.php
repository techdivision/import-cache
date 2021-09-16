<?php

/**
 * TechDivision\Import\Cache\Utils\CacheTypes
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
 * A utility class that contains the cache types.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2021 TechDivision GmbH <info@techdivision.com>
 * @license   https://opensource.org/licenses/MIT
 * @link      https://github.com/techdivision/import-cache
 * @link      http://www.techdivision.com
 */
class CacheTypes
{

    /**
     * This is a utility class, so protect it against direct
     * instantiation.
     */
    private function __construct()
    {
    }

    /**
     * This is a utility class, so protect it against cloning.
     *
     * @return void
     */
    private function __clone()
    {
    }

    /**
     * The static cache type.
     *
     * @var string
     */
    const TYPE_STATIC = 'cache.static';

    /**
     * The configurable cache type.
     *
     * @var string
     */
    const TYPE_CONFIGURABLE = 'cache.configurable';
}
