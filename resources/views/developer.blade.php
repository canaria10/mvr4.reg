@extends('layouts.app')

@section('content')
<div class="content">
        <div class="flash-message">
          @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))
            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
            @endif
          @endforeach
        </div>
    <div class="col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">DATABASE : File Upload</h4>
                    </div>
                        <form style="margin-top: 15px;padding: 10px;" action="{{ url('/importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="file" name="import_file" /> <br />
                            <select name="description">
                                <option value="MVR Database">MVR DATABASE</option>
                                <option value="Gava Report">GAVA REPORT</option>
                            </select>
                            <br /> <br />
                            <button class="btn btn-primary">Import File</button>
                        </form>
                        <br />
                </div>
            </div>
    <div class="col-md-12">
                <div class="card">
                    <div class="header">
                         <h4 class="title">History : File Upload</h4>
                    </div>
                    <br />
                        <div style="margin-left: 3px; margin-right: 3px;">
                            <table id="tbrunner" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>File Name</th>
                                                <th>Description</th>
                                                <th>Date Stored</th>
                                            </tr>
                                        
                                        </thead>
                                        <tbody>
                                        <?php $i = 0; ?>
                                            @foreach($historyDB as $item)
                                                <tr>
                                                    <th>{{ ++$i }}</th>
                                                    <th>{{ $item->file_name }}</th>
                                                    <th>{{ $item->description }}</th>
                                                    <th>{{ $item->date_stored }}</th>
                                                </tr>
                                            @endforeach
                                        </tbody>
                            </table>
                        </div>
                </div>
    </div>


</div>
@endsection
