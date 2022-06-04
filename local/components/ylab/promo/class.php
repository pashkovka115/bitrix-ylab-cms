<?php

namespace Ylab\Components;

use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Sale\Fuser;
use Bitrix\Sale\Basket;
use CBitrixComponent;

class PromoComponent extends CBitrixComponent
{
    private $totalCost = 1500;


    public function executeComponent()
    {
        Loader::includeModule('catalog');
        $basket = Basket::loadItemsForFUser(Fuser::getId(), Context::getCurrent()->getSite());
        $this->arResult['BASKET_ITEMS'] = $basket->getBasketItems();
        $this->arResult['IF_PROMO'] = $this->checkIfGivePromo($basket->getPrice());

        $this->includeComponentTemplate();
    }

    public function checkIfGivePromo(float $total): bool
    {
        return $total > $this->totalCost;
    }
}