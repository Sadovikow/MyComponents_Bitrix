<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
    return; // Подключаем модуль инфоблоков

/*
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
}*/

 $arComponentParameters = array(
    "GROUPS" => array(),
    "PARAMETERS" => array(
        "FORM_TITLE" => array(
            "PARENT" => "BASE",
            "NAME" => "Заголовок формы",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "Карта",
            "REFRESH" => "N",
            ),
        "FORM_CODE" => array(
            "PARENT" => "BASE",
            "NAME" => "Индивидуальный идентификатор формы",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "rarusMap",
            "REFRESH" => "N",
            ),
        "LATITUDE" => array(
            "PARENT" => "BASE",
            "NAME" => "Широта",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "55.532966",
            "REFRESH" => "N",
            ),
        "LONGITUDE" => array(
            "PARENT" => "BASE",
            "NAME" => "Долгота",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "37.527265",
            "REFRESH" => "N",
            ),
        "ICON_CAPTION" => array(
            "PARENT" => "BASE",
            "NAME" => "Описание точки",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "Дмитровское шоссе, д. 9Б",
            "REFRESH" => "N",
            ),
        "BALLOON_CAPTION" => array(
            "PARENT" => "BASE",
            "NAME" => "Описание в облаке",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "г. Москва, Дмитровское шоссе, д. 9Б, к. 714",
            "REFRESH" => "N",
            ),
        "SCALE" => array(
            "PARENT" => "BASE",
            "NAME" => "Приближение",
            "TYPE" => "STRING",
            "MULTIPLE" => "N",
            "DEFAULT" => "14",
            "REFRESH" => "N",
            ),

    ),
);
?>