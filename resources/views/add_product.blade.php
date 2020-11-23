
@extends('web_layout.app')

@section('content')


<div class="container">


@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Sorry !</strong> There were some problems with your input.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

@if (session('success'))
          <div class="alert alert-success pt-2">
              {{ session('success') }}
          </div>
      @endif

	<form method="post" action="{{route('add_product.insert')}}" enctype="multipart/form-data">
		@csrf
	<div class="row mt-3">

		<div class="col-md-6"> 
		 <input type="text" name="product_name" class="form-control" placeholder="product name"> 
		</div>
		<div class="col-md-6"> 
			<input type="text" name="product_details" class="form-control" placeholder="product details">
		</div>
		<div class="col-md-6 mt-3">
			<input type="number" class="form-control" name="product_price" placeholder="product price">
		 </div>
		<div class="col-md-6 mt-3"> 
			<input type="file" class="form-control" name="product_image" id="product_image">
			
		</div>
		<input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
	</div>
<button type="submit">submit</button>
</form>

</div>

<a href="{{route('product')}}">My Product</a>


<div style="width: 250px;">
	<img style="max-width: 100%;" src="" id="show_product">

</div>





@endsection