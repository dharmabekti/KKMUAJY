@extends('layouts.master')
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><b>EDIT PENGGUNA</b></h3><br>
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
                    <h2>{{ ucfirst($pengguna->first_name) }} {{ ucfirst($pengguna->last_name) }}</h2>
                    <ul class="nav navbar-right">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    {!! Form::model($pengguna, ['route'=>['pengguna.update', $pengguna->id], 'method'=> 'PATCH', 'id'=>'demo-form2', 'data-parsley-validate class'=>'form-horizontal form-label-left'])  !!}
                    <form>
                      {{csrf_field()}}
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Depan
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first-name" name="first_name" required="required" placeholder="Nama Depan" class="form-control col-md-7 col-xs-12" value="{{ $pengguna->first_name }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Belakang
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last-name" name="last_name" required="required" placeholder="Nama Belakang" class="form-control col-md-7 col-xs-12" value="{{ $pengguna->last_name }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">NPM</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="middle-name" placeholder="NPM" class="form-control col-md-7 col-xs-12" type="text" name="npm" value="{{ $pengguna->npm }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Program Studi</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="middle-name" name="prodi" placeholder="Program Studi" class="form-control col-md-7 col-xs-12">
                            @foreach ($prodi as $data)
                               <option value="{{ $data->id }}" <?php if($data->id == $pengguna->prodi_id) echo "selected";?>>{{ $data->prodi_name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Role Pengguna</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="middle-name" name="role" placeholder="Role Pengguna" class="form-control col-md-7 col-xs-12">
                            @foreach ($role as $data)
                               <option value="{{ $data->role_id }}" <?php if($data->role_id == $pengguna->role_id) echo "selected";?>>{{ $data->role_name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Jenis Kelamin</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <div id="gender" class="btn-group">
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="L" <?php if($pengguna->gender == "L") echo "checked"; ?>> &nbsp; Laki-Laki &nbsp;
                            </label>
                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                              <input type="radio" name="gender" value="P" <?php if($pengguna->gender == "P") echo "checked"; ?>> Perempuan
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
                          <textarea type="text" name="address" required="required" placeholder="Alamat" class="form-control col-md-7 col-xs-12">{{ $pengguna->address }}</textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="email" required="required" placeholder="Email" class="form-control col-md-7 col-xs-12" value="{{ $pengguna->email }}">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Telepon</label>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" name="contact_number" required="required" placeholder="Nomor Telepon" class="form-control col-md-7 col-xs-12" value="{{ $pengguna->contact_number }}">
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12">
                          <input type="text" name="line_id" placeholder="Id Line" class="form-control col-md-7 col-xs-12" value="{{ $pengguna->line_id }}">
                        </div>
                      </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						              <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                          <a href="{{ route('pengguna.index') }}" class="btn btn-danger"><i class="fa fa-remove"></i> Batal</a>
                        </div>
                      </div>
                    </form>
                    {!! Form::close() !!}
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- /page content -->
@stop
