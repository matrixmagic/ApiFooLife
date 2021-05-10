{{-- Extends layout --}}

<?php 

$lang = [
    'signup_with_google' => 'Signup with Google',
    'signup_with_facebook' => 'Signup with Facebook',
    'email_address' => 'Email address',
    'password' => 'Password',
    'confirm_password' => 'Confirm password',
    'forgot_your_password' => 'Forgot your password?',
    'login' => 'Login',
    'log_out' => 'Log out',
    'sign_up' => 'Sign up',
    'need_an_account' => 'Need an account?',
    'reset_password' => 'Reset password',
    'submit' => 'Submit',
    'user_not_found' => 'User is not found.',
    'user_blocked' => 'User is blocked.',
    'profile' => 'Profile',
    'users' => 'Users',
    'log' => 'Log',
    'close' => 'Close',
    'import_media' => 'Import Media',
    'import' => 'import',
    'play' => 'Play',
    'play_small' => 'Play',
    'pause' => 'Pause',
    'play_episode' => 'Play episode',
    'step_back' => 'Step back',
    'step_forward' => 'Step forward',
    'take_episode' => 'Take episode',
    'cut_fast' => 'Cut fast',
    'create_video' => 'Create Video',
    'used' => 'Used',
    'youtube_url' => 'YouTube video URL or direct URL',
    'browse_files' => 'Choose file',
    'convert_video' => 'Convert Video',
    'convert' => 'Convert',
    'quality' => 'Quality',
    'low' => 'Low',
    'medium' => 'Medium',
    'high' => 'High',
    'size' => 'Size',
    'format' => 'Format',
    'name' => 'Name',
    'text_on_video' => 'Text on video',
    'text_on_full_video' => 'Text the whole video',
    'enter_text_here' => 'Enter text here',
    'static_top' => 'Static at the top',
    'static_bottom' => 'Static bottom',
    'movement_from_bottom' => 'Move from the bottom',
    'movement_from_left' => 'Move from the left',
    'aspect_ratio' => 'Aspect ratio',
    'choose_background_audio' => 'Choose a background audio file',
    'choose_audio' => 'Choose audio',
    'audio' => 'Audio',
    'create' => 'Create',
    'add_image_to_timeline' => 'Add a picture to the project',
    'preview' => 'Preview',
    'rename' => 'Rename',
    'delete' => 'Delete',
    'remove' => 'Remove',
    'edit' => 'Edit',
    'download' => 'Download',
    'empty' => 'Empty.',
    'yes' => 'Yes',
    'cancel' => 'Cancel',
    'confirm' => 'Confirm',
    'duration' => 'Duration',
    'text_on_image' => 'Text in the picture',
    'auto_split_text' => 'Split text into strings automatically',
    'video_preview' => 'Preview video',
    'image_preview' => 'Preview image',
    'email' => 'Email',
    'user_name' => 'Name',
    'role' => 'Role',
    'type' => 'Type',
    'social_url' => 'Social URL',
    'confirmed' => 'Confirmed',
    'blocked' => 'Blocked',
    'actions' => 'Actions',
    'admin' => 'Admin',
    'user' => 'User',
    'back' => 'Back',
    'input_files' => 'Uploaded files',
    'output_files' => 'Created video',
    'error' => 'Error',
    'please_enter_url' => 'Please enter the address of the file or select the media file.',
    'video_format_not_supported' => 'The video format is not supported in your browser.',
    'playback_not_possible' => 'Playback is not possible.',
    'image_parameters' => 'Image Options',
    'save' => 'Save',
    'add' => 'Add',
    'play_audio' => 'Play Audio',
    'project_is_empty' => 'Your project is empty.',
    'warning' => 'Warning',
    'processing' => 'Processing',
    'queue' => 'Queue',
    'please_wait' => 'Please wait...',
    'text_color' => 'Text color',
    'text_background_color' => 'Text background color',
    'white' => 'White',
    'black' => 'Black',
    'yellow' => 'Yellow',
    'red' => 'Red',
    'green' => 'Green',
    'blue' => 'Blue',
    'export_url' => 'Get this video',
    'import_from' => 'Import from ',
    'value_is_empty' => 'Value is empty',
    'import_from_pixabay' => 'Import from Pixabay',
    'import_from_google_search' => 'Import from Google search',
    'you_sure_you_want_remove_user' => 'Are you sure you want to remove user?',
    'you_sure_you_want_delete_your_account' => 'Are you sure you want to delete your account?',
    'your_account_activated' => 'Your account is activated',
    'data_successfully_saved' => 'The data was successfully saved.',
    'file_type_is_not_allowed' => 'File type is not allowed.',
    'file_size_exceeds_allowed_limit' => 'The file size exceeds the allowed limit.',
    'error_while_downloading_video' => 'Error while downloading video.',
    'error_try_later' => 'Error. Please try again later',
    'auth_error_try_using_different_email' => 'An error has occurred. Try using a different email address.',
    'you_successfully_registered' => 'You are successfully registered. Now you can enter.',
    'password_change_successfully_confirmed' => 'Password change has been successfully confirmed.',
    'wait_for_confirmation_from_administration' => 'Please wait for confirmation from the administration.',
    'your_new_password' => 'Your new password',
    'new_password_has_been_sent' => 'The new password has been sent to your email.',
    'passwords_do_not_match' => 'Passwords do not match.',
    'password_must_contain_more_than_characters' => 'The password must contain more than 6 characters.',
    'user_already_exists_with_email' => 'A user already exists with the specified email address. You can enter using your password.',
    'downloading_a_file' => 'Downloading a file',
    'download_file_forbidden' => 'You can not download this file. Has not received approval from the administration.',
    'your_account_activated_use_service' => 'Your account has been activated. Now you can use our service.',
    'to_confirm_click_here' => 'To confirm, click here',
    'audio_library' => 'Audio library'
];
?>
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
      <li class="breadcrumb-item"><a href="javascript:void(0)">Product </a></li>
      <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a></li>
    </ol>
  </div>
  <!-- row -->
  <form  method="POST" action="{{ url('products') }}">
    @csrf
  <div class="row">
    <div class="col-xl-12 col-xxl-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Add Prdouct</h4>
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
                      <label class="text-label">Product Name*</label>
                      <input type="text" name="name" class="form-control" required>
                    </div>
                  </div>
                  
                  <div class="col-lg-6 mb-3">
                    <div class="form-group">
                      <label class="text-label">price*</label>
                      <input type="text" name="price" class="form-control" required>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">

                    <div class="form-group">
                      <label class="text-label">category*</label>
                      <select class="form-control" name="category_id" required>
                        <option selected>Open this select menu</option>
                       @foreach ($categories as $item)
                       <option value="{{$item->id}}">{{$item->name}}</option>
                       @endforeach
                       
                       
                       
                      </select>
                    </div>
                  </div>

                  <div class="col-lg-6 mb-3">

                    <div class="form-group">
                        <input type="radio" id="male" name="type_id" value="1">
                        <label for="male">Food</label><br>
                        <input type="radio" id="female" name="type_id" value="2">
                        <label for="female">Dreink</label><br>
                        <input type="radio" id="other" name="type_id" value="">
                        <label for="other">Other</label>
                    </div>
                  </div>

                  

                  
              </div>
              </div>
              <div id="wizard_Time" class="tab-pane" role="tabpanel">
                <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">Content</h4>
                        </div>
                        <div class="card-body">
                            <textarea name="content" id="summernote" class="summernote"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xl-12 col-xxl-12">
                      <div class="card">
                        <div class="card-header">
                          <h4 class="card-title">details</h4>
                        </div>
                        <div class="card-body">
                            <textarea name="details" id="summernote" class="summernote"></textarea>
                         
                        </div>
                      </div>
                    </div>
                  </div>
               </div>
              
              <div id="wizard_Details" class="tab-pane" role="tabpanel">
                  <input id="fileId" type="hidden" name="file_id">
              
              
             
              
              <div class="row">
                  <div class="col-md-4 order-md-last">
              
                      <div class="form-group">
                          <button type="button" class="btn btn-lg btn-smp btn-outline-primary btn-block" data-toggle="action" data-action="import_media">
                              <span class="icon-download"></span>
                              <?php echo $lang['import_media']; ?>
                          </button>
                      </div>
              
                      <div class="mb-3 border rounded-0" style="max-height: 338px; overflow: auto;">
                          <ul class="list-group" id="wve-list_input">
              
                          </ul>
                      </div>
              
                  </div>
                  <div class="col-md-8 order-md-first">
              
                      <div class="card mb-3">
                          <div class="card-body">
              
                              <div class="wve-editor-player">
                                  <video src="" preload="auto" width="400" height="360" class="d-block" id="wve-video"></video>
                                  <div class="wve-editor-player-panel" style="display: none;">
                                      <div class="time" id="wve-editor-player-time"></div>
                                      <div class="time time-current" id="wve-editor-player-time-current"></div>
                                  </div>
                              </div>
              
                          </div>
                      </div>
              
                  </div>
              </div>
              
              <div class="clearfix"></div>
              
              <!-- Timeline slider -->
              <div class="card mb-3">
                  <div class="card-body">
              
                      <div class="editor-timeline-wrapper">
                          <div id="wve-timeline"></div>
                          <div id="wve-timeline-range"></div>
                          <div id="wve-time-selected-inputs">
                              <div class="card card-body py-2 px-4 shadow-1 bg-secondary">
                                  <div class="row">
                                      <div class="col-5 pl-1 pr-1">
                                          <input type="text" class="form-control form-control-sm wve-time-input-in" value="">
                                      </div>
                                      <div class="col-5 pl-1 pr-1">
                                          <input type="text" class="form-control form-control-sm wve-time-input-out" value="">
                                      </div>
                                      <div class="col-2 pl-1 pr-1">
                                          <button type="button" class="btn btn-outline-light btn-block text-center p-1">
                                              <i class="icon-cross"></i>
                                          </button>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
              
                      <div class="clearfix"></div>
                      <hr>
              
                      <!-- buttons -->
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="btn-group btn-group-justified btn-group-lg my-2" role="group">
                                  <button type="button" class="btn btn-outline-primary toggle-tooltip" data-toggle="action" data-action="stepback_main" title="<?php echo $lang['step_back']; ?>">
                                      <span class="icon-arrow-left2"></span>
                                  </button>
                                  <button type="button" class="btn btn-outline-primary toggle-tooltip" data-toggle="action" data-action="play_main" title="<?php echo $lang['play']; ?>">
                                      <span class="icon-play3"></span>
                                  </button>
                                  <button type="button" class="btn btn-outline-primary toggle-tooltip" data-toggle="action" data-action="stepforward_main" title="<?php echo $lang['step_forward']; ?>">
                                      <span class="icon-arrow-right2"></span>
                                  </button>
                                  <button type="button" class="btn btn-outline-primary toggle-tooltip" data-toggle="action" data-action="play_selected" title="<?php echo $lang['play_episode']; ?>">
                                      <span class="icon-play2"></span>
                                  </button>
                              </div>
                          </div>
              
                          <div class="clearfix hidden-md-up"></div>
              
                          <div class="col-lg-2 col-sm-6">
              
                              <div class="my-2">
                                  <div class="btn-group btn-group-justified btn-group-lg margin-bottom-md" role="group">
                                      <button class="btn btn-outline-primary toggle-tooltip" data-toggle="action" data-action="take-episode" title="<?php echo $lang['take_episode']; ?>">
                                          <span class="icon-plus"></span>
                                      </button>
                                      <button class="btn btn-outline-primary toggle-tooltip" data-toggle="action" data-action="cut-fast" title="<?php echo $lang['cut_fast']; ?>">
                                          <span class="icon-scissors"></span>
                                      </button>
                                  </div>
                              </div>
              
                          </div>
              
                          <div class="col-lg-4 col-sm-6">
              
                              <div class="my-2">
                                  <button type="button" class="btn btn-block btn-lg btn-smp btn-outline-primary" data-toggle="action" data-action="render">
                                      <span class="icon-checkmark"></span>
                                      <?php echo $lang['create_video']; ?>
                                  </button>
                              </div>
              
                          </div>
              
                      </div>
                      <!-- /buttons -->
              
                      <!-- episode-container -->
                      <div class="episode-container" id="wve-episode-container" style="display: none;">
                          <hr class="mb-0">
                          <div class="row wve-episode-container" id="wve-episode-container-inner"></div>
                          <div class="clearfix"></div>
                      </div>
                      <!-- /episode-container -->
              
                  </div>
              </div>
              <!-- /Timeline slider -->
              
              <!-- Output list -->
              <div class="card">
                  <div class="card-body">
              
                      <div class="bottom-list-container border rounded-0">
              
                          <table class="table table-bordered table-hover no-margin">
                              <colgroup>
                                  <col width="40%">
                                  <col width="20%">
                                  <col width="15%">
                                  <col width="15%">
                                  <col width="10%">
                              </colgroup>
                              <tbody id="wve-list_output"></tbody>
                          </table>
              
                      </div>
              
                  </div>
              </div>
              <!-- /Output list -->



              </div>
              <div id="wizard_Payment" class="tab-pane" role="tabpanel">
                {{-- <div class="row emial-setup">
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
                </div> --}}
                
                <div class="row">
                  <div class="col-12">
                    <div class="skip-email text-center">
                      <p>Are you sure   to add product? </p>
                      {{-- <a href="javascript:void(0)">Skip step</a> --}}
                      <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary  text-center">Save</button>
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
</form>
</div>

