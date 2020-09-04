@extends('base')
@section('title', 'Admin - Configurations Listing')
@section('main')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
   <h1 class="h3 mb-0 text-gray-800">Configurations</h1>
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
   <!-- <a href="{{ route('configurations.create')}}" class="btn btn-primary mb-3"><i class="fa fa-plus" aria-hidden="true"></i> Add New Configuration</a> -->
</div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
   <div class="card-body">
      <div class="table-responsive">
         <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
               <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Value</th>
                  <th>Created By</th>
                  <th colspan = 2>Actions</th>
               </tr>
            </thead>
            <tbody>
               @foreach($configurations as $configuration)
               <tr>
                  <td>{{$configuration->id}}</td>
                  <td>{{$configuration->name}}</td>
                  <td>&#8377; {{$configuration->value}}</td>
                  <td>{{$configuration->user_id}}</td>
                  <td>
                     <a href="{{ route('configurations.edit',$configuration->id)}}" class="btn btn-primary">Edit</a>
                  </td>
                  <td>
                     @if(!in_array($configuration->path, ['delivery_charge_amount', 'delivery_free_amount']))
                        <form action="{{ route('configurations.destroy', $configuration->id)}}" method="post">
                           @csrf
                           @method('DELETE')
                           <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                     @endif   
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
         {{ $configurations->links() }}
      </div>
   </div>
</div>
@endsection