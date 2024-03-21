<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="{{ route('tiket.store') }}" method="post" class="form-horizontal">
            @csrf
            @method('post')
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Input Ticket</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputBorder">Tanggal</label>
                        <input type="date" class="form-control form-control-border" name="tanggal"
                            id="exampleInputBorder">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Nama</label>
                        <input type="text" class="form-control form-control-border" name="client_name"
                            id="exampleInputBorder" placeholder="masukkan Nama Client">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">email</label>
                        <input type="email" class="form-control form-control-border" name="email"
                            id="exampleInputBorder" placeholder="masukkan Nama Client">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">No HP</label>
                        <input type="text" class="form-control form-control-border" name="client_no_hp"
                            id="exampleInputBorder" placeholder="masukkan Nama Client">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Lokasi</label>
                        <select class="custom-select form-control-border" id="exampleSelectBorder" name="id_lokasi">
                            @foreach ($lokasi as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_lokasi }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Departemen</label>
                        <select class="custom-select form-control-border" id="exampleSelectBorder" name="id_departemen">
                            @foreach ($departemen as $item)
                                <option value="{{ $item->id }}">{{ $item->departemen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputBorder">Keluhan</label>
                        <textarea class="form-control" rows="3" name="problem"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
