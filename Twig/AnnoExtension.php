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

/**
 * Extension to manipulate Anno.
 *
 * @author De Ron Malian <deronmalian@gmail.com>
 */
class AnnoExtension extends \Twig_Extension
{
    /**
     * @var array
     */
    protected $romans = array('M'  => 1000,
                              'CM' => 900,
                              'D'  => 500,
                              'CD' => 400,
                              'C'  => 100,
                              'XC' => 90,
                              'L'  => 50,
                              'XL' => 40,
                              'X'  => 10,
                              'IX' => 9,
                              'V'  => 5,
                              'IV' => 4,
                              'I'  => 1,
                             );

    /**
     * {@inheritdoc}
     */
    public function getFilters()
    {
        return array(
             'DateToAnno' => new \Twig_Filter_Method($this, 'DateToAnnoFilter'),
             'AnnoToDate' => new \Twig_Filter_Method($this, 'AnnoToDateFilter'),
        );
    }

    /**
     * Transform date to Anno
     *
     * @param int|string $arabic Arabic date
     * @param boolean    $upcase If false, return the ouput lowercase
     *
     * @todo changer la fonction pour quelque chose de plus compréhensible
     *
     * @return string
     */
    public function DateToAnnoFilter($arabic, $upcase = true)
    {
        $c = 'IVXLCDM';

        for($a = 5, $b = $s =''; $arabic; $b++, $a^=7)
            for($o = $arabic % $a, $arabic = $arabic / $a^0; $o--; $s = $c[$o > 2 ? $b + $arabic - ($arabic &= -2) + $o = 1:$b].$s);

        if(false == $upcase) $s = strtolower($s);

        return $s;
    }

    /**
     * Transform Anno to a date
     *
     * @param string $roman Roman date
     *
     * @return int
     */
    public function AnnoToDateFilter($roman)
    {
        $result = 0;

        foreach ($this->romans as $key => $value) {
            while (strpos($roman, $key) === 0) {
                $result += $value;
                $roman = substr($roman, strlen($key));
            }
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'anno_extension';
    }
}
