<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @copyright	Tim Gatzky 2014
 * @author		Tim Gatzky <info@tim-gatzky.de>
 * @package		form_pdf_isotope
 * @link		http://contao.org
 * @license		http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Load language files
 */
\System::loadLanguageFile('tl_form');

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_iso_document']['palettes']['form_pdf'] = $GLOBALS['TL_DCA']['tl_iso_document']['palettes']['default'].';{config_legend},documentTitle,fileTitle;{form_pdf_legend},form_pdf_plugin,form_pdf_template';


/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_iso_document']['fields']['form_pdf_template'] = array
(
	'label'					  => &$GLOBALS['TL_LANG']['tl_form']['form_pdf_template'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('TableFormFormPDF', 'getPdfTemplates'),
	'eval'                    => array('tl_class'=>'w50'),
	'sql'					  => "varchar(64) NOT NULL default ''",
);

$GLOBALS['TL_DCA']['tl_iso_document']['fields']['form_pdf_plugin'] = array
(
	'label'					  => &$GLOBALS['TL_LANG']['tl_form']['form_pdf_plugin'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'				  => array('tcpdf','dompdf'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_form']['form_pdf_plugin'],
	'eval'                    => array('tl_class'=>'w50'),
	'sql'					  => "varchar(32) NOT NULL default ''",
);