@endsection

@section('addscript')
    <script type="text/template" id="modalImportMediaTemplate">
    <div class="modal fade" id="modalImportMedia" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $lang['import_media']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $lang['close']; ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label>
                                <?php echo $lang['youtube_url']; ?>:
                            </label>
                            <input type="text" class="form-control" name="youtube_url" value="">
                        </div>
                        <hr>
                        <div class="file-input-container">
                            <input type="file" name="file" class="d-none" multiple>
                            <button type="button" class="btn btn-lg btn-secondary btn-block file-input">
                                <?php echo $lang['browse_files']; ?>...
                            </button>
                        </div>
                    </form>

                </div>
                <div class="modal-footer d-block text-right">
                    <button type="button" class="btn btn-primary js-button-submit">
                        <?php echo $lang['import']; ?>
                    </button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <?php echo $lang['close']; ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="modalConvertTemplate">
    <div class="modal fade" id="modalConvert" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $lang['convert_video']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $lang['close']; ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="opt-quality">
                                        <?php echo $lang['quality']; ?>:
                                    </label>
                                    <select class="form-control" name="quality" id="opt-quality">
                                        <option class="low"><?php echo $lang['low']; ?></option>
                                        <option class="medium"><?php echo $lang['medium']; ?></option>
                                        <option class="high"><?php echo $lang['high']; ?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="opt-size">
                                        <?php echo $lang['size']; ?>:
                                    </label>
                                    <select class="form-control" name="size" id="opt-size">
                                        <option value="360">360p</option>
                                        <option value="480">480p</option>
                                        <option value="576">576p</option>
                                        <option value="720">720p</option>
                                        <option value="1080">1080p</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="opt-format">
                                        <?php echo $lang['format']; ?>:
                                    </label>
                                    <select class="form-control" name="format" id="opt-format">
                                        <option value="mp4">mp4</option>
                                        <option value="webm">webm</option>
                                        <option value="flv">flv</option>
                                        <option value="ogv">ogv</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">

                            </div>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary"><?php echo $lang['convert']; ?></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['close']; ?></button>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="renderModalTemplate">
    <div class="modal fade" id="renderModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><%- title %></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $lang['close']; ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form action="" method="post" class="mb-0">
                        <% if( type == 'render' ){ %>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">

                                    <label for="opt_title">
                                        <?php echo $lang['name']; ?>:
                                    </label>
                                    <input class="form-control" type="text" name="title" value="" id="opt_title">

                                </div>
                            </div>
                        </div>
                        <!--div class="row">
                            <div class="col-12">
                                <div class="form-group">

                                    <label for="opt_title">
                                        <?php echo $lang['text_on_video']; ?>:
                                    </label>
                                    <input class="form-control" type="text" name="text" value="" id="opt_text">

                                </div>
                            </div>
                        </div-->
                        <div class="mb-3">
                            <a class="btn btn-secondary btn-sm btn-block mb-2" data-toggle="collapse" href="#insertTextBlock" aria-expanded="false" aria-controls="insertTextBlock">
                                <?php echo $lang['text_on_video']; ?>
                                <i class="icon-arrow-down2"></i>
                            </a>
                            <div class="collapse border border-bottom" id="insertTextBlock">
                                <div class="p-3">
                                    <textarea class="form-control" rows="8" id="opt_longtext" name="longtext" placeholder="<?php echo $lang['enter_text_here']; ?>"></textarea>
                                    <div class="py-2 row">
                                        <div class="col-md-6">
                                            <label for="fieldTextColor"><?php echo $lang['text_color']; ?></label>
                                            <select class="form-control form-control-sm" name="text_color" id="fieldTextColor">
                                                <option value="white" selected="selected"><?php echo $lang['white']; ?></option>
                                                <option value="black"><?php echo $lang['black']; ?></option>
                                                <option value="yellow"><?php echo $lang['yellow']; ?></option>
                                                <option value="red"><?php echo $lang['red']; ?></option>
                                                <option value="green"><?php echo $lang['green']; ?></option>
                                                <option value="blue"><?php echo $lang['blue']; ?></option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="fieldTextBackgroundColor"><?php echo $lang['text_background_color']; ?></label>
                                            <select class="form-control form-control-sm" name="text_background_color" id="fieldTextBackgroundColor">
                                                <option value="white"><?php echo $lang['white']; ?></option>
                                                <option value="black" selected="selected"><?php echo $lang['black']; ?></option>
                                                <option value="yellow"><?php echo $lang['yellow']; ?></option>
                                                <option value="red"><?php echo $lang['red']; ?></option>
                                                <option value="green"><?php echo $lang['green']; ?></option>
                                                <option value="blue"><?php echo $lang['blue']; ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="py-2 row">
                                        <div class="col-md-6">
                                            <label>
                                                <input type="radio" name="text_action" value="static_top" checked>
                                                <?php echo $lang['static_top']; ?>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                <input type="radio" name="text_action" value="static_bottom">
                                                <?php echo $lang['static_bottom']; ?>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                <input type="radio" name="text_action" value="move_from_bottom">
                                                <?php echo $lang['movement_from_bottom']; ?>
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label>
                                                <input type="radio" name="text_action" value="move_from_left">
                                                <?php echo $lang['movement_from_left']; ?>
                                            </label>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <% } %>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="opt-quality">
                                        <?php echo $lang['quality']; ?>:
                                    </label>
                                    <select class="form-control" name="quality" id="opt-quality">
                                        <option value="low"><?php echo $lang['low']; ?></option>
                                        <option value="medium" selected="selected"><?php echo $lang['medium']; ?></option>
                                        <option value="high"><?php echo $lang['high']; ?></option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">

                                <label for="opt-size">
                                    <?php echo $lang['size']; ?>:
                                </label>
                                <select class="form-control" name="size" id="opt-size">
                                    <option value="360p">360p</option>
                                    <option value="480p" selected="selected">480p</option>
                                    <option value="576p">576p</option>
                                    <option value="720p">720p</option>
                                    <option value="1080p">1080p</option>
                                </select>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="opt-format">
                                        <?php echo $lang['format']; ?>:
                                    </label>
                                    <select class="form-control" name="format" id="opt-format">
                                        <option value="mp4">mp4</option>
                                        <option value="webm">webm</option>
                                        <option value="ogv">ogv</option>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label for="opt-aspect">
                                        <?php echo $lang['aspect_ratio']; ?>:
                                    </label>
                                    <select class="form-control" name="aspect" id="opt-aspect">
                                        <option value="16:9">16:9</option>
                                        <option value="4:3">4:3</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                        <% if( type == 'render' ){ %>
                        <div class="form-group mb-0">
                            <hr>

                            <label for="opt-audio">
                                <?php echo $lang['choose_background_audio']; ?>:
                            </label>
                            <select class="form-control" id="opt-audio" name="audio">
                                <option value="">- <?php echo $lang['choose_audio']; ?> -</option>
                                <% for(var index in audioList) { %>
                                    <option value="<%- audioList[index]['id'] %>"><%- audioList[index]['title'] %></option>
                                <% } %>
                            </select>

                        </div>
                        <% } %>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary js-button-submit"><?php echo $lang['create']; ?></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['close']; ?></button>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="libraryListItemAudioTemplate">
    <li class="list-group-item d-block show-on-hover-parent py-3">
        <span class="btn d-block text-left btn-link" data-file-name="<%- fileName %>" title="<%- file_size %>">
            <span class="badge badge-info">
                <%- ext %>
            </span>
            &nbsp;
            <%- title %>
        </span>
        <div class="show-on-hover">
            <button type="button" class="btn btn-sm btn-icon btn-secondary toggle-tooltip" data-toggle="action" data-action="preview_audio" data-url="<%- url %>" title="<?php echo $lang['play']; ?>">
                <span class="icon-play3"></span>
            </button>
        </div>
    </li>
