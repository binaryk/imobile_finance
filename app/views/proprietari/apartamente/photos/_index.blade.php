@extends('~layouts.datatable.index')
@section('content')
@parent
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Poze apartament</h4>
      </div>
      <div class="modal-body">
        <ul class="bxslider">
			@foreach($photos as $key => $photo)
				<li> <img src="{{ $photo }}"> </li> 
			@endforeach
			{{ $apartament->id }}
		</ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Inchide</button> 
      </div>
    </div>
  </div>
</div>
		
	

		



@stop
@section('datatable-specific-page-jquery-initializations')
	$(document).ready(function(){
	  $('.bxslider').bxSlider();
	}); 

	$('#form-documente .box-footer').hide();

	var upload_document = $("#file-document").fileinput({
		'previewClass'    : 'one-file',
		'previewSettings' :
			{
			    image:  {width: "auto", height: "160px"},
			    html:   {width: "auto", height: "160px"},
			    text:   {width: "auto", height: "160px"},
			    video:  {width: "auto", height: "160px"},
			    audio:  {width: "auto", height: "80px"},
			    flash:  {width: "auto", height: "160px"},
			    object: {width: "auto", height: "160px"},
			    other:  {width: "auto", height: "160px"}
			},
		'dropZoneEnabled' : false,
		'browseLabel'     : 'Alege fişier',
		'removeLabel'     : 'Şterge selecţia',
		'uploadLabel'     : 'Încarcă fişierul',
		'uploadAsync'     : false,
		'uploadUrl'       : '{{URL::route('upload-apartament-photo', ['id_apartament' => $apartament->id])}}',
		'fileActionSettings' : 
			{
				'removeTitle' : 'Şterge selecţia',
				'uploadTitle' : 'Încarcă fişierul',
				'indicatorNewTitle' : 'Fişierul nu este încărcat'
			}
	});
	
	upload_document.on('fileuploaded', function(event, data, previewId, index){
		$("#file-document").fileinput('clear');
		form.hideform();

		console.log(data.files[0].name)
		var date = new Date();
		var _src = "{{ \URL::to('../app/storage/uploads/') }}" + '/' + "{{ $apartament->id }}" + '/' + data.files[0].name + '-' + "{{ $apartament->id }}" + '-' + date.getFullYear() + '-' + (date.getMonth() + 1) + '-' +  date.getDay()  ;
		console.log(_src);
		$('.bxslider').append('<li><img src = "'+ _src  +'"></li>' )
		dt.draw( false );
	});
	$(document).on('click', '.action-delete-apartament-document', function(){
		$.ajax({
			'url'    : "{{URL::route('delete-apartament-photo')}}",
			'type'   : 'post',
			dataType : 'json',
        	data     : {'id' : $(this).attr('data-id') },
        	success  : function(result)
        	{
        		if(result.success)
        		{
        			dt.draw(false);
        		}
        	}
		});
	});
@stop