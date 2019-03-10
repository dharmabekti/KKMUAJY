@extends('layouts.master_peserta')
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
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Account KKM</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">

                          <!-- ===================== TAB 1 =============================== -->
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_content">
                                    <br>
                                  <form action="{{route('pengusul.reset_password')}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                      <label class="col-xs-2" >Nama Depan</label>
                                      <div class="col-md-6 col-sm-6"><label>: {{ Auth::User()->first_name }}</label></div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2" for="last-name">Nama Belakang</label>
                                      <div class="col-md-6 col-sm-6"><label>: {{ Auth::User()->last_name }}</label></div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2" for="last-name">Jenis Kelamin</label>
                                      <div class="col-md-6 col-sm-6"><label>:
                                        @if(Auth::User()->gender == "L")
                                          Laki-Laki
                                        @else
                                          Perempuan
                                        @endif
                                      </label></div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2" for="last-name">NPM</label>
                                      <div class="col-md-6 col-sm-6"><label>: {{ Auth::User()->npm }}</label></div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2" for="last-name">Program Studi</label>
                                      <div class="col-md-6 col-sm-6"><label>: {{ Auth::User()->prodi['prodi_name'] }}</label></div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2" for="last-name">Fakultas</label>
                                      <div class="col-md-6 col-sm-6"><label>: {{ Auth::User()->prodi['fakultas_name'] }}</label></div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2" for="last-name">Tanggal Lahir</label>
                                      <div class="col-md-6 col-sm-6"><label>: {{ Auth::User()->born_date }}</label></div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2" for="last-name">Email</label>
                                      <div class="col-md-6 col-sm-6"><label>: {{ Auth::User()->email }}</label></div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2" for="last-name">Username</label>
                                      <div class="col-md-6 col-sm-6"><label>: {{ Auth::User()->username }}</label></div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2" for="last-name">Alamat</label>
                                      <div class="col-md-6 col-sm-6"><label>: {{ Auth::User()->address }}</label></div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2" for="last-name">Nomor HP</label>
                                      <div class="col-md-6 col-sm-6"><label>: {{ Auth::User()->contact_number }}</label></div>
                                    </div>
                                    <div class="form-group">
                                      <label class="col-xs-2" for="last-name">Id Line</label>
                                      <div class="col-md-6 col-sm-6"><label>: {{ Auth::User()->line_id }}</label></div>
                                    </div>

                                    <div class="form-group">
                                      <label class="col-xs-2" for="first-name">Password
                                      </label>
                                      <div class="col-md-6 col-sm-6">
                                        <input type="password" id="first-name" name="password_dikti" required="required" placeholder="Password Simbelmawa" class="form-control col-md-7 col-xs-12" value="{{ Auth::User()->password }}">
                                      </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Reset Password</button>
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
