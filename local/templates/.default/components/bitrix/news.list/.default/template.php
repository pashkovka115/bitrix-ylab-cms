<?php

use Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);


foreach ($arResult['ITEMS'] as $item)
{
    ?>
  <div class='block'>
      <?php
      $res = CIBlockElement::GetProperty(
        IntVal($item['PROPERTIES']['ADDRESS']['LINK_IBLOCK_ID']),
        IntVal($item['PROPERTIES']['ADDRESS']['VALUE'])
      );

      ?>
    <p><?= Loc::getMessage('FIO') ?><b><?= $item['PROPERTIES']['FIO']['VALUE'] ?></b></p>
    <p><?= Loc::getMessage('PHONE') ?><b><?= $item['PROPERTIES']['PHONE']['VALUE'] ?></b></p>
    <?php while ($address = $res->GetNext()){ ?>
    <p><?= $address['NAME'] ?><?= Loc::getMessage('SEP') ?> <b><?= $address['VALUE'] ?></b></p>
    <?php } ?>
  </div>
    <?php
}
