<?php namespace Dezvoltatori;

class CreateCladireOfertaPdf
{
    protected $orientation  = 'P';
    protected $pagesize     = 'A4';
    protected $destionation = 'D';
    protected $cladire      = NULL;
    protected $redus        = false;

    public function __construct($orientation, $pagesize, $destionation, $cladire, $redus = false)
    {
        if( is_null($cladire) )
        {
            throw new \Exception("Nu există clădirea pentru care să se genereze oferta");
        }
        $this->orientation  = $orientation;
        $this->pagesize     = $pagesize;
        $this->destionation = $destionation;
        $this->cladire      = $cladire;
        $imobil             = \Imobiliare\Imobil::getRecord($cladire->id_imobil);
        $this->ansamblu     = \Imobiliare\AnsambluRezidential::getRecord($imobil->id_ansamblu);
        $this->redus        = $redus;
        $this->pdf          = new \ToPDF\topdf();
        $this->pdf->newpage($this->orientation, $this->pagesize);
    }

    public function __call($method, $args)
    {
        $method = strtolower($method);
        if( array_key_exists($method, $attributes = $this->cladire->getAttributes()) )
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
        $this->pdf->Pdf()->SetFontSize(17);
        $this->pdf->Cell()->text('OFERTE IMOBILIARE')->top(21)->left(75)->out()->reset('top')->reset('left');
        $this->pdf->cell()->text('Data ofertei: ' . \Carbon\Carbon::now()->format('d.m.Y'))->top(13)->left(130)->width(70)->halign('R')->out()->reset('top')->reset('left');
    }

