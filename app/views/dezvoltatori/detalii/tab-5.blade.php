<div class="list-group">
    @if(isset($record->ansambluri) && (string) gettype($record->ansambluri) == 'object')
        @foreach($record->ansambluri as $key => $ansamblu)
            <h2>Ansamblul: {{$ansamblu->nume ? $ansamblu->nume : '-'}}</h2>
            @if($ansamblu->imobile)
                @foreach($ansamblu->imobile as $ak => $imobil)
                    @if($imobil->id_tip_categorie == '3')
                        @foreach($imobil->terenuri as $ck => $teren)
                            <div>
                                <div class="portlet">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-gift"></i>Teren: {{$teren->nume ? $teren->nume : '-'}}
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
                                            Adresa <span class="badge badge-info"> {{$teren->adresa ? $teren->adresa : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Telefon <span class="badge badge-info"> {{$teren->telefon ? $teren->telefon : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Carte funciara <span class="badge badge-info"> {{$teren->carte_funciara ? $teren->carte_funciara : '-'}} </span>
                                        </a>
                                        <a href="#" class="list-group-item list-group-item-info">
                                            Destinație<span class="badge badge-info"> {{$teren->numetipdestinatie ? $teren->numetipdestinatie : '-'}} </span>
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
                                                    <dd>{{$teren->detalii ? $teren->detalii : '-'}}</dd>
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
