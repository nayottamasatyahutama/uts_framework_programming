@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 style="text-align: center; margin-bottom: 40px; margin-top: 40px;">Tambah Buku</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="/upload/proses" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
              <label for="first_name">Judul Buku:</label>
              <input type="text" class="form-control" name="judul_buku"/>
          </div>
          <div class="form-group">
              <label for="last_name">Penulis:</label>
              <input type="text" class="form-control" name="penulis"/>
          </div>
          <div class="form-group">
              <label for="email">Penerbit:</label>
              <input type="text" class="form-control" name="penerbit"/>
          </div> 
          <div class="form-group">
						<b>Unggah hasil pindai (scan) sampul buku</b><br/>
						<input type="file" name="img">
					</div>
          <div style="align-items: center; justify-content: center; flex: 1; flex-direction: row; display: flex; margin-top: 60px;">
            <button type="submit" class="btn btn-primary" style="width: 300px;">Tambah</button>
          </div>
      </form>
  </div>
</div>
</div>
@endsection