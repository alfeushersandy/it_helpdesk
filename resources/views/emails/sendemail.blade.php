<!DOCTYPE html>
<html>
<head>
    <title>helpdesk.armadahadagraha.com</title>
</head>
<body>
    <p>Halo {{ $data['name'] }} <br>
    Terima kasih telah menghubungi kami<br>
    Laporan Anda akan segera kami proses
    Berikut detail laporan anda: <br><br>
    {!! $data['body'] !!}
    <br><br>
    Kami akan selalu update progress melalui email ini<br><br>
    Terima kasih<br>
    Administrator<br>
    IT-Helpdesk AHG</p>
</body>
</html>