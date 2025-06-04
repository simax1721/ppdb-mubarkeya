<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Kelulusan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            max-width: 600px;
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

        .footer {
            background-color: #f1f1f1;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #777777;
        }

        .button {
            background-color: #2c3e50;
            color: #ffffff !important;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #1a242f;
        }

        .info-table {
            margin-top: 15px;
            border-collapse: collapse;
            width: 100%;
        }

        .info-table td {
            padding: 8px 0;
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
                <h2>Pengumuman Hasil Seleksi SPMB</h2>
            </td>
        </tr>
        <tr>
            <td class="content">
                <p>Yth. <strong>{{ $siswa->user->name }}</strong>,</p>

                <p>Bersama email ini, kami informasikan bahwa Anda dinyatakan <strong>tidak lulus</strong> dalam Seleksi Penerimaan Murid Baru Baru (SPMB) Tahun Ajaran {{ date('Y') }}/{{ date('Y')+1 }}.</p>

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
                        <td>: <strong>TIDAK LULUS</strong></td>
                    </tr>
                    {{-- <tr>
                        <td>Jurusan</td>
                        <td>: {{ $siswa->jurusan->name }}</td>
                    </tr> --}}
                </table>

                {{-- <p>Untuk informasi selanjutnya, silakan akses tautan di bawah ini atau hubungi panitia SPMB jika diperlukan:</p> --}}

                <a href="{{ url('pengumuman/lulus') }}" class="button">Lihat Detail Pengumuman</a>
            </td>
        </tr>
        <tr>
            <td class="footer">
                <p>Email ini dikirim karena Anda telah mengikuti proses SPMB di SMKN 1 Al-Mubarkeya.</p>
                <p>Jika Anda memiliki pertanyaan, silakan hubungi kami melalui <a href="mailto:smk.mubarkeya@gmail.com">smk.mubarkeya@gmail.com</a> atau telepon 0651-8071002.</p>
                <p>&copy; {{ date('Y') }} SMKN 1 Al-Mubarkeya | Kayee Lee, Kec. Ingin Jaya, Kabupaten Aceh Besar, Aceh 23230</p>
            </td>
        </tr>
    </table>
</body>
</html>
