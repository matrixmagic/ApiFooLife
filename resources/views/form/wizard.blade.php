{{-- Extends layout --}}
@extends('layout.default')



{{-- Content --}}
@section('content')

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
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Wizard</a></li>
    </ol>
  </div>
  <!-- row -->
  <div class="row">
    <div class="col-xl-12 col-xxl-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form step</h4>
        </div>
        <div class="card-body">
          <div id="smartwizard" class="form-wizard order-create">
            <ul class="nav nav-wizard">
              <li><a class="nav-link" href="#wizard_Service"> 
                <span>1</span> 
              </a></li>
              <li><a class="nav-link" href="#wizard_Time">
                <span>2</span>
              </a></li>
              <li><a class="nav-link" href="#wizard_Details">
                <span>3</span>
              </a></li>
              <li><a class="nav-link" href="#wizard_Payment">
                <span>4</span>
              </a></li>
            </ul>
            <div class="tab-content">
              <div id="wizard_Service" class="tab-pane" role="tabpanel">
                <div class="row">
                  <div class="col-lg-6 mb-2">
                    <div class="form-group">
                      <label class="text-label">First Name*</label>
                      <input type="text" name="firstName" class="form-control" placeholder="Parsley" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-2">
                    <div class="form-group">
                      <label class="text-label">Last Name*</label>
                      <input type="text" name="lastName" class="form-control" placeholder="Montana" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-2">
                    <div class="form-group">
                      <label class="text-label">Email Address*</label>
                      <input type="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="example@example.com.com" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-2">
                    <div class="form-group">
                      <label class="text-label">Phone Number*</label>
                      <input type="text" name="phoneNumber" class="form-control" placeholder="(+1)408-657-9007" required>
                    </div>
                  </div>
                  <div class="col-lg-12 mb-3">
                    <div class="form-group">
                      <label class="text-label">Where are you from*</label>
                      <input type="text" name="place" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
              <div id="wizard_Time" class="tab-pane" role="tabpanel">
                <div class="row">
                  <div class="col-lg-6 mb-2">
                    <div class="form-group">
                      <label class="text-label">Company Name*</label>
                      <input type="text" name="firstName" class="form-control" placeholder="Cellophane Square" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-2">
                    <div class="form-group">
                      <label class="text-label">Company Email Address*</label>
                      <input type="email" class="form-control" id="emial1" placeholder="example@example.com.com" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-2">
                    <div class="form-group">
                      <label class="text-label">Company Phone Number*</label>
                      <input type="text" name="phoneNumber" class="form-control" placeholder="(+1)408-657-9007" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-2">
                    <div class="form-group">
                      <label class="text-label">Your position in Company*</label>
                      <input type="text" name="place" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
              <div id="wizard_Details" class="tab-pane" role="tabpanel">
                <div class="row">
                  <div class="col-sm-4 mb-2">
                    <h4>Monday *</h4>
                  </div>
                  <div class="col-6 col-sm-4 mb-2">
                    <div class="form-group">
                      <input class="form-control" value="9.00" type="number" name="input1" id="input1">
                    </div>
                  </div>
                  <div class="col-6 col-sm-4 mb-2">
                    <div class="form-group">
                      <input class="form-control" value="6.00" type="number" name="input2" id="input2">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 mb-2">
                    <h4>Tuesday *</h4>
                  </div>
                  <div class="col-6 col-sm-4 mb-2">
                    <div class="form-group">
                      <input class="form-control" value="9.00" type="number" name="input3" id="input3">
                    </div>
                  </div>
                  <div class="col-6 col-sm-4 mb-2">
                    <div class="form-group">
                      <input class="form-control" value="6.00" type="number" name="input4" id="input4">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 mb-2">
                    <h4>Wednesday *</h4>
                  </div>
                  <div class="col-6 col-sm-4 mb-2">
                    <div class="form-group">
                      <input class="form-control" value="9.00" type="number" name="input5" id="input5">
                    </div>
                  </div>
                  <div class="col-6 col-sm-4 mb-2">
                    <div class="form-group">
                      <input class="form-control" value="6.00" type="number" name="input6" id="input6">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 mb-2">
                    <h4>Thrusday *</h4>
                  </div>
                  <div class="col-6 col-sm-4 mb-2">
                    <div class="form-group">
                      <input class="form-control" value="9.00" type="number" name="input7" id="input7">
                    </div>
                  </div>
                  <div class="col-6 col-sm-4 mb-2">
                    <div class="form-group">
                      <input class="form-control" value="6.00" type="number" name="input8" id="input8">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4 mb-2">
                    <h4>Friday *</h4>
                  </div>
                  <div class="col-6 col-sm-4 mb-2">
                    <div class="form-group">
                      <input class="form-control" value="9.00" type="number" name="input9" id="input9">
                    </div>
                  </div>
                  <div class="col-6 col-sm-4 mb-2">
                    <div class="form-group">
                      <input class="form-control" value="6.00" type="number" name="input10" id="input10">
                    </div>
                  </div>
                </div>
              </div>
              <div id="wizard_Payment" class="tab-pane" role="tabpanel">
                <div class="row emial-setup">
                  <div class="col-lg-3 col-sm-6 col-6">
                    <div class="form-group">
                      <label for="mailclient11" class="mailclinet mailclinet-gmail">
                        <input type="radio" name="emailclient" id="mailclient11">
                        <span class="mail-icon">
                          <i class="mdi mdi-google-plus" aria-hidden="true"></i>
                        </span>
                        <span class="mail-text">I'm using Gmail</span>
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-6">
                    <div class="form-group">
                      <label for="mailclient12" class="mailclinet mailclinet-office">
                        <input type="radio" name="emailclient" id="mailclient12">
                        <span class="mail-icon">
                          <i class="mdi mdi-office" aria-hidden="true"></i>
                        </span>
                        <span class="mail-text">I'm using Office</span>
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-6">
                    <div class="form-group">
                      <label for="mailclient13" class="mailclinet mailclinet-drive">
                        <input type="radio" name="emailclient" id="mailclient13">
                        <span class="mail-icon">
                          <i class="mdi mdi-google-drive" aria-hidden="true"></i>
                        </span>
                        <span class="mail-text">I'm using Drive</span>
                      </label>
                    </div>
                  </div>
                  <div class="col-lg-3 col-sm-6 col-6">
                    <div class="form-group">
                      <label for="mailclient14" class="mailclinet mailclinet-another">
                        <input type="radio" name="emailclient" id="mailclient14">
                        <span class="mail-icon">
                          <i class="fa fa-question-circle-o"
                          aria-hidden="true"></i>
                        </span>
                        <span class="mail-text">Another Service</span>
                      </label>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                  <div class="col-12">
                    <div class="skip-email text-center">
                      <p>Or if want skip this step entirely and setup it later</p>
                      <a href="javascript:void(0)">Skip step</a>
                    </div>
                  </div>
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