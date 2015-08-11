<?php

namespace Dezvoltatori;

class CladiriReportController extends \Datatable\DatatableController {
    protected $layout = 'template.layout';


    public function downloadPDF($id) {
        $cladire = \Imobiliare\Cladire::find($id);
        if (!$cladire ) {
            return \Redirect::route('cautare_dezvoltatori_index');
        }
        $cladire ->current_user = $this->current_user;
        $cladire ->current_org = $this->current_org;
        $pdf = new CreateCladireOfertaPdf('P', 'A4', 'D', $cladire , false);
        $pdf->Output();
    }

    public function openPDF($id) {
        $cladire = \Imobiliare\Cladire::find($id);
        if (!$cladire) {
            return \Redirect::route('cautare_dezvoltatori_index');
        }
        $cladire->current_user = $this->current_user;
        $cladire->current_org = $this->current_org;
        $pdf = new CreateCladireOfertaPdf('P', 'A4', 'I', $cladire, false);
        $pdf->Output();
    }

    public function downloadPDFredus($id) {
        $cladire = \Imobiliare\Cladire::find($id);
        if (!$cladire) {
            return \Redirect::route('cautare_dezvoltatori_index');
        }
        $cladire->current_user = $this->current_user;
        $cladire->current_org = $this->current_org;
        $pdf = new CreateCladireOfertaPdf('P', 'A4', 'D', $cladire, true);
        $pdf->Output();
    }

    public function openPDFredus($id) {
        $cladire = \Imobiliare\Cladire::find($id);
        if (!$cladire) {
            return \Redirect::route('cautare_dezvoltatori_index');
        }
        $cladire->current_user = $this->current_user;
        $cladire->current_org = $this->current_org;
        $pdf = new CreateCladireOfertaPdf('P', 'A4', 'I', $cladire, true);
        $pdf->Output();
    }


}