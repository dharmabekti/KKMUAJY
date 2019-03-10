@extends('layouts.master')
@section('custom_css')

@endsection
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><b>PENGATURAN ACCOUNT PENGUSUL</b></h3><br>
              </div>

              <div class="title_right">
                <!--  -->
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Account SIMBELMAWA</a></li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Account KKM</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">

                          <!-- ===================== TAB 1 =============================== -->
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_content">
                                    <br>
                                  <form action="{{route('peserta.setting_store')}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id_pengusul" value="{{ $peserta->id_pengusul }}">
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pengusul
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" placeholder="Nama Depan" class="form-control col-md-7 col-xs-12" value="{{ $peserta->pengusul['first_name'] }} {{ $peserta->pengusul['last_name'] }} / {{ $peserta->pengusul['npm'] }}">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username Dikti
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="username_dikti" required="required" placeholder="Username Simbelmawa" class="form-control col-md-7 col-xs-12" value="{{ $peserta->pengusul['username_dikti'] }}">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password Dikti
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="password_dikti" required="required" placeholder="Password Simbelmawa" class="form-control col-md-7 col-xs-12" value="{{ $peserta->pengusul['password_dikti'] }}">
                                      </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                        <button class="btn btn-primary" type="reset"><i class="fa fa-refresh"></i> Reset</button>
                                        <a href="{{ route('peserta.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                      </div>
                                    </div>
                                  </form>
                                  </div>
                              </div>
                            </div>
                          </div>
                          </div>

                          <!-- ===================== TAB 2 =============================== -->
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_content">
                                    <br>
                                  <form action="{{route('peserta.reset_password')}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id_pengusul" value="{{ $peserta->id_pengusul }}">
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Pengusul
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" required="required" placeholder="Nama Depan" class="form-control col-md-7 col-xs-12" value="{{ $peserta->pengusul['first_name'] }} {{ $peserta->pengusul['last_name'] }} / {{ $peserta->pengusul['npm'] }}">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Username
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="username" required="required" placeholder="Username KKM" class="form-control col-md-7 col-xs-12" value="{{ $peserta->pengusul['username'] }}">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="password" required="required" placeholder="Password KKM" class="form-control col-md-7 col-xs-12">
                                      </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Reset Password</button>
                                        <a href="{{ route('peserta.index') }}" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                                      </div>
                                    </div>
                                  </form>
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
        </div>
<!-- /page content -->
@stop
