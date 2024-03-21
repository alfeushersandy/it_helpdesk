@extends('admin.layouts.master')

@section('title')
    Location Management
@endsection

@section('breadcrumbs')
    Location Managemen
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
                                <th width="60%">Location</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php $i = 1; ?>
                        <tbody>
                            @foreach ($lokasi as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->nama_lokasi }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        @if ($item->status == 'Active')
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#staticBackdrop1">
                                                Deactive
                                            </button>

                                            {{-- Active Modal --}}
                                            <div class="modal fade" id="staticBackdrop1" data-backdrop="static"
                                                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('lokasi.active', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h3>Are You Sure To Deactive This Location ?</h3>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-danger">Confirm</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#staticBackdrop">
                                                Active
                                            </button>

                                            {{-- Active Modal --}}
                                            <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <form action="{{ route('lokasi.active', $item->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Modal title
                                                                </h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h3>Are You Sure To Active This Location ?</h3>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Confirm</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </td>
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
    @include('admin.lokasi.form')
@endsection
