@extends('layouts.master_peserta')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><b>ACCOUNT SIMBELMAWA</b></h3><br>
              </div>

              <div class="title_right">
                <!--  -->
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Berikut adalah account Simbelmawa <small>yang akan digunakan untuk upload Proposal PKM ke Dikti:</small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br/>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <label class="col-xs-2" for="first-name">Username</label>
                        <div class="col-xs-2">
                          <label class="col-md-6 col-sm-6" for="last-name">: {{ Auth::User()->username_dikti }}</label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-xs-2" for="last-name">Password</label>
                        <div class="col-xs-2">
                          <label class="col-md-6 col-sm-6" for="last-name">: {{ Auth::User()->password_dikti }}</label>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
                  </div>
                </div>

  <!-- /page content -->
@stop
