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
          <h5 class="modal-title">Add Menus</h5>
          <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label class="text-black font-w500">Food Name</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <label class="text-black font-w500">Order Date</label>
              <input type="date" class="form-control">
            </div>
            <div class="form-group">
              <label class="text-black font-w500">Food Price</label>
              <input type="text" class="form-control">
            </div>
            <div class="form-group">
              <button type="button" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="d-sm-flex mb-lg-4 mb-2">
    <div class="dropdown mb-2 ml-auto mr-3">
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
    </div>
    <input class="d-inline-block form-control date-button btn btn-primary light btn-rounded" id="timepicker" placeholder="Today">
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive rounded card-table">
        <table class="table border-no order-table mb-4 table-responsive-lg dataTablesCard" id="example-5">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Date</th>
              <th>Customer Name</th>
              <th>Location</th>
              <th>Amount</th>
              <th>Status Order</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr class="alert alert-dismissible border-0">
              <td>#5552375</td>
              <td>26 March 2020, 02:12 AM</td>
              <td>Emilia Johanson</td>
              <td>67 St. John’s Road London</td>
              <td>$251.16</td>
              <td>
                <span class="text-primary">
                  <svg class="mr-2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="6" cy="6" r="6" fill="#EA7A9A"/>
                  </svg>On Delivery</span>
              </td>
              <td>
                <div class="dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="las la-check-circle text-success mr-3 scale5"></i>Accept Order</a>
                    <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item"><i class="las la-times-circle text-danger mr-3 scale5"></i>Reject Order</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr class="alert alert-dismissible border-0">
              <td>#5552356</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Rendy Greenlee</td>
              <td>32 The Green London</td>
              <td>$44.99</td>
              <td>
                <span class="text-primary">New Order</span>
              </td>
              <td>
                <div class="dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="las la-check-circle text-success mr-3 scale5"></i>Accept Order</a>
                    <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item"><i class="las la-times-circle text-danger mr-3 scale5"></i>Reject Order</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr class="alert alert-dismissible border-0">
              <td>#5552388</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Jessica Wong</td>
              <td>11 Church Road London</td>
              <td>$24.17</td>
              <td>
                <span class="text-primary">
                  <svg class="mr-2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="6" cy="6" r="6" fill="#EA7A9A"/>
                  </svg>On Delivery</span>
              </td>
              <td>
                <div class="dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="las la-check-circle text-success mr-3 scale5"></i>Accept Order</a>
                    <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item"><i class="las la-times-circle text-danger mr-3 scale5"></i>Reject Order</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr class="alert alert-dismissible border-0">
              <td>#5552323</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Veronica</td>
              <td>21 King Street London</td>
              <td>$74.92</td>
              <td>
                <span class="text-primary">New Order</span>
              </td>
              <td>
                <div class="dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="las la-check-circle text-success mr-3 scale5"></i>Accept Order</a>
                    <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item"><i class="las la-times-circle text-danger mr-3 scale5"></i>Reject Order</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr class="alert alert-dismissible border-0">
              <td>#5552322</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Samantha Bake</td>
              <td>79 The Drive London</td>
              <td>$22.18</td>
              <td>
                <span class="text-primary">
                  <svg class="mr-2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="6" cy="6" r="6" fill="#EA7A9A"/>
                  </svg>On Delivery</span>
              </td>
              <td>
                <div class="dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="las la-check-circle text-success mr-3 scale5"></i>Accept Order</a>
                    <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item"><i class="las la-times-circle text-danger mr-3 scale5"></i>Reject Order</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr class="alert alert-dismissible border-0">
              <td>#5552358</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>David Horison</td>
              <td>981 St. John’s Road London</td>
              <td>$24.17</td>
              <td>
                <span class="text-primary">
                  <svg class="mr-2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="6" cy="6" r="6" fill="#EA7A9A"/>
                  </svg>On Delivery</span>
              </td>
              <td>
                <div class="dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="las la-check-circle text-success mr-3 scale5"></i>Accept Order</a>
                    <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item"><i class="las la-times-circle text-danger mr-3 scale5"></i>Reject Order</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr class="alert alert-dismissible border-0">
              <td>#5552311</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Olivia Shine</td>
              <td>35 Station Road London</td>
              <td>$82.46</td>
              <td>
                <span class="text-primary">
                  <svg class="mr-2" width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="6" cy="6" r="6" fill="#EA7A9A"/>
                  </svg>On Delivery</span>
              </td>
              <td>
                <div class="dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="las la-check-circle text-success mr-3 scale5"></i>Accept Order</a>
                    <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item"><i class="las la-times-circle text-danger mr-3 scale5"></i>Reject Order</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr class="alert alert-dismissible border-0">
              <td>#5552351</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>James WItcwicky</td>
              <td>Corner Street 5th London</td>
              <td>$164.52</td>
              <td>
                <span class="text-success">Delivery</span>
              </td>
              <td>
                <div class="dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="las la-check-circle text-success mr-3 scale5"></i>Accept Order</a>
                    <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item"><i class="las la-times-circle text-danger mr-3 scale5"></i>Reject Order</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr class="alert alert-dismissible border-0">
              <td>#5552349</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Roberto Carlo</td>
              <td>544 Manor Road London</td>
              <td>$34.41</td>
              <td>
                <span class="text-success">Delivery</span>
              </td>
              <td>
                <div class="dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="las la-check-circle text-success mr-3 scale5"></i>Accept Order</a>
                    <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item"><i class="las la-times-circle text-danger mr-3 scale5"></i>Reject Order</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr class="alert alert-dismissible border-0">
              <td>#5552397</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Franky Sihotang</td>
              <td>6 The Avenue London</td>
              <td>$45.86</td>
              <td>
                <span class="text-success">Delivery</span>
              </td>
              <td>
                <div class="dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="las la-check-circle text-success mr-3 scale5"></i>Accept Order</a>
                    <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item"><i class="las la-times-circle text-danger mr-3 scale5"></i>Reject Order</a>
                  </div>
                </div>
              </td>
            </tr>
            <tr class="alert alert-dismissible border-0">
              <td>#5552397</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Franky Sihotang</td>
              <td>6 The Avenue London</td>
              <td>$45.86</td>
              <td>
                <span class="text-success">Delivery</span>
              </td>
              <td>
                <div class="dropdown">
                  <a href="javascript:void(0)" data-toggle="dropdown" aria-expanded="false">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 12C11 12.5523 11.4477 13 12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M18 12C18 12.5523 18.4477 13 19 13C19.5523 13 20 12.5523 20 12C20 11.4477 19.5523 11 19 11C18.4477 11 18 11.4477 18 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      <path d="M4 12C4 12.5523 4.44772 13 5 13C5.55228 13 6 12.5523 6 12C6 11.4477 5.55228 11 5 11C4.44772 11 4 11.4477 4 12Z" stroke="#3E4954" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="javascript:void(0);"><i class="las la-check-circle text-success mr-3 scale5"></i>Accept Order</a>
                    <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item"><i class="las la-times-circle text-danger mr-3 scale5"></i>Reject Order</a>
                  </div>
                </div>
              </td>
            </tr>
            
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


@endsection