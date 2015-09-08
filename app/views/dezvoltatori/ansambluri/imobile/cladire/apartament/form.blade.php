<div class="row">
<!-- Tip imobil -->

<div class="col-md-12">
<div class="alert alert-info">
	<strong>Atenție!</strong> Selectați tipul de imobil!
	{{$controls[48]->out()}}
</div>
	<!-- BEGIN PORTLET-->
	<div class="portlet light bg-inverse" style="background-color: white; border: 1px solid #d3d3d3;">
	<div class="portlet">
		<div class="portlet-title">
			<div class="caption font-purple-plum">
				<i class="icon-speech font-purple-plum"></i>
				<span class="caption-subject bold uppercase"> Date generale imobil</span>
				<span class="caption-helper">aici completati datele generale</span>
			</div>
			<div class="tools">
				<a href="" class="collapse" data-original-title="" title="">
				</a>
				<a href="" class="fullscreen" data-original-title="" title="">
				</a>
				<a href="" class="remove" data-original-title="" title="">
				</a>
			</div>
		</div>

		<div class="portlet-body" sty>
			<div id="context" data-toggle="context" data-target="#context-menu">
				<div class="row">
				<div class="apartamente" style="display: none;">
					<div class="row">
						<!-- Titlu apartament -->
						<div class="col-md-6">
							{{$controls[44]->out()}}
						</div>
						<!-- localitate-->
						<div class="col-md-6">
							{{$controls[60]->out()}}
						</div>
					</div>
					<div class="row">
						<!-- cartier -->
						<div class="col-md-6">
							{{$controls[5]->out()}}
						</div>
						<!-- orientare geografica -->
						<div class="col-md-6">
							{{$controls[69]->out()}}
						</div>
					</div>

					<div class="row">
						<!-- nr_camere -->
						<div class="col-md-6">
							{{$controls[6]->out()}}
						</div>
						<!-- nr_entitati -->
						<div class="col-md-6">
							{{$controls[70]->out()}}
						</div>
					</div>

					<div class="row">
						<!-- zona aproximativa -->
						<div class="col-md-6">
							{{$controls[18]->out()}}
						</div>
						<!-- strada -->
						<div class="col-md-6">
							{{$controls[19]->out()}}
						</div>
						
					</div>
					<div class="row">
						<!-- scara -->
						<div class="col-md-6">
							{{$controls[46]->out()}}
						</div>
						<!-- nr_apartament -->
						<div class="col-md-6">
							{{$controls[47]->out()}}
						</div>
					</div>
					<div class="row">
						<!-- etaj -->
						<div class="col-md-6">
							{{$controls[10]->out()}}
						</div>
						<!-- tip compartiemnare -->
						<div class="col-md-6">
							{{$controls[7]->out()}}
						</div>
					</div>
					<div class="row">
						<!-- pret -->
						<div class="col-md-6">
							{{$controls[20]->out()}}
						</div>

						<!-- ultima actualizare -->
						<div class="col-md-6">
							{{$controls[23]->out()}}
						</div>
					</div>
					<div class="row">
						<!-- valabiliatate oferta -->
						<div class="col-md-6">
							{{$controls[51]->out()}}
						</div>
						<!-- suprafata -->
						<div class="col-md-6">
							{{$controls[8]->out()}}
						</div>
					</div>
					<div class="row">
						<!-- detalii -->
						<div class="col-md-6">
							{{$controls[21]->out()}}
						</div>
						<!-- detalii private -->
						<div class="col-md-6">
							{{$controls[22]->out()}}
						</div>
					</div>


					<div class="teren">
						<div>
							{{$controls[61]->out()}}
						</div>
						<!-- Tip teren-->
						<div class="col-md-6">
							{{$controls[62]->out()}}
						</div>
						<!-- Front stradă principală -->
						<div class="col-md-6">
							{{$controls[63]->out()}}
						</div>
						<!-- Există drum de servitute -->
						<div class="col-md-6">
							{{$controls[64]->out()}}
						</div>
						<!-- Există contrucție pe teren -->
						<div class="col-md-6">
							{{$controls[65]->out()}}
						</div>
						<!-- Terenul are PUD -->
						<div class="col-md-6">
							{{$controls[66]->out()}}
						</div>
						<!-- Terenul are PUZ -->
						<div class="col-md-6">
							{{$controls[67]->out()}}
						</div>
						<!-- regim inaltime -->
						<div class="col-md-6">
							{{$controls[68]->out()}}
						</div>
					</div>
				</div>

			</div>

			</div>
		</div>
		</div>
	</div>
	<!-- END PORTLET-->
	</div>
	<div class="col-md-12 optional">
		<!-- BEGIN PORTLET-->
		<div class="portlet light bg-inverse bg-inverse_2" style="background-color: white; border: 1px solid #d3d3d3;">
			<div class="portlet-title">
				<div class="caption font-red-intense">
					<i class="icon-speech font-red-intense green"></i>
					<span class="caption-subject bold uppercase"> Informatii optionale</span>
					<span class="caption-helper">aici completati date suplimentare despre imobil</span>
				</div>
				<div class="tools">
					<a href="" class="expand" data-original-title="" title="">
					</a>
					<a href="" class="fullscreen" data-original-title="" title="">
					</a>
					<a href="" class="remove" data-original-title="" title="">
					</a>
				</div>
			</div>
			<div class="portlet-body" style="display: none;">
				<div id="context" data-toggle="context" data-target="#context-menu">
					<div class="row">
					<div class="apartamente" style="display: none;">
						<!-- numar bai -->
						<div class="col-md-6">
							{{$controls[12]->out()}}
						</div>
						<!-- tip garaj -->
						<div class="col-md-6">
							{{$controls[24]->out()}}
						</div>
						<!-- numar balcoane -->
						<div class="col-md-6">
							{{$controls[13]->out()}}
						</div>
						<!-- detalii despre balcoane -->
						<div class="col-md-6">
							{{$controls[14]->out()}}
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END PORTLET-->
		</div>
</div>


{{
	Form::hidden('id_cladire', $cladire->id, ['id' => 'id_cladire', 'class' => 'data-source', 'data-control-source' => 'id_cladire', 'data-control-type' => 'persistent'])
}}

{{
	Form::hidden('id_organizatie', $current_org->id, ['id' => 'id_organizatie', 'class' => 'data-source', 'data-control-source' => 'id_organizatie', 'data-control-type' => 'persistent'])
}}