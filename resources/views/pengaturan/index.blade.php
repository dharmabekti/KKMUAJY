@extends('layouts.master')
@section('custom_css')

@endsection
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>PENGATURAN</h3><br>
              </div>
              <div class="title_left">
                <h3></h3><br>
              </div>
              <a href="{{ route('pengaturan.index') }}" class="btn btn-primary"><i class="fa fa-refresh"></i> Refresh</a>
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Program Studi</h2>
                    <ul class="nav navbar-right">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="{{ route('pengaturan.store_prodi') }}" files="true" method="post" class="form-horizontal form-label-left input_mask">
                      {{csrf_field()}}
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" name="nama_prodi" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Program Studi" required="" value="{{ old('nama_prodi')}}">
                        <span class="fa fa-file form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                        <input type="text" name="singkatan" class="form-control" id="inputSuccess2" placeholder="Singkatan" required="" value="{{ old('singkatan')}}">
                      </div>
                      <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                        <input type="text" name="nama_fakultas" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Fakultas" required="" value="{{ old('nama_fakultas')}}">
                        <span class="fa fa-file form-control-feedback left" aria-hidden="true"></span>
                      </div>

                      <div class="col-md-1 col-sm-1 col-xs-8 form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                      </div>
                      <div class="ln_solid"></div>
                    </form>
                  </div>
                  <div class="x_panel">
                    <div class="x_content">
                  @if($prodi->count())
                      <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <?php $no=1; ?>
                            <td align="center"><b>No.</b></td>
                            <td align="center"><b>Program Studi</b></td>
                            <td align="center"><b>Fakultas</b></td>
                            <td align="center"><b>Singkatan</b></td>
                            <td align="center"><b>Kontrol</b></td>
                          </tr>
                        </thead>
                        @foreach($prodi as $data)
                            <tr>
                              <td align="center" width = "20"> {{$no++}} </td>
                              <td>{{ $data->prodi_name }}</td>
                              <td>{{ $data->fakultas_name }}</td>
                              <td>{{ $data->singkatan }}</td>
                              <td align="center">
                                <form method="POST" action="{{ route('pengaturan.destroy_prodi', $data->id) }}" accept-charset="UTF-8">
                                  <input name="_method" type="hidden" value="DELETE">
                                  <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Yakin Ingin Menghapus Program Studi?');" value="Hapus">
                                </form>
                              </td>
                            </tr>
                        @endforeach
                      </table>
                    </div>
                    <!-- PAGINATION -->
                   {!! $prodi->links() !!}
                  @else
                    <p>Data Tidak Tersedia</p>
                    </div>
                  @endif
                </div>
              </div>

                <div class="x_panel">
                  <div class="x_title">
                    <h2>Jabatan (Role Pengguna)</h2>
                    <ul class="nav navbar-right">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="x_content">
                      <form action="{{ route('pengaturan.store_role') }}" files="true" method="post" class="form-horizontal form-label-left input_mask">
                        {{csrf_field()}}
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                          <input type="text" name="nama_role" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nama Role" required="" value="{{ old('nama_role')}}">
                          <span class="fa fa-file form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                          <input type="text" name="role_id" class="form-control" id="inputSuccess2" placeholder="Kode" required="" value="{{ old('role_id')}}">
                        </div>

                        <div class="col-md-1 col-sm-1 col-xs-8 form-group">
                          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                        </div>
                        <div class="ln_solid"></div>
                      </form>
                    </div>
                    <div class="x_panel">
                      <div class="x_content">
                    @if($role->count())
                        <table id="datatable" class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <?php $no=1; ?>
                              <td align="center"><b>No.</b></td>
                              <td align="center"><b>Kode</b></td>
                              <td align="center"><b>Nama Role</b></td>
                              <td align="center"><b>Kontrol</b></td>
                            </tr>
                          </thead>
                          @foreach($role as $data)
                              <tr>
                                <td align="center" width = "20"> {{$no++}} </td>
                                <td>{{ $data->role_id }}</td>
                                <td>{{ $data->role_name }}</td>
                                <td align="center">
                                  <form method="POST" action="{{ route('pengaturan.destroy_role', $data->id) }}" accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                      <input type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Yakin Ingin Menghapus Program Studi?');" value="Hapus">
                                  </form>
                                </td>
                              </tr>
                          @endforeach
                        </table>
                      </div>
                      <!-- PAGINATION -->
                     {!! $role->links() !!}
                    @else
                      <p>Data Tidak Tersedia</p>
                      </div>
                    @endif
                  </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Kategori Berkas PKM</h2>
                    <ul class="nav navbar-right">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <form action="{{ route('pengaturan.store_berkas') }}" files="true" method="post" class="form-horizontal form-label-left input_mask">
                      {{csrf_field()}}
                      <div class="col-md-9 col-sm-9 col-xs-12 form-group has-feedback">
                        <input type="text" name="nama_kategori" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nama Kategori" required="" value="{{ old('nama_kategori')}}">
                        <span class="fa fa-file form-control-feedback left" aria-hidden="true"></span>
                      </div>
                      <div class="col-md-1 col-sm-1 col-xs-8 form-group">
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
                      </div>
                      <div class="ln_solid"></div>
                    </form>
                  </div>
                  <div class="x_panel">
                    <div class="x_content">
                  @if($kategori_berkas->count())
                      <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                          <tr>
                            <?php $no=1; ?>
                            <td align="center"><b>No.</b></td>
                            <td align="center"><b>Nama Kategori Berkas</b></td>
                            <td align="center"><b>Kontrol</b></td>
                          </tr>
                        </thead>
                        @foreach($kategori_berkas as $data)
                            <tr>
                              <td align="center" width = "20"> {{$no++}} </td>
                              <td>{{ $data->nama_kategori }}</td>
                              <td align="center">
                                <form method="POST" action="{{ route('pengaturan.destroy_kategori', $data->id) }}" accept-charset="UTF-8">
                                  <input name="_method" type="hidden" value="DELETE">
                                  <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Yakin Ingin Menghapus Kategori Berkas?');" value="Hapus">
                                </form>
                              </td>
                            </tr>
                        @endforeach
                      </table>
                    </div>
                    <!-- PAGINATION -->
                   {!! $kategori_berkas->links() !!}
                  @else
                    <p>Data Tidak Tersedia</p>
                    </div>
                  @endif
                </div>
                </div>
              </div>


              <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Bidang PKM</h2>
                    <ul class="nav navbar-right">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <div class="form-group">
                      @if($bidang_pkm->count())
                          <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <?php $no=1; ?>
                                <td align="center"><b>No.</b></td>
                                <td align="center"><b>Singkatan</b></td>
                                <td align="center"><b>Bidang PKM</b></td>
                                <td align="center"><b>Kontrol</b></td>
                              </tr>
                            </thead>
                            @foreach($bidang_pkm as $data)
                                <tr>
                                  <td align="center" width = "20"> {{$no++}} </td>
                                  <td>{{ $data->singkatan }}</td>
                                  <td>{{ $data->bidang_pkm }}</td>
                                  <td align="center">
                                    <form method="POST" action="{{ route('pengaturan.aktifkan', $data->id) }}" accept-charset="UTF-8">
                                      <input name="_method" type="hidden" value="DELETE">
                                      <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                      @if($data->status == 1)
                                        <input type="submit" class="btn btn-success btn-xs" value="Aktif">
                                      @else
                                        <input type="submit" class="btn btn-danger btn-xs" value="Non">
                                      @endif
                                    </form>


                                  </td>
                                </tr>
                            @endforeach
                          </table>
                        </div>
                        <!-- PAGINATION -->
                       {!! $bidang_pkm->links() !!}
                      @else
                        <p>Data Tidak Tersedia</p>
                        </div>
                      @endif
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
@stop
@section('custom_script')

@endsection
