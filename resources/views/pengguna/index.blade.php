@extends('layouts.master')
@section('custom_css')

@endsection
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><b>DAFTAR PENGGUNA</b></h3><br>
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
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Daftar Pengguna</a></li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Pengguna Baru</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">

                        <!-- ===================== TAB 1 =============================== -->
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <div class="x_content">
                            <br />
                            <!--  -->
                          </div>
                          <div class="x_panel">
                            <div class="x_content">
                          @if($pengguna->count())
                              <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                  <tr>
                                    <?php $no=1; ?>
                                    <td align="center"><b>No.</b></td>
                                    <td align="center"><b>Nama Depan</b></td>
                                    <td align="center"><b>Nama Belakang</b></td>
                                    <td align="center"><b>NPM / NIDN</b></td>
                                    <td align="center"><b>Role</b></td>
                                    <td align="center"><b>Kontrol</b></td>
                                  </tr>
                                </thead>
                                @foreach($pengguna as $data)
                                    <tr>
                                      <td align="center" width = "20"> {{$no++}} </td>
                                      <td width="200px">{{ ucfirst($data->first_name) }}</td>
                                      <td width="200px">{{ ucfirst($data->last_name) }}</td>
                                      <td width="100px">{{ $data->npm }}</td>
                                      <td width="200px">{{ $data->role['role_name'] }}</td>
                                      <td align="center">
                                        <form method="POST" action="{{ route('pengguna.destroy', $data->id) }}" accept-charset="UTF-8">
                                          <input name="_method" type="hidden" value="DELETE">
                                          <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <a href="{{ route('pengguna.detail', $data->id) }}" class="btn btn-default btn-xs"><i class="fa fa-info-circle"></i> Detail</a>
                                            <a href="{{ route('pengguna.edit', $data->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                            <input type="submit" class="btn btn-warning btn-xs" onclick="return confirm('AApakah Yakin Ingin Menghapus Data Pengguna?');" value="Hapus">
                                        </form>
                                      </td>
                                    </tr>
                                @endforeach
                              </table>
                            </div>
                            <!-- PAGINATION -->
                           {!! $pengguna->links() !!}
                          @else
                            <p>Silahkan Isi Bidang PKM Terlebih Dahulu</p>
                          @endif
                          </div>
                        </div>

                        <!-- ===================== TAB 2 =============================== -->
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <form action="{{route('pengguna.store')}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            {{csrf_field()}}
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Depan
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="first-name" name="first_name" required="required" placeholder="Nama Depan" class="form-control col-md-7 col-xs-12" value="{{ old('first_name') }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nama Belakang
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="last-name" name="last_name" required="required" placeholder="Nama Belakang" class="form-control col-md-7 col-xs-12" value="{{ old('last_name') }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">NPM / NIDN</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="middle-name" placeholder="NPM" class="form-control col-md-7 col-xs-12" type="text" name="npm" value="{{ old('npm') }}">
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Program Studi</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="middle-name" name="prodi" placeholder="Program Studi" class="form-control col-md-7 col-xs-12">
                                  @foreach ($prodi as $data)
                                     <option value="{{ $data->id }}">{{ $data->prodi_name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="middle-name" name="role" placeholder="Program Studi" class="form-control col-md-7 col-xs-12">
                                  @foreach ($role as $data)
                                     <option value="{{ $data->role_id }}">{{ $data->role_name }}</option>
                                  @endforeach
                                </select>
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
