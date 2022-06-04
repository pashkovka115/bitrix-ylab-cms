<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Урок 2");
?>
<?php $APPLICATION->IncludeComponent('smirnov:promo', '', []); ?>
<?php //$APPLICATION->IncludeComponent('smirnov:sale.basket.basket', '', []); ?>
<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>


