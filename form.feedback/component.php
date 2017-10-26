<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main\Context,
	Bitrix\Main\Type\DateTime,
	Bitrix\Main\Loader,
	Bitrix\Iblock;

    $APPLICATION->AddHeadScript("/local/components/rarus/form.feedback/js/jquery.validate.min.js"); // jquery required
    $APPLICATION->AddHeadScript("/local/components/rarus/form.feedback/script.js"); // Скрипт, содержащий обработку отправки запроса
    $APPLICATION->SetAdditionalCss("/local/components/rarus/form.feedback/style.css");

    $arResult['SEND_MAIL'] = $arParams['SEND_MAIL'];
    $arResult['FORM_TITLE'] = $arParams['FORM_TITLE'];
    $arResult['FORM_CODE'] = $arParams['FORM_CODE'];

    if($arParams['DO_REQUIRED'] == 'Y')
    { // Проверка полей
        $arResult['DO_REQUIRED'] = 'required=""';
    }

    $arRequredFields = array();
    foreach($arParams['FIELDS'] as $key=>$Field):
        $properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$arParams['IBLOCK_ID'], "ID"=> $Field));
        while ($prop_fields = $properties->GetNext())
        {
            $arRequredFields[$prop_fields['ID']] = $prop_fields;
        }
    endforeach;
    //print_r($arParams['REQUIRED_FIELDS']);

        $this->includeComponentTemplate();