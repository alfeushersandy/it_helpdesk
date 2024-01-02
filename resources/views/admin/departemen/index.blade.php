@extends('admin.layouts.master')

@section('title')
    Departement Management
@endsection

@section('breadcrumbs')
    Departemen Managemen
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                    Create New
                </button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="5%">No.</th>
                  <th width="60%">Departemen</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <?php $i = 1; ?>
                <tbody>
                  @foreach ($departemen as $item)
                      <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->departemen}}</td>
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
  @include('admin.departemen.form')
@endsection