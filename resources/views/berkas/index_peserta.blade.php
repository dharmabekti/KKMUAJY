@extends('layouts.master_peserta')
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
                          <!-- <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Ketentuan</a></li> -->
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
                                          <a target="_blank" href="{{ route('berkas.read', $data->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-download"></i> Download</a>
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
                            <!--  -->
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
