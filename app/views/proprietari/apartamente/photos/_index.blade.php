@extends('~layouts.datatable.index')

@section('datatable-specific-page-jquery-initializations')
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