</script>

<script type="text/template" id="listItemTemplate_input">
    <li class="list-group-item rounded-0 text-ellipsis show-on-hover-parent">
        <div class="show-on-hover">
            <% if (type == 'image') { %>
                <button type="button" class="btn btn-sm btn-icon btn-secondary toggle-tooltip" data-toggle="action" data-id="<%- id %>" data-action="add-image" data-url="<%- url %>" title="<?php echo $lang['add_image_to_timeline']; ?>">
                    <span class="icon-plus"></span>
                </button>
                <button type="button" class="btn btn-sm btn-icon btn-secondary toggle-tooltip" data-toggle="action" data-id="<%- id %>" data-action="preview_image" data-url="<%- url %>" title="<?php echo $lang['preview']; ?>">
                    <span class="icon-image"></span>
                </button>
            <% } else if (type == 'video') { %>
                <button type="button" class="btn btn-sm btn-icon btn-secondary toggle-tooltip" data-toggle="action" data-id="<%- id %>" data-action="convert_input" title="<?php echo $lang['convert']; ?>">
                    <span class="icon-loop"></span>
                </button>
            <% } else if (type == 'audio') { %>
                <button type="button" class="btn btn-sm btn-icon btn-secondary toggle-tooltip" data-toggle="action" data-id="<%- id %>" data-action="preview_audio" data-url="<%- url %>" title="<?php echo $lang['play']; ?>">
                    <span class="icon-play3"></span>
                </button>
            <% } %>
            <button type="button" class="btn btn-sm btn-icon btn-secondary toggle-tooltip" data-toggle="action" data-id="<%- id %>" data-action="rename_input" title="<?php echo $lang['rename']; ?>">
                <span class="icon-pencil"></span>
            </button>
            <button type="button" class="btn btn-sm btn-icon btn-secondary toggle-tooltip" data-toggle="action" data-id="<%- id %>" data-action="delete_input" title="<?php echo $lang['delete']; ?>">
                <span class="icon-cross"></span>
            </button>
        </div>
        <span class="btn btn-link" data-toggle="action" data-action="select-media_input" data-id="<%- id %>" title="<%- datetime %>, <% if (duration_time) { %><%- duration_time %>, <% } %><% if (width) { %> <%- width %>x<%- height %>,<% } %> <%- file_size %>">
        <% if(type == 'image'){ %>
            <span class="badge badge-warning">
                <%- ext %>
            </span>
        <% } else if (type == 'audio') { %>
            <span class="badge badge-info">
                <%- ext %>
            </span>
        <% } else { %>
            <span class="badge badge-primary">
                <%- ext %>
            </span>
        <% } %>
        &nbsp;
        <%- title %>
    </span>
    </li>
