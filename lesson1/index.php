<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Д/З 31.05.22");
?><? $APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"clients",
		array(
			"IBLOCK_ID" => "15",
			"IBLOCK_TYPE" => "contacts",
			"PROPERTY_CODE" => [
				"PHONE",
				"FIO",
				"ADDRESS"
			],
			"FIELD_CODE" => [
				'PROPERTY_ADDRESS.PROPERTY_CITY',
				'PROPERTY_ADDRESS.PROPERTY_STREET',
				'PROPERTY_ADDRESS.PROPERTY_HOUSE',
				'PROPERTY_ADDRESS.PROPERTY_APARTMENT',
			],
		),
		false
	); ?><? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>