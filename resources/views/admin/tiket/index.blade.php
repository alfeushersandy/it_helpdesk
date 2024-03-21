@extends('admin.layouts.master')

@section('title')
    Ticket
@endsection

@section('breadcrumbs')
    Ticket
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
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>No Tiket</th>
                                    <th>tanggal</th>
                                    <th>client name</th>
                                    <th>lokasi</th>
                                    <th>Departemen</th>
                                    <th>Status</th>
                                    <th>User Appr</th>
                                    <th>Tgl Appr</th>
                                    <th>User Pelaksana</th>
                                    <th>Tgl Eksekusi</th>
                                    <th>Tgl Selesai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php $i = 1; ?>
                            <tbody>
                                @foreach ($tiket as $item)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $item->no_ticket }}</td>
                                        <td>{{ $item->tanggal }}</td>
                                        <td>{{ $item->client_name }}</td>
                                        <td>{{ $item->lokasi->nama_lokasi }}</td>
                                        <td>{{ $item->departemen->departemen }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->user_appr ? $item->userApprove->name : '' }}</td>
                                        <td>{{ $item->t_approve }}</td>
                                        <td>{{ $item->id_user }}</td>
                                        <td>{{ $item->t_excetion }}</td>
                                        <td>{{ $item->tgl_finish }}</td>
                                        <td>
                                            @if (!$item->user_appr && !$item->t_approve)
                                                <form action="{{ route('tiket.approve', $item->id) }}" method="post">
                                                    @csrf
                                                    <button type="submit">Approve</button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    @include('admin.tiket.form')
@endsection