</script>

<script type="text/template" id="listItemTemplate_output">
    <tr>
        <td>
            <span class="badge badge-warning">
                <%- ext %>
            </span>
            &nbsp;
            <%- title %>
        </td>
        <td>
            <%- datetime %>
        </td>
        <td>
            <%- duration_time %>
        </td>
        <td>
            <%- file_size %>
        </td>
        <td>

            <div class="text-right no-wrap">

                <% if(isIframeMode) { %>
                    <button type="button" class="btn btn-sm btn-icon btn-outline-primary toggle-tooltip" data-toggle="action" data-action="export-url_output" data-id="<%- id %>" title="<?php echo $lang['export_url']; ?>">
                        <span class="icon-arrow-up"></span>
                    </button>
                <% } %>
                <button type="button" class="btn btn-sm btn-icon btn-outline-primary toggle-tooltip" data-toggle="action" data-action="play_output" data-id="<%- id %>" title="<?php echo $lang['play']; ?>">
                    <span class="icon-play3"></span>
                </button>
                <a class="btn btn-sm btn-icon btn-outline-primary toggle-tooltip" href="{{url("/")}}/index.php?action=download&itemId=<%- id %>&type=output" target="_blank" title="<?php echo $lang['download']; ?>"<% if(typeof allowed === 'undefined' || !allowed){ %> disabled="disabled"<% } %>>
                    <span class="icon-download2"></span>
                </a>
                <button type="button" class="btn btn-sm btn-icon btn-outline-primary toggle-tooltip" data-toggle="action" data-id="<%- id %>" data-action="rename_output" title="<?php echo $lang['rename']; ?>">
                    <span class="icon-pencil"></span>
                </button>
                <button type="button" class="btn btn-sm btn-icon btn-outline-primary toggle-tooltip" data-toggle="action" data-id="<%- id %>" data-action="delete_output" title="<?php echo $lang['delete']; ?>">
                    <span class="icon-cross"></span>
                </button>

            </div>

        </td>
    </tr>
