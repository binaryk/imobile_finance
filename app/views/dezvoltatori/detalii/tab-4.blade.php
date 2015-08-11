<div class="list-group">
    @if(isset($record->ansambluri) && (string) gettype($record->ansambluri) == 'object')
        @foreach($record->ansambluri as $key => $ansamblu)
            <h2>Ansamblul: {{$ansamblu->nume ? $ansamblu->nume : '-'}}</h2>
            @if($ansamblu->imobile)
                @foreach($ansamblu->imobile as $ak => $imobil)
                    @if($imobil->id_tip_categorie == '1')
                        @foreach($imobil->cladiri as $ck => $cladire)
                            <h3>Cladirea: {{$cladire->nume ? $cladire->nume : '-'}}</h3>
                            @foreach($cladire->apartamente as $apck => $apartament)
                                <div>
                                    <div class="portlet">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-gift"></i>Apartament: {{$apartament->nume ? $apartament->nume : '-'}}
                                            </div>
                                            <div class="actions" style="margin-left: 5px;">
                                                <a target="_blank" href="{{URL::route('dezvoltator-apartamente-deschide-pdf-redus', ['id' => $apartament->id])}}" class="btn btn-default btn-sm"><i class="fa fa-file-pdf-o"></i> Deschide PDF privat</a>
                                                <a href="{{URL::route('dezvoltator-apartamente-descarca-pdf-redus', ['id' => $apartament->id])}}" class="btn btn-default btn-sm"><i class="fa fa-download"></i> Descarcă PDF privat</a>
                                                <a target="_blank" href="{{URL::route('dezvoltator-apartamente-deschide-pdf', ['id' => $apartament->id])}}" class="btn btn-default btn-sm"><i class="fa fa-file-pdf-o"></i> Deschide PDF client</a>
                                                <a href="{{URL::route('dezvoltator-apartamente-descarca-pdf', ['id' => $apartament->id])}}" class="btn btn-default btn-sm"><i class="fa fa-download"></i> Descarcă PDF client</a>
                                            </div>
                                            <div class="tools">
                                                <a href="javascript:;" class="collapse">
                                                </a>
                                                <a href="#portlet-config" data-toggle="modal" class="config">
                                                </a>
                                                <a href="javascript:;" class="reload">
                                                </a>
                                                <a href="javascript:;" class="remove">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="portlet-body">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-6 col-lg-6">

                                                    <div class="list-group">
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Garaj <span class="badge badge-info"> {{$apartament->numetipgaraj ? $apartament->numetipgaraj : '-'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Tip cladire <span class="badge badge-info"> {{$apartament->numetipcladire ? $apartament->numetipcladire : '-'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Număr etaje clădire <span class="badge badge-info"> {{$apartament->nr_etaje_cladire ? $apartament->nr_etaje_cladire : '-'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Vechime clădire<span class="badge badge-{{$apartament->vechime_imobil ? 'success' : 'warning'}}"> {{$apartament->vechime_imobil ? 'Nou' : 'Vechi'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Finisaj interior <span class="badge badge-info"> {{$apartament->numetipfinisare ? $apartament->numetipfinisare : '-'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Finisaje exterioare <span class="badge badge-info"> {{$apartament->numetipfinisareexterioare ? $apartament->numetipfinisareexterioare : '-'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Compartimentare <span class="badge badge-info"> {{$apartament->numetipcompartimentare ? $apartament->numetipcompartimentare : '-'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Este agenţie <span class="badge badge-{{$apartament->is_agentie ? 'success' : 'warning'}}"> {{$apartament->is_agentie ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Oferta valabilă <span class="badge badge-{{$apartament->oferta_valabila ? 'success' : 'warning'}}"> {{$apartament->oferta_valabila ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Termopan <span class="badge badge-{{$apartament->termopan ? 'success' : 'warning'}}"> {{$apartament->termopan ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Contoare gaz <span class="badge badge-{{$apartament->contoare_gaz ? 'success' : 'warning'}}"> {{$apartament->contoare_gaz ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Parchet <span class="badge badge-{{$apartament->parchet ? 'success' : 'warning'}}"> {{$apartament->parchet ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Faianţă <span class="badge badge-{{$apartament->faianta ? 'success' : 'warning'}}"> {{$apartament->faianta ? 'DA' : 'NU'}} </span>
                                                        </a>

                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Aer condiţionat <span class="badge badge-{{$apartament->aer_conditionat ? 'success' : 'warning'}}"> {{$apartament->aer_conditionat ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Uscător <span class="badge badge-{{$apartament->uscator ? 'success' : 'warning'}}"> {{$apartament->uscator ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Centrală termică <span class="badge badge-{{$apartament->centrala_termica ? 'success' : 'warning'}}"> {{$apartament->centrala_termica ? 'DA' : 'NU'}} </span>
                                                        </a>

                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Contoare apă <span class="badge badge-{{$apartament->contoare_apa ? 'success' : 'warning'}}"> {{$apartament->contoare_apa ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Zugrăvit lavabil <span class="badge badge-{{$apartament->zugravit_lavabil ? 'success' : 'warning'}}"> {{$apartament->zugravit_lavabil ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Televiziune prin cablu <span class="badge badge-{{$apartament->tv_cablu ? 'success' : 'warning'}}"> {{$apartament->tv_cablu ? 'DA' : 'NU'}} </span>
                                                        </a>

                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Loc pod <span class="badge badge-{{$apartament->loc_pod ? 'success' : 'warning'}}"> {{$apartament->loc_pod ? 'DA' : 'NU'}} </span>
                                                        </a>

                                                    </div>

                                                </div>

                                                <div class="col-xs-12 col-md-6 col-lg-6">

                                                    <div class="list-group">

                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Uşă antiefracţie <span class="badge badge-{{$apartament->usa_atiefractie ? 'success' : 'warning'}}"> {{$apartament->usa_atiefractie ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Modificări interioare <span class="badge badge-{{$apartament->modificari_interioare ? 'success' : 'warning'}}"> {{$apartament->modificari_interioare ? 'DA' : 'NU'}} </span>
                                                        </a>

                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Gresie <span class="badge badge-{{$apartament->gresie ? 'success' : 'warning'}}"> {{$apartament->gresie ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Balcon <span class="badge badge-{{$apartament->has_balcon ? 'success' : 'warning'}}"> {{$apartament->has_balcon ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Tip balcoane <span class="badge badge-info"> {{$apartament->numetipbalcon ? $apartament->numetipbalcon : '-'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Balcoane închise <span class="badge badge-{{$apartament->balcoane_inchise ? 'success' : 'warning'}}"> {{$apartament->balcoane_inchise ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Are telefon <span class="badge badge-{{$apartament->has_telefon ? 'success' : 'warning'}}"> {{$apartament->has_telefon ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Loc pivniţă <span class="badge badge-{{$apartament->loc_pivnita ? 'success' : 'warning'}}"> {{$apartament->loc_pivnita ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Parcare <span class="badge badge-{{$apartament->parcare ? 'success' : 'warning'}}"> {{$apartament->parcare ? 'DA' : 'NU'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Preţ <span class="badge badge-info"> {{$apartament->pret_m2 ? _toFloat($apartament->pret_m2) . ' EURO' : '-'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Preţ negociabil<span class="badge badge-{{$apartament->negociabil ? 'success' : 'warning'}}"> {{$apartament->negociabil ? 'DA' : 'NU'}} </span>
                                                        </a>


                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Etaj <span class="badge badge-info"> {{$apartament->numetipetaj ? $apartament->numetipetaj : '-'}} </span>
                                                        </a>


                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Acoperiş <span class="badge badge-info"> {{$apartament->numetipacoperis ? $apartament->numetipacoperis : '-'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Confort <span class="badge badge-info"> {{$apartament->numetipconfort ? $apartament->numetipconfort : '-'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Data apariției <span class="badge badge-info"> {{$apartament->data_aparitiei ? $apartament->data_aparitiei : '-'}} </span>
                                                        </a>
                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Ultima actualizare <span class="badge badge-info"> {{$apartament->ultima_actualizare ? $apartament->ultima_actualizare : '-'}} </span>
                                                        </a>

                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Se acceptă "credit prima casă"<span class="badge badge-{{$apartament->credit_prima_casa ? 'success' : 'warning'}}"> {{$apartament->credit_prima_casa ? 'DA' : 'NU'}} </span>
                                                        </a>

                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Număr de băi <span class="badge badge-info"> {{ $apartament->nr_bai ? $apartament->nr_bai : '-' }} </span>
                                                        </a>

                                                        <a href="#" class="list-group-item list-group-item-info">
                                                            Sistem de încălzire <span class="badge badge-info"> {{ $apartament->id_sistem_incalzire ? $apartament->id_sistem_incalzire : '-' }} </span>
                                                        </a>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="portlet box purple">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i>Detalii
                                                    </div>
                                                    <div class="tools">
                                                        <a href="javascript:;" class="collapse">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <dl>
                                                        <dt>Caracteristici generale</dt>
                                                        <dd>{{$ansamblu->observatii_caracteristici_generale ? $ansamblu->observatii_caracteristici_generale : '-'}}</dd>
                                                        <dt>Finisaje si dotari</dt>
                                                        <dd>{{$ansamblu->observatii_finisaje_dotari ? $ansamblu->observatii_finisaje_dotari : '-'}}</dd>
                                                        <dt>Dotari</dt>
                                                        <dd>{{$ansamblu->observatii_dotari ? $ansamblu->observatii_dotari : '-'}}</dd>
                                                        <dt>Generale</dt>
                                                        <dd>{{$ansamblu->observatii_generale  ? $ansamblu->observatii_generale  : '-'}}</dd>
                                                        <dt>Poze</dt>
                                                        <?php $poze_apartament = \Imobiliare\Nomenclatoare\ApartamentPhotos::where('id_apartament', $apartament->id)->where('file_extension', '<>', 'bmp')->orderby('id')->get() ?>
                                                        <dd>@if( $poze_apartament->count() == 0 )
                                                                <div class="note note-danger">
                                                                    <p>Apartamentul <strong>{{ $apartament->nume }}</strong> nu are încărcate poze.</p>
                                                                </div>
                                                            @else
                                                                <div class="row">
                                                                    @foreach($poze_apartament as $i => $photo)
                                                                        <div class="col-sm-12 col-md-6 col-lg-4">
                                                                            <div class="thumbnail" data-id="{{$photo->id}}">

                                                                                <img src="{{(string) Image::make($photo->file_name)->resize(NULL, 200, function ($constraint){$constraint->aspectRatio(); $constraint->upsize();})->encode('data-url')}}" style="height: 200px; display: block;"/>

                                                                            </div>

                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            @endif
                                                        </dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    @endif
                @endforeach
            @endif

        @endforeach
    @endif
</div>
