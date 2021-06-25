<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Daftar Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  </head>
  <body>
  <table class="table table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Judul Buku</td>
                    <td>Penulis</td>
                    <td>Penerbit</td>
                    <td>Sampul Buku</td>
                </tr>
            </thead>
            <tbody>
                @foreach($buku as $buku)
                <tr>
                    <td>{{$buku->id}}</td>
                    <td>{{$buku->judul_buku}}</td>
                    <td>{{$buku->penulis}}</td>
                    <td>{{$buku->penerbit}}</td>
                    <td><img width="150px" src="data:image/png;base64, public_path{{ url('/data_file/'.$buku->img) }}"></td>
                </tr>
                @endforeach
            </tbody>
        </table>
  </body>
</html>