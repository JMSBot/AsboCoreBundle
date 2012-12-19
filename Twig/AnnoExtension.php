<?php

namespace Asbo\CoreBundle\Twig;


class AnnoExtension extends \Twig_Extension
{

    protected $romans = array('M'  => 1000, 'CM' => 900, 'D'  => 500, 'CD' => 400, 'C'  => 100, 'XC' => 90, 'L'  => 50, 'XL' => 40, 'X'  => 10, 'IX' => 9, 'V'  => 5, 'IV' => 4, 'I'  => 1);

    public function getFilters()
    {
        return array(
             'DateToAnno' => new \Twig_Filter_Method($this, 'DateToAnnoFilter'),
             'AnnoToDate' => new \Twig_Filter_Method($this, 'AnnoToDateFilter'),
        );
    }

    public function DateToAnnoFilter($arabic, $upcase = true)
    {
        $c = 'IVXLCDM';

        for($a = 5, $b = $s =''; $arabic; $b++, $a^=7)
            for($o = $arabic % $a, $arabic = $arabic / $a^0; $o--; $s = $c[$o > 2 ? $b + $arabic - ($arabic &= -2) + $o = 1:$b].$s);

        if(false == $upcase) $s = strtolower($s);

        return $s;
    }

    public function AnnoToDateFilter($roman, $date = true, $format = 'Y')
    {
        $result = 0;

        foreach ($this->romans as $key => $value)
        {
            while (strpos($roman, $key) === 0)
            {
                $result += $value;
                $roman = substr($roman, strlen($key));
            }
        }

        return $result;
    }



    public function getName()
    {
        return 'anno_extension';
    }
}