<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * @copyright Tim Gatzky 2014
 * @author  Tim Gatzky <info@tim-gatzky.de>
 * @package  form_pdf_isotope
 * @link  http://contao.org
 * @license  http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

/**
 * Namespace
 */
namespace FormPDF;

/**
 * Imports
 */
use Isotope\Interfaces\IsotopeDocument as DocumentInterface;
use Isotope\Interfaces\IsotopeProductCollection;
use Isotope\Model\Document as Base;
use FormPDF\FormPDFHelper;

/**
 * Class file
 * IsotopeDocument
 */
class IsotopeDocument extends Base implements DocumentInterface
{
	/**
	 * {@inheritdoc}
	 */
	public function outputToBrowser(IsotopeProductCollection $objCollection)
	{
		$arrTokens  = $this->prepareCollectionTokens($objCollection);

		$objFormPDF = new FormPDFHelper();
		$objFormPDF->strPlugin = $this->form_pdf_plugin ?: 'dompdf';
		$objFormPDF->strTemplate = $this->form_pdf_template ?: 'pdf_example_html';
		
		// output template
		$objTemplate = new \FrontendTemplate($this->form_pdf_template);
		$objTemplate->setData($this->arrData);
		$objTemplate->fields = $arrTokens;

		$strHtml = $objTemplate->parse();

		// print pdf and send to browser
		$strPdf = $objFormPDF->printPDFtoBrowser($strHtml,$this->fileTitle);

		return $strPdf;
	}


	/**
	 * {@inheritdoc}
	 */
	public function outputToFile(IsotopeProductCollection $objCollection, $strDirectoryPath)
	{
		$arrTokens  = $this->prepareCollectionTokens($objCollection);

		$strPath = $strDirectoryPath.'/'.$this->file_path;

		$objFormPDF = new FormPDFHelper();
		$objFormPDF->strPlugin = $this->form_pdf_plugin ?: 'dompdf';
		$objFormPDF->strTemplate = $this->form_pdf_template ?: 'pdf_example_html';

		// output template
		$objTemplate = new \FrontendTemplate($this->form_pdf_template);
		$objTemplate->setData($this->arrData);
		$objTemplate->fields = $arrTokens;

		$strHtml = $objTemplate->parse();

		// print pdf
		$strPdf = $objFormPDF->printPDFtoFile($strHtml,$strPath,$this->fileTitle,false);

		return $strPdf;
	}
}