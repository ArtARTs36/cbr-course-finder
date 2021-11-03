<?php

namespace ArtARTs36\CbrCourseFinder;

class Course
{
    /** @see CurrencyCode */
    /** @deprecated */
    public const ISO_RUB = 'RUB'; // Российский рубль
    /** @deprecated */
    public const ISO_AUD = 'AUD'; // Австралийский доллар
    /** @deprecated */
    public const ISO_AZN = 'AZN'; // Азербайджанский манат
    /** @deprecated */
    public const ISO_GBP = 'GBP'; // Фунт стерлингов Соединенного королевства
    /** @deprecated */
    public const ISO_AMD = 'AMD'; // Армянских драмов
    /** @deprecated */
    public const ISO_BYN = 'BYN'; // Белорусский рубль
    /** @deprecated */
    public const ISO_BGN = 'BGN'; // Болгарский лев
    /** @deprecated */
    public const ISO_BRL = 'BRL'; // Бразильский реал
    /** @deprecated */
    public const ISO_HUF = 'HUF'; // Венгерских форинтов
    /** @deprecated */
    public const ISO_HKD = 'HKD'; // Гонконгских долларов
    /** @deprecated */
    public const ISO_DKK = 'DKK'; // Датская крона
    /** @deprecated */
    public const ISO_USD = 'USD'; // Доллар США
    /** @deprecated */
    public const ISO_EUR = 'EUR'; // Евро
    /** @deprecated */
    public const ISO_INR = 'INR'; // Индийских рупий
    /** @deprecated */
    public const ISO_KZT = 'KZT'; // Казахстанских тенге
    /** @deprecated */
    public const ISO_CAD = 'CAD'; // Канадский доллар
    /** @deprecated */
    public const ISO_KGS = 'KGS'; // Киргизских сомов
    /** @deprecated */
    public const ISO_CNY = 'CNY'; // Китайский юань
    /** @deprecated */
    public const ISO_MDL = 'MDL'; // Молдавских леев
    /** @deprecated */
    public const ISO_NOK = 'NOK'; // Норвежских крон
    /** @deprecated */
    public const ISO_PLN = 'PLN'; // Польский злотый
    /** @deprecated */
    public const ISO_RON = 'RON'; // Румынский лей
    /** @deprecated */
    public const ISO_XDR = 'XDR'; // СДР (специальные права заимствования)
    /** @deprecated */
    public const ISO_SGD = 'SGD'; // Сингапурский доллар
    /** @deprecated */
    public const ISO_TJS = 'TJS'; // Таджикских сомони
    /** @deprecated */
    public const ISO_TRY = 'TRY'; // Турецкая лира
    /** @deprecated */
    public const ISO_TMT = 'TMT'; // Новый туркменский манат
    /** @deprecated */
    public const ISO_UZS = 'UZS'; // Узбекских сумов
    /** @deprecated */
    public const ISO_UAH = 'UAH'; // Украинских гривен
    /** @deprecated */
    public const ISO_CZK = 'CZK'; // Чешских крон
    /** @deprecated */
    public const ISO_SEK = 'SEK'; // Шведских крон
    /** @deprecated */
    public const ISO_CHF = 'CHF'; // Швейцарский франк
    /** @deprecated */
    public const ISO_ZAR = 'ZAR'; // Южноафриканских рэндов
    /** @deprecated */
    public const ISO_KRW = 'KRW'; // Вон Республики Корея
    /** @deprecated */
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
