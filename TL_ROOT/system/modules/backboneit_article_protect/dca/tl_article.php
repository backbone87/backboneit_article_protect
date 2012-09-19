<?php

$GLOBALS['TL_DCA']['tl_article']['palettes']['__selector__'][] = 'protected';
foreach($GLOBALS['TL_DCA']['tl_article']['palettes'] as $strSelector => &$strPalette) if($strSelector != '__selector__') {
	$strPalette = str_replace(
		'{expert_legend:hide}',
		'{protected_legend:hide},protected;{expert_legend:hide},guests',
		$strPalette
	);
}

$GLOBALS['TL_DCA']['tl_article']['subpalettes']['protected'] = 'groups';

$GLOBALS['TL_DCA']['tl_article']['fields']['protected'] = array(
	'label'			=> &$GLOBALS['TL_LANG']['tl_article']['protected'],
	'exclude'		=> true,
	'filter'		=> true,
	'inputType'		=> 'checkbox',
	'eval'			=> array(
		'submitOnChange'=> true,
	),
);

$GLOBALS['TL_DCA']['tl_article']['fields']['groups'] = array(
	'label'			=> &$GLOBALS['TL_LANG']['tl_article']['groups'],
	'exclude'		=> true,
	'inputType'		=> 'checkbox',
	'foreignKey'	=> 'tl_member_group.name',
	'eval'			=> array(
		'mandatory'		=> true,
		'multiple'		=> true,
	),
);

$GLOBALS['TL_DCA']['tl_article']['fields']['guests'] = array(
	'label'			=> &$GLOBALS['TL_LANG']['tl_article']['guests'],
	'exclude'		=> true,
	'filter'		=> true,
	'inputType'		=> 'checkbox',
	'eval'			=> array(
		'tl_class'		=> 'clr',
	),
);
