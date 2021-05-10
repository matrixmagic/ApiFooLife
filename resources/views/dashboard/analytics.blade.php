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
  <div class="d-sm-flex d-block">
    <p class="fs-18 mr-auto mb-sm-4 mb-3">Here is your restaurant<br> summary with graph view</p>
    <div class="dropdown custom-dropdown mb-sm-4 mb-3">
      <div class="btn btn-sm btn-primary light d-flex align-items-center svg-btn" role="button" data-toggle="dropdown" aria-expanded="false">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg"><g><path d="M22.4281 2.856H21.8681V1.428C21.8681 0.56 21.2801 0 20.4401 0C19.6001 0 19.0121 0.56 19.0121 1.428V2.856H9.71606V1.428C9.71606 0.56 9.15606 0 8.28806 0C7.42006 0 6.86006 0.56 6.86006 1.428V2.856H5.57206C2.85606 2.856 0.560059 5.152 0.560059 7.868V23.016C0.560059 25.732 2.85606 28.028 5.57206 28.028H22.4281C25.1441 28.028 27.4401 25.732 27.4401 23.016V7.868C27.4401 5.152 25.1441 2.856 22.4281 2.856ZM5.57206 5.712H22.4281C23.5761 5.712 24.5841 6.72 24.5841 7.868V9.856H3.41606V7.868C3.41606 6.72 4.42406 5.712 5.57206 5.712ZM22.4281 25.144H5.57206C4.42406 25.144 3.41606 24.136 3.41606 22.988V12.712H24.5561V22.988C24.5841 24.136 23.5761 25.144 22.4281 25.144Z" fill="#2F4CDD"></path></g></svg>
        <div class="text-left ml-3">
          <span class="d-block fs-16">Filter Periode</span>
          <small class="d-block fs-13">4 June 2020 - 4 July 2020</small>
        </div>
        <i class="fa fa-angle-down scale5 ml-3"></i>
      </div>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="#">4 June 2020 - 4 July 2020</a>
        <a class="dropdown-item" href="#">5 july 2020 - 4 Aug 2020</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-9 col-xxl-12">
      <div class="card">
        <div class="card-header border-0 pb-2 d-lg-flex flex-wrap d-block">
          <div>
            <h4 class="card-title mb-2">Most Favorites Items</h4>
            <p class="fs-14 mb-0">Lorem ipsum dolor sit amet, consectetur</p>
          </div>
          <div class="card-action card-tabs mt-3 mt-3 mt-lg-0">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#all-categories" role="tab" aria-selected="true">
                  All Categories
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#main-course" role="tab" aria-selected="false">
                  Main Course
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#pizza" role="tab" aria-selected="false">
                  Pizza
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#drink" role="tab">
                  Drink
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#dessert" role="tab">
                  Dessert
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#more" role="tab">
                  More
                </a>
              </li>													
            </ul>
          </div>
        </div>
        <div class="card-body most-favourite-items pb-0">
          <div class="tab-content">
            <div class="tab-pane fade show active" id="all-categories">
              <div class="row">
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic4.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Watermelon Juice with Ice</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
                      <small>75%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic9.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Orange Juice Special Smoothy with Sugar</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
                      <small>21%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic2.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Mozarella Pizza with Random Topping</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>7/9</span>
                      <small>85%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic8.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Extreme Deluxe Pizza Super With Mozarella</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/9</span>
                      <small>45%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic11.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Medium Spicy Pizza with Kemangi Leaf</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
                      <small>52%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic4.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Chicken Kebab from Turkish with Garlic</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
                      <small>35%</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="main-course">
              <div class="row">
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic4.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Watermelon Juice with Ice</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
                      <small>75%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic9.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Orange Juice Special Smoothy with Sugar</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
                      <small>21%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3" src="{{ asset('images/card/pic2.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Mozarella Pizza with Random Topping</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>7/9</span>
                      <small>85%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic8.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Extreme Deluxe Pizza Super With Mozarella</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/9</span>
                      <small>45%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic11.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Medium Spicy Pizza with Kemangi Leaf</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
                      <small>52%</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pizza">
              <div class="row">
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic9.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Orange Juice Special Smoothy with Sugar</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
                      <small>21%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic2.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Mozarella Pizza with Random Topping</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>7/9</span>
                      <small>85%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic8.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Extreme Deluxe Pizza Super With Mozarella</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/9</span>
                      <small>45%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic11.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Medium Spicy Pizza with Kemangi Leaf</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
                      <small>52%</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="drink">
              <div class="row">
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic4.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Watermelon Juice with Ice</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
                      <small>75%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic9.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Orange Juice Special Smoothy with Sugar</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
                      <small>21%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic2.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Mozarella Pizza with Random Topping</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>7/9</span>
                      <small>85%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic8.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Extreme Deluxe Pizza Super With Mozarella</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/9</span>
                      <small>45%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic11.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Medium Spicy Pizza with Kemangi Leaf</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
                      <small>52%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic11.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Medium Spicy Pizza with Kemangi Leaf</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
                      <small>52%</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="dessert">
              <div class="row">
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic4.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Watermelon Juice with Ice</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
                      <small>75%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic9.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Orange Juice Special Smoothy with Sugar</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
                      <small>21%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic8.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Extreme Deluxe Pizza Super With Mozarella</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/9</span>
                      <small>45%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic11.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Medium Spicy Pizza with Kemangi Leaf</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
                      <small>52%</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="more">
              <div class="row">
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic4.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Watermelon Juice with Ice</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>6/8</span>
                      <small>75%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic9.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Orange Juice Special Smoothy with Sugar</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">3,515</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>2/8</span>
                      <small>21%</small>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="media mb-4 align-items-center">
                    <img class="rounded mr-3 food-img" src="{{ asset('images/card/pic11.jpg') }}" alt="">
                    <div class="media-body">
                      <h5 class="mb-sm-4 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Medium Spicy Pizza with Kemangi Leaf</a></h5>
                      <div class="d-flex mb-2">
                        <svg class="mr-2" width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <rect x="0.500488" width="2.04545" height="15" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="4.59131" y="4.09082" width="2.04545" height="10.9091" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="8.68213" y="10.2271" width="2.04545" height="4.77273" rx="1.02273" fill="#EA7A9A"/>
                          <rect x="12.7729" y="2.04541" width="2.04545" height="12.9545" rx="1.02273" fill="#EA7A9A"/>
                        </svg>
                        <span class="fs-14 text-black"><strong class="mr-1">2,441</strong> Total Sales</span>
                      </div>
                      <div class="star-review2 d-flex align-items-center flex-wrap fs-12">
                        <div class="mb-2">
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-orange"></i>
                          <i class="fa fa-star text-gray"></i>
                          <i class="fa fa-star text-gray"></i>
                        </div>
                        <span class="ml-3 text-dark mb-2">(454 revies)</span>
                      </div>
                    </div>
                    <div class="d-inline-block relative donut-chart-sale">
                      <span class="donut" data-peity='{ "fill": ["rgb(234, 122, 154)", "rgba(236, 236, 236, 1)"],   "innerRadius": 27, "radius": 10}'>4/8</span>
                      <small>52%</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer border-0">
          <nav>
            <ul class="pagination style-1 mb-0">
              <li class="page-item page-indicator">
                <a class="page-link" href="javascript:void(0)">
                  <i class="la la-angle-left"></i>
                </a>
              </li>
              <li>
                <ul>
                  <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                  <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                </ul>
              </li>
              <li class="page-item page-indicator">
                <a class="page-link" href="javascript:void(0)">
                  <i class="la la-angle-right"></i>
                </a>
              </li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-xxl-12">
      <div class="card trending-menus">
        <div class="card-header d-sm-flex d-block pb-0 border-0">
          <div>
            <h4 class="text-black fs-20">Daily Trending Menus</h4>
            <p class="fs-13 mb-0 text-black">Lorem ipsum dolor</p>
          </div>
        </div>
        <div class="card-body dz-scroll height500" id="dailyMenus">
          <div class="d-flex pb-3 mb-3 border-bottom tr-row align-items-center">
            <span class="num">#1</span>
            <div class="mr-auto pr-3">
              <a href="{!! url('/post-details'); !!}"><h2 class="text-black fs-14">Medium Spicy Spagethi Italiano</h2></a>
              <span class="text-black font-w600 d-inline-block mr-3">$5.6 </span> <span class="fs-14">Order 89x</span>
            </div>
            <img src="{{ asset('images/menus/9.png') }}" alt="" width="60" class="rounded">
          </div>
          <div class="d-flex pb-3 mb-3 border-bottom tr-row align-items-center">
            <span class="num">#2</span>
            <div class="mr-auto pr-3">
              <a href="{!! url('/post-details'); !!}"><h2 class="text-black fs-14">Watermelon juice with ice</h2></a>
              <span class="text-black font-w600 d-inline-block mr-3">$5.6 </span> <span class="fs-14">Order 89x</span>
            </div>
            <img src="{{ asset('images/menus/10.png') }}" alt="" width="60" class="rounded">
          </div>
          <div class="d-flex pb-3 mb-3 border-bottom tr-row align-items-center">
            <span class="num">#3</span>
            <div class="mr-auto pr-3">
              <a href="{!! url('/post-details'); !!}"><h2 class="text-black fs-14">Chicken curry special with cucumber</h2></a>
              <span class="text-black font-w600 d-inline-block mr-3">$5.6 </span> <span class="fs-14">Order 89x</span>
            </div>
            <img src="{{ asset('images/menus/11.png') }}" alt="" width="60" class="rounded">
          </div>
          <div class="d-flex pb-3 mb-3 border-bottom tr-row align-items-center">
            <span class="num">#4</span>
            <div class="mr-auto pr-3">
              <a href="{!! url('/post-details'); !!}"><h2 class="text-black fs-14">Italiano Pizza With Garlic</h2></a>
              <span class="text-black font-w600 d-inline-block mr-3">$5.6 </span> <span class="fs-14">Order 89x</span>
            </div>
            <img src="{{ asset('images/menus/12.png') }}" alt="" width="60" class="rounded">
          </div>
          <div class="d-flex tr-row align-items-center">
            <span class="num">#5</span>
            <div class="mr-auto pr-3">
              <a href="{!! url('/post-details'); !!}"><h2 class="text-black fs-14">Tuna Soup spinach with himalaya salt</h2></a>
              <span class="text-black font-w600 d-inline-block mr-3">$5.6 </span> <span class="fs-14">Order 89x</span>
            </div>
            <img src="{{ asset('images/menus/9.png') }}" alt="" width="60" class="rounded">
          </div>
        </div>
        <div class="card-footer border-0 pt-0">
        </div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0 pb-0 d-sm-flex flex-wrap d-block">
              <div>
                <h4 class="card-title mb-1">Most Selling Items</h4>
                <small class="mb-0">Lorem ipsum dolor sit amet, consectetur</small>
              </div>
              <div class="card-action card-tabs mt-3 mt-sm-0">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#monthly" role="tab">
                      Monthly
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#weekly" role="tab">
                      Weekly
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#today" role="tab">
                      Today
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="card-body tab-content">
              <div class="tab-pane fade show active" id="monthly">
                <div class="height500 dz-scroll loadmore-content" id="sellingItemsContent">
                  <div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
                    <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic5.jpg') }}" alt="DexignZone"></a>
                    <div class="media-body col-6 px-0">
                      <h5 class="mt-0 mb-1"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Meidum Spicy Spagethi Italiano</a></h5>
                      <small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);"> BURGER</a></small>
                      <span class="text-secondary mr-2 fo"></span>
                      <ul class="fs-14 list-inline">
                        <li class="mr-3">Serves for 4 Person</li>
                        <li>24mins</li>
                      </ul>
                    </div>
                    <div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
                      <h3 class="mb-0 font-w600 text-secondary">$12.56</h3>
                      <div class="dropdown ml-3 ">
                        <button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                          <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
                    <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic4.jpg') }}" alt="DexignZone"></a>
                    <div class="media-body col-6 px-0">
                      <h5 class="mt-0 mb-1"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Pizza Meal for Kids (Small size)</a></h5>
                      <small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);"> PIZZA</a></small>
                      <span class="text-secondary mr-2 fo"></span>
                      <ul class="fs-14 list-inline">
                        <li class="mr-3">Serves for 4 Person</li>
                        <li>24mins</li>
                      </ul>
                    </div>
                    <div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
                      <h3 class="mb-0 font-w600 text-secondary">$5.67</h3>
                      <div class="dropdown ml-3 ">
                        <button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                          <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
                    <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic3.jpg') }}" alt="DexignZone"></a>
                    <div class="media-body col-6 px-0">
                      <h5 class="mt-0 mb-1"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Medium Spicy Pizza with Kemangi Leaf</a></h5>
                      <small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);"> JUICE</a></small>
                      <span class="text-secondary mr-2 fo"></span>
                      <ul class="fs-14 list-inline">
                        <li class="mr-3">Serves for 4 Person</li>
                        <li>24mins</li>
                      </ul>
                    </div>
                    <div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
                      <h3 class="mb-0 font-w600 text-secondary">$11.21</h3>
                      <div class="dropdown ml-3 ">
                        <button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                          <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
                    <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic2.jpg') }}" alt="DexignZone"></a>
                    <div class="media-body col-6 px-0">
                      <h5 class="mt-0 mb-1"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Tuna soup spinach with himalaya salt</a></h5>
                      <small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);"> PIZZA</a></small>
                      <span class="text-secondary mr-2 fo"></span>
                      <ul class="fs-14 list-inline">
                        <li class="mr-3">Serves for 4 Person</li>
                        <li>24mins</li>
                      </ul>
                    </div>
                    <div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
                      <h3 class="mb-0 font-w600 text-secondary">$8.15</h3>
                      <div class="dropdown ml-3 ">
                        <button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                          <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
                    <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic1.jpg') }}" alt="DexignZone"></a>
                    <div class="media-body col-6 px-0">
                      <h5 class="mt-0 mb-1"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Watermelon juice with ice</a></h5>
                      <small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);">BURGER</a></small>
                      <span class="text-secondary mr-2 fo"></span>
                      <ul class="fs-14 list-inline">
                        <li class="mr-3">Serves for 4 Person</li>
                        <li>24mins</li>
                      </ul>
                    </div>
                    <div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
                      <h3 class="mb-0 font-w600 text-secondary">$5.67</h3>
                      <div class="dropdown ml-3 ">
                        <button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                          <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center bg-white pt-3">
                  <a href="javascript:void(0);" class="btn-link dz-load-more"  rel="selling-items" id="sellingItems">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
                </div>
              </div>
              <div class="tab-pane fade" id="weekly">
                <div class="height500 dz-scroll loadmore-content" id="sellingItems2Content">
                  <div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
                    <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic3.jpg') }}" alt="DexignZone"></a>
                    <div class="media-body col-6 px-0">
                      <h5 class="mt-0 mb-1"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Pizza Meal for Kids (Small size)</a></h5>
                      <small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);">BURGER</a></small>
                      <span class="text-secondary mr-2 fo"></span>
                      <ul class="fs-14 list-inline">
                        <li class="mr-3">Serves for 4 Person</li>
                        <li>24mins</li>
                      </ul>
                    </div>
                    <div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
                      <h3 class="mb-0 font-w600 text-secondary">$11.21</h3>
                      <div class="dropdown ml-3 ">
                        <button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                          <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
                    <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic2.jpg') }}" alt="DexignZone"></a>
                    <div class="media-body col-6 px-0">
                      <h5 class="mt-0 mb-1"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Meidum Spicy Spagethi Italiano</a></h5>
                      <small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);">PIZZA</a></small>
                      <span class="text-secondary mr-2 fo"></span>
                      <ul class="fs-14 list-inline">
                        <li class="mr-3">Serves for 4 Person</li>
                        <li>24mins</li>
                      </ul>
                    </div>
                    <div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
                      <h3 class="mb-0 font-w600 text-secondary">$8.15</h3>
                      <div class="dropdown ml-3 ">
                        <button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                          <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
                    <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic1.jpg') }}" alt="DexignZone"></a>
                    <div class="media-body col-6 px-0">
                      <h5 class="mt-0 mb-1"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Tuna soup spinach with himalaya salt</a></h5>
                      <small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);"> JUICE</a></small>
                      <span class="text-secondary mr-2 fo"></span>
                      <ul class="fs-14 list-inline">
                        <li class="mr-3">Serves for 4 Person</li>
                        <li>24mins</li>
                      </ul>
                    </div>
                    <div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
                      <h3 class="mb-0 font-w600 text-secondary">$5.67</h3>
                      <div class="dropdown ml-3 ">
                        <button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                          <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center bg-white pt-3">
                  <a href="javascript:void(0);" class="btn-link dz-load-more"  rel="selling-items" id="sellingItems2">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
                </div>
              </div>
              <div class="tab-pane fade" id="today">
                <div class="height500 dz-scroll loadmore-content" id="sellingItems3Content">
                  <div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
                    <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic2.jpg') }}" alt="DexignZone"></a>
                    <div class="media-body col-6 px-0">
                      <h5 class="mt-0 mb-1"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Tuna soup spinach with himalaya salt</a></h5>
                      <small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);"> JUICE</a></small>
                      <span class="text-secondary mr-2 fo"></span>
                      <ul class="fs-14 list-inline">
                        <li class="mr-3">Serves for 4 Person</li>
                        <li>24mins</li>
                      </ul>
                    </div>
                    <div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
                      <h3 class="mb-0 font-w600 text-secondary">$8.15</h3>
                      <div class="dropdown ml-3 ">
                        <button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                          <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="media p-0 mb-4 alert alert-dismissible items-list-2 border-0">
                    <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic1.jpg') }}" alt="DexignZone"></a>
                    <div class="media-body col-6 px-0">
                      <h5 class="mt-0 mb-1"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Watermelon juice with ice</a></h5>
                      <small class="font-w500 mb-3"><a class="text-primary" href="javascript:void(0);">PIZZA</a></small>
                      <span class="text-secondary mr-2 fo"></span>
                      <ul class="fs-14 list-inline">
                        <li class="mr-3">Serves for 4 Person</li>
                        <li>24mins</li>
                      </ul>
                    </div>
                    <div class="media-footer align-self-center ml-auto d-block align-items-center d-sm-flex">
                      <h3 class="mb-0 font-w600 text-secondary">$5.67</h3>
                      <div class="dropdown ml-3 ">
                        <button type="button" class="btn btn-secondary sharp tp-btn-light " data-toggle="dropdown">
                          <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                          <a href="javascript:void(0);" data-dismiss="alert" aria-label="Close" class="dropdown-item">Delete</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center bg-white pt-3">
                  <a href="javascript:void(0);" class="btn-link dz-load-more"  rel="selling-items" id="sellingItems3">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0 pb-0 d-sm-flex d-block">
              <div>
                <h4 class="card-title mb-1">Trending Items</h4>
                <small class="mb-0">Lorem ipsum dolor sit amet, consectetur</small>
              </div>
              <div class="dropdown mt-3 mt-sm-0">
                <button type="button" class="btn btn-primary dropdown-toggle light fs-14" data-toggle="dropdown" aria-expanded="false">
                  Weekly
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javascript:void(0);">Daily</a>
                  <a class="dropdown-item" href="javascript:void(0);">Weekly</a>
                  <a class="dropdown-item" href="javascript:void(0);">Monthly</a>
                </div>
              </div>
            </div>
            <div class="card-body p-0 pt-3">
              <div class="media items-list-1">
                <span class="number col-1 px-0 align-self-center">#1</span>
                <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic1.jpg') }}" alt="DexignZone"></a>
                <div class="media-body col-sm-4 col-xxl-5 px-0">
                  <h5 class="mt-0 mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Tuna soup spinach with himalaya salt</a></h5>
                  <small class="font-w500"><strong class="text-secondary mr-2">$12.56</strong> <a class="text-primary" href="javascript:void(0);">PIZZA</a></small>
                </div>
                <div class="media-footer ml-auto col-sm-3 mt-sm-0 mt-3 px-0 d-flex align-self-center align-items-center">
                  <div class="mr-3">
                    <span class="peity-success" data-style="width:100%;" style="display: none;">0,2,1,4</span><svg class="peity" height="30" width="47"><polygon fill="rgba(48, 194, 89, .2)" points="0 28.5 0 28.5 15.666666666666666 15 31.333333333333332 21.75 47 1.5 47 28.5"></polygon><polyline fill="none" points="0 28.5 15.666666666666666 15 31.333333333333332 21.75 47 1.5" stroke="#30c259" stroke-width="3" stroke-linecap="square"></polyline></svg>
                  </div>
                  <div>
                    <h3 class="mb-0 font-w600 text-black">524</h3>
                    <span class="fs-14">Sales (12%)</span>
                  </div>
                </div>
              </div>
              <div class="media items-list-1">
                <span class="number col-1 px-0 align-self-center">#2</span>
                <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic2.jpg') }}" alt="DexignZone"></a>
                <div class="media-body col-sm-4 col-xxl-5 px-0">
                  <h5 class="mt-0 mb-3 text-black"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Tuna soup spinach with himalaya salt</a></h5>
                  <small class="font-w500"><strong class="text-secondary mr-2">$12.56</strong> <a class="text-primary" href="javascript:void(0);">JUICE</a></small>
                </div>
                <div class="media-footer ml-auto col-sm-3 mt-sm-0 mt-3 px-0 d-flex align-self-center align-items-center">
                  <div class="mr-3">
                    <span class="peity-danger" data-style="width:100%;" style="display: none;">4,1,2,0</span><svg class="peity" height="30" width="47"><polygon fill="rgba(248, 79, 78, .2)" points="0 28.5 0 1.5 15.666666666666666 21.75 31.333333333333332 15 47 28.5 47 28.5"></polygon><polyline fill="none" points="0 1.5 15.666666666666666 21.75 31.333333333333332 15 47 28.5" stroke="#f84f4e" stroke-width="3" stroke-linecap="square"></polyline></svg>
                  </div>
                  <div>
                    <h3 class="mb-0 font-w600 text-black">215</h3>
                    <span class="fs-14">Sales (12%)</span>
                  </div>
                </div>
              </div>
              <div class="media items-list-1">
                <span class="number col-1 px-0 align-self-center">#3</span>
                <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic3.jpg') }}" alt="DexignZone"></a>
                <div class="media-body col-sm-4 col-xxl-5 px-0">
                  <h5 class="mt-0 mb-3 text-black"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Chicken curry special with cucumber</a></h5>
                  <small class="font-w500"><strong class="text-secondary mr-2">$12.56</strong> <a class="text-primary" href="javascript:void(0);">PIZZA</a></small>
                </div>
                <div class="media-footer ml-auto col-sm-3 mt-sm-0 mt-3 px-0 d-flex align-self-center align-items-center">
                  <div class="mr-3">
                    <span class="peity-success" data-style="width:100%;" style="display: none;">0,2,1,4</span><svg class="peity" height="30" width="47"><polygon fill="rgba(48, 194, 89, .2)" points="0 28.5 0 28.5 15.666666666666666 15 31.333333333333332 21.75 47 1.5 47 28.5"></polygon><polyline fill="none" points="0 28.5 15.666666666666666 15 31.333333333333332 21.75 47 1.5" stroke="#30c259" stroke-width="3" stroke-linecap="square"></polyline></svg>
                  </div>
                  <div>
                    <h3 class="mb-0 font-w600 text-black">524</h3>
                    <span class="fs-14">Sales (12%)</span>
                  </div>
                </div>
              </div>
              <div class="media items-list-1">
                <span class="number col-1 px-0 align-self-center">#4</span>
                <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic4.jpg') }}" alt="DexignZone"></a>
                <div class="media-body col-sm-4 col-xxl-5 px-0">
                  <h5 class="mt-0 mb-3 text-black"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Watermelon juice with ice</a></h5>
                  <small class="font-w500"><strong class="text-secondary mr-2">$12.56</strong> <a class="text-primary" href="javascript:void(0);">PIZZA</a></small>
                </div>
                <div class="media-footer ml-auto col-sm-3 mt-sm-0 mt-3 px-0 d-flex align-self-center align-items-center">
                  <div class="mr-3">
                    <span class="peity-success" data-style="width:100%;" style="display: none;">0,2,1,4</span><svg class="peity" height="30" width="47"><polygon fill="rgba(48, 194, 89, .2)" points="0 28.5 0 28.5 15.666666666666666 15 31.333333333333332 21.75 47 1.5 47 28.5"></polygon><polyline fill="none" points="0 28.5 15.666666666666666 15 31.333333333333332 21.75 47 1.5" stroke="#30c259" stroke-width="3" stroke-linecap="square"></polyline></svg>
                  </div>
                  <div>
                    <h3 class="mb-0 font-w600 text-black">76</h3>
                    <span class="fs-14">Sales (12%)</span>
                  </div>
                </div>
              </div>
              <div class="media items-list-1">
                <span class="number col-1 px-0 align-self-center">#5</span>
                <a href="{!! url('/ecom-product-detail'); !!}"><img class="img-fluid rounded mr-3" width="85" src="{{ asset('images/dish/pic5.jpg') }}" alt="DexignZone"></a>
                <div class="media-body col-sm-4 col-xxl-5 px-0">
                  <h5 class="mt-0 mb-3 text-black"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Tuna soup spinach with himalaya salt</a></h5>
                  <small class="font-w500"><strong class="text-secondary mr-2">$12.56</strong> <a class="text-primary" href="javascript:void(0);">BURGER</a></small>
                </div>
                <div class="media-footer ml-auto col-sm-3 mt-sm-0 mt-3 px-0 d-flex align-self-center align-items-center">
                  <div class="mr-3">
                    <span class="peity-danger" data-style="width:100%;" style="display: none;">4,1,2,0</span><svg class="peity" height="30" width="47"><polygon fill="rgba(248, 79, 78, .2)" points="0 28.5 0 1.5 15.666666666666666 21.75 31.333333333333332 15 47 28.5 47 28.5"></polygon><polyline fill="none" points="0 1.5 15.666666666666666 21.75 31.333333333333332 15 47 28.5" stroke="#f84f4e" stroke-width="3" stroke-linecap="square"></polyline></svg>
                  </div>
                  <div>
                    <h3 class="mb-0 font-w600 text-black">180</h3>
                    <span class="fs-14">Sales (12%)</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0 pb-0 d-sm-flex d-block">
              <div>
                <h4 class="card-title mb-1">Chart Orders</h4>
                <small class="mb-0">Lorem ipsum dolor sit amet, consectetur</small>
              </div>
              <div class="dropdown mt-3 mt-sm-0">
                <button type="button" class="btn btn-primary dropdown-toggle light fs-14" data-toggle="dropdown" aria-expanded="false">
                  Weekly
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="javascript:void(0);">Daily</a>
                  <a class="dropdown-item" href="javascript:void(0);">Weekly</a>
                  <a class="dropdown-item" href="javascript:void(0);">Monthly</a>
                </div>
              </div>
            </div>
            <div class="card-body revenue-chart px-3 pb-0">
              <div class="d-flex align-items-end pl-3">
                <div class="mr-4">
                  <h3 class="font-w600 mb-0"><img src="{{ asset('images/svg/ic_stat3.svg') }}" height="22" width="22" class="mr-2 mb-1" alt=""/>
                    <span class="counter">257</span>k
                  </h3>
                  <small class="text-dark fs-14">Total Sales</small>
                </div>
                <div>
                  <h3 class="font-w600 mb-0"><img src="{{ asset('images/svg/ic_stat3.svg') }}" height="22" width="22" class="mr-2 mb-1" alt=""/><span class="counter">1,245</span></h3>
                  <small class="text-dark fs-14">Avg. Sales per day</small>
                </div>
              </div>
              <div id="chartBar"></div>
            </div>
          </div>
        </div>
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0 pb-0 d-sm-flex flex-wrap d-block">
              <div>
                <h4 class="card-title mb-1">Most Favorites Items</h4>
                <small class="mb-0">Lorem ipsum dolor sit amet, consectetur</small>
              </div>
              <div class="card-action card-tabs">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#monthly1" role="tab">Monthly</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#weekly1" role="tab">Weekly</a></li>
                  <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#today1" role="tab">Today</a></li>
                </ul>
              </div>
            </div>
            <div class="card-body tab-content">
              <div class="tab-pane fade show active" id="monthly1">
                <div class="row height750 dz-scroll loadmore-content" id="favourite-itemsContent">
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic6.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Meidum Spicy Spagethi Italiano</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic7.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Pizza Meal for Kids (Small size)</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic8.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Meidum Spicy Spagethi Italiano</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic9.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Medium Spicy Pizza with Kemangi Leaf</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic10.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Tuna soup spinach with himalaya salt</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic11.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Tuna soup spinach with himalaya salt</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                </div>
                <div class="bg-white pt-3 text-center">
                  <a href="javascript:void(0);" class="btn-link dz-load-more" rel="favourite-items" id="favourite-items">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
                </div>
              </div>
              <div class="tab-pane fade" id="weekly1">
                <div class="row height750 dz-scroll loadmore-content" id="favourite-items2Content">
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic7.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Meidum Spicy Spagethi Italiano</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic9.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Pizza Meal for Kids (Small size)</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic10.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Meidum Spicy Spagethi Italiano</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic6.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Tuna soup spinach with himalaya salt</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                </div>
                <div class="bg-white pt-3 text-center">
                  <a href="javascript:void(0);" class="btn-link dz-load-more" rel="favourite-items" id="favourite-items2">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
                </div>
              </div>
              <div class="tab-pane fade" id="today1">
                <div class="row height750 dz-scroll loadmore-content" id="favourite-items3Content">
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic8.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Tuna soup spinach with himalaya salt</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic11.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Medium Spicy Pizza with Kemangi Leaf</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic8.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Tuna soup spinach with himalaya salt</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                  <div class="col-md-4 col-xl-4 col-xxl-6 col-sm-6 mb-5">
                    <div class="media mb-4">
                      <a href="{!! url('/ecom-product-detail'); !!}"><img src="{{ asset('images/dish/pic11.jpg') }}" class="rounded w-100" alt=""></a>
                    </div>
                    <div class="info">
                      <h5 class="text-black mb-3"><a class="text-black" href="{!! url('/ecom-product-detail'); !!}">Medium Spicy Pizza with Kemangi Leaf</a></h5>
                      <div class="star-review fs-14 mb-3">
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-orange"></i>
                        <i class="fa fa-star text-gray"></i>
                        <i class="fa fa-star text-gray"></i>
                        <span class="ml-3 text-dark">451 reviews</span>
                      </div>
                      <a href="javascript:void(0);" class="btn btn-primary light btn-sm btn-rounded px-4"><i class="fa fa-heart-o mr-2 scale5 "></i> <strong>256k</strong> Like it</a>
                    </div>
                  </div>
                </div>
                <div class="bg-white pt-3 text-center">
                  <a href="javascript:void(0);" class="btn-link dz-load-more" rel="favourite-items" id="favourite-items3">View more <i class="fa fa-angle-down ml-2 scale-2"></i></a>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection			