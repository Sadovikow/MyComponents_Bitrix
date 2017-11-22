<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Context,
	Bitrix\Main\Type\DateTime,
	Bitrix\Main\Loader,
	Bitrix\Iblock;

    $APPLICATION->AddHeadScript("/local/components/rarus/form.feedback/script.js"); // Скрипт, содержащий обработку отправки запроса
    $APPLICATION->SetAdditionalCss("/local/components/rarus/form.feedback/style.css");

    $arResult['FORM_TITLE'] = $arParams['FORM_TITLE'];
    $arResult['FORM_CODE'] = $arParams['FORM_CODE'];
    $arResult['IBLOCK_ID'] = $arParams['IBLOCK_ID'];
    $arResult['LATITUDE'] =  $arParams['LATITUDE'];
    $arResult['LONGITUDE'] =  $arParams['LONGITUDE'];
    $arResult['ICON_CAPTION'] =  $arParams['ICON_CAPTION'];
    $arResult['BALLOON_CAPTION'] =  $arParams['BALLOON_CAPTION'];
    $arResult['SCALE'] =  $arParams['SCALE'];

    $this->includeComponentTemplate();