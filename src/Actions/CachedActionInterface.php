<?php

/**
 * TechDivision\Import\Cache\Actions\CacheActionInterface
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

namespace TechDivision\Import\Cache\Actions;

use TechDivision\Import\Actions\ActionInterface;

/**
 * Interface for cache aware identifier action implementations.
 *
 * @author    Tim Wagner <t.wagner@techdivision.com>
 * @copyright 2021 TechDivision GmbH <info@techdivision.com>
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @link      https://github.com/techdivision/import-cache
 * @link      http://www.techdivision.com
 */
interface CachedActionInterface extends ActionInterface
{

    /**
     * Return's the cache key of the action to use.
     *
     * @return string The cache key
     */
    public function getCacheKey();
}
