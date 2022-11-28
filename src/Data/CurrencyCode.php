<?php

namespace ArtARTs36\CbrCourseFinder\Data;

enum CurrencyCode: string
{
    case ISO_RUB = 'RUB'; // Российский рубль
    case ISO_AUD = 'AUD'; // Австралийский доллар
    case ISO_AZN = 'AZN'; // Азербайджанский манат
    case ISO_GBP = 'GBP'; // Фунт стерлингов Соединенного королевства
    case ISO_AMD = 'AMD'; // Армянских драмов
    case ISO_BYN = 'BYN'; // Белорусский рубль
    case ISO_BGN = 'BGN'; // Болгарский лев
    case ISO_BRL = 'BRL'; // Бразильский реал
    case ISO_HUF = 'HUF'; // Венгерских форинтов
    case ISO_HKD = 'HKD'; // Гонконгских долларов
    case ISO_DKK = 'DKK'; // Датская крона
    case ISO_USD = 'USD'; // Доллар США
    case ISO_EUR = 'EUR'; // Евро
    case ISO_INR = 'INR'; // Индийских рупий
    case ISO_KZT = 'KZT'; // Казахстанских тенге
    case ISO_CAD = 'CAD'; // Канадский доллар
    case ISO_KGS = 'KGS'; // Киргизских сомов
    case ISO_CNY = 'CNY'; // Китайский юань
    case ISO_MDL = 'MDL'; // Молдавских леев
    case ISO_NOK = 'NOK'; // Норвежских крон
    case ISO_PLN = 'PLN'; // Польский злотый
    case ISO_RON = 'RON'; // Румынский лей
    case ISO_XDR = 'XDR'; // СДР (специальные права заимствования)
    case ISO_SGD = 'SGD'; // Сингапурский доллар
    case ISO_TJS = 'TJS'; // Таджикских сомони
    case ISO_TRY = 'TRY'; // Турецкая лира
    case ISO_TMT = 'TMT'; // Новый туркменский манат
    case ISO_UZS = 'UZS'; // Узбекских сумов
    case ISO_UAH = 'UAH'; // Украинских гривен
    case ISO_CZK = 'CZK'; // Чешских крон
    case ISO_SEK = 'SEK'; // Шведских крон
    case ISO_CHF = 'CHF'; // Швейцарский франк
    case ISO_ZAR = 'ZAR'; // Южноафриканских рэндов
    case ISO_KRW = 'KRW'; // Вон Республики Корея
    case ISO_JPY = 'JPY'; // Японских иен
}
