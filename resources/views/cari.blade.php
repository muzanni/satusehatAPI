<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cari Data Pasien</title>
  <!-- Menyertakan Bootstrap untuk styling -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <h2>Cari Data Pasien Berdasarkan NIK</h2>
    <form method="POST" action="{{ url('/pasien') }}">
        @csrf
      <div class="form-group">
        <label for="nik">Masukkan NIK:</label>
        <input type="number" name="nik" id="nik" class="form-control" placeholder="Contoh: 9104025209000006" required>
      </div>
      <button type="submit" class="btn btn-primary">Cari</button>
    </form>

    <br>

    <div>
        <p>Contoh Data  atau <a href="https://satusehat.kemkes.go.id/platform/docs/id/api-catalogue/onboardings/apis/patient/" target="_blank"> contoh data</a></p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>9271060312000001</td>
                    <td>Ardianto Putra</td>
                </tr>
                <tr>
                    <td>9104025209000006</td>
                    <td>Salsabilla Anjani Rizki</td>
                </tr>
            </tbody>
        </table>
    </div>
  </div>


  
</body>
</html>
