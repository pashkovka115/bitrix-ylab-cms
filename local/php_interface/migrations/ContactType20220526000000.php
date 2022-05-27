<?php

namespace Sprint\Migration;


class ContactType20220526000000 extends Version
{
    protected $description = "Добавляем тип инфоблока contacts";
    protected $moduleVersion = "4.0.6";
    public $iblockType = 'contacts';


    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper = $this->getHelperManager();

        $helper->Iblock()->saveIblockType([
            'ID' => $this->iblockType,
            'SECTIONS' => 'Y',
            'EDIT_FILE_BEFORE' => '',
            'EDIT_FILE_AFTER' => '',
            'IN_RSS' => 'N',
            'SORT' => '500',
            'LANG' =>
                [
                    'ru' =>
                        [
                            'NAME' => 'Контакты',
                            'SECTION_NAME' => '',
                            'ELEMENT_NAME' => '',
                        ],
                    'en' =>
                        [
                            'NAME' => 'Contacts',
                            'SECTION_NAME' => '',
                            'ELEMENT_NAME' => '',
                        ],
                ],
        ]);
    }


    public function down()
    {
        $helper = $this->getHelperManager();
        $helper->Iblock()->deleteIblockType($this->iblockType);
    }
}
