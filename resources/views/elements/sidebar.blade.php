<!--**********************************
  Sidebar start
***********************************-->
<div class="deznav">
  <div class="deznav-scroll">
    <ul class="metismenu" id="menu">
      <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-networking"></i>
        <span class="nav-text">Dashboard</span>
      </a>
      <ul aria-expanded="false">
        <li><a href="{!! url('/index'); !!}">Dashboard</a></li>
        <li><a href="{!! url('/categories'); !!}">Categories</a></li>
        <li><a href="{!! url('/products'); !!}">Products</a></li>
        <li><a href="{!! url('/orders'); !!}">Orders</a></li>
        <li><a href="{!! url('/order-id'); !!}">Order ID</a></li>
        <li><a href="{!! url('/general-customers'); !!}">General Customers</a></li>
        <li><a href="{!! url('/analytics'); !!}">Analytics</a></li>
        <li><a href="{!! url('/reviews'); !!}">Reviews</a></li>
      </ul>
      </li>
      <li><a class="has-arrow ai-icon" href="{!! url('/restaurant'); !!}" aria-expanded="false">
        <i class="flaticon-381-heart"></i>
        <span class="nav-text">Restaurant</span>
      </a>

      </li>
      <li><a class="has-arrow ai-icon" href="{!! url('/categories'); !!}" aria-expanded="false">
        <i class="flaticon-381-heart"></i>
        <span class="nav-text">Categories</span>
      </a>

      </li>
      <li><a class="has-arrow ai-icon" href="{!! url('/products'); !!}" aria-expanded="false">
        <i class="flaticon-381-heart"></i>
        <span class="nav-text">Products</span>
      </a>

      </li>
      <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-television"></i>
        <span class="nav-text">Apps</span>
      </a>
      <ul aria-expanded="false">
        <li><a href="{!! url('/app-profile'); !!}">Profile</a></li>
        <li><a href="{!! url('/post-details'); !!}">Post Details</a></li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Email</a>
          <ul aria-expanded="false">
            <li><a href="{!! url('/email-compose'); !!}">Compose</a></li>
            <li><a href="{!! url('/email-inbox'); !!}">Inbox</a></li>
            <li><a href="{!! url('/email-read'); !!}">Read</a></li>
          </ul>
        </li>
        <li><a href="{!! url('/app-calender'); !!}">Calendar</a></li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Shop</a>
          <ul aria-expanded="false">
            <li><a href="{!! url('/ecom-product-grid'); !!}">Product Grid</a></li>
            <li><a href="{!! url('/ecom-product-list'); !!}">Product List</a></li>
            <li><a href="{!! url('/ecom-product-detail'); !!}">Product Details</a></li>
            <li><a href="{!! url('/ecom-product-order'); !!}">Order</a></li>
            <li><a href="{!! url('/ecom-checkout'); !!}">Checkout</a></li>
            <li><a href="{!! url('/ecom-invoice'); !!}">Invoice</a></li>
            <li><a href="{!! url('/ecom-customers'); !!}">Customers</a></li>
          </ul>
        </li>
      </ul>
      </li>
      <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-controls-3"></i>
        <span class="nav-text">Charts</span>
      </a>
      <ul aria-expanded="false">
        <li><a href="{!! url('/chart-flot'); !!}">Flot</a></li>
        <li><a href="{!! url('/chart-morris'); !!}">Morris</a></li>
        <li><a href="{!! url('/chart-chartjs'); !!}">Chartjs</a></li>
        <li><a href="{!! url('/chart-chartist'); !!}">Chartist</a></li>
        <li><a href="{!! url('/chart-sparkline'); !!}">Sparkline</a></li>
        <li><a href="{!! url('/chart-peity'); !!}">Peity</a></li>
      </ul>
      </li>
      <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-internet"></i>
        <span class="nav-text">Bootstrap</span>
      </a>
      <ul aria-expanded="false">
        <li><a href="{!! url('/ui-accordion'); !!}">Accordion</a></li>
        <li><a href="{!! url('/ui-alert'); !!}">Alert</a></li>
        <li><a href="{!! url('/ui-badge'); !!}">Badge</a></li>
        <li><a href="{!! url('/ui-button'); !!}">Button</a></li>
        <li><a href="{!! url('/ui-modal'); !!}">Modal</a></li>
        <li><a href="{!! url('/ui-button-group'); !!}">Button Group</a></li>
        <li><a href="{!! url('/ui-list-group'); !!}">List Group</a></li>
        <li><a href="{!! url('/ui-media-object'); !!}">Media Object</a></li>
        <li><a href="{!! url('/ui-card'); !!}">Cards</a></li>
        <li><a href="{!! url('/ui-carousel'); !!}">Carousel</a></li>
        <li><a href="{!! url('/ui-dropdown'); !!}">Dropdown</a></li>
        <li><a href="{!! url('/ui-popover'); !!}">Popover</a></li>
        <li><a href="{!! url('/ui-progressbar'); !!}">Progressbar</a></li>
        <li><a href="{!! url('/ui-tab'); !!}">Tab</a></li>
        <li><a href="{!! url('/ui-typography'); !!}">Typography</a></li>
        <li><a href="{!! url('/ui-pagination'); !!}">Pagination</a></li>
        <li><a href="{!! url('/ui-grid'); !!}">Grid</a></li>
        
      </ul>
      </li>
      <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-heart"></i>
        <span class="nav-text">Plugins</span>
      </a>
      <ul aria-expanded="false">
        <li><a href="{!! url('/uc-select2'); !!}">Select 2</a></li>
        <li><a href="{!! url('/uc-nestable'); !!}">Nestedable</a></li>
        <li><a href="{!! url('/uc-noui-slider'); !!}">Noui Slider</a></li>
        <li><a href="{!! url('/uc-sweetalert'); !!}">Sweet Alert</a></li>
        <li><a href="{!! url('/uc-toastr'); !!}">Toastr</a></li>
        <li><a href="{!! url('/map-jqvmap'); !!}">Jqv Map</a></li>
        <li><a href="{!! url('/uc-lightgallery'); !!}">Lightgallery</a></li>
      </ul>
      </li>
      <li><a href="{!! url('/widget-basic'); !!}" class="ai-icon" aria-expanded="false">
        <i class="flaticon-381-settings-2"></i>
        <span class="nav-text">Widget</span>
      </a>
      </li>
      <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-notepad"></i>
        <span class="nav-text">Forms</span>
      </a>
      <ul aria-expanded="false">
        <li><a href="{!! url('/form-element'); !!}">Form Elements</a></li>
        <li><a href="{!! url('/form-wizard'); !!}">Wizard</a></li>
        <li><a href="{!! url('/form-editor-summernote'); !!}">Summernote</a></li>
        <li><a href="{!! url('/form-pickers'); !!}">Pickers</a></li>
        <li><a href="{!! url('/form-validation-jquery'); !!}">Jquery Validate</a></li>
      </ul>
      </li>
      <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-network"></i>
        <span class="nav-text">Table</span>
      </a>
      <ul aria-expanded="false">
        <li><a href="{!! url('/table-bootstrap-basic'); !!}">Bootstrap</a></li>
        <li><a href="{!! url('/table-datatable-basic'); !!}">Datatable</a></li>
      </ul>
      </li>
      <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
        <i class="flaticon-381-layer-1"></i>
        <span class="nav-text">Pages</span>
      </a>
      <ul aria-expanded="false">
        <li><a href="{!! url('/page-register'); !!}">Register</a></li>
        <li><a href="{!! url('/page-login'); !!}">Login</a></li>
        <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
          <ul aria-expanded="false">
            <li><a href="{!! url('/page-error-400'); !!}">Error 400</a></li>
            <li><a href="{!! url('/page-error-403'); !!}">Error 403</a></li>
            <li><a href="{!! url('/page-error-404'); !!}">Error 404</a></li>
            <li><a href="{!! url('/page-error-500'); !!}">Error 500</a></li>
            <li><a href="{!! url('/page-error-503'); !!}">Error 503</a></li>
          </ul>
        </li>
        <li><a href="{!! url('/page-lock-screen'); !!}">Lock Screen</a></li>
      </ul>
      </li>
    </ul>
    <div class="add-menu-sidebar">
      <img src="{{ asset('images/food-serving.png') }}" alt="">
      <p class="mb-3">Organize your menus through button bellow</p>
      <span class="fs-12 d-block mb-3">Lorem ipsum dolor sit amet</span>
      <a href="javascript:void(0)" class="btn btn-secondary btn-rounded" data-toggle="modal" data-target="#addOrderModalside" >+Add Menus</a>
    </div>
    <div class="copyright">
      <p><strong>Sego Restaurant Admin Dashboard</strong> © 2021 All Rights Reserved</p>
      <p>Made with <span class="heart"></span> by DexignZone</p>
    </div>
  </div>
</div>
<!--**********************************
  Sidebar end
***********************************-->