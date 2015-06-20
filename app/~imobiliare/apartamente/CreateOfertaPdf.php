<?php

namespace Apartamente;

class CreateOfertaPdf
{
	protected $orientation  = 'P';
	protected $pagesize     = 'A4';
	protected $destionation = 'D';
	protected $apartament   = NULL;

	public function __construct($orientation, $pagesize, $destionation, $apartament)
	{
		if( is_null($apartament) )
		{
			throw new \Exception("Nu există apartamentul pentru care să se genereze oferta");
		}
		$this->orientation  = $orientation;
		$this->pagesize     = $pagesize;
		$this->destionation = $destionation;
		$this->apartament   = $apartament;
		$this->pdf          = new \ToPDF\topdf();
		$this->pdf->newpage($this->orientation, $this->pagesize);
	}

	public function __call($method, $args)
	{
		$method = strtolower($method);
		if( array_key_exists($method, $attributes = $this->apartament->getAttributes()) )
		{
			return $attributes[$method];
		}
		throw new \Exception("Apartament nu are proprietatea [$method]");
	}

	protected function fileName()
	{
		$file_name = str_replace('\\', '/', storage_path() . '/app/apartamente/oferte/oferte-apartament-' . $this->id()) . '.pdf';
		return basename($file_name);
	}

	protected function outlogo()
	{
		$logo_file = str_replace('\\', '/', storage_path() . '/app/apartamente/images/logo.png');
		$this->pdf->Pdf()->Image($logo_file, 10, 0, 70, 0, 'PNG', '', 'T', false, 308, '', false, false, 0, false, false, false);
		$this->pdf->Cell()->text('OFERTE IMOBILIARE')->top(13)->left(75)->out()->reset('top')->reset('left');
	}

	protected function outnume()
	{
		$oldFontSize = $this->pdf->Pdf()->getFontSizePt();
		$this->pdf->Pdf()->ln();
		$this->pdf->Pdf()->SetXY(10, 25);
		$this->pdf->Pdf()->SetFontSize(18);
		$this->pdf->Pdf()->SetTextColor(150, 200, 50);
		$nume = strtoupper($this->nume());
		if( ! $nume )
		{
			$this->pdf->Pdf()->SetTextColor(255, 0, 0);
			$nume = 'Numele apartamentului nu este definit';
		}
		$this->pdf->Cell()->text( $nume )->width(190)->border('')->halign('C')->out();	
		$this->pdf->Pdf()->SetTextColor(0, 0, 0);
		$this->pdf->Pdf()->SetFontSize($oldFontSize);
	}

	protected function outphotos()
	{
		$photos = \Imobiliare\Nomenclatoare\ApartamentPhotos::where('id_apartament', $this->id())->where('file_extension', '<>', 'bmp')->orderby('id', 'desc')->skip(0)->take(4)->get();
		$this->pdf->Pdf()->ln();
		$this->pdf->Pdf()->SetXY(10, 40);
		if($number_of_photos = $photos->count())
		{
			$width = 180/$number_of_photos;
			$step  = 190/$number_of_photos;
			$x = 10;
			$w = $width; 
			$h = 60;
			foreach($photos as $i => $photo)
			{
				$new_file = str_replace('\\', '/', storage_path() . '/app/apartamente/photos/resized/' . $photo->id  . '.png');
				$image = \Image::make($photo->file_name)
					->resize(360, 360, function ($constraint){$constraint->aspectRatio(); $constraint->upsize();})->save($new_file, 100);
				$this->pdf->Pdf()->Image(
					$new_file, 	// Name of the file containing the image
					$x, 		// Abscissa of the upper-left corner
					40, 		// Ordinate of the upper-left corner
					$w, 		// Width of the image in the page. 
					$h, 		// Height of the image in the page.
					'PNG', 		// Image format
					'', 		// URL or identifier returned by AddLink().
					'', 		// Indicates the alignment of the pointer next to image insertion relative to image height
					false, 		// If true resize (reduce) the image to fit $w and $h
					0, 			// dot-per-inch resolution used on resize
					'', 		// Allows to center or align the image on the current line
					false, 		// true if this image is a mask, false otherwise
					false, 		// image object returned by this function or false
					1, 			// Indicates if borders must be drawn around the cell
					'CM', 		// If not false scale image dimensions proportionally to fit within the ($w, $h) box. $fitbox can be true or a 2 characters string indicating the image alignment inside the box. The first character indicate the horizontal alignment (L = left, C = center, R = right) the second character indicate the vertical algnment (T = top, M = middle, B = bottom).
					true,
					false, 		// If true do not display the image.
					false 		// If true the image is resized to not exceed page dimensions.
				);
				$x += $step;
			}
			$this->pdf->Pdf()->ln();
			$this->pdf->Pdf()->SetXY(10, 110);
		}
	}

	protected function adresa()
	{
		return \Easy\Form\StringHelper::Items([
			$this->apartament->numejudet ? 'Jud. ' . $this->apartament->numejudet : '', 
			$this->apartament->numelocalitate ? 'Loc. ' . $this->apartament->numelocalitate : '', 
			$this->apartament->numecartier ? 'Cartier ' . $this->apartament->numecartier : '',
			$this->adresa_exacta()
		]);
	}

	protected function locparcare()
	{
		return $this->parcare() ? 'DA' : 'NU';
	}

	protected function etaj()
	{
		return $this->apartament->numetipetaj ? $this->apartament->numetipetaj : '-';
	}

	protected function balcoane()
	{
		return $this->apartament->numetipbalcon ? $this->apartament->numetipbalcon : '-';
	}

	protected function finisare()
	{
		return $this->apartament->numetipfinisare ? $this->apartament->numetipfinisare : '-';
	}

	protected function outdetails()
	{
		$rows = [
			'1' => ['caption' => 'Adresa: ', 'source' => 'adresa'],
			'2' => ['caption' => 'Loc parcare: ', 'source' => 'locparcare'],
			'3' => ['caption' => 'Etaj: ', 'source' => 'etaj'],
			'4' => ['caption' => 'Număr de balcoane: ', 'source' => 'balcoane'],
			'5' => ['caption' => 'Grad de finisare: ', 'source' => 'finisare'],
		];

		foreach($rows as $i => $row)
		{
			$this->pdf->Cell()->text( $row['caption'] )->width(40)->border('')->halign('R')->linefeed(0)->out();
			$this->pdf->Cell()->text( $this->{$row['source']}() )->width(150)->border('')->halign('L')->linefeed(1)->out();
		}
	}

	protected function createpdf()
	{
		$this->outlogo();
		$this->outnume();
		$this->outphotos();
		$this->outdetails();
	}

	public function output()
	{
		$this->createpdf();
		$this->pdf->Pdf()->Output($this->fileName(), $this->destionation);
	}
}