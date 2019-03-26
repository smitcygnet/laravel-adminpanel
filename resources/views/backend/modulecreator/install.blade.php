@extends ('backend.layouts.app')
@section ('title', trans('labels.modules.management') . ' | ' . trans('generator::labels.modules.install'))
@section('page-header')
<h1>
   {{ trans('generator::labels.modules.management') }}
   <small>{{ trans('menus.backend.modules.install') }}</small>
</h1>
@endsection
@section('content')
<div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ trans('menus.backend.modules.install') }}</h3>
                <div class="box-tools pull-right">
                    @include('generator::partials.modules-header-buttons')
                </div><!--box-tools pull-right-->
            </div><!-- /.box-header -->


            <div class="box-body">
               <div class="form-group">
        <!------- row ------>

        <!------- COL ------>
        <div class="col-lg-3">
            <div class="well well-sm" style="border: 1px solid #cccccc;  background-color: #f9f9f9; color: #AAA ">
              <div style="float: right">
                 <i class="fa fa-5x fa-th-list"></i>
              </div>
              <a style="font-size: 16px; color: #333; text-decoration: underline" href="#" data-toggle="modal" data-target="#module-3-description">
              Module 1
              </a>
              <p class="margin-top-10">Logging of every action of every user - create/update/delete entries, with ability to see the logs in one list</p>
              <p class="margin-top-10"></p>
              <div class="row">
                 <div class="col-xs-8 col-md-5">
                    <b>Installs</b>: 0
                 </div>
                 <div class="col-xs-16 col-md-7 text-right">
                    <b>Created</b>: Jan 2019
                 </div>
              </div>
              <p></p>
              <div class="row">
                 <div class="col-xs-6">
                    <a class="btn btn-info center-block" href="#" data-toggle="modal" data-target="#module-3-description">
                    How it works
                    </a>
                    <div tabindex="-1" class="modal fade" id="module-3-description" role="dialog" aria-labelledby="module-3-descriptionLabel">
                       <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                             <div class="modal-header">
                                <button class="close" aria-label="Close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="module-3-descriptionLabel" style="color:#333;">User Logs</h4>
                             </div>
                             <div class="modal-body text-left">
                                <div class="row" style="color:#333;">
                                   <div class="col-xs-8 text-center">
                                      <div class="wrapper-yt">
                                         <div class="youtube" data-embed="-cWk7fGHp9o">
                                            <div class="play-button"></div>
                                            <img src="https://img.youtube.com/vi/-cWk7fGHp9o/sddefault.jpg">
                                         </div>
                                      </div>
                                   </div>
                                   <div class="col-xs-4">
                                      <h3>Description:</h3>
                                      Logging of every action of every user - create/update/delete entries, with ability to see the logs in one list
                                      <hr>
                                      <h3>How it works:</h3>
                                      <ul>
                                         <li><a href="https://quickadminpanel.com/pages/user-logs-module" target="_blank">Detailed module description</a></li>
                                         <li><a href="https://quickadminpanel.com/blog/log-your-laravel-model-data-changes-with-observers/" target="_blank">Log Your Laravel Model Data Changes With Observers</a></li>
                                      </ul>
                                   </div>
                                </div>
                             </div>
                             <div class="modal-footer">
                                <button class="btn btn-info" onclick="removeModalForever($(this));" type="button" data-dismiss="modal">
                                Close
                                </button>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="col-xs-6">
                    <a class="btn btn-warning center-block pricingCall" href="#">
                    Install
                    </a>
                 </div>
              </div>
           </div>
        </div>

        <!------- COL ------>
        <div class="col-lg-3">
            <div class="well well-sm" style="border: 1px solid #cccccc;  background-color: #f9f9f9; color: #AAA ">
              <div style="float: right">
                 <i class="fa fa-5x fa-th-list"></i>
              </div>
              <a style="font-size: 16px; color: #333; text-decoration: underline" href="#" data-toggle="modal" data-target="#module-3-description">
              Module 2
              </a>
              <p class="margin-top-10">Logging of every action of every user - create/update/delete entries, with ability to see the logs in one list</p>
              <p class="margin-top-10"></p>
              <div class="row">
                 <div class="col-xs-8 col-md-5">
                    <b>Installs</b>: 0
                 </div>
                 <div class="col-xs-16 col-md-7 text-right">
                    <b>Created</b>: Jan 2019
                 </div>
              </div>
              <p></p>
              <div class="row">
                 <div class="col-xs-6">
                    <a class="btn btn-info center-block" href="#" data-toggle="modal" data-target="#module-3-description">
                    How it works
                    </a>
                    <div tabindex="-1" class="modal fade" id="module-3-description" role="dialog" aria-labelledby="module-3-descriptionLabel">
                       <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                             <div class="modal-header">
                                <button class="close" aria-label="Close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="module-3-descriptionLabel" style="color:#333;">User Logs</h4>
                             </div>
                             <div class="modal-body text-left">
                                <div class="row" style="color:#333;">
                                   <div class="col-xs-8 text-center">
                                      <div class="wrapper-yt">
                                         <div class="youtube" data-embed="-cWk7fGHp9o">
                                            <div class="play-button"></div>
                                            <img src="https://img.youtube.com/vi/-cWk7fGHp9o/sddefault.jpg">
                                         </div>
                                      </div>
                                   </div>
                                   <div class="col-xs-4">
                                      <h3>Description:</h3>
                                      Logging of every action of every user - create/update/delete entries, with ability to see the logs in one list
                                      <hr>
                                      <h3>How it works:</h3>
                                      <ul>
                                         <li><a href="https://quickadminpanel.com/pages/user-logs-module" target="_blank">Detailed module description</a></li>
                                         <li><a href="https://quickadminpanel.com/blog/log-your-laravel-model-data-changes-with-observers/" target="_blank">Log Your Laravel Model Data Changes With Observers</a></li>
                                      </ul>
                                   </div>
                                </div>
                             </div>
                             <div class="modal-footer">
                                <button class="btn btn-info" onclick="removeModalForever($(this));" type="button" data-dismiss="modal">
                                Close
                                </button>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="col-xs-6">
                    <a class="btn btn-warning center-block pricingCall" href="#">
                    Install
                    </a>
                 </div>
              </div>
           </div>
        </div>

        <!------- COL ------>
        <div class="col-lg-3">
            <div class="well well-sm" style="border: 1px solid #cccccc;  background-color: #f9f9f9; color: #AAA ">
              <div style="float: right">
                 <i class="fa fa-5x fa-th-list"></i>
              </div>
              <a style="font-size: 16px; color: #333; text-decoration: underline" href="#" data-toggle="modal" data-target="#module-3-description">
              Module 3
              </a>
              <p class="margin-top-10">Logging of every action of every user - create/update/delete entries, with ability to see the logs in one list</p>
              <p class="margin-top-10"></p>
              <div class="row">
                 <div class="col-xs-8 col-md-5">
                    <b>Installs</b>: 0
                 </div>
                 <div class="col-xs-16 col-md-7 text-right">
                    <b>Created</b>: Jan 2019
                 </div>
              </div>
              <p></p>
              <div class="row">
                 <div class="col-xs-6">
                    <a class="btn btn-info center-block" href="#" data-toggle="modal" data-target="#module-3-description">
                    How it works
                    </a>
                    <div tabindex="-1" class="modal fade" id="module-3-description" role="dialog" aria-labelledby="module-3-descriptionLabel">
                       <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                             <div class="modal-header">
                                <button class="close" aria-label="Close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="module-3-descriptionLabel" style="color:#333;">User Logs</h4>
                             </div>
                             <div class="modal-body text-left">
                                <div class="row" style="color:#333;">
                                   <div class="col-xs-8 text-center">
                                      <div class="wrapper-yt">
                                         <div class="youtube" data-embed="-cWk7fGHp9o">
                                            <div class="play-button"></div>
                                            <img src="https://img.youtube.com/vi/-cWk7fGHp9o/sddefault.jpg">
                                         </div>
                                      </div>
                                   </div>
                                   <div class="col-xs-4">
                                      <h3>Description:</h3>
                                      Logging of every action of every user - create/update/delete entries, with ability to see the logs in one list
                                      <hr>
                                      <h3>How it works:</h3>
                                      <ul>
                                         <li><a href="https://quickadminpanel.com/pages/user-logs-module" target="_blank">Detailed module description</a></li>
                                         <li><a href="https://quickadminpanel.com/blog/log-your-laravel-model-data-changes-with-observers/" target="_blank">Log Your Laravel Model Data Changes With Observers</a></li>
                                      </ul>
                                   </div>
                                </div>
                             </div>
                             <div class="modal-footer">
                                <button class="btn btn-info" onclick="removeModalForever($(this));" type="button" data-dismiss="modal">
                                Close
                                </button>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="col-xs-6">
                    <a class="btn btn-warning center-block pricingCall" href="#">
                    Install
                    </a>
                 </div>
              </div>
           </div>
        </div>

        <!------- COL ------>
        <div class="col-lg-3">
            <div class="well well-sm" style="border: 1px solid #cccccc;  background-color: #f9f9f9; color: #AAA ">
              <div style="float: right">
                 <i class="fa fa-5x fa-th-list"></i>
              </div>
              <a style="font-size: 16px; color: #333; text-decoration: underline" href="#" data-toggle="modal" data-target="#module-3-description">
              Module 4
              </a>
              <p class="margin-top-10">Logging of every action of every user - create/update/delete entries, with ability to see the logs in one list</p>
              <p class="margin-top-10"></p>
              <div class="row">
                 <div class="col-xs-8 col-md-5">
                    <b>Installs</b>: 0
                 </div>
                 <div class="col-xs-16 col-md-7 text-right">
                    <b>Created</b>: Jan 2019
                 </div>
              </div>
              <p></p>
              <div class="row">
                 <div class="col-xs-6">
                    <a class="btn btn-info center-block" href="#" data-toggle="modal" data-target="#module-3-description">
                    How it works
                    </a>
                    <div tabindex="-1" class="modal fade" id="module-3-description" role="dialog" aria-labelledby="module-3-descriptionLabel">
                       <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                             <div class="modal-header">
                                <button class="close" aria-label="Close" type="button" data-dismiss="modal"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="module-3-descriptionLabel" style="color:#333;">User Logs</h4>
                             </div>
                             <div class="modal-body text-left">
                                <div class="row" style="color:#333;">
                                   <div class="col-xs-8 text-center">
                                      <div class="wrapper-yt">
                                         <div class="youtube" data-embed="-cWk7fGHp9o">
                                            <div class="play-button"></div>
                                            <img src="https://img.youtube.com/vi/-cWk7fGHp9o/sddefault.jpg">
                                         </div>
                                      </div>
                                   </div>
                                   <div class="col-xs-4">
                                      <h3>Description:</h3>
                                      Logging of every action of every user - create/update/delete entries, with ability to see the logs in one list
                                      <hr>
                                      <h3>How it works:</h3>
                                      <ul>
                                         <li><a href="https://quickadminpanel.com/pages/user-logs-module" target="_blank">Detailed module description</a></li>
                                         <li><a href="https://quickadminpanel.com/blog/log-your-laravel-model-data-changes-with-observers/" target="_blank">Log Your Laravel Model Data Changes With Observers</a></li>
                                      </ul>
                                   </div>
                                </div>
                             </div>
                             <div class="modal-footer">
                                <button class="btn btn-info" onclick="removeModalForever($(this));" type="button" data-dismiss="modal">
                                Close
                                </button>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
                 <div class="col-xs-6">
                    <a class="btn btn-warning center-block pricingCall" href="#">
                   Install
                    </a>
                 </div>
              </div>
           </div>
        </div>

    </div>
        </div><!--box-->
    </div>
@endsection