<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

$APPLICATION->AddHeadScript("/local/components/rarus/form.feedback/js/jquery.validate.min.js"); // jquery required
$APPLICATION->AddHeadScript("/local/components/rarus/form.feedback/script.js"); // Скрипт, содержащий обработку отправки запроса
$APPLICATION->SetAdditionalCss("/local/components/rarus/form.feedback/style.css");

?>

<div class="rarus_feedbackform">
    <form class="rarus_form" id="<?=$arResult['FORM_CODE']?>">
        <h1><?=$arResult['FORM_TITLE']?></h1>
        <div class="rarus_feedbackform__row"><label for="fio">ФИО:*</label><input type="text" name="fio" <?=$arResult['DO_REQUIRED']?>></div>
        <div class="rarus_feedbackform__row"><label for="phone">Телефон:*</label><input type="tel" name="phone" <?=$arResult['DO_REQUIRED']?>></div>
        <div class="rarus_feedbackform__row"><label for="email">Email:*</label><input type="email" name="email" <?=$arResult['DO_REQUIRED']?>></div>
        <div class="rarus_feedbackform__row"><label for="comment">Комментарий*</label><input name="comment" type="text"></div>
        <div class="rarus_feedbackform__row"><input type="submit" value="Отправить"></div>
    </form>

</div>

<script>
$(document).ready(function(){
    $('#<?=$arResult['FORM_CODE']?>').submit(function(){
        // Вызываем функцию отправки формы
        sendFeedbackForm_rarus($(this).attr('id'));
        return false;
    });
    <?if(isset($arResult['DO_REQUIRED'])): // Если включена проверка полей, то вызываем подстветку полей?>
        validateForm_rarus('<?=$arResult['FORM_CODE']?>');
    <?endif;?>
});
</script>