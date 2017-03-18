<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\Install\Test\Constraint;

use Magento\Install\Test\Page\Install;
use Magento\Mtf\Constraint\AbstractConstraint;

/**
 * Check that default Admin URI is generated according to the pattern
 */
class AssertAdminUriAutogenerated extends AbstractConstraint
{
    /**
     * Admin URI pattern.
     */
    const ADMIN_URI_PATTERN = '/config\.address\.admin = \'admin_[a-z0-9]{1,6}/';

    /**
     * Assert that default Admin URI is generated according to the pattern.
     *
     * @param Install $installPage
     * @return void
     */
    public function processAssert(Install $installPage)
    {
        \PHPUnit_Framework_Assert::assertRegExp(
            self::ADMIN_URI_PATTERN,
            $installPage->getWebConfigBlock()->getAdminUriCheck(),
            'Unexpected Backend Frontname pattern.'
        );
    }

    /**
     * Returns a string representation of successful assertion.
     *
     * @return string
     */
    public function toString()
    {
        return "Default Admin URI is OK.";
    }
}
