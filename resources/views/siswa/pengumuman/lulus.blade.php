<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Kelulusan</title>
    <style>
        * {
            box-sizing: border-box;
        }

        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            overflow-x: hidden;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        table {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .header {
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
            font-size: 15px;
            color: #333333;
        }

        .info-table {
            margin-top: 15px;
            border-collapse: collapse;
            width: 100%;
        }

        .info-table td {
            padding: 8px 8px;
        }

        .info-table td:first-child {
            width: 40%;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td class="header">
                <h2>Pengumuman Hasil Seleksi PPDB</h2>
            </td>
        </tr>
        <tr>
            <td class="content">
                <p>Yth. <strong>{{ $siswa->user->name }}</strong>,</p>

                <p>Bersama email ini, kami informasikan bahwa Anda dinyatakan <strong>lulus</strong> dalam seleksi Penerimaan Peserta Didik Baru (PPDB) Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}.</p>

                <table class="info-table">
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>: {{ $siswa->user->name }}</td>
                    </tr>
                    <tr>
                        <td>Nomor Pendaftaran</td>
                        <td>: {{ $siswa->id }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>: <strong style="color: #08ba08">LULUS</strong></td>
                    </tr>
                    <tr>
                        <td>Jurusan</td>
                        <td>: {{ $siswa->jurusan->name }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <script>
        window.onload = function () {
            window.parent.postMessage({
                height: document.body.scrollHeight
            }, "*");
        };
    </script>
</body>
</html>
