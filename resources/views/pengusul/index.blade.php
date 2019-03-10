@extends('layouts.master_peserta')
@section('custom_css')
<script>
  function asd(a){
    if(a==1){
      document.getElementById("asd").style.display="block";
      document.getElementById("ase").style.display="none";
      document.getElementById("asf").style.display="none";
    }
  }
</script>
@endsection
@section('content')
<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><b>IDENTITAS MAHASISWA PENGUSUL PKM</b></h3><br>
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
                    <h2>Ketua Pelaksana</h2>
                    <ul class="nav navbar-right">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
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


            <div class="row">
              <div class="col-md-12 col-xs-12">
                <div class="x_panel">
                  <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Proposal PKM</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Data Anggota</a>
                          </li>
                          <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Dosen Pembimbing</a>
                          </li>
                        </ul>
                        <div id="myTabContent" class="tab-content">

                          <!-- ===================== TAB 1 =============================== -->
                          <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                            <div class="x_content">
                              <br />
                              <form action="{{route('proposal.store')}}" method="post" class="form-horizontal form-label-left input_mask">
                                {{csrf_field()}}
                                <div class="col-md-6 col-sm-6 col-xs-6 form-group has-feedback">
                                  <input type="hidden" name="tahun_pengajuan" value="{{ date('Y') }}">
                                  <input type="hidden" name="tahun_pendanaan" value="{{ date('Y')+1 }}">
                                  <select name="bidang_pkm" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Bidang PKM">
                                    @foreach ($bidang_pkm as $data)
                                       <option value="{{ $data->id }}">{{ $data->bidang_pkm }} ({{ $data->singkatan }})</option>
                                    @endforeach
                                  </select>
                                  <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                  <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                              </form>
                            </div>
                            <div class="x_panel">
                              <div class="x_content">
                            @if($proposal->count())
                                <table id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <?php $no=1; ?>
                                      <td align="center"><b>No.</b></td>
                                      <td align="center"><b>Bidang PKM</b></td>
                                      <td align="center"><b>Judul PKM</b></td>
                                      <td align="center"><b>Berkas</b></td>
                                    </tr>
                                  </thead>
                                  @foreach($proposal as $data)
                                      <tr>
                                        <td align="center" width = "20"> {{$no++}} </td>
                                        <td width="150px">
                                          {!! Form::model($data, ['route'=>['proposal.update', $data->id], 'method'=> 'PATCH', 'files'=>true])  !!}
                                          <form>
                                            <select name="bidang_pkm" class="form-control" onChange="this.form.submit()">
                                              @foreach ($bidang_pkm as $data2)
                                                 <option value="{{ $data2->id }}" <?php if($data2->id == $data->bidang_pkm) echo "selected";?>>{{ $data2->singkatan }}</option>
                                              @endforeach
                                            </select>
                                        <td width="550px">
                                            <input type="text" name="judul_pkm" class="form-control" value="{{ $data->judul_pkm }}">
                                            <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-save"></i> Simpan</button><br>
                                            @if($data->review_formating == 1)
                                              <small>*) Review Formating</small><br>
                                            @endif
                                            @if($data->review_isi == 1)
                                              <small>*) Review Isi</small><br>
                                            @endif
                                            @if($data->review_formating != 1 && $data->review_isi != 1)
                                              <small>*) Belum Direview</small><br>
                                            @endif
                                          </form>
                                          {!! Form::close() !!}
                                        </td>
                                        <td align="center">
                                          @if(!$data->file_pkm == NULL)
                                            <a id="asf" target="_blank" href="{{ route('pengusul.read', $data->id) }}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Lihat</a>
                                          @endif
                                          @if($data->file_review != NULL || $data->file_review != "")
                                            <a target="_blank" href="{{ route('peserta.read_review', $data->id) }}" class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Review</a>
                                          @endif
                                          <button id="ase" onclick="asd(1)" class="btn btn-default btn-xs"><i class="fa fa-upload"></i> Upload</button><br>
                                          {!! Form::model($data, ['route'=>['pengusul.upload', $data->id], 'method'=> 'PATCH', 'files'=>true, 'id'=>'asd','style' => 'display:none;'])  !!}
                                          <form>
                                            <div class="form-group has-feedback {{ $errors->has('filePKM') ? 'has-error' : '' }}">
                                              <input type="file" name="filePKM" class="form-control" required=""/><br>
                                              {!! $errors->first('filePKM', '<p class="help-block">:message</p>') !!}
                                            </div>
                                            <button type="submit" class="btn btn-default btn-xs"><i class="fa fa-upload"></i> Upload</button>
                                          </form>
                                          {!! Form::close() !!}
                                        </td>
                                      </tr>
                                  @endforeach
                                </table>
                              </div>
                              <!-- PAGINATION -->
                             {!! $proposal->links() !!}
                            @else
                              <p>Silahkan Isi Bidang PKM Terlebih Dahulu</p>
                            @endif
                            </div>
                          </div>

                          <!-- ===================== TAB 2 =============================== -->
                          <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                            <div class="x_content">
                              <br>
                              @if(!empty($cek_proposal))
                              <form action="{{ route('pengusul.storeanggota') }}" method="post" class="form-horizontal form-label-left input_mask">
                                {{csrf_field()}}
                                <input type="hidden" name="id_proposal" value="{{ $proposal2->id }}">
                                <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                  <input type="text" name="fullname" class="form-control has-feedback-left" id="inputSuccess2" placeholder="Nama Lengkap" required=""/>
                                  <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                  <input type="text" name="npm" class="form-control" id="inputSuccess3" placeholder="NPM" required="" pattern="[0-9]{9}">
                                  <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                  <select id="middle-name" name="prodi" placeholder="Program Studi" class="form-control col-md-7 col-xs-12">
                                    @foreach ($prodi as $data)
                                       <option value="{{ $data->id }}">{{ $data->prodi_name }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                  <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                                <div class="ln_solid"></div>
                              </form>
                              @endif
                            </div>
                            <div class="x_panel">
                              <div class="x_content">
                            @if($anggota->count())
                                <table id="datatable" class="table table-striped table-bordered">
                                  <thead>
                                    <tr>
                                      <?php $no=1; ?>
                                      <td align="center"><b>No.</b></td>
                                      <td align="center"><b>Nama Lengkap</b></td>
                                      <td align="center"><b>NPM</b></td>
                                      <td align="center"><b>Prodi</b></td>
                                      <td align="center"><b>Kontrol</b></td>
                                    </tr>
                                  </thead>
                                  @foreach($anggota as $data)
                                      <tr>
                                        <td align="center" width = "20"> {{$no++}} </td>
                                        <td width="350px">{{ $data->fullname }}</td>
                                        <td width="150px">{{ $data->npm }}</td>
                                        <td width="200px">{{ $data->prodi['prodi_name'] }}</td>
                                        <td align="center">
                                          <form method="POST" action="{{ route('pengusul.destroy', $data->id) }}" accept-charset="UTF-8">
                                            <input name="_method" type="hidden" value="DELETE">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                              <input type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Anggota?');" value="Hapus">
                                          </form>
                                        </td>
                                      </tr>
                                  @endforeach
                                </table>
                              </div>
                              <!-- PAGINATION -->
                             {!! $anggota->links() !!}
                            @endif
                            </div>
                          </div>

                          <!-- ===================== TAB 3 =============================== -->
                          <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                            <div class="row">
                              <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="x_panel">
                                  <div class="x_content">
                                    <br>
                                  @if(!empty($cek_proposal))
                                  <form action="{{route('pengusul.storedosen')}}" method="post" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id_proposal" value="{{ $proposal2->id }}">
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama Lengkap Dosen Pembimbing
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="first-name" name="nama_dosen" required="required" placeholder="Nama Dosen Pembimbing" class="form-control col-md-7 col-xs-12" value="{{ $proposal2->dosen_pembimbing }}">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">NIDN</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="middle-name" placeholder="NIDN" class="form-control col-md-7 col-xs-12" type="text" name="nidn" value="{{ $proposal2->nidn }}">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Program Studi</label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="middle-name" name="prodi" placeholder="Program Studi" class="form-control col-md-7 col-xs-12">
                                          @foreach ($prodi as $data)
                                             <option value="{{ $data->id }}" <?php if($data->id == $proposal2->prodi_id) echo "selected";?>>{{ $data->prodi_name }}</option>
                                          @endforeach
                                        </select>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Alamat
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <textarea type="text" name="alamat" required="required" placeholder="Alamat" class="form-control col-md-7 col-xs-12">{{ $proposal2->alamat }}</textarea>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="email" required="required" placeholder="Email" class="form-control col-md-7 col-xs-12" value="{{ $proposal2->email }}">
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nomor Telp/HP
                                      </label>
                                      <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="no_telp" required="required" placeholder="Nomor Telp/HP" class="form-control col-md-7 col-xs-12" value="{{ $proposal2->no_telp }}">
                                      </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                      </div>
                                    </div>
                                  </form>
                                  @endif
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
