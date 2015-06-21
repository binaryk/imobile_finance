@extends('template.layout')
	
@section('content')
	 <div class="row">  
	 @if(isset($links))
	 	@foreach($links as $i => $link)
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="dashboard-stat blue-madison {{ $link['bg'] }}">
					<a href="{{ $link['url'] }}">
						<div class="visual">
							<i class="fa {{ $link['icon'] }}"></i>
						</div>

						<div class="details">
							<div class="number"></div>
							<div class="desc">
								 {{ $link['header'] }}
							</div>
						</div>

						<a class="more" href="{{ $link['url'] }}">
							{{ $link['title'] }} 
						<i class="m-icon-swapright m-icon-white"></i>
						</a>
					</a>
				</div>
			</div>
	 	@endforeach
	 @endif
	 </div>
@endsection