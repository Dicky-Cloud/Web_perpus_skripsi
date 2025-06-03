<!DOCTYPE html>
<html>
<head>
    <title>Data Anggota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        .kop-surat {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .kop-surat h1 {
            margin: 0;
            font-size: 18px;
        }
        .kop-surat h2 {
            margin: 0;
            font-size: 22px;
            font-weight: bold;
        }
        .kop-surat p {
            margin: 2px 0;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 12px;
        }
        table, th, td {
            border: 1px solid #333;
        }
        th, td {
            padding: 6px;
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="kop-surat">
        <h2>PERPUSTAKAAN DINAS DAN KEARSIPAN</h2>
        <h1>KABUPATEN BATANG</h1>
        <p>Jl. Kartini No.1, Batang, Jawa Tengah 51215</p>
        <p>Telp. (0285) 123456 • Email: perpustakaan@batangkab.go.id</p>
    </div>

    <center><h3>Data Pengunjung</h3></center>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Status</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anggota as $a): ?>
                <tr>
                    <td><?= $a->nama ?></td>
                    <td><?= $a->email ?></td>
                    <td><?= $a->status ?></td>
                    <td><?= $a->alamat ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
