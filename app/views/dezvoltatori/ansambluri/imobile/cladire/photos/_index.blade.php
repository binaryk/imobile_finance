@extends('~layouts.datatable.index')
@section('content')
@parent


@stop
@section('datatable-specific-page-jquery-initializations')
		var photos = [];
			@if(count($images) > 0)
			@foreach($images as $i => $photo)
				photos.push("{{(string) Image::make($photo->file_name)->encode('data-url')}}");
				console.log(photos);
			@endforeach
			@endif

	$('.form-actions').hide();
	$('.action-slider').click(function(){
		var carouselOptions = {
		    hidePageScrollbars: false,
		    toggleControlsOnReturn: false,
		    toggleSlideshowOnSpace: false,
		    enableKeyboardNavigation: false,
		    closeOnEscape: false,
		    closeOnSlideClick: true,
		    closeOnSwipeUpOrDown: false,
		    disableScroll: false,
		    startSlideshow: true
		};
		var gallery = blueimp.Gallery(photos);
	})


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
		'uploadAsync'     : true,
		'uploadUrl'       : '{{URL::route('upload-cladire-photo', ['id_cladire' => $cladire->id])}}',
		'fileActionSettings' :
			{
				'removeTitle' : 'Şterge selecţia',
				'uploadTitle' : 'Încarcă fişierul',
				'indicatorNewTitle' : 'Fişierul nu este încărcat'
			},
		'maxFileCount': 10
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
		MyDateString =  MyDate.getFullYear() + '-' + ('0' + (MyDate.getMonth()+1)).slice(-2)   + '-' + ('0' + MyDate.getDate()).slice(-2) ;
		dt.draw( false );
	});
	$(document).on('click', '.action-delete-cladire-document', function(){
		$.ajax({
			'url'    : "{{URL::route('delete-cladire-photo')}}",
			'type'   : 'post',
			dataType : 'json',
        	data     : {'id' : $(this).attr('data-id') },
        	success  : function(result)
        	{
        		if(result.success)
        		{
        			dt.draw(false);
        			document.modificari = true;
        		}
        	}
		});
	});
@stop