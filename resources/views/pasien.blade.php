<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Pasien</title>
  <!-- Menyertakan Bootstrap untuk styling -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center">
      <h2>Data Pasien</h2>
      <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Halaman Cari</a>
    </div>
    <br>

    @if(isset($patientData['entry']) && count($patientData['entry']) > 0)
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>ID Pasien</th>
            <th>IHS Number</th>
            <th>NIK</th>
            <th>Nama</th>            
          </tr>
        </thead>
        <tbody>
          @foreach($patientData['entry'] as $entry)
            @php  

              $patient = $entry['resource'] ?? [];              
              $patientId = $patient['id'] ?? '-';              
                            
              $ihsNumber = $patient['identifier'][0]['value'];
              $nik = $patient['identifier'][1]['value'];                        
              $name = $patient['name'][0]['text'];              
            @endphp
            <tr>
              <td>{{ $patientId }}</td>
              <td>{{ $ihsNumber }}</td>
              <td>{{ $nik }}</td>
              <td>{{ $name }}</td>              
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <p>Tidak ada data pasien.</p>
    @endif
  </div>
</body>
</html>
