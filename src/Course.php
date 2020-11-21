<?php

namespace ArtARTs36\CbrCourseFinder;

class Course
{
    public const ISO_RUB = 'RUB'; // Российский рубль
    public const ISO_AUD = 'AUD'; // Австралийский доллар
    public const ISO_AZN = 'AZN'; // Азербайджанский манат
    public const ISO_GBP = 'GBP'; // Фунт стерлингов Соединенного королевства
    public const ISO_AMD = 'AMD'; // Армянских драмов
    public const ISO_BYN = 'BYN'; // Белорусский рубль
    public const ISO_BGN = 'BGN'; // Болгарский лев
    public const ISO_BRL = 'BRL'; // Бразильский реал
    public const ISO_HUF = 'HUF'; // Венгерских форинтов
    public const ISO_HKD = 'HKD'; // Гонконгских долларов
    public const ISO_DKK = 'DKK'; // Датская крона
    public const ISO_USD = 'USD'; // Доллар США
    public const ISO_EUR = 'EUR'; // Евро
    public const ISO_INR = 'INR'; // Индийских рупий
    public const ISO_KZT = 'KZT'; // Казахстанских тенге
    public const ISO_CAD = 'CAD'; // Канадский доллар
    public const ISO_KGS = 'KGS'; // Киргизских сомов
    public const ISO_CNY = 'CNY'; // Китайский юань
    public const ISO_MDL = 'MDL'; // Молдавских леев
    public const ISO_NOK = 'NOK'; // Норвежских крон
    public const ISO_PLN = 'PLN'; // Польский злотый
    public const ISO_RON = 'RON'; // Румынский лей
    public const ISO_XDR = 'XDR'; // СДР (специальные права заимствования)
    public const ISO_SGD = 'SGD'; // Сингапурский доллар
    public const ISO_TJS = 'TJS'; // Таджикских сомони
    public const ISO_TRY = 'TRY'; // Турецкая лира
    public const ISO_TMT = 'TMT'; // Новый туркменский манат
    public const ISO_UZS = 'UZS'; // Узбекских сумов
    public const ISO_UAH = 'UAH'; // Украинских гривен
    public const ISO_CZK = 'CZK'; // Чешских крон
    public const ISO_SEK = 'SEK'; // Шведских крон
    public const ISO_CHF = 'CHF'; // Швейцарский франк
    public const ISO_ZAR = 'ZAR'; // Южноафриканских рэндов
    public const ISO_KRW = 'KRW'; // Вон Республики Корея
    public const ISO_JPY = 'JPY'; // Японских иен

    protected $isoCode;

    protected $name;

    protected $nominal;

    protected $value;

    protected $previousValue;

    public function __construct(string $isoCode, string $name, float $nominal, float $value, float $previousValue)
    {
        $this->isoCode = $isoCode;
        $this->name = $name;
        $this->nominal = $nominal;
        $this->value = $value;
        $this->previousValue = $previousValue;
    }

    public function equalsIsoCode(string $isoCode): bool
    {
        return $this->isoCode === $isoCode;
    }

    public function equalsName(string $name): bool
    {
        return $this->name === $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getNominal(): float
    {
        return $this->nominal;
    }

    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    public function getValue(): float
    {
        return $this->value;
    }

    public function getPreviousValue(): float
    {
        return $this->previousValue;
    }
}
