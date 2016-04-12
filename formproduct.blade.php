<!DOCTYPE html>
<head>
<title>Tambah Barang</title>
<script src="{{ url('assets/js/jquery/jquery-2.2.0.min.js') }}"></script>
<style>
#model
{
margin: 60px;
padding: 20px;
}
table {width:100%;}
</style>
</head>
<body>
<center><h1><u>FORMOLIR PENAMBAHAN BARANG</u></h1></center>
<div id="model">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="alert alert-danger" style="display:none; background-color:red; color:white;"></div>
<div class="alert alert-success" style="display:none;"></div>
<form class="formproduct" action="{{ url('hasil') }}" method="post">
	<table>
	<tr>
		<td>Nama Barang</td>
		<td>:</td>
		<td><input type="text" name="nama" size="25"></td>
	</tr>
	<tr>
		<td>Jenis Kategori</td>
		<td>:</td>
		<td>
      <input type="radio" name="jk" value="Pakaian">Pakaian
		  <input type="radio" name="jk" value="Elektronik">Elektronik
      <input type="radio" name="jk" value="Properti">Properti
      <input type="radio" name="jk" value="Handphone">Handphone
      <input type="radio" name="jk" value="Fashion dan Aksesoris">Fashion dan Aksesoris
      <input type="radio" name="jk" value="Mainan">Mainan
      <input type="radio" name="jk" value="ATK">Alat Tulis Kantor
    </td>
	</tr>
  <tr>
		<td>Kondisi</td>
		<td>:</td>
		<td>
      <input type="radio" name="kondisi" value="Baru">Baru
      <input type="radio" name="kondisi" value="Bekas">Bekas
    </td>
	</tr>
	<tr>
		<td>Harga</td>
		<td>:</td>
		<td><input type="text" name="harga" ></td>
	</tr>
  <tr>
		<td>Keterangan</td>
		<td>:</td>
		<td><textarea name="ket" rows="10" cols="50" placeholder="Isi keterangan produk disini"></textarea>
    </td>
	</tr>
	<table>
<br>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="submit" value="Tambahkan">
</form>
</div>
</body>
<script type="text/javascript">
 $.ajaxSetup({
  headers: {
   'X-CSRF-TOKEN': $('input[name="_token"]').val()
  }
 });
</script>
<script type="text/javascript">
  $(document).ready(function(){

    $('.formproduct').submit(function(event){
      event.preventDefault();
      var data = $('.formproduct').serializeArray();
      $.ajax({
        url : "{{url('formproduct/ajax_validate')}}",
        method : 'POST',
        data : data,
        success : function(response) {
          if (response.status == 'error') {
            var html_error = '';
            html_error += '<ul>';
            $.each(response.message, function (error_key, error_message){
              html_error += error_key;
              $.each(error_message, function (message){
                html_error += '<li>'+ this +'</li>';
              });
            });
            html_error += '</ul>';
            $('.alert-danger').html(html_error);
            $('.alert-danger').show();
          } else {
            $('.alert-success').html('Validasi sudah berhasil');
            $('.alert-success').show();
          }
        }
      });
    });

  });
</script>
</html>
