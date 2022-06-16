<?php

/** @global CUser $USER */
/** @var CMain $APPLICATION */

if (!$USER->IsAdmin()) {
    return;
}

use Bitrix\Main\Loader;
use Bitrix\Main\Application;
use Bitrix\Main\Localization\Loc;

$module_id = 'ylab.import';

Loc::loadMessages(__FILE__);

Loader::includeModule($module_id);


$request = Application::getInstance()->getContext()->getRequest();

$aTabs = [
    [
        "DIV" => "ylab_import_tab1",
        "TAB" => Loc::getMessage("YLAB.IMPORT.SETTINGS1"),
        "ICON" => "settings",
        "TITLE" => Loc::getMessage("YLAB.IMPORT.TITLE1"),
    ],
];

$aTabs[] = [
    "DIV" => "ylab_import_tab2",
    "TAB" => Loc::getMessage("YLAB.IMPORT.SETTINGS2"),
    "ICON" => "settings",
    "TITLE" => Loc::getMessage("YLAB.IMPORT.TITLE2"),
];

$aTabs[] = [
    "DIV" => "ylab_import_tab3",
    "TAB" => Loc::getMessage("YLAB.IMPORT.SETTINGS3"),
    "ICON" => "settings",
    "TITLE" => Loc::getMessage("YLAB.IMPORT.TITLE3"),
];

$aTabs[] = [
    'DIV' => 'rights',
    'TAB' => GetMessage('MAIN_TAB_RIGHTS'),
    'TITLE' => GetMessage('MAIN_TAB_TITLE_RIGHTS')
];

$arAllOptions = [
    'main' => [
        ["limit_to_import", Loc::getMessage("YLAB.IMPORT.LIMIT_TO_IMPORT"), '', ['text', '']],
        ["password", Loc::getMessage("YLAB.IMPORT.PASSWORD"), '', ['password', '']],
        ["textarea", Loc::getMessage("YLAB.IMPORT.TEXTAREA"), '', ['textarea', '8', '60']],
    ],
    'tab2' => [
        ["checkbox1", Loc::getMessage("YLAB.IMPORT.CHECKBOX1"), '', ['checkbox', '', 'title="ага" data="somedata" checked'], 'N', Loc::getMessage("YLAB.IMPORT.RED.TEXT"), 'N'],
        ["checkbox2", Loc::getMessage("YLAB.IMPORT.CHECKBOX2"), '', ['checkbox',]],
        ['multiselectbox', Loc::getMessage("YLAB.IMPORT.MULTISELECTBOX"),
            '',
            ['multiselectbox', ['var1' => 'var1', 'var2' => 'var2', 'var3' => 'var3', 'var4' => 'var4']]],
        ['selectbox', Loc::getMessage("YLAB.IMPORT.SELECTBOX"), 'var2', ['selectbox', ['var1' => 'var1', 'var2' => 'var2', 'var3' => 'var3', 'var4' => 'var4']]],
    ],
    'tab3' => [
        ['note' => Loc::getMessage('YLAB.IMPORT.NOTE.STATICTEXT')],
        ['statictext', Loc::getMessage('YLAB.IMPORT.STATICTEXT'), '', ["statictext"]],
        ['note' => Loc::getMessage('YLAB.IMPORT.NOTE.STATICHTML')],
        ['statichtml', Loc::getMessage('YLAB.IMPORT.STATICHTML'), '', ["statichtml"]],
    ],
];

if (($request->get('save') !== null || $request->get('apply') !== null) && check_bitrix_sessid()) {
    foreach ($arAllOptions as $arAllOption) {
        __AdmSettingsSaveOptions($module_id, $arAllOption);
    }
    if ($request->get('radio') !== null) {
        COption::SetOptionString($module_id, 'radio', $request->get('radio'));
    }
}

$tabControl = new CAdminTabControl("tabControl", $aTabs);

?>
<form method="post"
      action="<?= $APPLICATION->GetCurPage() ?>?mid=<?= htmlspecialcharsbx($module_id) ?>&lang=<?= LANGUAGE_ID ?>"
      name="ylab_import"><?
    echo bitrix_sessid_post();

    $tabControl->Begin();

    $radio = COption::GetOptionString($module_id, 'radio');
    $product_color = COption::GetOptionString($module_id, 'product_color');
    $custom_text = COption::GetOptionString($module_id, 'custom_text');
    $custom_datetime_local = COption::GetOptionString($module_id, 'custom_datetime_local');
    $custom_number = COption::GetOptionString($module_id, 'custom_number');

    $input = new \Ylab\Import\Input();

    foreach ($arAllOptions as $key => $option) {
        $tabControl->BeginNextTab();
        __AdmSettingsDrawList($module_id, $option);
        if ($key == 'tab2') {

            $input->radio(Loc::getMessage('YLAB.IMPORT.TITLE.OPTIONS.RADIO'), 'radio', [
                'none' => Loc::getMessage('YLAB.IMPORT.RADIO.NOT'),
                'groups' => Loc::getMessage('YLAB.IMPORT.RADIO.GROUP'),
                'ranges' => Loc::getMessage('YLAB.IMPORT.RADIO.RANGES'),
                'both' => Loc::getMessage('YLAB.IMPORT.RADIO.BOTH'),
            ], $radio);

            $input->color(
                Loc::getMessage('YLAB.IMPORT.INPUT.COLOR.TITLE'),
                'product_color',
                Loc::getMessage('YLAB.IMPORT.INPUT.COLOR.LABEL'),
                $product_color
            );
            $input->text(
                Loc::getMessage('YLAB.IMPORT.INPUT.CUSTOM.TEXT.TITLE'),
                'custom_text',
                Loc::getMessage('YLAB.IMPORT.INPUT.CUSTOM.TEXT.LABEL'),
                $custom_text
            );
            $input->datetime_local(
                Loc::getMessage('YLAB.IMPORT.INPUT.CUSTOM.DATETIME.TITLE'),
                'custom_datetime_local',
                Loc::getMessage('YLAB.IMPORT.INPUT.CUSTOM.DATETIME.LABEL'),
                $custom_datetime_local
            );
            $input->number(
                Loc::getMessage('YLAB.IMPORT.INPUT.CUSTOM.NUMBER.TITLE'),
                'custom_number',
                Loc::getMessage('YLAB.IMPORT.INPUT.CUSTOM.NUMBER.LABEL'),
                $custom_number,
                'min="0" max="120"'
            );
        }
    }


    $tabControl->BeginNextTab();

    require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/admin/group_rights.php';

    $tabControl->Buttons([]);

    $tabControl->End();
    ?><input type="hidden" name="Update" value="Y"
</form>
