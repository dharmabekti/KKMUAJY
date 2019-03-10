@extends('layouts.master')
@section('custom_css')

@endsection
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><b>BERKAS-BERKAS PKM</b></h3><br>
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
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Berkas PKM</a></li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Ketentuan</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">

                          <!-- ===================== TAB 1 =============================== -->
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <div class="x_content">
                              <br />
                              {!! Form::open(['action'=>'BerkasController@store', 'files'=>true]) !!}
                              <form action="{{ route('berkas.store') }}" files="true" method="post" class="form-horizontal form-label-left input_mask">
                                {{csrf_field()}}
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                  <input type="text" name="nama_berkas" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nama Berkas" required="" value="{{ old('nama_berkas')}}">
                                  <span class="fa fa-file form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback {{ $errors->has('filePKM') ? 'has-error' : '' }}">
                                  <input type="file" name="filePKM" class="form-control" required=""/><br>
                                  {!! $errors->first('filePKM', '<p class="help-block">:message</p>') !!}
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                  <select id="middle-name" name="kategori_berkas" placeholder="Kategori" class="form-control col-md-7 col-xs-12">
                                    @foreach ($kategori as $data)
                                       <option value="{{ $data->id }}">{{ $data->nama_kategori }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-12 form-group has-feedback">
                                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                                <div class="ln_solid"></div>
                              </form>
                              {!! Form::close() !!}
                            </div>
                            <div class="x_panel">
                              <div class="x_content">
                            @if($berkas->count())
                                <table id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <?php $no=1; ?>
                                      <td align="center"><b>No.</b></td>
                                      <td align="center"><b>Nama Berkas</b></td>
                                      <td align="center"><b>Kategori</b></td>
                                      <td align="center"><b>Kontrol</b></td>
                                    </tr>
                                  </thead>
                                  @foreach($berkas as $data)
                                      <tr>
                                        <td align="center" width = "20"> {{$no++}} </td>
                                        <td width="400px">{{ $data->nama_file }}</td>
                                        <td width="200px">{{ $data->kat_berkas['nama_kategori'] }}</td>
                                        <td align="center">
                                          <form method="POST" action="{{ route('berkas.destroy', $data->id) }}" accept-charset="UTF-8">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <a target="_blank" href="{{ route('berkas.read', $data->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-download"></i> Download</a>
                                            <input type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Berkas?');" value="Hapus">
                                          </form>
                                        </td>
                                      </tr>
                                  @endforeach
                                </table>
                              </div>
                              <!-- PAGINATION -->
                             {!! $berkas->links() !!}
                            @else
                              <p>Berkas Tidak Tersedia</p>
                              </div>
                            @endif
                            </div>
                          </div>

                          <!-- ===================== TAB 2 =============================== -->
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <div class="x_content">
                              <br />
                              <form action="{{ route('berkas.ketentuan') }}" method="post" class="form-horizontal form-label-left input_mask">
                                {{csrf_field()}}
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                  <label>Ketentuan PKM</label>
                                  <textarea type="text" name="ketentuan" class="form-control has-feedback-left" id="inputSuccess2" rows="15" placeholder="Ketentuan PKM">{{ $ketentuan_temp }}</textarea>
                                  <span class="fa fa-file form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-1 col-sm-1 col-xs-12 form-group has-feedback">
                                  <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                                <div class="ln_solid"></div>
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
@section('custom_script')

@endsection
