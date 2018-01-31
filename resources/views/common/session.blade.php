@if(Session::has('success'))
	<div class="alert alert-info">
	    <a class="close" data-dismiss="alert"><i class="fa fa-times" aria-hidden="true"></i></a>
	    <strong>{!! Session::get('success') !!}</strong> 
	</div>
@endif
