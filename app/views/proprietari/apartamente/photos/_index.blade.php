@extends('~layouts.datatable.index')
@section('content')
@parent 
 

@stop
@section('datatable-specific-page-jquery-initializations')
		var photos = [];
	@foreach($photos as $key => $photo)
		photos.push("{{ $photo }}");
		console.log(photos);
	@endforeach 


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