</script>

<script type="text/template" id="listEmptyTemplate_input">
    <li class="list-group-item text-center disabled">
        <?php echo $lang['empty']; ?>
    </li>
</script>

<script type="text/template" id="listEmptyTemplate_output">
    <tr class="disabled">
        <td colspan="4">
            <?php echo $lang['empty']; ?>
        </td>
    </tr>
</script>

<script type="text/template" id="modalConfirmTemplate">
    <div class="modal fade" id="modalConfirm" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $lang['confirm']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $lang['close']; ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <%- content %>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary js-button-submit"><?php echo $lang['yes']; ?></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['cancel']; ?></button>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="modalAlertTemplate">
    <div class="modal fade" id="modalAlert" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><%- title %></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $lang['close']; ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <i class="<%- icon_class %>"></i>
                    &nbsp;
                    <%- content %>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['close']; ?></button>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="modalImageOptionsTemplate">
    <div class="modal fade" id="modalImageOptions" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><%- title %></h5>
                </div>
                <div class="modal-body">

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="formImageOptionsDuration">
                                <?php echo $lang['duration']; ?>:
                            </label>
                            <input type="number" class="form-control" id="formImageOptionsDuration" name="duration" min="0" value="10">
                        </div>
                        <div class="form-group">
                            <label for="formImageOptionsText">
                                <?php echo $lang['text_on_image']; ?>:
                            </label>
                            <textarea class="form-control" rows="8" id="formImageOptionsText" name="text"></textarea>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary js-button-submit"><%= buttonText %></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['close']; ?></button>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="modalLargeTemplate">
    <div class="modal fade" id="modalLarge" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><%- title %></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $lang['close']; ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <%= content %>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['close']; ?></button>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="modalSmallTemplate">
    <div class="modal fade" id="modalSmall" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><%- title %></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $lang['close']; ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <%= content %>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['close']; ?></button>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="alertTemplate">
    <div class="alert alert-<%- type %> alert-dismissible fade show mt-3" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="<?php echo $lang['close']; ?>">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong><%- title %>!</strong>
        <%- content %>
    </div>
