<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::match(['get', 'post'], '/diet', function (Request $request) {
    // Data statis penyakit
    $diseases = [
        'Diabetes' => [
            'description' => 'Diabetes adalah kondisi di mana kadar gula darah seseorang terlalu tinggi.',
            'recommendations' => [
                'Kurangi konsumsi gula dan makanan manis.',
                'Perbanyak makan sayur dan buah rendah gula.',
                'Konsumsi makanan dengan indeks glikemik rendah.',
            ],
        ],
        'Hipertensi' => [
            'description' => 'Hipertensi adalah kondisi tekanan darah tinggi yang dapat memicu komplikasi serius.',
            'recommendations' => [
                'Kurangi konsumsi garam.',
                'Perbanyak olahraga ringan seperti jalan kaki.',
                'Hindari makanan berlemak tinggi.',
            ],
        ],
        'Jantung' => [
            'description' => 'Penyakit jantung melibatkan gangguan pada fungsi jantung dan pembuluh darah.',
            'recommendations' => [
                'Konsumsi makanan rendah kolesterol.',
                'Hindari stres berlebih.',
                'Perbanyak asupan omega-3 dari ikan atau kacang-kacangan.',
            ],
        ],
    ];

    $data = null;
    $selectedDisease = null;

    if ($request->isMethod('post')) {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:50',
            'age' => 'required|integer|min:1',
            'weight' => 'required|numeric|min:1',
            'disease' => 'required|string',
        ]);

        // Simpan data input user
        $data = $validated;

        // Ambil data penyakit berdasarkan pilihan user
        if (isset($diseases[$validated['disease']])) {
            $selectedDisease = $diseases[$validated['disease']];
        }
    }

    return view('diet', compact('data', 'selectedDisease'));
});
