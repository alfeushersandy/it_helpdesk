<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <form action="{{ route('lokasi.store') }}" method="post" class="form-horizontal">
        @csrf
        @method('post')
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input Lokasi</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputBorder">Nama Lokasi</label>
                <input type="text" class="form-control form-control-border" name="nama_lokasi" id="exampleInputBorder" placeholder="masukkan Nama Lokasi">
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