<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Diet Sehat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        label {
            display: block;
            margin-bottom: 0.5rem;
        }
        input, select, button {
            padding: 0.5rem;
            width: 100%;
            max-width: 300px;
            margin-bottom: 1rem;
        }
        .result, .disease-info {
            margin-top: 2rem;
            border-top: 1px solid #ccc;
            padding-top: 1rem;
        }
    </style>
</head>
<body>
    <h1>Rekomendasi Diet Sehat</h1>

    <!-- Form Input -->
    <form method="POST" action="/diet">
        @csrf
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="form-group">
            <label for="age">Usia:</label>
            <input type="number" id="age" name="age" value="{{ old('age') }}" required>
        </div>
        <div class="form-group">
            <label for="weight">Berat Badan (kg):</label>
            <input type="number" id="weight" name="weight" value="{{ old('weight') }}" required>
        </div>
        <div class="form-group">
            <label for="disease">Riwayat Penyakit:</label>
            <select id="disease" name="disease">
                <option value="Diabetes" {{ old('disease') == 'Diabetes' ? 'selected' : '' }}>Diabetes</option>
                <option value="Hipertensi" {{ old('disease') == 'Hipertensi' ? 'selected' : '' }}>Hipertensi</option>
                <option value="Jantung" {{ old('disease') == 'Jantung' ? 'selected' : '' }}>Jantung</option>
            </select>
        </div>
        <button type="submit">Dapatkan Rekomendasi</button>
    </form>

    <!-- Tampilkan Hasil Input Jika Ada -->
    @if ($data)
    <div class="result">
        <h2>Hasil Rekomendasi</h2>
        <ul>
            <li><strong>Nama:</strong> {{ $data['name'] }}</li>
            <li><strong>Usia:</strong> {{ $data['age'] }}</li>
            <li><strong>Berat Badan:</strong> {{ $data['weight'] }} kg</li>
            <li><strong>Riwayat Penyakit:</strong> {{ $data['disease'] }}</li>
        </ul>
    </div>
    @endif

    <!-- Tampilkan Data Penyakit Jika Dipilih -->
    @if (!empty($selectedDisease))
    <div class="disease-info">
        <h2>Informasi Penyakit: {{ $data['disease'] }}</h2>
        <p>{{ $selectedDisease['description'] }}</p>
        <h3>Rekomendasi:</h3>
        <ul>
            @foreach ($selectedDisease['recommendations'] as $recommendation)
                <li>{{ $recommendation }}</li>
            @endforeach
        </ul>
    </div>
    @endif

</body>
</html>
