<?php

/*
 * This file is part of the ASBO package.
 *
 * (c) De Ron Malian <deronmalian@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Asbo\CoreBundle\Twig;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Global variables for ASBO's packages.
 *
 * @author De Ron Malian <deronmalian@gmail.com>
 */
class GlobalVariables
{
    /**
     * @var CountainerInterface
     */
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * Return the global Who's Who variable
     *
     * @return Asbo\WhosWhoBundle\Twig\GlobalVariables
     */
    public function getWhosWho()
    {
        if ($this->container->has('asbo.whoswho.twig.global')) {
            return $this->container->get('asbo.whoswho.twig.global');
        } else {
            throw new \Exception('Le bundle Who\'s Who ? ne semble pas être installé.');
        }
    }

    /**
     * Return the global UserAsbo variable
     *
     * @return Asbo\WhosWhoBundle\Twig\GlobalVariables
     */
    public function getUser()
    {
        if ($this->container->has('asbo.user.twig.global')) {
            return $this->container->get('asbo.user.twig.global');
        } else {
            throw new \Exception('Le bundle AsboUser ne semble pas être installé.');
        }
    }
}
