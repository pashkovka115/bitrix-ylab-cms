<?php
namespace Ylab;

use Bitrix\Iblock\IblockTable;
use Bitrix\Main\Loader;


class Helpers
{
    public static function getIblockIdByCode($code)
    {
        if (!Loader::includeModule('iblock')) {
            return;
        }

        $ib = IblockTable::getList([
            'select' => ['id'],
            'filter' => ['CODE' => $code],
            'limit' => '1',
            'cache' => ['ttl' => 3600]
        ]);
        $return = $ib->fetch();
        if(!$return){
            throw new \Exception('Iblock with code "' . $code . '" not found.');
        }

        return $return['ID'];
    }
}
