@extends('base')
@section('title', 'Admin - Products Listing')
@section('main')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Products</h1>
   <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Export Contacts</a>
</div>
<div>
   @if(session()->get('success'))
   <div class="alert alert-success">
      {{ session()->get('success') }}
   </div>
   @endif
   @if(session()->get('errors'))
   <div class="alert alert-danger">
      {{ session()->get('errors') }}
   </div>
   @endif
</div>
<div>
   <a href="{{ route('products.create')}}" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Add New Product</a>
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>MRP</th>
                  <th>Price</th>
                  <th>Status</th>
                  <th>Created By</th>
                  <th colspan = 2>Actions</th>
               </tr>
            </thead>
            <tbody>
               @foreach($products as $product)
               <tr>
                  <td>{{$product->id}}</td>
                  <td>{{$product->product_image}}</td>
                  <td>{{$product->product_mrp}}</td>
                  <td>{{$product->product_price}}</td>
                  <td>{{$product->product_status}}</td>
                  <td>{{$product->user_id}}</td>
                  <td>
                     <a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                  </td>
                  <td>
                     <form action="{{ route('products.destroy', $contact->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                     </form>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
         {{ $products->links() }}
      </div>
   </div>
</div>
@endsection