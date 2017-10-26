<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
    return; // Подключаем модуль инфоблоков

$arIBlocks=array();
$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch()) // Выводим список инфоблоков
    $arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];

$IBLOCK_ID = $arCurrentValues["IBLOCK_ID"]; // Определяем, какой инфоблок у нас выбран сейчас
$arPropFields = array(); // Массив свойств выбранного ифоблока
$properties = CIBlockProperty::GetList(Array("sort"=>"asc", "name"=>"asc"), Array("ACTIVE"=>"Y", "IBLOCK_ID"=>$IBLOCK_ID));
while ($prop_fields = $properties->GetNext())
{
    $arPropFields[$prop_fields["ID"]] = "[".$prop_fields["ID"]."] ".$prop_fields["NAME"];
}

$arRequiredFields = array();
foreach($arCurrentValues["FIELDS"] as $key=>$curFields)
{
    $arRequiredFields[$key] = "[".$curFields."] ".$curFields;
}

 $arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "FORM_TITLE" => array(
            "PARENT" => "BASE",
            "NAME" => "Заголовок формы",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "Форма обратной связи",
            "REFRESH" => "Y",
            ),
        "FORM_CODE" => array(
            "PARENT" => "BASE",
            "NAME" => "Индивидуальный идентификатор формы",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "rarus_form",
            "REFRESH" => "N",
            ),
        "SEND_MAIL" => array(
            "PARENT" => "BASE",
            "NAME" => "Отправлять письмо администратору",
            "TYPE" => "CHECKBOX",
            "DEFAULT" => "Y",
        ),
        "IBLOCK_ID" => array(
            "PARENT" => "BASE",
            "NAME" => "Инфоблок",
            "TYPE" => "LIST",
            "VALUES" => $arIBlocks,
            "DEFAULT" => '={$_REQUEST["ID"]}',
            "ADDITIONAL_VALUES" => "N",
            "REFRESH" => "Y",
        ),
        "FIELDS" => array(
            "PARENT" => "BASE",
            "NAME" => "Поля",
            "TYPE" => "LIST",
            "VALUES" => $arPropFields,
            "DEFAULT" => ' ',
            "REFRESH" => "Y",
            "MULTIPLE" => "Y",

        ),
        "REQUIRED_FIELDS" => array(
            "PARENT" => "BASE",
            "NAME" => "Обязательные поля",
            "TYPE" => "LIST",
            "VALUES" => $arRequiredFields,
            "DEFAULT" => '',
            "ADDITIONAL_VALUES" => "N",
            "MULTIPLE" => "Y",
        ),
        "DO_REQUIRED" => array(
            "PARENT" => "BASE",
            "NAME" => "Проверять обязательные поля",
            "TYPE" => "CHECKBOX",
            "DEFAULT" => 'Y',
            "MULTIPLE" => "N",
        ),
    ),
);
?>