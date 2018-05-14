<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return array(
            new TwigFilter('price', array($this, 'priceFilter')),
        );
    }

    public function priceFilter($number, $decimals = 2, $decPoint = '.', $thousandsSep = '')
    {
        $price = number_format($number / 100, $decimals, $decPoint, $thousandsSep);
        $price = $price . ' ' . 'zł';

        return $price;
    }
}