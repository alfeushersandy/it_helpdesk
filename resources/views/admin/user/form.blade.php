<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <form action="{{ route('users.store') }}" method="post" class="form-horizontal">
        @csrf
        @method('post')
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input User</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputBorder">Nama</label>
                <input type="text" class="form-control form-control-border" name="name" id="exampleInputBorder" placeholder="masukkan Nama">
            </div>
            <div class="form-group">
              <label for="exampleInputBorder">Username</label>
              <input type="text" class="form-control form-control-border" name="username" id="exampleInputBorder" placeholder="masukkan Username">
            </div>
            <div class="form-group">
              <label for="exampleInputBorder">Email</label>
              <input type="email" class="form-control form-control-border" name="email" id="exampleInputBorder" placeholder="masukkan email">
            </div>
            <div class="form-group">
              <label for="exampleInputBorder">password</label>
              <input type="password" class="form-control form-control-border" name="password" id="exampleInputBorder" placeholder="masukkan password">
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