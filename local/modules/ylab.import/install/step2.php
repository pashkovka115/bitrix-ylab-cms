<?php

use Bitrix\Main\Localization\Loc;

if (!check_bitrix_sessid()) {
    return;
}

Loc::loadMessages(__FILE__);
?>

<form action="<?= $APPLICATION->GetCurPage() ?>">
    <?= bitrix_sessid_post() ?>
  <label><?= Loc::getMessage('YLAB.IMPORT.CHECKBOX1') ?>
    <input type="checkbox" name="checkbox1" value="Y">
  </label><br><br>

  <label><?= Loc::getMessage('YLAB.IMPORT.CHECKBOX2') ?>
    <input type="checkbox" name="checkbox2" value="Y">
  </label><br><br>

  <label><?= Loc::getMessage('YLAB.IMPORT.MULTISELECTBOX') ?>
    <select name="multiselectbox[]" multiple size="5">
      <option value="var1">var1</option>
      <option value="var2">var2</option>
      <option value="var3">var3</option>
      <option value="var4">var4</option>
    </select>
  </label><br><br>

  <label><?= Loc::getMessage('YLAB.IMPORT.SELECTBOX') ?>
    <select name="selectbox">
      <option value="var1">var1</option>
      <option value="var2">var2</option>
      <option value="var3">var3</option>
      <option value="var4">var4</option>
    </select>
  </label><br><br>

  <label>
    <input type="radio" name="radio" id="WHAT_none" value="none">
    <label for="WHAT_none"><?= Loc::getMessage('YLAB.IMPORT.CUSTOM.RADIO.NOT') ?></label><br>

    <input type="radio" name="radio" id="WHAT_groups" value="groups">
    <label for="WHAT_groups"><?= Loc::getMessage('YLAB.IMPORT.CUSTOM.RADIO.GROUP') ?></label><br>

    <input type="radio" name="radio" id="WHAT_ranges" value="ranges">
    <label for="WHAT_ranges"><?= Loc::getMessage('YLAB.IMPORT.CUSTOM.RADIO.RANGES') ?></label><br>

    <input type="radio" name="radio" id="WHAT_both" value="both">
    <label for="WHAT_both"><?= Loc::getMessage('YLAB.IMPORT.CUSTOM.RADIO.ALL') ?></label><br>
  </label><br><br>

  <label><?= Loc::getMessage('YLAB.IMPORT.COLOR') ?>
    <input type="color" name="product_color" id="product_color" value="">
  </label><br><br>

  <label><?= Loc::getMessage('YLAB.IMPORT.CUSTOM.TEXT') ?>
    <input type="text" name="custom_text" id="custom_text" value="">
  </label><br><br>

  <label><?= Loc::getMessage('YLAB.IMPORT.CUSTOM.DATETIME_LOCAL') ?>
    <input type="datetime-local" name="custom_datetime_local" id="custom_datetime_local" value="2022-06-16T07:23">
  </label><br><br>

  <label><?= Loc::getMessage('YLAB.IMPORT.CUSTOM.NUMBER') ?>
    <input type="number" name="custom_number" id="custom_number" value="50" min="0" max="120">
  </label><br><br>

  <input type="hidden" name="lang" value="<?= LANGUAGE_ID ?>">
  <input type="hidden" name="id" value="ylab.import">
  <input type="hidden" name="install" value="Y">
  <input type="hidden" name="step" value="3">
  <input type="submit" name="" value="<?= Loc::getMessage('YLAB.IMPORT.MORE') ?>">
</form>
