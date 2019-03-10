@extends('layouts.master')
@section('custom_css')

@endsection
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><b>PENGATURAN ACCOUNT PENGGUNA</b></h3><br>
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
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Perbarui Profil</a></li>
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

                        <!-- ===================== TAB 2 =============================== -->
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <form action="{{route('pengusul.store')}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            {{csrf_field()}}
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Depan
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="first_name" required="required" placeholder="Nama Depan" class="form-control col-md-7 col-xs-12" value="{{ Auth::User()->first_name }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Belakang
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="last_name" required="required" placeholder="Nama Belakang" class="form-control col-md-7 col-xs-12" value="{{ Auth::User()->last_name }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">NPM</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="middle-name" placeholder="NPM" class="form-control col-md-7 col-xs-12" type="text" name="npm" value="{{ Auth::User()->npm }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Program Studi</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="middle-name" name="prodi" placeholder="Program Studi" class="form-control col-md-7 col-xs-12">
                                  @foreach ($prodi as $data)
                                     <option value="{{ $data->id }}" <?php if($data->id == Auth::User()->prodi_id) echo "selected";?>>{{ $data->prodi_name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <div id="gender" class="btn-group">
                                  <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="gender" value="L" <?php if(Auth::User()->gender == "L") echo "checked"; ?>> &nbsp; Laki-Laki &nbsp;
                                  </label>
                                  <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                    <input type="radio" name="gender" value="P" <?php if(Auth::User()->gender == "P") echo "checked"; ?>> Perempuan
                                  </label>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Tanggal Lahir</label>
                              <div class="col-md-3 col-sm-3 col-xs-6">
                                <input type="date" name="born_date" class="date-picker form-control col-md-7 col-xs-12" required="required" value="{{ Auth::User()->born_date }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="text" name="address" required="required" placeholder="Alamat" class="form-control col-md-7 col-xs-12">{{ Auth::User()->address }}</textarea>
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="username" placeholder="Username" required="required" class="form-control col-md-7 col-xs-12" value="{{ Auth::User()->username }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="email" required="required" placeholder="Email" class="form-control col-md-7 col-xs-12" value="{{ Auth::User()->email }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Telepon</label>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="contact_number" required="required" placeholder="Nomor Telepon" class="form-control col-md-7 col-xs-12" value="{{ Auth::User()->contact_number }}">
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" name="line_id" placeholder="Id Line" class="form-control col-md-7 col-xs-12" value="{{ Auth::User()->line_id }}">
                              </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="form-group">
                              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
      						              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                <button class="btn btn-primary" type="reset"><i class="fa fa-refresh"></i> Reset</button>
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
<!-- /page content -->
@stop
