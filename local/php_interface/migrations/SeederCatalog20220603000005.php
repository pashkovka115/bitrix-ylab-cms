<?php

namespace Sprint\Migration;


use CUtil;

class SeederCatalog20220603000005 extends Version
{
    protected $description = "Добавляем подарок";
    protected $moduleVersion = "4.0.6";
    public $ibSite = ['s1'];
    public $iblockType = 'catalog';
    public $iblockCode = 'presents';


    public function up()
    {
        $helper = $this->getHelperManager();

        $id_iblock = $helper->Iblock()->saveIblock([
            'IBLOCK_TYPE_ID' => $this->iblockType,
            'LID' => $this->ibSite,
            'CODE' => $this->iblockCode,
            'NAME' => 'Подарки',
            'ACTIVE' => 'Y',
            'SORT' => '500',
        ]);

        $helper->Iblock()->saveProperty($id_iblock, [
            'NAME' => 'Подарок для корзины',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'PRESENTATION_FOR_BASKET',
            'DEFAULT_VALUE' => NULL,
            'PROPERTY_TYPE' => 'L',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'LINK_IBLOCK_ID' => '0',
            'IS_REQUIRED' => 'N',
            'VALUES' =>
                [
                    [
                        'VALUE' => 'Да',
                        'DEF' => 'N',
                        'SORT' => '500',
                        'XML_ID' => '',
                        'SELECTED' => 'Y'
                    ],
                ],
        ]);

        $name = 'Подарок';
        $helper->Iblock()->addElement($id_iblock, [
            'NAME' => $name,
            'ACTIVE' => 'Y',
            'CODE' => CUtil::translit($name, 'ru', ['replace_other' => '-']),
            'SORT' => 500
        ]);

    }

    public function down()
    {
        $helper = $this->getHelperManager();
        $helper->Iblock()->deleteIblockIfExists($this->iblockCode);
    }
}
