<?php

namespace Sprint\Migration;


use CIBlockElement;
use CUtil;

class SeederAddress20220526000003 extends Version
{
    protected $description = "";
    protected $moduleVersion = "4.0.6";
    public $iblockCode = 'addressies';


    public function up()
    {
        $start_num = 1;
        $cnt = 30;

        $helper = $this->getHelperManager();
        $id_iblock = $helper->Iblock()->getIblockIdIfExists($this->iblockCode);

        if (!isset($this->params['add']))
        {
            $this->params['add'] = $start_num;
        }


        if ($this->params['add'] <= $cnt)
        {
            $this->outProgress('Прогресс добавления', $this->params['add'], $cnt);

            $name = 'Адрес ' . $this->params['add'];

            $id_element = $helper->Iblock()->addElement($id_iblock, [
                'NAME' => $name,
                'ACTIVE' => 'Y',
                'CODE' => CUtil::translit($name, 'ru', ['replace_other' => '-']) . '-00-' . $this->params['add'],
                'SORT' => 500
            ]);

            CIBlockElement::SetPropertyValues($id_element, $id_iblock, 'Город-' . $this->params['add'], 'CITY');
            CIBlockElement::SetPropertyValues($id_element, $id_iblock, 'Улица-' . $this->params['add'], 'STREET');
            CIBlockElement::SetPropertyValues($id_element, $id_iblock, ($this->params['add'] + 3), 'HOUSE');
            CIBlockElement::SetPropertyValues($id_element, $id_iblock, $this->params['add'], 'APARTMENT');

            $this->params['add']++;

            $this->restart();
        }

        if ($this->params['add'] > $start_num){
            $this->outSuccess('Добавлено '. ($this->params['add'] - $start_num) . ' адресов');
        }else {
            $this->outError('Ошибка добавления элементов');
        }
    }

    public function down()
    {
        $helper = $this->getHelperManager();
        $id_iblock = $helper->Iblock()->getIblockIdIfExists($this->iblockCode);

        $arSelect = ['ID'];
        $arFilter = ['IBLOCK_ID' => $id_iblock, 'ACTIVE_DATE' => 'Y', 'ACTIVE' => 'Y'];

        $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);

        $cnt = 0;
        while ($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            if (CIBlockElement::Delete($arFields['ID'])){
                $cnt++;
            }
        }
        if ($cnt > 0){
            $this->outSuccess("Удалено $cnt адресов");
        }else {
            $this->outError('Для удаления нет элементов');
        }
    }
}
