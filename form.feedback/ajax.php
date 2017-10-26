<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
$GLOBALS['APPLICATION']->RestartBuffer();
use Bitrix\Main\Loader;
Loader::includeModule("iblock");
if(isset($_POST)){
    $IBLOCK = IBLOCK_FEEDBACK_ID;
    /* Делаем запись в инфоблок */
    $arFields = array(
        "ACTIVE" => "Y",
        "IBLOCK_ID" => $IBLOCK,
        "NAME" => $_POST['phone'].' Оставил(а) заявку',
        "DETAIL_TEXT" => $_POST['comment'],
        "PROPERTY_VALUES" => array(
            "EMAIL"   => $_POST['email'],
            "PHONE"   => $_POST['phone'],
            "COMMENT" => $_POST['comment'],
            "FIO" => $_POST['fio'],
            )
        );
        $oElement = new CIBlockElement();
        $idElement = $oElement->Add($arFields, false, false, true);
}
if($idElement)
    $result = 1;
else
    $result = 0;
echo json_encode($result);
/* Отправка письма администратору */
/*
$postTemplate = 92;     // ID Шаблона
$arEventFields = array( // Свойства
    "EMAIL"   => $_POST['email'],
    "FIO"     => $_POST['fio'],
    "PHONE"   => $_POST['phone'],
    "COMMENT" => $_POST['comment']
);
CEvent::Send("ALX_FEEDBACK_FORM", "h1", $arEventFields, $postTemplate);
*/
 die(); ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>