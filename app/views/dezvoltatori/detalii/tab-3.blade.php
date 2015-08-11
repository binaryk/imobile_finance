<div class="list-group">
    @if(isset($record->ansambluri) && (string) gettype($record->ansambluri) == 'object')
        @foreach($record->ansambluri as $key => $ansamblu)
            <h2>Ansamblul: {{$ansamblu->nume ? $ansamblu->nume : '-'}}</h2>
            @if($ansamblu->imobile)
                @foreach($ansamblu->imobile as $ak => $imobil)
                    @if($imobil->id_tip_categorie == '1')
                        @foreach($imobil->cladiri as $ck => $cladire)
                            <div>
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i>Cladirea: {{$cladire->nume ? $cladire->nume : '-'}}
                                        </div>
                                        <div class="actions" style="margin-left: 5px;">
                                            <!-- Complet -->
                                            <a target="_blank" href="{{URL::route('dezvoltator-cladiri-deschide-pdf-redus', ['id' => $cladire->id])}}" class="btn btn-default btn-sm"><i class="fa fa-file-pdf-o"></i> Deschide PDF privat</a>
                                            <a href="{{URL::route('dezvoltator-cladiri-descarca-pdf-redus', ['id' => $cladire->id])}}" class="btn btn-default btn-sm"><i class="fa fa-download"></i> Descarcă PDF privat</a>
                                            <a target="_blank" href="{{URL::route('dezvoltator-cladiri-deschide-pdf', ['id' => $cladire->id])}}" class="btn btn-default btn-sm"><i class="fa fa-file-pdf-o"></i> Deschide PDF client</a>
                                            <a href="{{URL::route('dezvoltator-cladiri-descarca-pdf', ['id' => $cladire->id])}}" class="btn btn-default btn-sm"><i class="fa fa-download"></i> Descarcă PDF client</a>
                                        </div>
                                        <div class="tools pull-right">
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
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Localitate <span class="badge badge-info"> {{$cladire->numelocalitate ? $cladire->numelocalitate : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Cartier <span class="badge badge-info"> {{$cladire->numecartier ? $cladire->numecartier : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Adresa <span class="badge badge-info"> {{$cladire->adresa ? $cladire->adresa : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Telefon <span class="badge badge-info"> {{$cladire->telefon ? $cladire->telefon : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Email <span class="badge badge-info"> {{$cladire->email ? $cladire->email : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Carte funciara <span class="badge badge-info"> {{$cladire->carte_funciara ? $cladire->carte_funciara : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Regim înălțime <span class="badge badge-info"> {{$cladire->numeregiminaltime ? $cladire->numeregiminaltime : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Stadiu<span class="badge badge-info"> {{$cladire->numetipstadiu ? $cladire->numetipstadiu : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Spații indivize<span class="badge badge-info"> {{$cladire->nr_spatii_indivize ? $cladire->nr_spatii_indivize : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Ascensor <span class="badge badge-{{$cladire->ascensor ? 'success' : 'warning'}}"> {{$cladire->ascensor ? 'DA' : 'NU'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Categorie<span class="badge badge-info"> {{$cladire->numetipcategorie ? $cladire->numetipcategorie : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Destinatie<span class="badge badge-info"> {{$cladire->numetipdestinatie ? $cladire->numetipdestinatie : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Dotari<span class="badge badge-info"> {{$cladire->dotari ? $cladire->dotari : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Cota indiviză<span class="badge badge-info"> {{$cladire->cota_indiviza ? $cladire->cota_indiviza : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Perioada constructiei<span class="badge badge-info"> {{$cladire->perioada_constructie ? $cladire->perioada_constructie : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Climatizare <span class="badge badge-{{$cladire->climatizare ? 'success' : 'warning'}}"> {{$cladire->climatizare ? 'DA' : 'NU'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Mansardă <span class="badge badge-{{$cladire->mansarda ? 'success' : 'warning'}}"> {{$cladire->mansarda ? 'DA' : 'NU'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Data finalizare<span class="badge badge-info"> {{$cladire->data_finalizare ? $cladire->data_finalizare : '-'}} </span>
                                        </a>
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
                                                    <dt>Detalii</dt>
                                                    <dd>{{$ansamblu->observatii ? $ansamblu->observatii : '-'}}</dd>
                                                </dl>
                                                <dt>Poze</dt>
                                                <?php $poze_cladire = \Imobiliare\Nomenclatoare\CladirePhotos::where('id_cladire', $cladire->id)->where('file_extension', '<>', 'bmp')->orderby('id')->get() ?>
                                                <dd>@if( $poze_cladire->count() == 0 )
                                                        <div class="note note-danger">
                                                            <p>Cladirea <strong>{{ $cladire->nume }}</strong> nu are încărcate poze.</p>
                                                        </div>
                                                    @else
                                                        <div class="row">
                                                            @foreach($poze_cladire as $i => $photo)
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
                    @endif
                @endforeach
            @endif

        @endforeach
    @endif
</div>
