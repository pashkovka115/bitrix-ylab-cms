<?php

require __DIR__ . '/../vendor/autoload.php';

define('LOG_FILENAME', $_SERVER['DOCUMENT_ROOT'] . '/local/log/iblocks1.txt');


function saveToLog(&$arFields)
{
    if ($arFields['RESULT']) {
        $message = ' Товар добавлен';
    } else {
        $message = ' Товар не добавлен. ' . $arFields["RESULT_MESSAGE"];
    }

    AddMessage2Log($arFields['NAME'] . " ($message)", 'test_logfile');
    Bitrix\Main\Diag\Debug::dumpToFile($arFields['NAME'] . " ($message)", '', 'local/log/iblocks2.txt');
    Bitrix\Main\Diag\Debug::writeToFile($arFields['NAME'] . " ($message)", '', 'local/log/iblocks3.txt');
}

AddEventHandler('iblock', 'OnAfterIblockElementAdd', 'saveToLog');
