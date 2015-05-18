<?php

namespace ToPDF;

class topdf
{
	protected $pdf = NULL;
	protected $cell = NULL;

	public function __construct()
	{
		$pdf = new \TCPDF('P', 'mm', 'A4', true, 'UTF-8', false); 
		$pdf->setPrintHeader(false); 
		$pdf->setPrintFooter(false);
		$pdf->SetDefaultMonospacedFont('courier'); 
		$pdf->SetMargins(10, 10, 7, true); 
		$pdf->SetAutoPageBreak(true, 5); 
		$pdf->setImageScale(1); 
		$pdf->SetFont('freeserif', '', 12, '', false);
		$pdf->SetLineWidth(0.05);
		$this->pdf = $pdf;
		$this->cell = new cell($this->pdf);
	}

	public function newpage($format, $orientation)
	{
		$this->pdf->AddPage($format, $orientation);
	}

	public function Pdf()
	{
		return $this->pdf;
	}

	public function Cell()
	{
		return $this->cell;	
	}
}