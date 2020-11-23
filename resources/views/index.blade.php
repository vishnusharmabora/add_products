
 @extends('web_layout.app')

@section('content')


	all product
 @guest

@else
 	<a href="{{route('add_product')}}">Add Product</a>
 	<a href="{{route('product')}}">My Product</a>
 @endguest 



	@if(isset($products))
	 		<div class="content">
	                <table border = "1">
	                <tr>
	                <td>product Name</td>
	                <td>product details</td>
	                <td>product id</td>
	                
	                <td>product Image</td>
	                </tr>
	                @foreach ($products as $product_user)
	                <tr>
	                <td>{{ $product_user->product_name }}</td>
	                <td>{{ $product_user->product_details }}</td>
	                <td>{{ $product_user->user_id }}</td>               
	                <td><img style="width: 100px;" src="{{URL::asset('images/uploads/'.$product_user->product_image )}}">


	                	</td>
	                </tr>
	                @endforeach
	                </table>

            </div>
            @endif

 @endsection      


