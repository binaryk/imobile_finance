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
		$this->pdf->cell()->text('Data ofertei: ' . \Carbon\Carbon::now()->format('d.m.Y'))->top(13)->left(130)->width(70)->halign('R')->out()->reset('top')->reset('left');
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

	protected function zonaAproximativaApartament()
	{
		return ($zona = $this->zona_aproximativa()) ? $zona : '-';	
	}

	protected function proprietarApartament()
	{
		return $this->apartament->proprietar ? $this->apartament->numeproprietar : '-';
	}

	protected function telefonProprietarApartament()
	{
		return $this->apartament->proprietar ? $this->apartament->telefonproprietar : '-';
	}

	protected function suprafataApartament()
	{
		return ($s = $this->suprafata()) ? _toFloat($s) . ' mp' : '-';
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

	protected function garaj()
	{
		return $this->apartament->numetipgaraj ? $this->apartament->numetipgaraj : '-';
	}

	protected function centralatermica()
	{
		return $this->centrala_termica() ? 'DA' : 'NU';
	}

	protected function compartimentare()
	{
		return $this->apartament->numetipcompartimentare ? $this->apartament->numetipcompartimentare : '-';
	}

	protected function bai()
	{
		return ($s = $this->nr_bai()) ? _toInt($s) : '-';
	}

	protected function camere()
	{
		return ($s = $this->nr_camere()) ? _toInt($s) : '-';
	}

	protected function detaliiApartament()
	{
		return $this->detalii();
	}

	protected function outdetails()
	{
		// $rows = [
		// 	// '1' => ['caption' => 'Adresa: ', 'source' => 'adresa'],
		// 	'2' => ['caption' => 'Suprafaţa:', 'source' => 'suprafataApartament'],
		// 	'3' => ['caption' => 'Loc parcare: ', 'source' => 'locparcare'],
		// 	'4' => ['caption' => 'Etaj: ', 'source' => 'etaj'],
		// 	'5' => ['caption' => 'Număr de balcoane: ', 'source' => 'balcoane'],
		// 	'6' => ['caption' => 'Grad de finisare: ', 'source' => 'finisare'],
		// 	'7' => ['caption' => 'Garaj: ', 'source' => 'garaj'],
		// 	'8' => ['caption' => 'Centrală termică: ', 'source' => 'centralatermica'],
		// 	'9' => ['caption' => 'Compartimentare: ', 'source' => 'compartimentare'],
		//    '10' => ['caption' => 'Număr de băi: ', 'source' => 'bai'],
		//    '11' => ['caption' => 'Număr de camere: ', 'source' => 'camere'],
		//    // '12' => ['caption' => 'Detalii: ', 'source' => 'detaliiApartament'],
		// ];

		// foreach($rows as $i => $row)
		// {
		// 	$this->pdf->Pdf()->SetFont('freeserif', 'B', 12, '', false);
		// 	$this->pdf->Cell()->text( $row['caption'] )->width(50)->border('')->halign('R')->linefeed(0)->out();
		// 	$this->pdf->Pdf()->SetFont('freeserif', '', 12, '', false);
		// 	$this->pdf->Cell()->text( $this->{$row['source']}() )->width(140)->border('')->halign('L')->linefeed(1)->out();
		// }

		if( $detalii = $this->detalii()) // afisarea campului detalii
		{
			$this->pdf->Pdf()->ln();
			$this->pdf->Pdf()->ln();
			$this->pdf->Cell()->text($detalii)->width(190)->border('')->halign('L')->out();
		}

		if( $detalii = $this->detalii_private()) // afisarea campului detalii
		{
			$this->pdf->Pdf()->ln();
			$this->pdf->Cell()->text($detalii)->width(190)->border('')->halign('L')->out();
		}
	}

	protected function outfooter()
	{
		$this->pdf->Pdf()->SetFont('freeserif', '', 11, '', false);
		$this->pdf->Pdf()->SetXY(10, -25);
		$this->pdf->Cell()->text('Pentru informaţii suplimentare sau alte oferte imobiliare mă puteţi contacta la telefon ' . $this->apartament->current_user->telefon . ', pe email ' . $this->apartament->current_user->email . ' sau la sediul nostru pe ' . str_replace([chr(13) . chr(10), chr(10) . chr(13), chr(10), chr(13)], ' ', $this->apartament->current_org->adresa) )->width(190)->border('T')->halign('C')->out()->reset('border')->reset('width')->reset('halign');
	}

	protected function outChapterLocalizare()
	{
		$this->pdf->Pdf()->SetFont('freeserif', 'B', 14, '', false);
		$this->pdf->Cell()->text('I. Localizare')->width(190)->border('TB')->halign('L')->background([210, 210, 210])->out()->reset('background');
		$rows = [
			'1' => ['caption' => 'Adresa: ', 'source' => 'adresa'],
			'2' => ['caption' => 'Zona aproximativă: ', 'source' => 'zonaAproximativaApartament'],
		];
		$this->pdf->Pdf()->ln();
		foreach($rows as $i => $row)
		{
			$this->pdf->Pdf()->SetFont('freeserif', 'B', 12, '', false);
			$this->pdf->Cell()->text( $row['caption'] )->width(50)->border('')->halign('R')->linefeed(0)->out();
			$this->pdf->Pdf()->SetFont('freeserif', '', 12, '', false);
			$this->pdf->Cell()->text( $this->{$row['source']}() )->width(140)->border('')->halign('L')->linefeed(1)->out();
		}
	}

	protected function outChapterProprietar()
	{
		$this->pdf->Pdf()->SetFont('freeserif', 'B', 14, '', false);
		$this->pdf->Cell()->text('II. Proprietar')->width(190)->border('TB')->halign('L')->background([210, 210, 210])->out()->reset('background');
		$rows = [
			'1' => ['caption' => 'Proprietar: ', 'source' => 'proprietarApartament'],
			'2' => ['caption' => 'Telefon: ', 'source' => 'telefonProprietarApartament'],
		];
		foreach($rows as $i => $row)
		{
			$this->pdf->Pdf()->SetFont('freeserif', 'B', 12, '', false);
			$this->pdf->Cell()->text( $row['caption'] )->width(50)->border('')->halign('R')->linefeed(0)->out();
			$this->pdf->Pdf()->SetFont('freeserif', '', 12, '', false);
			$this->pdf->Cell()->text( $this->{$row['source']}() )->width(140)->border('')->halign('L')->linefeed(1)->out();
		}
	}

	protected function numeApartament()
	{
		return ($nume = $this->nume()) ? $nume : '-';
	}

	protected function emailApartament()
	{
		return ($email = $this->email()) ? $email : '-';
	}

	protected function telefoaneApartament()
	{
		return \Easy\Form\StringHelper::Items([
			$this->telefon(), 
			$this->telefon_secundar_1(), 
			$this->telefon_secundar_2()
		]);	
	}

	protected function numarCamereApartament()
	{
		return ($n = $this->nr_camere()) ? _toInt($n) : '-';
	}

	protected function numarBaiApartament()
	{
		return ($n = $this->nr_bai()) ? _toInt($n) : '-';
	}

	protected function numarBalcoaneApartament()
	{
		$d = $this->detalii_bacoane();
		return (($n = $this->apartament->numetipbalcon) ? $n : '-') . ($d ? '. ' . $d : '');
	}

	protected function anConstructieApartament()
	{
		return ($n = $this->anul_constructiei()) ? $n : '-';
	}

	protected function etajApartament()
	{
		return $this->apartament->numetipetaj ? $this->apartament->numetipetaj : '-';
	}

	protected function acoperisApartament()
	{
		return $this->apartament->numetipacoperis ? $this->apartament->numetipacoperis : '-';
	}

	protected function confortApartament()
	{
		return $this->apartament->numetipconfort ? $this->apartament->numetipconfort : '-';
	}

	protected function sistemIncalzireApartament()
	{
		return $this->id_sistem_incalzire() ? $this->id_sistem_incalzire() : '-';
	}

	protected function garajApartament()
	{
		return $this->apartament->numetipgaraj ? $this->apartament->numetipgaraj : '-';
	}

	protected function tipCladireApartament()
	{
		return $this->apartament->numetipcladire ? $this->apartament->numetipcladire : '-';
	}

	protected function finisajeApartament()
	{
		return $this->apartament->numetipfinisare ? $this->apartament->numetipfinisare : '-';
	}

	protected function compartimentareApartament()
	{
		return $this->apartament->numetipcompartimentare ? $this->apartament->numetipcompartimentare : '-';
	}

	protected function esteAgentie()
	{
		return $this->is_agentie() ? 'DA' : 'NU';
	}

	protected function ofertaValabila()
	{
		return $this->oferta_valabila() ? 'DA' : 'NU';
	}

	protected function suprafataminmaxApartament()
	{
		return \Easy\Form\StringHelper::Items([
			($s = $this->suprafata()) ? _toFloat($s) . ' mp' : '',
			($s = $this->suprafata_min()) ? 'Min: ' . _toFloat($s) . ' mp' : '',
			($s = $this->suprafata_max()) ? 'Max: ' . _toFloat($s) . ' mp' : '',
		]);	
	}

	protected function pretApartament()
	{
		return ($p = $this->pret_m2()) ? _toFloat($p) . ' EURO, ' . ($this->negociabil() ? 'negociabil' : 'nenegociabil') : '';
	}

	protected function ultimaActualizareApartament()
	{
		$u = $this->ultima_actualizare();
		return ($u && ($u != '0000-00-00')) ? _toDate($u) : _toDate( $this->created_at());
	}

	protected function outChapterDategenerale()
	{
		$this->pdf->Pdf()->SetFont('freeserif', 'B', 14, '', false);
		$this->pdf->Cell()->text('III. Date generale')->width(190)->border('TB')->halign('L')->background([210, 210, 210])->out()->reset('background');
		$rows = [
			'1' => ['caption' => 'Nume: ', 'source' => 'numeApartament'],
			'2' => ['caption' => 'Email: ', 'source' => 'emailApartament'],
			'3' => ['caption' => 'Telefoane: ', 'source' => 'telefoaneApartament'],
			'4' => ['caption' => 'Este agenţie: ', 'source' => 'esteAgentie'],
			'5' => ['caption' => 'Oferta valabilă: ', 'source' => 'ofertaValabila'],
			'6' => ['caption' => 'Anul construcţiei: ', 'source' => 'anConstructieApartament'],
			'7' => ['caption' => 'Număr de camere: ', 'source' => 'numarCamereApartament'],
			'8' => ['caption' => 'Suprafaţă: ', 'source' => 'suprafataminmaxApartament'],
			'9' => ['caption' => 'Număr de băi: ', 'source' => 'numarBaiApartament'],
		   '10' => ['caption' => 'Număr de balcoane: ', 'source' => 'numarBalcoaneApartament'],
		   '11' => ['caption' => 'Etaj: ', 'source' => 'etajApartament'],
		   '12' => ['caption' => 'Acoperiş: ', 'source' => 'acoperisApartament'],
		   '13' => ['caption' => 'Confort: ', 'source' => 'confortApartament'],
		   '14' => ['caption' => 'Sistemul de încălzire: ', 'source' => 'sistemIncalzireApartament'],
		   '15' => ['caption' => 'Garaj: ', 'source' => 'garajApartament'],
		   '16' => ['caption' => 'Tipul de clădire: ', 'source' => 'tipCladireApartament'],
		   '17' => ['caption' => 'Tipul de finisaj interior: ', 'source' => 'finisajeApartament'],
		   '18' => ['caption' => 'Compartimentare: ', 'source' => 'compartimentareApartament'],
		   '19' => ['caption' => 'Preţ: ', 'source' => 'pretApartament'],
		   '20' => ['caption' => 'Actualizat la: ', 'source' => 'ultimaActualizareApartament'],		
		];
		foreach($rows as $i => $row)
		{
			$this->pdf->Pdf()->SetFont('freeserif', 'B', 12, '', false);
			$this->pdf->Cell()->text( $row['caption'] )->width(50)->border('')->halign('R')->linefeed(0)->out();
			$this->pdf->Pdf()->SetFont('freeserif', '', 12, '', false);
			$this->pdf->Cell()->text( $this->{$row['source']}() )->width(140)->border('')->halign('L')->linefeed(1)->out();
		}
	}

	protected function outChapterOptiunisuplimentare()
	{
		$this->pdf->Pdf()->ln();
		$this->pdf->Pdf()->SetFont('freeserif', 'B', 14, '', false);
		$this->pdf->Cell()->text('IV. Opţiuni suplimentare')->width(190)->border('TB')->halign('L')->background([210, 210, 210])->out()->reset('background')->border('TBRL');
		$items = [
			'termopan' => 'Termopan',
			'contoare_gaz' => 'Contoare gaz',
			'parchet' => 'Parchet',
			'faianta' => 'Faianţă',
			'aer_conditionat' => 'Aer condiţionat',
			'uscator' => 'Uscător',
			'centrala_termica' => 'Centrală termică',
			'contoare_apa' => 'Contoare apă',
			'zugravit_lavabil' => 'Zugrăvit lavabil',
			'tv_cablu' => 'TV prin cablu',
			'loc_pod' => 'Loc pod',
			'usa_atiefractie' => 'Uşă antiefracţie',
			'modificari_interioare' => 'Modificări interioare',
			'gresie' => 'Gresie',
			'balcoane_inchise' => 'Balcoane închise',
			'has_telefon' => 'Telefon',
			'loc_pivnita' => 'Loc pivniţă',
			'parcare' => 'Parcare',
		];

		$i = 0;
		foreach($items as $field => $item)
		{	
			$i++;
			$this->pdf->Pdf()->SetFont('freeserif', 'B', 12, '', false);
			$this->pdf->Cell()->width(70)->text($item . ' ')->linefeed(0)->halign('R')->out();
			$this->pdf->Pdf()->SetFont('freeserif', '', 12, '', false);
			$value = $this->$field() ? 'DA' : '-';
			$this->pdf->Cell()->width(25)->text($value)->halign('C')->linefeed( (int)($i%2 == 0) )->out();
		}
	}

	protected function createpdf()
	{
		// Pagina 1
		$this->outlogo();
		$this->outnume();
		$this->outphotos();
		$this->outChapterLocalizare(); 
		$this->outChapterProprietar(); 
		$this->outChapterDategenerale();
		$this->outfooter();
		// Pagina 2
		$this->pdf->newpage($this->orientation, $this->pagesize);
		$this->outlogo();
		$this->outnume();
		$this->outChapterOptiunisuplimentare();
		$this->outdetails();
		$this->outfooter();
	}

	public function output()
	{
		$this->createpdf();
		$this->pdf->Pdf()->Output($this->fileName(), $this->destionation);
	}
}