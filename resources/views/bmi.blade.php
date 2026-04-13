<x-layout>
    <form action="/hitung-bmi" method="POST">
        @csrf 
        <label>Berat Badan (kg)</label>
        <input type="number" name="berat" step="0.1" required>

        <label>Tinggi Badan (Cm)</label>
        <input type="number" name="tinggi" step="0.1"  required>

        <button type="submit">Hitung sekarang</button>
    </form>

    @if(isset($skor))
    <div style="margin-top: 20px, padding: 20px, background-color: #fce4ec; border-radius: 15px;
    border: 2px solid #f8bbd0; text-align: center;">
    <h2>hasil bmi anda: {{ $skor }}</h2> 
     <p>{{ $status }}</p>
</div>
@endif
</x-layout>