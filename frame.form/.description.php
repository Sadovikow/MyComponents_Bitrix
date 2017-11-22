<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Карта (1C-Rarus)",
	"DESCRIPTION" => "Карта Yandex",
	"ICON" => "/images/logo.png",
	"SORT" => 25,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "1С-Rarus",
		"CHILD" => array(
			"ID" => "map",
			"NAME" => "Карта (1C-Rarus)",
		),
	),
);

?>