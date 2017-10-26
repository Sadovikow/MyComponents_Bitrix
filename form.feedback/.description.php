<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "Форма обратной связи (1C-Rarus)",
	"DESCRIPTION" => "Обратная связь",
	"ICON" => "/images/logo.png",
	"SORT" => 20,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "1С-Rarus",
		"CHILD" => array(
			"ID" => "feedback",
			"NAME" => "Форма обратной связи (1C-Rarus)",
		),
	),
);

?>