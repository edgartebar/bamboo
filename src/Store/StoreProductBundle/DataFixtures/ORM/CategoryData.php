<?php

/**
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * This distribution is just a basic e-commerce implementation based on
 * Elcodi project.
 *
 * Feel free to edit it, and make your own
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author ##author_placeholder
 * @version ##version_placeholder##
 */

namespace Store\StoreProductBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;

use Elcodi\CoreBundle\DataFixtures\ORM\Abstracts\AbstractFixture;
use Elcodi\ProductBundle\Entity\Interfaces\CategoryInterface;

/**
 * Class CategoryData
 */
class CategoryData extends AbstractFixture
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        /**
         * Women's Category
         *
         * @var CategoryInterface $category
         */
        $womenCategory = $this->container->get('elcodi.core.product.factory.category')->create();
        $womenCategory
            ->setName('Women\'s')
            ->setSlug('women-shirts')
            ->setEnabled(true)
            ->setRoot(true);

        $manager->persist($womenCategory);
        $this->addReference('category-women', $womenCategory);

        /**
         * Men's Category
         *
         * @var CategoryInterface $menCategory
         */
        $menCategory = $this->container->get('elcodi.core.product.factory.category')->create();
        $menCategory
            ->setName('Men\'s')
            ->setSlug('men-shirts')
            ->setEnabled(true)
            ->setRoot(true);

        $manager->persist($menCategory);
        $this->addReference('category-men', $menCategory);

        $manager->flush();
    }

    /**
     * Order for given fixture
     *
     * @return int
     */
    public function getOrder()
    {
        return 1;
    }
}