</script>

<script type="text/template" id="episodeItemTemplate">
    <div class="col-md-2 col-sm-4 col-6 episode-item">
        <div class="card card-outline-secondary show-on-hover-parent">
            <div class="card-block" style="background-image: url('<%- imageUrl %>');"></div>
            <div class="show-on-hover">
                <% if (type === 'video') { %>
                    <button type="button" class="btn btn-sm btn-icon btn-secondary toggle-tooltip" data-toggle="action" data-action="play_episode" data-index="<%- index %>" title="<?php echo $lang['play']; ?>">
                        <span class="icon-play3"></span>
                    </button>
                <% } else { %>
                    <button type="button" class="btn btn-sm btn-icon btn-secondary toggle-tooltip" data-toggle="action" data-action="edit_episode" data-index="<%- index %>" title="<?php echo $lang['edit']; ?>">
                        <span class="icon-pencil"></span>
                    </button>
                <% } %>
                <button type="button" class="btn btn-sm btn-icon btn-secondary toggle-tooltip" data-toggle="action" data-action="delete_episode" data-index="<%- index %>" title="<?php echo $lang['remove']; ?>">
                    <span class="icon-cross"></span>
                </button>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="videoPreviewModalTemplate">
    <div class="modal fade" id="videoPreviewModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $lang['video_preview']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $lang['close']; ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <video preload="auto" src="<%- src %>" width="400" height="300"></video>
                    <div class="row mt-3">
                        <div class="col-8">
                            <div class="input-range">
                                <input type="range" value="0" step="1" min="0" max="100">
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="button" class="btn btn-info btn-block js-button-play">
                                <i class="icon-play3"></i>
                                <?php echo $lang['play_small']; ?>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['close']; ?></button>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="mediaRenameModalTemplate">
    <div class="modal fade" id="mediaRenameModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo $lang['rename']; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="<?php echo $lang['close']; ?>">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="text" class="form-control" name="title" value="<%- content %>">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary js-button-submit"><?php echo $lang['rename']; ?></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo $lang['close']; ?></button>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="userStatTemplate">
    <div class="progress mt-3">
        <div class="progress-bar <% if(files_size_percent >= 85){ %>bg-danger<% } else { %>bg-success<% } %>" role="progressbar" style="width: <%- files_size_percent %>%" aria-valuenow="<%- files_size_percent %>" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="text-center small mb-3">
        <?php echo $lang['used']; ?>:
        <%- files_size_percent %>%
        &mdash;
        <%- files_size_total_formatted %>
        /
        <%- files_size_max_formatted %>
    </div>
</script>

<script type="text/template" id="userProfileTemplate">
    <div class="row">
        <div class="col-md-6 form-group">
            <b><?php echo $lang['email']; ?>:</b>
        </div>
        <div class="col-md-6 form-group">
            <%- email %>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 form-group">
            <b><?php echo $lang['user_name']; ?>:</b>
        </div>
        <div class="col-md-6 form-group">
            <%- name %>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 form-group">
            <b><?php echo $lang['role']; ?>:</b>
        </div>
        <div class="col-md-6 form-group">
            <% if( role == 'admin' ){ %>
                <div class="badge badge-warning badge-pill">Admin</div>
            <% } else { %>
                <div class="badge badge-default badge-pill">User</div>
            <% } %>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 form-group">
            <b><?php echo $lang['type']; ?>:</b>
        </div>
        <div class="col-md-6 form-group">
            <%- type %>
        </div>
    </div>
    
</script>

