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
  <div class="dropdown custom-dropdown mb-md-4 mb-2">
    <button type="button" class="btn btn-primary light d-flex align-items-center svg-btn" data-toggle="dropdown" aria-expanded="false">
      <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M24.5 6.125H12.25C12.25 5.15987 11.4651 4.375 10.5 4.375H8.75C7.78487 4.375 7 5.15987 7 6.125H3.5C3.017 6.125 2.625 6.51612 2.625 7C2.625 7.48388 3.017 7.875 3.5 7.875H7C7 8.84013 7.78487 9.625 8.75 9.625H10.5C11.4651 9.625 12.25 8.84013 12.25 7.875H24.5C24.983 7.875 25.375 7.48388 25.375 7C25.375 6.51612 24.983 6.125 24.5 6.125ZM8.75 7.875V6.125H10.5L10.5009 6.9965C10.5009 6.99825 10.5 6.99913 10.5 7C10.5 7.00087 10.5009 7.00175 10.5009 7.0035V7.875H8.75Z" fill="#EA7A9A"/>
        <path d="M24.5 13.125H19.25C19.25 12.1599 18.4651 11.375 17.5 11.375H15.75C14.7849 11.375 14 12.1599 14 13.125H3.5C3.017 13.125 2.625 13.5161 2.625 14C2.625 14.4839 3.017 14.875 3.5 14.875H14C14 15.8401 14.7849 16.625 15.75 16.625H17.5C18.4651 16.625 19.25 15.8401 19.25 14.875H24.5C24.983 14.875 25.375 14.4839 25.375 14C25.375 13.5161 24.983 13.125 24.5 13.125ZM15.75 14.875V13.125H17.5L17.5009 13.9965C17.5009 13.9983 17.5 13.9991 17.5 14C17.5 14.0009 17.5009 14.0017 17.5009 14.0035V14.875H15.75Z" fill="#EA7A9A"/>
        <path d="M24.5 20.125H12.25C12.25 19.1599 11.4651 18.375 10.5 18.375H8.75C7.78487 18.375 7 19.1599 7 20.125H3.5C3.017 20.125 2.625 20.5161 2.625 21C2.625 21.4839 3.017 21.875 3.5 21.875H7C7 22.8401 7.78487 23.625 8.75 23.625H10.5C11.4651 23.625 12.25 22.8401 12.25 21.875H24.5C24.983 21.875 25.375 21.4839 25.375 21C25.375 20.5161 24.983 20.125 24.5 20.125ZM8.75 21.875V20.125H10.5L10.5009 20.9965C10.5009 20.9983 10.5 20.9991 10.5 21C10.5 21.0009 10.5009 21.0017 10.5009 21.0035V21.875H8.75Z" fill="#EA7A9A"/>
      </svg>
      <span class="fs-16 ml-3">Filter</span>
      <i class="fa fa-angle-down scale5 ml-3"></i>
    </button>
    <div class="dropdown-menu dropdown-menu-right">
      <a class="dropdown-item" href="#">2020</a>
      <a class="dropdown-item" href="#">2019</a>
      <a class="dropdown-item" href="#">2018</a>
      <a class="dropdown-item" href="#">2017</a>
      <a class="dropdown-item" href="#">2016</a>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="table-responsive rounded card-table">
        <table class="table border-no order-table mb-4 table-responsive-lg dataTablesCard" id="example-5">
          <thead>
            <tr>
              <th>Customer ID</th>
              <th>Join Date</th>
              <th>Customer Name</th>
              <th>Location</th>
              <th>Total Spent</th>
              <th>Last Order</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr class="alert alert-dismissible border-0">
              <td>#C-004562</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Olivia Shine</td>
              <td>35 Station Road London</td>
              <td>$82.46</td>
              <td>
                <a class="btn btn-light btn-sm" href="javascript:void(0)">$42.85</a>
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
              <td>#C-00458</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Rendy Greenlee</td>
              <td>32 The Green London</td>
              <td>$44.99</td>
              <td>
                <a class="btn btn-light btn-sm" href="javascript:void(0)">$11.41</a>
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
              <td>#C-004563</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Roberto Carlo</td>
              <td>544 Manor Road London</td>
              <td>$34.41</td>
              <td>
                <a class="btn btn-light btn-sm" href="javascript:void(0)">$8.13</a>
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
              <td>#C-00456</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>David Horison</td>
              <td>981 St. John’s Road London</td>
              <td>$24.55</td>
              <td>
                <a class="btn btn-light btn-sm" href="javascript:void(0)">$14.89</a>
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
              <td>#C-004561</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Samantha Bake</td>
              <td>79 The Drive London</td>
              <td>$22.18</td>
              <td>
                <a class="btn btn-light btn-sm" href="javascript:void(0)">$11.41</a>
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
              <td>#C-004560</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Veronica</td>
              <td>21 King Street London</td>
              <td>$74.92</td>
              <td>
                <a class="btn btn-light btn-sm" href="javascript:void(0)">$21.55</a>
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
              <td>#C-00451</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>James WItcwicky</td>
              <td>Corner Street 5th London</td>
              <td>$164.52</td>
              <td>
                <a class="btn btn-light btn-sm" href="javascript:void(0)">$67.27</a>
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
              <td>#C-004564</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Franky Sihotang</td>
              <td>6 The Avenue London</td>
              <td>$45.86</td>
              <td>
                <a class="btn btn-light btn-sm" href="javascript:void(0)">$42.85</a>
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
              <td>#C-00459</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Jessica Wong</td>
              <td>11 Church Road London</td>
              <td>$24.17</td>
              <td>
                <a class="btn btn-light btn-sm" href="javascript:void(0)">$42.85</a>
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
              <td>#C-00457</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Emilia Johanson</td>
              <td>67 St. John’s Road London</td>
              <td>$251.16</td>
              <td>
                <a class="btn btn-light btn-sm" href="javascript:void(0)">$91.68</a>
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
              <td>#C-004562</td>
              <td>26 March 2020, 12:42 AM</td>
              <td>Olivia Shine</td>
              <td>35 Station Road London</td>
              <td>$82.46</td>
              <td>
                <a class="btn btn-light btn-sm" href="javascript:void(0)">$42.85</a>
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