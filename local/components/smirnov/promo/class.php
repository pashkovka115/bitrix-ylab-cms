<?php

namespace Ylab\Components;

use Bitrix\Main\Context;
use Bitrix\Main\Loader;
use Bitrix\Sale\Fuser;
use Bitrix\Sale\Basket;
use CBitrixComponent;
use Ylab\Helpers;
use Bitrix\Currency\CurrencyManager;


class PromoComponent extends CBitrixComponent
{
    private $totalCost = 2000;
    public $iblockType = 'catalog';
    public $iblockCode = 'presents';
    /**
     * @var int Больше этого количества товаров добавлять подарочный товар
     */
    public $countPromoProducts = 3;


    public function executeComponent()
    {
        global $APPLICATION;
        Loader::includeModule('catalog');
        Loader::includeModule('iblock');

        $request_method = Context::getCurrent()->getRequest()->getServer()['REQUEST_METHOD'];
        $basket = $this->getBasket();
        $id_iblock = Helpers::getIblockIdByCode($this->iblockCode);

        if($request_method == 'GET') {
            $this->addPresent($basket, $id_iblock);

            $this->arResult['BASKET_ITEMS'] = $basket->getBasketItems();
            $this->arResult['IF_PROMO'] = $this->checkIfGivePromo($basket->getPrice());
            $this->arResult['TOTAL_COST'] = $this->totalCost;
            $this->arResult['FULL_PRICE'] = $basket->getPrice();

            $this->includeComponentTemplate();

        }elseif ($request_method == 'POST' and isset($_POST['count_presents'])){
            $count_presents = (int)htmlspecialcharsbx($_POST['count_presents']);
            if($count_presents > 0){
                $this->addPresent($basket, $id_iblock, $count_presents, true);

                LocalRedirect($APPLICATION->GetCurPageParam());
            }
        }
    }


    public function addPresent($basket, $id_iblock_of_present, $quantity = 1, $forcibly = false)
    {
        if ($this->countPromoItems($basket) >= $this->countPromoProducts) {
            $presents = \CIBlockElement::GetList(
                [],
                ['IBLOCK_ID' => $id_iblock_of_present],
                false,
                false,
                ['ID', 'IBLOCK_CODE', 'NAME', 'PROPERTY_PRESENTATION_FOR_BASKET']
            );

            while ($present = $presents->GetNext()) {
                if (isset($present['PROPERTY_PRESENTATION_FOR_BASKET_VALUE']) and is_string($present['PROPERTY_PRESENTATION_FOR_BASKET_VALUE'])) {
                    if (!$basket->getExistsItem($this->iblockCode, $present['ID'])) {
                        $item = $basket->createItem($this->iblockCode, $present['ID']);
                        $item->setFields([
                            'QUANTITY' => $quantity,
                            'CURRENCY' => CurrencyManager::getBaseCurrency(),
                            'LID' => Context::getCurrent()->getSite(),
                            'PRICE' => 0, // цена
                            'CUSTOM_PRICE' => 'Y',
                            'NAME' => $present['NAME']
                        ]);
                    }elseif ($forcibly){
                        $basket_item = $basket->getExistsItem($this->iblockCode, $present['ID']);
                        if ($basket_item){
                            $basket_item->setField('QUANTITY', $basket_item->getQuantity() + $quantity);
                        }
                    }
                    $basket->save();
                }
            }
        } /* todo: Здесь можно удалить подарок из карзины если
                    1) Пользователь удалил товар из карзины
                    2) Если не были добавлены подарки
                    ...взависимости от условий
            elseif (!$forcibly) {
            foreach ($basket->getBasketItems() as $item) {
                $basket_item = $basket->getItemById($item->getField('ID'));
                if ($basket_item->getField('MODULE') == $this->iblockCode) {
                    $result = $basket_item->delete();
                    if ($result->isSuccess()) {
                        $basket->save();
                    }
                }
            }
        }*/
    }


    public function getBasket()
    {
        return Basket::loadItemsForFUser(Fuser::getId(), Context::getCurrent()->getSite());
    }

    public function countPromoItems($basket)
    {
        $cnt = 0;
        foreach ($basket as $item) {
            if ((int)$item->getField('PRICE') > 500) {
                $cnt += (int)$item->getField('QUANTITY');
            }
        }

        return $cnt;
    }


    public function checkIfGivePromo(float $total): bool
    {
        return $total > $this->totalCost;
    }
}
