<div class="list-group">
    @if(isset($record->ansambluri) && (string) gettype($record->ansambluri) == 'object')
        @foreach($record->ansambluri as $key => $ansamblu)
            <div>
                <div class="portlet">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="fa fa-gift"></i>Ansamblul: {{$ansamblu->nume ? $ansamblu->nume : '-'}}
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
                            <a href="#" class="list-group-item list-group-item-info">
                                Telefon <span class="badge badge-info"> {{$ansamblu->telefon ? $ansamblu->telefon : '-'}} </span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-info">
                                An înființare <span class="badge badge-info"> {{$ansamblu->anul_infiintarii ? $ansamblu->anul_infiintarii : '-'}} </span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-info">
                                Data finalizare <span class="badge badge-info"> {{$ansamblu->data_finalizare ? $ansamblu->data_finalizare : '-'}} </span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-info">
                                Stadiu ansamblu <span class="badge badge-info"> {{$ansamblu->numestadiu ? $ansamblu->numestadiu : '-'}} </span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-info">
                                Strada <span class="badge badge-info"> {{$ansamblu->strada ? $ansamblu->strada : '-'}} </span>
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
                                        <dt>Detalii localizare</dt>
                                        <dd>{{$ansamblu->detalii_localizare ? $ansamblu->detalii_localizare : '-'}}</dd>
                                        <dt>Confort</dt>
                                        <dd>{{$ansamblu->detalii_confort ? $ansamblu->detalii_confort : '-'}}</dd>
                                        <dt>Sistem constructiv</dt>
                                        <dd>{{$ansamblu->detalii_sistem_constructiv? $ansamblu->detalii_sistem_constructiv: '-'}}</dd>
                                        <dt>Financiare</dt>
                                        <dd>{{$ansamblu->detalii_financiare? $ansamblu->detalii_financiare: '-'}}</dd>
                                        <dt>Poze</dt>
                                        <?php $poze_ansamblu = \Imobiliare\Nomenclatoare\AnsambluPhotos::where('id_ansamblu', $ansamblu->id)->where('file_extension', '<>', 'bmp')->orderby('id')->get() ?>
                                        <dd>@if( $poze_ansamblu->count() == 0 )
                                                <div class="note note-danger">
                                                    <p>Ansamblul <strong>{{ $ansamblu->nume }}</strong> nu are încărcate poze.</p>
                                                </div>
                                            @else
                                                <div class="row">
                                                    @foreach($poze_ansamblu as $i => $photo)
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
</div>