<script type="text/template" id="pixabaySearchTemplate">
<div>
    <div class="input-group">
        <input type="text" class="form-control js-search-field" placeholder="Enter a name for the search">
        <div class="input-group-btn">
            <button type="button" class="btn btn-secondary js-button-search">
                <i class="icon-search"></i>
                Search
            </button>
        </div>
        <div class="input-group-btn js-search-type-switch">
            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="js-search-type-name">Video</span>
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item js-select-type" data-type="video" href="#">Video</a>
                <a class="dropdown-item js-select-type" data-type="image" href="#">Images</a>
            </div>
        </div>
    </div>
    <div class="form-group options-image" style="display: none;">
        <div class="d-inline-block pt-2 pr-2">
            <label class="small" for="fieldFilterImageType">
                Type
            </label>
            <select class="form-control form-control-sm" name="image_type" id="fieldFilterImageType" style="width: 150px;">
                <option value="all">All</option>
                <option value="photo">Photo</option>
                <option value="illustration">Illustration</option>
            </select>
        </div>
        <div class="d-inline-block pt-2 pr-2">
            <label class="small" for="fieldFilterImageOrientation">
                Orientation
            </label>
            <select class="form-control form-control-sm" name="orientation" id="fieldFilterImageOrientation" style="width: 150px;">
                <option value="all">All</option>
                <option value="horizontal">Horizontal</option>
                <option value="vertical">Vertical</option>
            </select>
        </div>
        <div class="d-inline-block pt-2 pr-2">
            <label class="small" for="fieldFilterImageCategory">
                Category
            </label>
            <select class="form-control form-control-sm" name="category" id="fieldFilterImageCategory" style="width: 150px;">
                <option value="">All</option>
                <option value="fashion">Fashion</option>
                <option value="nature">Nature</option>
                <option value="backgrounds">Backgrounds</option>
                <option value="science">Science</option>
                <option value="education">Education</option>
                <option value="people">People</option>
                <option value="feelings">Feelings</option>
                <option value="religion">Religion</option>
                <option value="health">Health</option>
                <option value="places">Places</option>
                <option value="animals">Animals</option>
                <option value="industry">Industry</option>
                <option value="food">Food</option>
                <option value="computer">Computer</option>
                <option value="sports">Sports</option>
                <option value="transportation">Transportation</option>
                <option value="travel">Travel</option>
                <option value="buildings">Buildings</option>
                <option value=">business">Business</option>
                <option value="music">Music</option>
            </select>
        </div>
<!--        <div class="d-inline-block pt-2 pr-2">-->
<!--            <label class="small" for="fieldFilterImageColors">-->
<!--                Colors-->
<!--            </label>-->
<!--            <select class="form-control form-control-sm" name="colors" id="fieldFilterImageColors" style="width: 150px;">-->
<!--                <option value="">All</option>-->
<!--                <option value="grayscale">Grayscale</option>-->
<!--                <option value="transparent">Transparent</option>-->
<!--                <option value="red">Red</option>-->
<!--                <option value="orange">Orange</option>-->
<!--                <option value="yellow">Yellow</option>-->
<!--                <option value="green">Green</option>-->
<!--                <option value="turquoise">Turquoise</option>-->
<!--                <option value="blue">Blue</option>-->
<!--                <option value="lilac">Lilac</option>-->
<!--                <option value="pink">Pink</option>-->
<!--                <option value="white">White</option>-->
<!--                <option value="gray">Gray</option>-->
<!--                <option value="black">Black</option>-->
<!--                <option value="brown">Brown</option>-->
<!--            </select>-->
<!--        </div>-->
    </div>
    <div class="form-group options-video">
        <div class="d-inline-block pt-2 pr-2">
            <label class="small" for="fieldFilterVideoType">
                Type
            </label>
            <select class="form-control form-control-sm" name="video_type" id="fieldFilterVideoType" style="width: 150px;">
                <option value="all">All</option>
                <option value="film">Film</option>
                <option value="animation">Animation</option>
            </select>
        </div>
        <div class="d-inline-block pt-2 pr-2">
            <label class="small" for="fieldFilterVideoCategory">
                Category
            </label>
            <select class="form-control form-control-sm" name="category" id="fieldFilterVideoCategory" style="width: 150px;">
                <option value="">All</option>
                <option value="fashion">Fashion</option>
                <option value="nature">Nature</option>
                <option value="backgrounds">Backgrounds</option>
                <option value="science">Science</option>
                <option value="education">Education</option>
                <option value="people">People</option>
                <option value="feelings">Feelings</option>
                <option value="religion">Religion</option>
                <option value="health">Health</option>
                <option value="places">Places</option>
                <option value="animals">Animals</option>
                <option value="industry">Industry</option>
                <option value="food">Food</option>
                <option value="computer">Computer</option>
                <option value="sports">Sports</option>
                <option value="transportation">Transportation</option>
                <option value="travel">Travel</option>
                <option value="buildings">Buildings</option>
                <option value=">business">Business</option>
                <option value="music">Music</option>
            </select>
        </div>
    </div>
    <div class="relative js-items-wrapper">
        <div style="max-height: 500px; overflow: hidden; overflow-y: auto;">
            <div class="row mt-3 items-container">

            </div>
        </div>
        <div class="js-container-pagination"></div>
        <div class="js-video-preview" style="display: none; background-color: #fff; position: absolute; left: 0; top: 0; width: 100%; height: 100%; z-index: 5;">
            <div class="text-center py-4">
                <video preload="auto" src="" controls style="width: 533px; height: 300px; margin: 0 auto;"></video>
                <div class="text-center py-3">
                    <button type="button" class="btn btn-secondary js-button-close">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="my-4 text-center">
        <img src="{{url("/")}}/assets/img/pixabay_logo.png" alt="Pixabay" style="height: 35px;">
    </div>
</div>
</script>

