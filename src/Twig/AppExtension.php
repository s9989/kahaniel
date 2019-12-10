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
            new TwigFilter('bank', array($this, 'bankFilter')),
            new TwigFilter('account_number', array($this, 'accountNumberFilter')),
            new TwigFilter('literal', array($this, 'literalFilter')),
        );
    }

    /**
     * @param $number
     * @param int $decimals
     * @param string $decPoint
     * @param string $thousandsSep
     * @return string
     */
    public function priceFilter($number, int $decimals = 2, string $decPoint = '.', string $thousandsSep = ''): string
    {
        $price = number_format($number / 100, $decimals, $decPoint, $thousandsSep);
        $price = $price . ' ' . 'zł';

        return $price;
    }

    /**
     * @param string $accountNumber
     * @return string
     */
    public function accountNumberFilter(string $accountNumber): string
    {
        if (strlen($accountNumber) !== 26) {
            return $accountNumber;
        }

        $part1 = substr($accountNumber, 0, 2);
        $part2 = substr($accountNumber, 2);

        return sprintf("%s %s", $part1, chunk_split($part2, 4, " "));
    }

    /**
     * @param string $accountNumber
     * @return string|null
     */
    public function bankFilter(string $accountNumber): ?string
    {
        if (strlen($accountNumber) < 6) {
            return null;
        }

        $bankId = substr($accountNumber, 2, 4);

        switch ($bankId) {
            case '1010': return 'Narodowy Bank Polski';
            case '1020': return 'PKO BP';
            case '1030': return 'Bank Handlowy (Citi Handlowy)';
            case '1050': return 'ING';
            case '1060': return 'BPH';
            case '1090': return 'BZ WBK';
            case '1130': return 'BGK';
            case '1140': return 'mBank'; // lub Orange Finanse
            case '1160': return 'Bank Millennium';
            case '1240': return 'Pekao';
            case '1280': return 'HSBC';
            case '1320': return 'Bank Pocztowy';
            case '1470': return 'Eurobank';
            case '1540': return 'BOŚ';
            case '1580': return 'Mercedes-Benz Bank Polska';
            case '1610': return 'SGB - Bank';
            case '1670': return 'RBS Bank (Polska)';
            case '1680': return 'Plus Bank';
            case '1750': return 'Raiffeisen Bank';
            case '1840': return 'Societe Generale';
            case '1870': return 'Nest Bank';
            case '1910': return 'Deutsche Bank Polska';
            case '1930': return 'Bank Polskiej Spółdzielczości';
            case '1940': return 'Credit Agricole Bank Polska';
            case '1950': return 'Idea Bank';
            case '2030': return 'BGŻ BNP Paribas';
            case '2070': return 'FCE Bank Polska';
            case '2120': return 'Santander Consumer Bank';
            case '2130': return 'Volkswagen Bank';
            case '2140': return 'Fiat Bank Polska';
            case '2160': return 'Toyota Bank';
            case '2190': return 'DnB Nord';
            case '2480': return 'Getin Noble Bank';
            case '2490': return 'Alior Bank, T-Mobile Usługi Bankowe';
            default: return null;
        }
    }

    /**
     * @param int $digit
     * @return string
     */
    private function hundredthLiteral(int $digit): string
    {
        switch ($digit) {
            case 1: return 'sto';
            case 2: return 'dwieście';
            case 3: return 'trzysta';
            case 4: return 'czterysta';
            case 5: return 'pięćset';
            case 6: return 'sześćset';
            case 7: return 'siedemset';
            case 8: return 'osiemset';
            case 9: return 'dziewięćset';
        }

        return '';
    }

    /**
     * @param int $digit
     * @return string
     */
    private function decimalLiteral(int $digit): string
    {
        switch ($digit) {
            case 2: return 'dwadzieścia';
            case 3: return 'trzydzieści';
            case 4: return 'czterdzieści';
            case 5: return 'pięćdziesiąt';
            case 6: return 'sześćdziesiąt';
            case 7: return 'siedemdziesiąt';
            case 8: return 'osiemdziesiąt';
            case 9: return 'dziewięćdziesiąt';
        }

        return '';
    }

    /**
     * @param int $digit
     * @return string
     */
    private function elevenLiteral(int $digit): string
    {
        switch ($digit) {
            case 0: return 'dziesięć';
            case 1: return 'jedenaście';
            case 2: return 'dwanaście';
            case 3: return 'trzynaście';
            case 4: return 'czternaście';
            case 5: return 'piętnaście';
            case 6: return 'szesnaście';
            case 7: return 'siedemnaście';
            case 8: return 'osiemnaście';
            case 9: return 'dziewiętnaście';
        }

        return '';
    }

    private function oneLiteral(int $digit): string
    {
        switch ($digit) {
            case 1: return 'jeden';
            case 2: return 'dwa';
            case 3: return 'trzy';
            case 4: return 'cztery';
            case 5: return 'pięć';
            case 6: return 'sześć';
            case 7: return 'siedem';
            case 8: return 'osiem';
            case 9: return 'dziewięć';
        }

        return '';
    }

    public function literalFilter($number)
    {
        $full = floor($number / 100);
        $pennies = $number - $full * 100;

        $decimal = $full - floor($full / 100) * 100;

        if ($decimal > 19) {
            $ten = $this->decimalLiteral(floor($decimal / 10));
            $ten .= ' ' . $this->oneLiteral($decimal - floor($decimal / 10) * 10);
        } elseif ($decimal > 9) {
            $ten = $this->elevenLiteral($decimal - floor($decimal / 10) * 10);
        } else {
            $ten = $this->oneLiteral($decimal);
        }

        $hundredth = $full - floor($full / 1000) * 1000;
        $hundred = $this->hundredthLiteral(floor($hundredth / 100));

        $thousandth = floor(($full - floor($full / 100000) * 100000) / 1000);

        if ($thousandth > 19) {
            $thousand = $this->decimalLiteral(floor($thousandth / 10));
            $thousand .= ' ' . $this->oneLiteral($thousandth - floor($thousandth / 10) * 10);
        } elseif ($thousandth > 9) {
            $thousand = $this->elevenLiteral($thousandth - floor($thousandth / 10) * 10);
        } else {
            $thousand = $this->oneLiteral($thousandth);
        }

        $thousandthDigit = $thousandth - floor($thousandth / 10) * 10;

        if ($thousandthDigit > 4) {
            $thousand .= ' tysięcy';
        } elseif ($thousandthDigit > 1) {
            $thousand .= ' tysiące';
        } else {
            $thousand .= ' tysiąc';
        }

        if ($full > 999) {
            $literal = sprintf('%s %s %s', $thousand, $hundred, $ten);
        } elseif ($full > 99) {
            $literal = sprintf('%s %s', $hundred, $ten);
        } else {
            $literal = sprintf('%s', $ten);
        }

        return sprintf('%s PLN %d/100', $literal, $pennies);
    }
}