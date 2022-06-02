<?php

use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);


foreach ($arResult['ITEMS'] as $item) {
?>
  <div class='block'>
    <p><?= Loc::getMessage('SS.CLIENTS.FIO') ?><b><?= $item['PROPERTIES']['FIO']['VALUE'] ?></b><br>
      <?= Loc::getMessage('SS.CLIENTS.PHONE') ?><b><?= $item['PROPERTIES']['PHONE']['VALUE'] ?></b></p>

    <h5><?= Loc::getMessage('SS.CLIENTS.ADDRESS') ?></h5>
    <p><?= Loc::getMessage('SS.CLIENTS.CITY') ?><?= $item['PROPERTY_ADDRESS_PROPERTY_CITY_VALUE'] ?><br>
      <?= Loc::getMessage('SS.CLIENTS.STREET') ?><?= $item['PROPERTY_ADDRESS_PROPERTY_STREET_VALUE'] ?><br>
      <?= Loc::getMessage('SS.CLIENTS.HOUSE') ?><?= $item['PROPERTY_ADDRESS_PROPERTY_HOUSE_VALUE'] ?><br>
      <?= Loc::getMessage('SS.CLIENTS.CITY') ?><?= $item['PROPERTY_ADDRESS_PROPERTY_APARTMENT_VALUE'] ?></p>
  </div>
<?php
}
