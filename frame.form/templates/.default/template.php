<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);

$APPLICATION->AddHeadScript("/local/components/rarus/form.feedback/script.js"); // Скрипт, содержащий обработку отправки запроса
$APPLICATION->SetAdditionalCss("/local/components/rarus/form.feedback/style.css");

?>

<div id="mapbox" style="width: 100%; height: 500px;"></div>

<!-- Скрипт, запускающий карту -->
 <script>
        var <?=$arResult['FORM_CODE']?>;
        ymaps.ready(function(){
            <?=$arResult['FORM_CODE']?> = new ymaps.Map("mapbox", {
                center: [<?=$arResult["LATITUDE"]?>, <?=$arResult["LONGITUDE"]?>],
                zoom: <?=$arResult[SCALE]?>,
                controls: []
            });
            <?=$arResult['FORM_CODE']?>.geoObjects.add(
                new ymaps.Placemark([<?=$arResult["LATITUDE"]?>, <?=$arResult["LONGITUDE"]?>],
            {

                balloonContentBody: '<?=$arResult["BALLOON_CAPTION"]?>',
                iconCaption: '<?=$arResult["ICON_CAPTION"]?>',
            },
            {
                preset: 'islands#redEducationIcon',
                balloonMaxWidth: 200,
            }))
            <?=$arResult['FORM_CODE']?>.behaviors.disable('scrollZoom');
        });
</script>
