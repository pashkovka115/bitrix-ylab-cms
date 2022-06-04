<?php if (!defined('B_PROLOG_INCLUDED') or B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

?>
<?php if (!$arResult['IF_PROMO']) { ?>
    <div class="messages">
        <p><?= Loc::getMessage('SS_MESSAGE_CHECKOUT') ?><?= $arResult['TOTAL_COST'] ?><?= Loc::getMessage('SS_CURRENCY') ?></p>
    </div>
<?php } ?>
<div class="list">
    <b><?= Loc::getMessage('YLAB.PROMO.ITEMS') ?></b><br>
    <?php foreach ($arResult['BASKET_ITEMS'] as $basketItem) { ?>
        <div>
            <p>
                <?= $basketItem->getField('NAME') . ' = ' . $basketItem->getQuantity() ?><br>
                <?= Loc::getMessage('YLAB.PROMO.PRICE') . $basketItem->getField('PRICE') ?>
            </p>
        </div>
        <hr>
    <?php } ?>
</div>

<div class="price">
    <p><?= Loc::getMessage('SS_ALL_PRICE') ?><?= $arResult['FULL_PRICE'] ?></p>
</div>

<form method="post" action="<?= POST_FORM_ACTION_URI ?>">
    <label for="cnt"><?= Loc::getMessage('COUNT_PRESENTS') ?></label><br>
    <input type="number" id="cnt" name="count_presents" min="1">
    <input type="submit" value="Хочу столько"><br><br><br>
</form>

<div class="my-form">
    <?php if ($arResult['IF_PROMO']) { ?>
        <button type="button" class="btn btn-success"><?= Loc::getMessage('SS_CHECKOUT') ?></button>
    <?php } else { ?>
        <button type="button" class="btn btn-secondary" disabled><?= Loc::getMessage('SS_NOT_CHECKOUT') ?></button>
    <?php } ?>
</div>