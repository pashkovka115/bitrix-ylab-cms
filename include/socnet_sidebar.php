<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?$APPLICATION->IncludeComponent("bitrix:eshop.socnet.links", "bootstrap_v4", array(
	"COMPONENT_TEMPLATE" => "bootstrap_v4",
		"FACEBOOK" => "",
		"VKONTAKTE" => "",
		"TWITTER" => "",
		"GOOGLE" => "",
		"INSTAGRAM" => ""
	),
	false,
	array(
	"HIDE_ICONS" => "N",
		"ACTIVE_COMPONENT" => "N"
	)
);?>