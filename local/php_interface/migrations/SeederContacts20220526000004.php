<?php

namespace Sprint\Migration;


use CIBlockElement;
use CUtil;

class SeederContacts20220526000004 extends Version
{
    protected $description = 'Демо контакты';
    protected $moduleVersion = '4.0.6';
    public $iblockCode = 'contacts';


    public function up()
    {
        $start_num = 1;
        $cnt = 10;

        $helper = $this->getHelperManager();
        $id_iblock = $helper->Iblock()->getIblockIdIfExists($this->iblockCode);

        if (!isset($this->params['add']))
        {
            $this->params['add'] = $start_num;
        }


        if ($this->params['add'] <= $cnt)
        {
            $this->outProgress('Прогресс добавления', $this->params['add'], $cnt);

            $name = 'Контакт ' . $this->params['add'];

            $id_element = $helper->Iblock()->addElement($id_iblock, [
                'NAME' => $name,
                'ACTIVE' => 'Y',
                'CODE' => CUtil::translit($name, 'ru', ['replace_other' => '-']) . '-00-' . $this->params['add'],
                'SORT' => 500
            ]);

            CIBlockElement::SetPropertyValues($id_element, $id_iblock, 'ФИО-' . $this->params['add'], 'FIO');
            CIBlockElement::SetPropertyValues($id_element, $id_iblock, '+765468568-' . $this->params['add'], 'PHONE');

            // Делаем выборку адресов для привязки к контактам
            $id_iblock_address = $helper->Iblock()->getIblockIdIfExists('addressies');
            if ($id_iblock_address)
            {
                $arSelect = ['ID'];
                $arFilter = ['IBLOCK_ID' => $id_iblock_address, 'ACTIVE_DATE' => 'Y', 'ACTIVE' => 'Y'];
                $res = CIBlockElement::GetList([], $arFilter, false, false, $arSelect);
                $ids = [];
                while ($ob = $res->GetNextElement())
                {
                    $arFields = $ob->GetFields();
                    $ids[] = $arFields['ID'];
                }
                CIBlockElement::SetPropertyValues($id_element, $id_iblock, $ids[array_rand($ids)], 'ADDRESS');
            }

            $this->params['add']++;

            $this->restart();
        }

        if ($this->params['add'] > $start_num){
            $this->outSuccess('Добавлено '. ($this->params['add'] - $start_num) . ' контактов');
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
            $this->outSuccess("Удалено $cnt елементов");
        }else {
            $this->outError('Для удаления нет элементов');
        }
    }
}
