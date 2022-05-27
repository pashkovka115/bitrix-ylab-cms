<?php

namespace Sprint\Migration;


class ContactIblock20220526000002 extends Version
{
    protected $description = 'Инфоблок contacts';
    protected $moduleVersion = "4.0.6";
    public $iblockType = 'contacts';
    public $iblockCode = 'contacts';



    public function up()
    {
        $helper = $this->getHelperManager();


        $iblockId = $helper->Iblock()->saveIblock([
            'IBLOCK_TYPE_ID' => $this->iblockType,
            'LID' =>
                [
                    0 => 's1',
                ],
            'CODE' => $this->iblockCode,
            'API_CODE' => NULL,
            'REST_ON' => 'N',
            'NAME' => 'Контакты',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'LIST_PAGE_URL' => '#SITE_DIR#/contacts/index.php?ID=#IBLOCK_ID#',
            'DETAIL_PAGE_URL' => '#SITE_DIR#/contacts/detail.php?ID=#ELEMENT_ID#',
            'SECTION_PAGE_URL' => '#SITE_DIR#/contacts/list.php?SECTION_ID=#SECTION_ID#',
            'CANONICAL_PAGE_URL' => '',
            'PICTURE' => NULL,
            'DESCRIPTION' => '',
            'DESCRIPTION_TYPE' => 'text',
            'RSS_TTL' => '24',
            'RSS_ACTIVE' => 'Y',
            'RSS_FILE_ACTIVE' => 'N',
            'RSS_FILE_LIMIT' => NULL,
            'RSS_FILE_DAYS' => NULL,
            'RSS_YANDEX_ACTIVE' => 'N',
            'XML_ID' => NULL,
            'INDEX_ELEMENT' => 'Y',
            'INDEX_SECTION' => 'Y',
            'WORKFLOW' => 'N',
            'BIZPROC' => 'N',
            'SECTION_CHOOSER' => 'L',
            'LIST_MODE' => '',
            'RIGHTS_MODE' => 'S',
            'SECTION_PROPERTY' => 'N',
            'PROPERTY_INDEX' => 'N',
            'VERSION' => '2',
            'LAST_CONV_ELEMENT' => '0',
            'SOCNET_GROUP_ID' => NULL,
            'EDIT_FILE_BEFORE' => '',
            'EDIT_FILE_AFTER' => '',
            'SECTIONS_NAME' => 'Группы',
            'SECTION_NAME' => 'Группа',
            'ELEMENTS_NAME' => 'Контакты',
            'ELEMENT_NAME' => 'Контакт',
            'EXTERNAL_ID' => NULL,
            'LANG_DIR' => '/',
            'SERVER_NAME' => 'ylab-05-2022-bitrix.loc',
            'IPROPERTY_TEMPLATES' =>
                [
                ],
            'ELEMENT_ADD' => 'Добавить контакт',
            'ELEMENT_EDIT' => 'Изменить контакт',
            'ELEMENT_DELETE' => 'Удалить контакт',
            'SECTION_ADD' => 'Добавить группу',
            'SECTION_EDIT' => 'Изменить группу',
            'SECTION_DELETE' => 'Удалить группу',
        ]);

        $helper->Iblock()->saveIblockFields($iblockId, [
            'IBLOCK_SECTION' =>
                [
                    'NAME' => 'Привязка к разделам',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        [
                            'KEEP_IBLOCK_SECTION_ID' => 'N',
                        ],
                ],
            'ACTIVE' =>
                [
                    'NAME' => 'Активность',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => 'Y',
                ],
            'ACTIVE_FROM' =>
                [
                    'NAME' => 'Начало активности',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                ],
            'ACTIVE_TO' =>
                [
                    'NAME' => 'Окончание активности',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                ],
            'SORT' =>
                [
                    'NAME' => 'Сортировка',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '0',
                ],
            'NAME' =>
                [
                    'NAME' => 'Название',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => '',
                ],
            'PREVIEW_PICTURE' =>
                [
                    'NAME' => 'Картинка для анонса',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        [
                            'FROM_DETAIL' => 'N',
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'DELETE_WITH_DETAIL' => 'N',
                            'UPDATE_WITH_DETAIL' => 'N',
                            'USE_WATERMARK_TEXT' => 'N',
                            'WATERMARK_TEXT' => '',
                            'WATERMARK_TEXT_FONT' => '',
                            'WATERMARK_TEXT_COLOR' => '',
                            'WATERMARK_TEXT_SIZE' => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE' => 'N',
                            'WATERMARK_FILE' => '',
                            'WATERMARK_FILE_ALPHA' => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER' => NULL,
                        ],
                ],
            'PREVIEW_TEXT_TYPE' =>
                [
                    'NAME' => 'Тип описания для анонса',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => 'text',
                ],
            'PREVIEW_TEXT' =>
                [
                    'NAME' => 'Описание для анонса',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                ],
            'DETAIL_PICTURE' =>
                [
                    'NAME' => 'Детальная картинка',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        [
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'USE_WATERMARK_TEXT' => 'N',
                            'WATERMARK_TEXT' => '',
                            'WATERMARK_TEXT_FONT' => '',
                            'WATERMARK_TEXT_COLOR' => '',
                            'WATERMARK_TEXT_SIZE' => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE' => 'N',
                            'WATERMARK_FILE' => '',
                            'WATERMARK_FILE_ALPHA' => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER' => NULL,
                        ],
                ],
            'DETAIL_TEXT_TYPE' =>
                [
                    'NAME' => 'Тип детального описания',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => 'text',
                ],
            'DETAIL_TEXT' =>
                [
                    'NAME' => 'Детальное описание',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                ],
            'XML_ID' =>
                [
                    'NAME' => 'Внешний код',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => '',
                ],
            'CODE' =>
                [
                    'NAME' => 'Символьный код',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' =>
                        [
                            'UNIQUE' => 'Y',
                            'TRANSLITERATION' => 'Y',
                            'TRANS_LEN' => 100,
                            'TRANS_CASE' => 'L',
                            'TRANS_SPACE' => '-',
                            'TRANS_OTHER' => '-',
                            'TRANS_EAT' => 'Y',
                            'USE_GOOGLE' => 'N',
                        ],
                ],
            'TAGS' =>
                [
                    'NAME' => 'Теги',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                ],
            'SECTION_NAME' =>
                [
                    'NAME' => 'Название',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => '',
                ],
            'SECTION_PICTURE' =>
                [
                    'NAME' => 'Картинка для анонса',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        [
                            'FROM_DETAIL' => 'N',
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'DELETE_WITH_DETAIL' => 'N',
                            'UPDATE_WITH_DETAIL' => 'N',
                            'USE_WATERMARK_TEXT' => 'N',
                            'WATERMARK_TEXT' => '',
                            'WATERMARK_TEXT_FONT' => '',
                            'WATERMARK_TEXT_COLOR' => '',
                            'WATERMARK_TEXT_SIZE' => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE' => 'N',
                            'WATERMARK_FILE' => '',
                            'WATERMARK_FILE_ALPHA' => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER' => NULL,
                        ],
                ],
            'SECTION_DESCRIPTION_TYPE' =>
                [
                    'NAME' => 'Тип описания',
                    'IS_REQUIRED' => 'Y',
                    'DEFAULT_VALUE' => 'text',
                ],
            'SECTION_DESCRIPTION' =>
                [
                    'NAME' => 'Описание',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                ],
            'SECTION_DETAIL_PICTURE' =>
                [
                    'NAME' => 'Детальная картинка',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        [
                            'SCALE' => 'N',
                            'WIDTH' => '',
                            'HEIGHT' => '',
                            'IGNORE_ERRORS' => 'N',
                            'METHOD' => 'resample',
                            'COMPRESSION' => 95,
                            'USE_WATERMARK_TEXT' => 'N',
                            'WATERMARK_TEXT' => '',
                            'WATERMARK_TEXT_FONT' => '',
                            'WATERMARK_TEXT_COLOR' => '',
                            'WATERMARK_TEXT_SIZE' => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE' => 'N',
                            'WATERMARK_FILE' => '',
                            'WATERMARK_FILE_ALPHA' => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER' => NULL,
                        ],
                ],
            'SECTION_XML_ID' =>
                [
                    'NAME' => 'Внешний код',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' => '',
                ],
            'SECTION_CODE' =>
                [
                    'NAME' => 'Символьный код',
                    'IS_REQUIRED' => 'N',
                    'DEFAULT_VALUE' =>
                        [
                            'UNIQUE' => 'N',
                            'TRANSLITERATION' => 'N',
                            'TRANS_LEN' => 100,
                            'TRANS_CASE' => 'L',
                            'TRANS_SPACE' => '-',
                            'TRANS_OTHER' => '-',
                            'TRANS_EAT' => 'Y',
                            'USE_GOOGLE' => 'N',
                        ],
                ],
        ]);

        $helper->Iblock()->saveGroupPermissions($iblockId, [
            'administrators' => 'X',
            'everyone' => 'R',
        ]);

        $helper->Iblock()->saveProperty($iblockId, [
            'NAME' => 'ФИО',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'FIO',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => NULL,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '2',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => NULL,
            'HINT' => '',
        ]);
        $helper->Iblock()->saveProperty($iblockId, [
            'NAME' => 'Телефон',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'PHONE',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'S',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => NULL,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => '0',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '2',
            'USER_TYPE' => NULL,
            'USER_TYPE_SETTINGS' => NULL,
            'HINT' => '',
        ]);
        $helper->Iblock()->saveProperty($iblockId, [
            'NAME' => 'Адрес ',
            'ACTIVE' => 'Y',
            'SORT' => '500',
            'CODE' => 'ADDRESS',
            'DEFAULT_VALUE' => '',
            'PROPERTY_TYPE' => 'E',
            'ROW_COUNT' => '1',
            'COL_COUNT' => '30',
            'LIST_TYPE' => 'L',
            'MULTIPLE' => 'N',
            'XML_ID' => NULL,
            'FILE_TYPE' => '',
            'MULTIPLE_CNT' => '5',
            'LINK_IBLOCK_ID' => 'contacts:addressies',
            'WITH_DESCRIPTION' => 'N',
            'SEARCHABLE' => 'N',
            'FILTRABLE' => 'N',
            'IS_REQUIRED' => 'N',
            'VERSION' => '2',
            'USER_TYPE' => 'EList',
            'USER_TYPE_SETTINGS' =>
                [
                    'size' => 1,
                    'width' => 0,
                    'group' => 'N',
                    'multiple' => 'N',
                ],
            'HINT' => '',
            'FEATURES' =>
                [
                    0 =>
                        [
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'DETAIL_PAGE_SHOW',
                            'IS_ENABLED' => 'N',
                        ],
                    1 =>
                        [
                            'MODULE_ID' => 'iblock',
                            'FEATURE_ID' => 'LIST_PAGE_SHOW',
                            'IS_ENABLED' => 'Y',
                        ],
                ],
        ]);

        $helper->UserOptions()->saveElementGrid($iblockId, [
            'views' =>
                [
                    'default' =>
                        [
                            'columns' =>
                                [
                                    0 => '',
                                ],
                            'columns_sizes' =>
                                [
                                    'expand' => 1,
                                    'columns' =>
                                        [
                                        ],
                                ],
                            'sticked_columns' =>
                                [
                                ],
                        ],
                ],
            'filters' =>
                [
                ],
            'current_view' => 'default',
        ]);
    }


    public function down()
    {
        $helper = $this->getHelperManager();
        $helper->Iblock()->deleteIblockIfExists('contacts');
    }
}
