<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArtikelSeeder extends Seeder
{
    public function run()
    {
        DB::table('artikel')->truncate();

        $data = [
            [
                'judul' => 'Cara Sehat Menambah Berat Badan',
                'gambar' => 'https://images.pexels.com/photos/1105166/pexels-photo-1105166.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Menambah berat badan bukan berarti makan sembarangan.',
                'konten' => "Menaikkan berat badan secara sehat harus dimulai dengan menciptakan surplus kalori yang konsisten setiap harinya. Anda perlu mengonsumsi lebih banyak energi daripada yang dibakar oleh tubuh agar berat badan bisa bertambah secara bertahap. Fokus utamanya bukan pada kuantitas makanan saja, melainkan pada pemilihan sumber nutrisi yang padat kalori. Cobalah untuk makan lebih sering dengan porsi kecil sekitar lima sampai enam kali sehari. Pastikan setiap menu mengandung karbohidrat kompleks, protein berkualitas tinggi, serta lemak sehat yang bermanfaat.
Asupan protein memegang peranan krusial karena berfungsi untuk membangun massa otot dan bukan sekadar lemak tubuh. Anda bisa mendapatkan protein dari sumber hewani seperti dada ayam, telur, dan ikan salmon yang kaya nutrisi. Selain itu, sumber nabati seperti tempe, tahu, dan kacang-kacangan juga sangat baik untuk menunjang pertumbuhan tubuh. Jangan lupa menambahkan camilan sehat di sela waktu makan seperti buah kering atau alpukat. Minuman berkalori seperti smoothie buah atau susu full cream juga efektif membantu menambah asupan kalori.
Selain mengatur pola makan, latihan beban secara rutin sangat disarankan untuk mengubah kalori tersebut menjadi otot. Melakukan olahraga seperti angkat beban, push-up, atau squat akan memberikan rangsangan pada otot agar tumbuh lebih kuat. Hindari melakukan latihan kardio secara berlebihan karena hal tersebut dapat membakar kalori yang seharusnya disimpan tubuh. Pastikan Anda juga mendapatkan istirahat yang cukup setiap malam agar proses pemulihan jaringan tubuh berjalan maksimal. Konsistensi dalam menjaga gaya hidup sehat ini akan memberikan hasil yang permanen dan tubuh yang bugar.",


                'kategori' => 'Weight Gain',
            ],
            [
                'judul' => 'Menjaga Tubuh Tetap Ideal & Bugar',
                'gambar' => 'img/jam.jpeg',
                'deskripsi' => 'Sudah punya berat badan ideal? Jangan kendor!',
                'konten' => "Mempertahankan berat badan ideal membutuhkan keseimbangan antara asupan energi dan aktivitas fisik. Pastikan kamu tetap terhidrasi dengan minum minimal 2 liter air sehari.",
                'kategori' => 'Maintenance',
            ],
            [
                'judul' => 'Langkah Awal Menurunkan Berat Badan',
                'gambar' => 'https://images.pexels.com/photos/4056723/pexels-photo-4056723.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Turunkan berat badan secara bertahap dan aman.',
                'konten' => "Kunci utama menurunkan berat badan adalah defisit kalori. Mulailah dengan mengurangi konsumsi gula tambahan dan makanan olahan secara bertahap.
                ",
                'kategori' => 'Weight Loss',
            ],
            [
                'judul' => 'Pentingnya Tidur bagi Metabolisme',
                'gambar' => 'https://images.pexels.com/photos/3771069/pexels-photo-3771069.jpeg?auto=compress&cs=tinysrgb&w=1200',
                'deskripsi' => 'Tidur kurang dari 7 jam bisa merusak program dietmu.',
                'konten' => "Kurang tidur dapat meningkatkan hormon ghrelin yang memicu rasa lapar. Pastikan tidur 7-9 jam setiap malam untuk metabolisme yang optimal.",
                'kategori' => 'General',
            ],
            [
                'judul' => 'Olahraga di Rumah untuk Menurunkan Berat Badan',
                'gambar' => 'https://images.pexels.com/photos/4058411/pexels-photo-4058411.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Olahraga rumahan untuk membantu menurunkan berat badan secara efektif.',
                'konten' => "- Jumping jack\n- Skipping\n- Burpees\n- Mountain climber\n- High knees\n- Squat jump\n- Plank\n- Jogging di tempat\n- Senam aerobik",
                'kategori' => 'Exercise',
            ],
            [
                'judul' => 'Olahraga di Rumah untuk Menaikkan Berat Badan',
                'gambar' => 'https://images.pexels.com/photos/4162449/pexels-photo-4162449.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Latihan untuk menambah massa otot di rumah.',
                'konten' => "- Push up\n- Sit up\n- Squat\n- Lunges\n- Plank\n- Angkat beban sederhana\n- Resistance band\n- Glute bridge",
                'kategori' => 'Exercise',
            ],
            [
                'judul' => 'Dampak Berat Badan Berlebih terhadap Kesehatan',
                'gambar' => 'https://images.pexels.com/photos/3951373/pexels-photo-3951373.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Bahaya kelebihan berat badan bagi kesehatan.',
                'konten' => "- Diabetes\n- Hipertensi\n- Penyakit jantung\n- Stroke\n- Kolesterol tinggi\n- Gangguan napas\n- Nyeri sendi",
                'kategori' => 'Health',
            ],
            [
                'judul' => 'Dampak Berat Badan Kurang terhadap Kesehatan',
                'gambar' => 'https://images.pexels.com/photos/3951877/pexels-photo-3951877.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Bahaya kekurangan berat badan bagi tubuh.',
                'konten' => "- Tubuh lemas\n- Mudah sakit\n- Anemia\n- Gangguan hormon\n- Konsentrasi turun\n- Massa otot berkurang",
                'kategori' => 'Health',
            ],
            [
                'judul' => 'Stunting Bisa Dicegah Sejak Dini',
                'gambar' => 'https://images.pexels.com/photos/3806767/pexels-photo-3806767.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Pentingnya gizi ibu untuk mencegah stunting.',
                'konten' => "- Jaga BMI ideal\n- Gizi seimbang\n- Protein cukup\n- Cek kehamilan rutin\n- Edukasi gizi\n- Istirahat cukup",
                'kategori' => 'Education',
            ],
            [
                'judul' => '5 Makanan yang Wajib Dihindari Saat Diet',
                'gambar' => 'https://images.pexels.com/photos/2983101/pexels-photo-2983101.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Jangan sampai usahamu sia-sia karena makanan ini.',
                'konten' => "- Minuman bersoda\n- Gorengan berlebih\n- Tepung terigu putih\n- Camilan asin\n- Makanan cepat saji",
                'kategori' => 'Tips',
            ],
            [
                'judul' => 'Manfaat Minum Air Putih Setelah Bangun Tidur',
                'gambar' => 'https://images.pexels.com/photos/1458671/pexels-photo-1458671.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Kebiasaan sederhana dengan manfaat luar biasa.',
                'konten' => "Minum air putih saat perut kosong membantu membuang racun, meningkatkan metabolisme hingga 24%, dan menjaga kesehatan kulit dari dalam.",
                'kategori' => 'Tips',
            ],
            [
                'judul' => 'Bahaya Duduk Terlalu Lama bagi Kesehatan',
                'gambar' => 'https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Efek samping gaya hidup sedentari yang mematikan.',
                'konten' => "Duduk lebih dari 8 jam sehari meningkatkan risiko penyakit jantung dan diabetes. Pastikan melakukan peregangan setiap 30 menit sekali.",
                'kategori' => 'Health',
            ],
            [
                'judul' => 'Sumber Protein Nabati Terbaik untuk Otot',
                'gambar' => 'https://images.pexels.com/photos/4022083/pexels-photo-4022083.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Protein tidak harus selalu dari daging.',
                'konten' => "Tempe, tahu, edamame, dan kacang merah adalah sumber protein nabati yang sangat baik untuk pembentukan otot dan menjaga rasa kenyang lebih lama.",
                'kategori' => 'Food',
            ],
            [
                'judul' => 'Mitos vs Fakta: Makan Malam Bikin Gemuk?',
                'gambar' => 'https://images.pexels.com/photos/2098085/pexels-photo-2098085.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Bongkar kebenaran di balik larangan makan malam.',
                'konten' => "Faktanya, yang membuat gemuk adalah total kalori harian yang berlebih, bukan waktu makannya. Selama kalori terjaga, makan malam tidak masalah.",
                'kategori' => 'Education',
            ],
            [
                'judul' => 'Cara Mengatasi Stress Eating',
                'gambar' => 'https://images.pexels.com/photos/3762800/pexels-photo-3762800.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Berhenti melampiaskan emosi pada makanan.',
                'konten' => "Alihkan keinginan makan saat stres dengan meditasi, minum teh hangat, atau jalan kaki santai. Kenali lapar emosional vs lapar fisik.",
                'kategori' => 'Mental Health',
            ],
            [
                'judul' => 'Pentingnya Sarapan untuk Konsentrasi Belajar',
                'gambar' => 'https://images.pexels.com/photos/103124/pexels-photo-103124.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Kenapa siswa wajib sarapan sebelum ke sekolah?',
                'konten' => "Otak membutuhkan glukosa untuk berpikir. Sarapan memberikan energi awal agar fokus belajar tetap terjaga sepanjang hari.",
                'kategori' => 'Education',
            ],
            [
                'judul' => 'Manfaat Jalan Kaki 10.000 Langkah Per Hari',
                'gambar' => 'https://images.pexels.com/photos/601170/pexels-photo-601170.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Olahraga termudah yang bisa dilakukan siapa saja.',
                'konten' => "Berjalan kaki efektif membakar lemak visceral, menjaga kesehatan paru-paru, dan mengurangi risiko depresi ringan.",
                'kategori' => 'Exercise',
            ],
            [
                'judul' => 'Dampak Konsumsi Gula Berlebih pada Remaja',
                'gambar' => 'https://images.pexels.com/photos/103124/pexels-photo-103124.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Waspadai diabetes di usia muda akibat boba dan kopi kekinian.',
                'konten' => "Konsumsi gula berlebih memicu lonjakan insulin yang tidak stabil, menyebabkan jerawat, obesitas, dan risiko diabetes tipe 2.",
                'kategori' => 'Health',
            ],
            [
                'judul' => 'Tips Memulai Gaya Hidup Sehat di Usia Muda',
                'gambar' => 'https://images.pexels.com/photos/4040649/pexels-photo-4040649.jpeg?auto=compress&cs=tinysrgb&w=500',
                'deskripsi' => 'Mulai investasi kesehatanmu dari sekarang.',
                'konten' => "Kurangi junk food, tidur cukup, aktif bergerak, dan perbanyak makan serat. Kesehatan di masa tua ditentukan oleh gaya hidup saat muda.",
                'kategori' => 'Tips',
            ],
            [
                'judul' => 'Manfaat Sayuran Hijau bagi Tubuh',
                'gambar' => 'img/sayur.jpeg',
                'deskripsi' => 'Kenapa bayam dan kangkung sangat penting?',
                'konten' => "Sayuran hijau kaya akan zat besi, kalsium, dan vitamin K yang menjaga kesehatan tulang serta mencegah anemia pada remaja.",
                'kategori' => 'Food',
            ],
        ];

        foreach ($data as $val) {
            DB::table('artikel')->insert([
                'judul'      => $val['judul'],
                'slug'       => Str::slug($val['judul']),
                'gambar'     => $val['gambar'],
                'deskripsi'  => $val['deskripsi'],
                'konten'     => $val['konten'],
                'kategori'   => $val['kategori'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}