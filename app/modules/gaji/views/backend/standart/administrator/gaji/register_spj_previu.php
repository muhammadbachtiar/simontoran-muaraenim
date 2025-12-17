<!DOCTYPE html>
<html>
<head>
    <title>Print Multiple F4 Pages</title>
    <style>
        body {
  font-family: sans-serif;
  margin: 20px;
}

#cetak {
  border: 1px solid #ccc;
  padding: 20px;
}

h1, h2, h3 {
  text-align: center;
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #ccc;
  padding: 5px;
}

    </style>
    <script>
        function cetak() {
            var divToPrint = document.getElementById('cetak');
            var newWin = window.open('', 'Print-Window');
            newWin.document.open();
            newWin.document.write('<html><head><title>Print Multiple F4 Pages</title>');
            newWin.document.write('<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">');
            newWin.document.write('<style>@media print { .page { border: none; margin: 0; width: 210mm; height: 330mm;  overflow: hidden; page-break-after: always;} .page-break { display: none; } #cetak{border:1px solid #ccc;padding:20px;}h1,h2,h3{text-align:center;}table{width:100%;border-collapse:collapse;}th,td{border:1px solid #ccc;padding:5px;} }</style>');
            newWin.document.write('</head><body onload="window.print();window.close()">');
            newWin.document.write(divToPrint.innerHTML);
            newWin.document.write('</body></html>');
            newWin.document.close();
        }
    </script>
</head>
<body>
   


    <div id="cetak">
  <h1>GAJI</h1>
  <h2>TANDA TERIMA DAN PENELITIAN KELENGKAPAN BERKAS AJUAN</h2>
  <h3>(SPM, SPP, dan Dokumen Lainnya)</h3>

  <p>Diterima Tanggal: 01 Juli 2024</p>

  <p>SKPD: Bag. Perencanaan dan Keuangan</p>

  <h3>Terdiri dari</h3>

  <h4>1. SPP-GD Nomor: 35.05/02.0/0377/LS/ 4.01.0.00.0.00.01.0000/P/7/2024 Tanggal: 01 Juli 2024</h4>

  <h4>2. SPM-GD Nomor: 35.05/03.0/0378/ LS/ 4.01.0.00.0.00.01.0000/M/7/2024 Tanggal 01 Juli 2024</h4>

  <h4>3. Dokumen Lainnya:</h4>

  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Jenis Dokumen</th>
        <th>Hasil Penelitian</th>
        <th>Ket.</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Rekapitulasi SPM Rangkap 2</td>
        <td>ada</td>
        <td></td>
      </tr>
      <tr>
        <td>2</td>
        <td>SPM Rangkap 5</td>
        <td>ada</td>
        <td></td>
      </tr>
      <tr>
        <td>3</td>
        <td>e-Billing Pajak rangkap 3</td>
        <td>ada</td>
        <td></td>
      </tr>
      <tr>
        <td>1</td>
        <td>SPP 1,2,3</td>
        <td>ada</td>
        <td></td>
      </tr>
      <tr>
        <td>2</td>
        <td>SPD (Mengetahui PA/KPA)</td>
        <td>ada</td>
        <td></td>
      </tr>
      <tr>
        <td>3</td>
        <td>Surat Keterangan Pengajuan Pencairan Dana</td>
        <td>ada</td>
        <td></td>
      </tr>
      <tr>
        <td>4</td>
        <td>SPTJM SPP dan SPM</td>
        <td>ada</td>
        <td></td>
      </tr>
      <tr>
        <td>5</td>
        <td>Surat Pernyataan Verifikasi Kelengkapan dan Keabsahan Dokumen dan Lampiran SPP</td>
        <td>ada</td>
        <td></td>
      </tr>
      <tr>
        <td>6</td>
        <td>Rekap Gaji Besar dan Kulit Gaji</td>
        <td>ada</td>
        <td></td>
      </tr>
      <tr>
        <td>7</td>
        <td>Perubahan SK dalam Daftar Gaji</td>
        <td>ada</td>
        <td></td>
      </tr>
    </tbody>
  </table>

  <h3>Kekurangan Berkas:</h3>

  <ul>
    <li></li>
    <li></li>
    <li></li>
  </ul>

  <p>
    Blitar, 01 Juli 2024
    <br>
    PPK
    <br>
    ENDANG PURNOMOSARI, S.E
    <br>
    NIP. 19720526 199803 2006
  </p>
</div>

</body>
</html>