    protected function outnume()
    {
        $oldFontSize = $this->pdf->Pdf()->getFontSizePt();
        $this->pdf->Pdf()->ln();
        $this->pdf->Pdf()->SetXY(10, 29);
        $this->pdf->Pdf()->SetFontSize(15);
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
        $photos = \Imobiliare\Nomenclatoare\CladirePhotos::where('id_cladire', $this->id())->where('file_extension', '<>', 'bmp')->orderby('id', 'desc')->skip(0)->take(4)->get();
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
                try
                {
                    $this->pdf->Pdf()->Image(
                        $new_file, 	// Name of the file containing the image
                        $x, 		// Abscissa of the upper-left corner
                        40, 		// Ordinate of the upper-left corner
                        $w, 		// Width of the image in the page.
                        $h, 		// Height of the image in the page.
                        'PNG',     // Image format
                        '', 		// URL or identifier returned by AddLink().
                        'T', 		// Indicates the alignment of the pointer next to image insertion relative to image height
                        false, 		// If true resize (reduce) the image to fit $w and $h
                        308, 		    // dot-per-inch resolution used on resize
                        '', 		// Allows to center or align the image on the current line
                        false, 		// true if this image is a mask, false otherwise
                        false, 		// image object returned by this function or false
                        0, 			// Indicates if borders must be drawn around the cell
                        'CM', 		// If not false scale image dimensions proportionally to fit within the ($w, $h) box. $fitbox can be true or a 2 characters string indicating the image alignment inside the box. The first character indicate the horizontal alignment (L = left, C = center, R = right) the second character indicate the vertical algnment (T = top, M = middle, B = bottom).
                        false,
                        false, 		// If true do not display the image.
                        false 		// If true the image is resized to not exceed page dimensions.
                    );
                    $x += $step;
                }
                catch(\Exception $e)
                {
                    dd($e->getMessage() );
                }
            }
            $this->pdf->Pdf()->ln();
            $this->pdf->Pdf()->SetXY(10, 110);
        }
    }

    protected function outfooter()
    {
        $this->pdf->Pdf()->SetFont('freeserif', '', 11, '', false);
        $this->pdf->Pdf()->SetXY(10, -25);
        $this->pdf->Cell()->text('Pentru informaţii suplimentare sau alte oferte imobiliare mă puteţi contacta la telefon ' . $this->cladire->current_user->telefon . ', pe email ' . $this->cladire->current_user->email . ' sau la sediul nostru pe ' . str_replace([chr(13) . chr(10), chr(10) . chr(13), chr(10), chr(13)], ' ', $this->cladire->current_org->adresa) )->width(190)->border('T')->halign('C')->out()->reset('border')->reset('width')->reset('halign');
    }

    public function outDescriptionCladire()
    {
        $this->pdf->Pdf()->SetFont('freeserif', '', 12, '', false);
        $this->pdf->Cell()->text($this->observatii())->width(190)->halign('L')->background([255, 255, 255])->out()->reset('background');
        $this->pdf->Pdf()->ln();
    }

    protected function outChapterGenerale()
    {
        $this->pdf->Pdf()->SetFont('freeserif', 'B', 14, '', false);
        $this->pdf->Cell()->text('Detalii cladire')->width(190)->border('TB')->halign('L')->background([210, 210, 210])->out()->reset('background');
        $rows = [
            '1' => ['caption' => 'Localitate : ', 'source' => 'numelocalitate', 'redus' => true],
            '2' => ['caption' => 'Cartier : ', 'source' => 'numecartier', 'redus' => true],
            '3' => ['caption' => 'Adresa : ', 'source' => 'adresa', 'redus' => false],
            '7' => ['caption' => 'Regim înalțime : ', 'source' => 'numeregiminaltime', 'redus' => true],
            '8' => ['caption' => 'Stadiu : ', 'source' => 'numetipstadiu', 'redus' => true],
            '9' => ['caption' => 'Număr spații indivize : ', 'source' => 'nr_spatii_indivize', 'redus' => true],
            '10' => ['caption' => 'Categorie : ', 'source' => 'numetipcategorie', 'redus' => true],
            '11' => ['caption' => 'Tip destinație : ', 'source' => 'numetipdestinatie', 'redus' => true],
            '15' => ['caption' => 'Data finalizare : ', 'source' => 'data_finalizare', 'redus' => true],
        ];
        $this->pdf->Pdf()->ln();
        foreach($rows as $i => $row)
        {
            $apare = true;
            if($this->redus && ! $row['redus'])
            {
                $apare = false;
            }
            if($apare)
            {
                $this->pdf->Pdf()->SetFont('freeserif', 'B', 12, '', false);
                $this->pdf->Cell()->text( $row['caption'] )->width(50)->border('')->halign('R')->linefeed(0)->out();
                $this->pdf->Pdf()->SetFont('freeserif', '', 12, '', false);
                $this->pdf->Cell()->text( $this->{$row['source']}() )->width(140)->border('')->halign('L')->linefeed(1)->out();
            }
        }
    }
    /**
        Date cladire
     **/
    public function numelocalitate(){
        return $this->cladire->numelocalitate ? $this->cladire->numelocalitate : '';
    }
    public function numecartier(){
        return $this->cladire->numecartier ? $this->cladire->numecartier : '';
    }
    public function adresa(){
        return $this->cladire->adresa ? $this->cladire->adresa : '';
    }
    public function telefon(){
        return $this->cladire->telefon ? $this->cladire->telefon : '';
    }
    public function email(){
        return $this->cladire->email ? $this->cladire->email : '';
    }
    public function carte_funciara(){
        return $this->cladire->carte_funciara ? $this->cladire->carte_funciara : '';
    }
    public function numeregiminaltime(){
        return $this->cladire->numeregiminaltime ? $this->cladire->numeregiminaltime : '';
    }
    public function numetipstadiu(){
        return $this->cladire->numetipstadiu ? $this->cladire->numetipstadiu : '';
    }
    public function nr_spatii_indivize(){
        return $this->cladire->nr_spatii_indivize ? $this->cladire->nr_spatii_indivize : '';
    }
    public function numetipcategorie(){
        return $this->cladire->numetipcategorie ? $this->cladire->numetipcategorie : '';
    }
    public function numetipdestinatie(){
        return $this->cladire->numetipdestinatie ? $this->cladire->numetipdestinatie : '';
    }
    public function dotari(){
        return $this->cladire->dotari ? $this->cladire->dotari : '';
    }
    public function cota_indiviza(){
        return $this->cladire->cota_indiviza ? $this->cladire->cota_indiviza : '';
    }
    public function perioada_constructie(){
        return $this->cladire->perioada_constructie ? $this->cladire->perioada_constructie : '';
    }
    public function data_finalizare(){
        return $this->cladire->data_finalizare ? $this->cladire->data_finalizare : '';
    }
    public function observatii(){
        return $this->cladire->observatii ? $this->cladire->observatii : '';
    }

    protected function createpdf()
    {
        // Pagina 1
        $this->outlogo();
        $this->outnume();

        $this->outphotos();
        $this->outDescriptionCladire();
        $this->outChapterGenerale();

        $this->outfooter();
    }

    public function output()
    {
        $this->createpdf();
        $this->pdf->Pdf()->Output($this->fileName(), $this->destionation);
    }
}