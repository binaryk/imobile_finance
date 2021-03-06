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
					<!-- Titlu apartament -->
					<div class="col-md-6">
						{{$controls[44]->out()}}
					</div> 
					<!-- telefon 1 -->
					<div class="col-md-6">
						{{$controls[1]->out()}}
					</div>	
					<!-- telefon 2 -->
					<div class="col-md-6">
						{{$controls[2]->out()}}
					</div>	
					
					
					<!-- email -->
					<div class="col-md-6">
						{{$controls[3]->out()}}
					</div>
					
					<!-- cartier -->
					<div class="col-md-6">
						{{$controls[60]->out()}}
					</div>

					<!-- cartier -->
					<div class="col-md-6">
						{{$controls[5]->out()}}
					</div>
					
					
					<div class="no_teren">
						<!-- nr_camere -->
						<div class="col-md-6">
							{{$controls[6]->out()}}
						</div>
					</div>
					<!-- suprafata -->
					<div class="col-md-6">
						{{$controls[8]->out()}}
					</div>  
					<div class="casa" style="display: none;">
						<!-- suprafata teren -->
						<div class="col-md-6">
							{{$controls[50]->out()}}
						</div>
					</div> 
					<!-- zona aproximativa -->
					<div class="col-md-6">
						{{$controls[18]->out()}}
					</div>
					<!-- strada -->
					<div class="col-md-6">
						{{$controls[19]->out()}}
					</div>
					<div class="no_teren">
						<!-- nr_cladire -->
						<div class="col-md-6">
							{{$controls[45]->out()}}
						</div>
						<!-- scara -->
						<div class="col-md-6">
							{{$controls[46]->out()}}
						</div>
						<!-- nr_apartament -->
						<div class="col-md-6">
							{{$controls[47]->out()}}
						</div>
						<!-- etaj -->
						<div class="col-md-6">
							{{$controls[10]->out()}}
						</div>
						<!-- etaj cladire-->
						<div class="col-md-6">
							{{$controls[58]->out()}}
						</div>
						<!-- tip compartiemnare -->
						<div class="col-md-6">
							{{$controls[7]->out()}}
						</div>
						<!-- finisaje interne -->
						<div class="col-md-6">
							{{$controls[11]->out()}}
						</div>
						<!-- finisaje exteren -->
						<div class="col-md-6">
							{{$controls[59]->out()}}
						</div>
					</div>

					<!-- pret -->
					<div class="col-md-6">
						{{$controls[20]->out()}}
					</div>
					
					<!-- ultima actualizare -->
					<div class="col-md-6">
						{{$controls[23]->out()}}
					</div>
					<div class="no_teren">
						<!-- tip mobilare -->
						<div class="col-md-6">
							{{$controls[52]->out()}}
						</div>
					</div>
					<!-- valabiliatate oferta -->
					<div class="col-md-6">
						{{$controls[51]->out()}}
					</div>
					<div class="no_teren">
						<!-- credit -->
						<div class="col-md-6">
							{{$controls[17]->out()}}
						</div>
					</div>
					<!-- detalii -->
					<div class="col-md-6">
						{{$controls[21]->out()}}
					</div>
					<!-- detalii private -->
					<div class="col-md-6">
						{{$controls[22]->out()}}
					</div>

					<div class="teren">

						<!-- Tip utilități existente-->
						<div class="col-md-6">
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
						<!-- acoperis -->
						<div class="col-md-6">
							{{$controls[31]->out()}}
						</div>
						<!-- anul construciei -->
						<div class="col-md-6">
							{{$controls[15]->out()}}
						</div>
						<!-- contoare_gaz -->
						<div class="col-md-6">
							{{$controls[26]->out()}}
						</div>
						<!-- parchet -->
						<div class="col-md-6">
							{{$controls[27]->out()}}
						</div>
						<!-- faianta -->
						<div class="col-md-6">
							{{$controls[28]->out()}}
						</div>
						<!-- parcare -->
						<div class="col-md-6">
							{{$controls[16]->out()}}
						</div>
						<!-- aer_conditionat -->
						<div class="col-md-6">
							{{$controls[29]->out()}}
						</div>
						<!-- uscator -->
						<div class="col-md-6">
							{{$controls[30]->out()}}
						</div> 
						<!-- centrala termica -->
						<div class="col-md-6">
							{{$controls[32]->out()}}
						</div>
						<!-- contoare apa -->
						<div class="col-md-6">
							{{$controls[33]->out()}}
						</div>
						<!-- zugravit lavabil -->
						<div class="col-md-6">
							{{$controls[35]->out()}}
						</div>
						<!-- tv cablu -->
						<div class="col-md-6">
							{{$controls[36]->out()}}
						</div>
						<!-- loc in pod -->
						<div class="col-md-6">
							{{$controls[37]->out()}}
						</div> 
						<!-- usa_atiefractie -->
						<div class="col-md-6">
							{{$controls[38]->out()}}
						</div>
						<!-- modificari_interioare -->
						<div class="col-md-6">
							{{$controls[39]->out()}}
						</div>
						<!-- gresie -->
						<div class="col-md-6">
							{{$controls[40]->out()}}
						</div>
						<!-- balcoane_inchise -->
						<div class="col-md-6">
							{{$controls[41]->out()}}
						</div>
						<!-- has_telefon -->
						<div class="col-md-6">
							{{$controls[42]->out()}}
						</div>
						<!-- loc_pivnita -->
						<div class="col-md-6">
							{{$controls[43]->out()}}
						</div>
						<!-- vechime imobil -->
						<div class="col-md-6">
							{{$controls[49]->out()}}
						</div>
						<!-- negociabil -->
						<div class="col-md-6">
							{{$controls[53]->out()}}
						</div>
						<!-- termopan -->
						<div class="col-md-6">
							{{$controls[25]->out()}}
						</div>
						<!-- observatii_caracteristici_generale -->
						<div class="col-md-6">
							{{$controls[54]->out()}}
						</div>
						<!-- observatii_finisaje_dotari -->
						<div class="col-md-6">
							{{$controls[55]->out()}}
						</div>
						<!-- observatii_dotari -->
						<div class="col-md-6">
							{{$controls[56]->out()}}
						</div>
						<!-- observatii_generale -->
						<div class="col-md-6">
							{{$controls[57]->out()}}
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
	Form::hidden('id_imobil', $imobil->id, ['id' => 'id_imobil', 'class' => 'data-source', 'data-control-source' => 'id_imobil', 'data-control-type' => 'persistent'])
}}

{{
	Form::hidden('id_organizatie', $current_org->id, ['id' => 'id_organizatie', 'class' => 'data-source', 'data-control-source' => 'id_organizatie', 'data-control-type' => 'persistent'])
}}