<!DOCTYPE html>
<html lang="en">
  <head>
		<title>AHG | Helpdesk</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
		<link rel="stylesheet" href="../../dist/css/main.css">
		<!-- Select2 -->
		<link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
  	<link rel="stylesheet" href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	</head>
<body class="">

  <!-- Wrapper -->
    <div id="wrapper">

      <!-- Main -->
        <div id="main">
          <div class="inner">

            <!-- Header -->
              <header id="header">
                <a href="" class="logo"><strong>IT-Helpdesk</strong> AHG</a>
              </header>

            <!-- Content -->
              <section>
                <!-- Elements -->
                  <div class="row gtr-200">
                    <div class="col-6 col-12-medium">
                      <!-- FLASH DATA -->
                                              <!-- END FLASH DATA -->
                        <form action="{{route('tiket.store')}}" method="post" accept-charset="utf-8">
                          @csrf
                          @method('post')
                          <div class="row gtr-uniform">
                            <div class="col-12">
                              <input type="text" name="client_name" id="name" value="" placeholder="Nama" required="">
                            </div>
                            <div class="col-12">
                              <input type="email" name="email" id="email" value="" placeholder="Email" required="">
                            </div>
                            <!-- Break -->
                            <div class="col-12">
                              <select name="id_lokasi" id="location" required="">
                                <option value="">- Choose Location -</option>
                                @foreach ($lokasi as $item)
                                  <option value="{{$item->nama_lokasi}}">{{$item->nama_lokasi}}</option>
                                @endforeach
                              </select>
                            </div>
                            <div class="col-12">
                              <select name="id_departemen" id="department" required="">
                                <option value="">- Choose Department -</option>
                                @foreach ($departemen as $item)
                                <option value="{{$item->departemen}}">{{$item->departemen}}</option>
                                @endforeach
                              </select>
                            </div>
                            <!-- Break -->
                            <div class="col-12">
                              <textarea name="problem" id="message" placeholder="Enter your Problem" rows="6" required=""></textarea>
                            </div>
                            <!-- Break -->
                            <div class="col-12">
                              <ul class="actions">
                                <li><input type="submit" value="Send Message" class="primary"></li>
                                <li><input type="reset" value="Reset"></li>
                              </ul>
                            </div>
                          </div>
                        </form>

                    </div>
                  </div>

              </section>

          </div>
        </div>


    </div>
    <!-- alert -->
    @include('sweetalert::alert')
  <!-- Scripts -->
    <script src="https://rickety-analogs.000webhostapp.com/asset/html5/assets/js/jquery.min.js"></script>
    <script src="https://rickety-analogs.000webhostapp.com/asset/html5/assets/js/browser.min.js"></script>
    <script src="https://rickety-analogs.000webhostapp.com/asset/html5/assets/js/breakpoints.min.js"></script>
    <script src="https://rickety-analogs.000webhostapp.com/asset/html5/assets/js/util.js"></script>
    <script src="https://rickety-analogs.000webhostapp.com/asset/html5/assets/js/main.js"></script>
    <!-- Select2 -->
    <script src="../../plugins/select2/js/select2.full.min.js"></script>

    <script type="text/javascript">
      // Division
      $(document).ready(function() {
        $("#division").select2({
          ajax: {
            url: 'https://rickety-analogs.000webhostapp.com/welcome/getdiv',
            type: "post",
            dataType: 'json',
            delay: 200,
            data: function(params) {
              return {
                searchTerm: params.term
              };
            },
            processResults: function(response) {
              return {
                results: response
              };
            },
            cache: true
          }
        });
      });
  
      // Kabupaten
      $("#division").change(function() {
        var id_div = $("#division").val();
        $("#category").select2({
          ajax: {
            url: 'https://rickety-analogs.000webhostapp.com/welcome/getcat/' + id_div,
            type: "post",
            dataType: 'json',
            delay: 200,
            data: function(params) {
              return {
                searchTerm: params.term
              };
            },
            processResults: function(response) {
              return {
                results: response
              };
            },
            cache: true
          }
        });
      });
    </script>
</body>
</html>