{{-- Extends layout --}}
@extends('layout.default')


{{-- Content --}}
@section('content')
<!-- row -->
<div class="container-fluid">
  <!-- Add Order -->
  <div class="modal fade" id="addOrderModalside">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Category</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form  method="POST" action="{{ url('categories') }}">
            @csrf
            <div class="form-group  text-center">
              <label class="text-black font-w500  ">Category Name</label>
              <input type="text" name="name" class="form-control col-6 offset-3">
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary  text-center">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="d-sm-flex mb-lg-4 mb-2">
    {{-- <div class="dropdown mb-2 ml-auto mr-3">
      <a href="javascript:void(0)" class="btn btn-primary btn-rounded light" data-toggle="dropdown" aria-expanded="false">
        <i class="las la-bolt scale5 mr-3"></i>
        All Status
        <i class="las la-angle-down ml-3"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-center">
        <a class="dropdown-item" href="javascript:void(0);"><span class="text-primary">On Delivery</span></a>
        <a class="dropdown-item" href="javascript:void(0);"><span class="text-primary">New Order</span></a>
        <a class="dropdown-item" href="javascript:void(0);"><span class="text-success">Delivery</span></a>
      </div>
    </div> --}}
    <a href="javascript:void(0)" class="btn btn-primary  btn-rounded ml-auto"  data-toggle="modal" data-target="#addOrderModalside" >+Add </a>
    {{-- <a href="javascript:void(0)" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#addOrderModalside" ></a> --}}
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive rounded card-table">
      

        <table id="example3" class="display min-w850">
          <thead>
            <tr>
            
              <th>Name</th>
              <th>Order</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($categories as $item)
            <tr>
            
              <td>{{$item->name}}</td>
              <td>Architect</td>
             
              <td>
                <div class="d-flex">
                  <a href="#" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                  <a href="#" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                </div>												
              </td>												
            </tr>
            @endforeach
           
           
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection