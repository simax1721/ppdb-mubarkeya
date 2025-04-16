<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FORMULIR PENDAFTARAN SMKN 1 AL-MUBARKEYA</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            /* text-align: center; */
            margin: 0;
            padding: 0;
            background-color: #c6c5c5;
        }

        .nav {
            background-color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 10%;
            margin-bottom: 10px;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2);
        }

        .nav .logo {
            display: flex;
            align-items: center;
        }

        .nav .logo img {
            width: 40px;
        }

        .nav .logo a {
            font-weight: bolder;
            font-size: 16px;
            margin-left: 10px;
            font-family: Arial, Helvetica, sans-serif;
            color: #428bca;
            text-decoration: none;
        }

        .nav .logo a:hover {
            color: #000;
        }

        .nav .print a {
            font-family: Arial;
            color: #fff;
            font-weight: bolder;
            background-color: #2c322d;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .nav .print a:hover{
            background-color: #428bca;
        }


        .container {
            width: 210mm;
            height: 297mm;
            margin: auto;
            padding: 10px 50px;
            background: white;
            box-sizing: border-box;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header .logo {
            width: 90px;
        }

        .header .logo img {
            width: 100%;
        }

        .header .text {
            text-align: center;
        }

        .header .text h3 {
            margin: 0px;
        }
        .header .text p {
            margin: 0px;
            font-size: 10px;
            font-weight: bold;
            font-family: Arial;
        }

        .content {
            padding-top: 30px;
        }

        .content .title {
            text-align: center;
        }

        .header .text p span {
            color: #0073e6;
        }

        .content .photo {
            text-align: center;
            margin: 20px 0;
            padding-top: 20px;
        }
        .content .photo img {
            width: 150px;
            height: auto;
            /* border: 1px solid #000; */
        }

        .content .data {
            margin-top: 10px;
            font-size: 16px;
            display: flex;
            justify-content: center;
        }
        .content .data table {
            width: 80%;
            border-collapse: collapse;
        }
        .content .data th, .data td {
            /* border: 1px solid black; */
            padding: 8px;
            text-align: left;
        }

        .signature {
            margin-top: 30px;
            text-align: center;
            padding: 0 10%;
            display: flex;
            justify-content: end;
            font-size: 16px;
        }

        .signature .sig-content {
            width: fit-content;
        }

        @media print {
            body {
                margin: 0;
            }

            .nav {
                display: none;
            }

            .container {
                width: 100%;
                height: auto;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <img src="{{ url('Logomubarkeya.png') }}" alt="">
            <a href="#">PPDB Online SMKN 1 Al-Mubarkeya</a>
        </div>
        <div class="print"><a href="#" onclick="print_page()">PRINT</a></div>
    </div>
    <div class="container">

        
        <div class="header">
            <div class="logo">
                <img src="{{ url('pancacita.png') }}" alt="">
            </div>
            <div class="text">
                <h3>PEMERINTAH ACEH <br> DINAS PENDIDIKAN <br> SMK NEGERI 1 AL-MUBARKEYA</h3>
                <p>Jl. Kaye Lee - Peukan Bilieue, Ingin Jaya, Kab. Aceh Besar. Kode Pos. 23371 <br> 
                    <span>Telp: 0651-8071002 | Email: smk.mubarkeya@gmail.com | Website: www.smk1almubarkeya.sch.id</span></p>
            </div>
            <div class="logo">
                <img src="{{ url('Logomubarkeya.png') }}" alt="">
            </div>
        </div>
        <hr style="border-top: 2px solid #000; margin-top: -2px">

        <div class="content">
            <h2 class="title">Formulir Sistem Penerimaan Murid Baru <br> Tahun Ajaran {{ date('Y') }}/{{ date('Y') + 1 }}</h2>

            <div class="photo">
                <img src="" id="photo" alt="Foto Siswa"> <!-- Ganti dengan foto siswa -->
            </div>

            <div class="data">
                <table>
                    <tr><td>No. Pendaftaran</td><td>: <span id="id_pendaftaran"></span></td></tr>
                    <tr><td>NIK</td><td>: <span id="nik"></span></td></tr>
                    <tr><td>Nama</td><td>: <span id="nama"></span></td></tr>
                    <tr><td>Alamat</td><td>: <span id="alamat"></span></td></tr>
                    <tr><td>Asal Sekolah</td><td>: <span id="asal_sekolah"></span></td></tr>
                    <tr><td>No. HP</td><td>: <span id="no_hp"></span></td></tr>
                    <tr><td>Nama Orangtua/Wali</td><td>: <span id="nama_bapak"></span></td></tr>
                    <tr><td>No. HP Orangtua/Wali</td><td>: <span id="nomor_bapak"></span></td></tr>
                    <tr><td>Pilihan 1</td><td>: <span id="jurusan1"></span></td></tr>
                    <tr><td>Pilihan 2</td><td>: <span id="jurusan2"></span></td></tr>
                </table>
            </div>
        </div>

        <div class="signature">
            <div class="sig-content">
                <p>Tanda Tangan Orangtua/Wali</p>
                <br>
                <br>
                <br>
                <p style="font-weight: bolder" id="ttd_bapak"></p>
            </div>
        </div>
    </div>

    <script src="{{ url('/') }}/mamba/assets/vendor/jquery/jquery.min.js"></script>

    <script>
        function print_page() { window.print(); }


        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: "{{ url('profil/users') }}",
                success: function (response) {
                    $('#nama').html(response.data.name);
                    $('#photo').attr('src', `{{ url('uploads') }}/${response.data.photo}`);
                }
            });
            
            $.ajax({
                type: "GET",
                url: "{{ url('profil/biodata-users') }}",
                success: function (response) {
                    $('#nik').html(response.data.nik);
                    $('#alamat').html(response.data.alamat);
                    $('#asal_sekolah').html(response.data.asal_sekolah);
                    $('#no_hp').html(response.data.no_hp);
                    $('#nama_bapak').html(response.data.nama_bapak);
                    $('#nomor_bapak').html(response.data.nomor_bapak);
                    $('#ttd_bapak').html(response.data.nama_bapak);
                }
            });
            
            $.ajax({
                type: "GET",
                url: "{{ url('formulir/formulir-users') }}",
                success: function (response) {
                    $('#id_pendaftaran').html(response.data.id);
                    $('#jurusan1').html(response.data.pilihan1.name);
                    $('#jurusan2').html(response.data.pilihan2.name);
                }
            });
        });
    </script>

</body>
</html>


