<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <form action="{{ route('telebot.store') }}" method="post" class="form-horizontal">
        @csrf
        @method('post')
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Input Telegram</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="exampleInputBorder">Nama Bot</label>
                <input type="text" class="form-control form-control-border" name="nama_bot" id="exampleInputBorder" placeholder="masukkan Nama Bot Telegram">
            </div>
            <div class="form-group">
              <label for="exampleInputBorder">Token Bot</label>
              <input type="text" class="form-control form-control-border" name="bot_token" id="exampleInputBorder" placeholder="masukkan Token Bot">
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