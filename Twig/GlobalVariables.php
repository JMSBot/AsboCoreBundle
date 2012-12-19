<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Asbo\CoreBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;


class GlobalVariables
{
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function getWhosWho()
    {
        if ($this->container->has('asbo.whoswho.twig.global')) {
            return $this->container->get('asbo.whoswho.twig.global');
        }
        else
            throw new \Exception('Le bundle Who\'s Who ? ne semble pas être installé.');
    }
}