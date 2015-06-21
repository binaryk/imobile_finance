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
 
	  var bx =  $('.bxslider').bxSlider();
	//$('#modal').click(function(e){
		//if(document.modificari){
			// location.reload();
		//	e.preventdefault();
	//	}
	//})
	document.modificari = false;
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
		console.log(data)
		document.modificari = true;
		var file_name = data.files[0].name;
		var extention = file_name.split('.')[1];
		var file_name = file_name.split('.')[0]; 
		var MyDate = new Date();
		var MyDateString;
		console.log(MyDateString);


		//MyDate.setDate(MyDate.getDate() + 20);

		MyDateString =  MyDate.getFullYear() + '-' + ('0' + (MyDate.getMonth()+1)).slice(-2)   + '-' + ('0' + MyDate.getDate()).slice(-2) ;

		var _src = "{{ \URL::to('../app/storage/uploads/') }}" + '/' + '{{ $apartament->id }}' + '/' + file_name + '-' + '{{ $apartament->id }}' + '-' + MyDateString + '.' + extention  ; ;
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
        			bx.reloadSlider();
        			dt.draw(false);
        			document.modificari = true;
        		}
        	}
		});
	});
@stop