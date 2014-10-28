<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2013 Leo Feyer
 *
 * @package form_pdf_isotope
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'FormPDF',
));

/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'FormPDF\FormPDFHelper' 	=> 'system/modules/form_pdf_isotope/FormPDF/FormPDFHelper.php',
	'FormPDF\IsotopeDocument' 	=> 'system/modules/form_pdf_isotope/FormPDF/IsotopeDocument.php',
));