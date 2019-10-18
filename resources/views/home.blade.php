@extends('layouts.app')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Home
                    <div class="btn-group">
                        <button class="btn btn-success btn-sm" type="button">
                            Export
                        </button>
                        <button type="button" class="btn btn-sm btn-success dropdown-toggle dropdown-toggle-split"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="sr-only">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('export.file',['type'=>'xlsx']) }}">Excel XLSX</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('export.file',['type'=>'csv']) }}">CSV</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('export.file',['type'=>'tsv']) }}">TSV</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('export.file',['type'=>'ods']) }}">ODS</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('export.file',['type'=>'xls']) }}">Excel XLS</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('export.pdf') }}">PDF</a>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#importExcel"  data-toggle="tooltip" data-placement="right" title="Tipe file xlsx,xls,csv">
                        Import
                    </button>
                    tipe file : xls, xlsx, csv
                </div>

                @if ($errors->any())
                <div class="alert alert-danger alert-block">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if ($sukses = Session::get('sukses'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $sukses }}</strong>
                </div>
                @endif

                <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form method="post" action="{{ url('/import_excel') }}" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                                </div>
                                <div class="modal-body">
                                    @csrf

                                    <label>Pilih file excel</label>
                                    <div class="form-group">
                                        <input type="file" name="file" required="required">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama</th>
                                <th>Nomor HP</th>
                                <th>Tanggal Lahir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataSiswa as $siswa)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $siswa->nama }}</td>
                                <td>{{ $siswa->nomor_hp }}</td>
                                <td>{{ $siswa->tanggal_lahir }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });

</script>
@endpush