<script type="text/template" id="googleSearchTemplate">
<div>
    <input type="hidden" name="search_url" value="">
    <input type="hidden" name="api_key" value="">
    <input type="hidden" name="search_id" value="">
    <div class="input-group mb-3">
        <input type="text" class="form-control js-search-field" placeholder="Enter a name for the search">
        <div class="input-group-btn">
            <button type="button" class="btn btn-secondary js-button-search">
                <i class="icon-search"></i>
                Search
            </button>
        </div>
    </div>
    <div class="form-group mb-3 options-image">
        <div class="d-inline-block pt-2 pr-2">
            <label class="small" for="fieldFilterImageLicense">
                License
            </label>
            <select class="form-control form-control-sm" name="rights" id="fieldFilterImageLicense" style="width: 150px;">
                <option value="">All</option>
                <option value="cc_publicdomain|cc_attribute|cc_sharealike|cc_noncommercial|cc_nonderived">Free to use or share</option>
                <option value="cc_publicdomain|cc_attribute|cc_sharealike|cc_nonderived">Free to use or share, even commercially</option>
                <option value="cc_publicdomain|cc_attribute|cc_sharealike|cc_noncommercial">Free to use share or modify</option>
                <option value="cc_publicdomain|cc_attribute|cc_sharealike">Free to use, share or modify, even commercially</option>
            </select>
        </div>
        <div class="d-inline-block pt-2 pr-2">
            <label class="small" for="fieldFilterImageType">
                Type
            </label>
            <select class="form-control form-control-sm" name="imgType" id="fieldFilterImageType" style="width: 150px;">
                <option value="">All</option>
                <option value="clipart">Clip art</option>
                <option value="face">Face</option>
                <option value="lineart">Line drawing</option>
                <option value="news">News</option>
                <option value="photo">Photo</option>
            </select>
        </div>
        <div class="d-inline-block pt-2 pr-2">
            <label class="small" for="fieldFilterImageColor">
                Color
            </label>
            <select class="form-control form-control-sm" name="imgColorType" id="fieldFilterImageColor" style="width: 150px;">
                <option value="">All</option>
                <option value="color">Color</option>
                <option value="gray">Gray</option>
                <option value="mono">Mono</option>
            </select>
        </div>
    </div>

    <div class="relative js-items-wrapper">
        <div style="max-height: 500px; overflow: hidden; overflow-y: auto;">
            <div class="row mt-3 items-container">

            </div>
        </div>
        <div class="js-container-pagination"></div>
    </div>
    <div class="my-4 text-center">
        <img src="{{url("/")}}/assets/img/google_logo.png" alt="Pixabay" style="height: 35px;">
    </div>
</div>
</script>

<script type="text/template" id="pixabayItemTemplateImage">
    <div class="col-6 col-md-4">
        <div class="card mb-3">
            <div class="card-block p-2">
                <div class="show-on-hover-parent">
                    <img src="<%- previewUrl %>" alt="" style="width: 100%;">
                    <div class="show-on-hover">
                        <button type="button" class="btn btn-secondary btn-sm btn-icon js-button-download" data-media-url="<%- fullUrl %>" data-download-action="<%- downloadAction %>" data-media-title="<%- title %>" data-toggle="tooltip" title="Choose">
                            <span class="icon-download2"></span>
                        </button>
                        <a class="btn btn-secondary btn-sm btn-icon" href="<%- fullUrl %>" target="_blank" data-toggle="tooltip" title="Open in new tab">
                            <span class="icon-new-tab"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="pixabayItemTemplateVideo">
    <div class="col-6 col-md-4">
        <div class="card mb-3">
            <div class="card-block p-2">
                <div class="video-thumbnail show-on-hover-parent">
                    <div class="position-absolute pos-absolute-bottom-left" style="line-height: 1;">
                        <span class="badge badge-default">
                            Duration: <%- duration %> sec.
                        </span>
                    </div>
                    <div class="show-on-hover">
                        <button type="button" class="btn btn-secondary btn-sm btn-icon js-button-play" data-media-url="<%- previewUrl %>" data-toggle="tooltip" title="Play">
                            <span class="icon-play3"></span>
                        </button>
                        <button type="button" class="btn btn-secondary btn-sm btn-icon js-button-download" data-media-url="<%- fullUrl %>" data-download-action="<%- downloadAction %>" data-media-title="<%- title %>" data-toggle="tooltip" title="Choose">
                            <span class="icon-download2"></span>
                        </button>
                    </div>
                    <img src="https://i.vimeocdn.com/video/<%- picture_id %>_200x150.jpg" alt="" style="width: 100%;">
                </div>
            </div>
        </div>
    </div>
</script>

<script type="text/template" id="paginationTemplate">
<div class="pt-2">
    <nav aria-label="Page navigation example">
        <ul class="pagination mb-0">
            <li class="page-item<% if (currentPage === 1) { %> disabled<% } %>"><a class="page-link js-page-prev" href="#">Previous</a></li>
            <% for(var index in pages) { %>
                <% if (pages[index] !== '...') { %>
                    <li class="page-item<% if (pages[index] === currentPage) { %> active<% } %>"><a class="page-link js-page-number" href="#"><%- pages[index] %></a></li>
                <% } else { %>
                    <li class="page-item disabled"><a class="page-link">...</a></li>
                <% } %>
            <% } %>
            <li class="page-item<% if (currentPage === numberPages) { %> disabled<% } %>"><a class="page-link js-page-next" href="#">Next</a></li>
        </ul>
    </nav>
</div>
</script>

@endsection




@section('addscript3')
@include('elements.webvideoedit')
@endsection 
