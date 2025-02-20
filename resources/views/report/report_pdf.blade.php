<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Data Album</title>
    <style>
        /* Gaya dasar untuk PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 30px;
        }
        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
        }
        .kop-surat h1 {
            margin: 0;
            font-size: 20px;
        }
        .kop-surat p {
            margin: 2px 0;
        }
        .kop-surat hr {
            margin-top: 10px;
            border: 1px solid #000;
        }
        .content h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        table th, table td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
        }
        .signature {
            margin-top: 60px;
            text-align: right;
        }
    </style>
</head>
<body>
    <!-- Kop Surat -->
    <div class="kop-surat">
        <h1>Hardian Gallery</h1>
        <p>Addres: Jl. Cihuyy No 69</p>
        <p>Telp: (021) 12345678 | Email: hadmin123@hgallery.com</p>
        <hr>
    </div>

    <!-- Konten Laporan -->
    <div class="content">
        <h2>Album Report</h2>
        <table>
            <thead>
                <tr>
                    <th>Album Title</th>
                    <th>Photo Count</th>
                    <th>Total Likes</th>
                    <th>Total Comments</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $album)
                <tr>
                    <td>{{ $album->title }}</td>
                    <td>{{ $album->photo_count }}</td>
                    <td>{{ $album->like_total }}</td>
                    <td>{{ $album->comment_total }}</td>
                </tr>
                @endforeach
                <tr>
                    <th>Total</th>
                    <td><b>{{ $photo_amount }}</b></td>
                    <td><b>{{ $like_amount }}</b></td>
                    <td><b>{{ $comment_amount }}</b></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Kaki Surat -->
    <<div class="footer">
        <p>Cimahi, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
    </div>

    <div class="signature">
        <p>Approved by, (H-Gallery)</p>
    </div>
</body>
</html>
