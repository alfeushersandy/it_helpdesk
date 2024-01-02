@extends('admin.layouts.master')

@section('title')
    Setting Bot Telegram
@endsection

@section('breadcrumbs')
    Setting Bot Telegram
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
              @if ($telegram->count() == 0)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    Create New
                </button>  
              @endif
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="60%">Nama Bot</th>
                  <th>Bot Token</th>
                  <th>Action</th>
                </tr>
                </thead>
                <?php $i = 1; ?>
                <tbody>
                  @foreach ($telegram as $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->nama_lokasi}}</td>
                        <td>{{$item->status}}</td>
                        <td>. . . .</td>
                      </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  @include('admin.telegram.form')
@endsection