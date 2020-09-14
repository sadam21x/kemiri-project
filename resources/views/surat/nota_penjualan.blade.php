<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Penjualan | Kemiri Water Solution</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/nota-penjualan.css') }}">

</head>
<body>

    <table class="header-container">
        <tr>
            <td>
                <img src="{{ asset('/assets/img/logo-kemiri-180.png') }}" class="logo-kemiri">
            </td>
            <td class="kemiri-title">&nbsp;Kemiri Water Solution</td>
        </tr>
        <tr>
            <td colspan="2" class="lighter-text detail-perusahaan">Jl. Raya Kemiri No. 30, Sidoarjo</td>
        </tr>
        <tr>
            <td colspan="2" class="lighter-text detail-perusahaan">0878 5546 6055</td>
        </tr>
    </table>

    <hr>

    <div class="nomor-surat-container">
        <h6 class="">NOTA PENJUALAN</h6>
        <h6 class="nomor-surat">No. 102987585</h6>
    </div>

    <table class="detail-customer">
        <tr>
            <td>Tanggal</td>
            <td>&nbsp; : 21/08/2020</td>
        </tr>
        <tr>
            <td>Yth</td>
            <td>&nbsp; : Depo Air Minum Sempidi</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>&nbsp; : Jl. Raya Nginden 27, Surabaya</td>
        </tr>
    </table>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Harga/pcs (IDR)</th>
                <th scope="col">Jumlah (pcs)</th>
                <th scope="col">Diskon (%)</th>
                <th scope="col">Total Harga (IDR)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>TG001</td>
                <td>Tutup Galon Tipe A</td>
                <td>150</td>
                <td>1000</td>
                <td>0</td>
                <td>150.000</td>
            </tr>
            <tr>
                <td>TG002</td>
                <td>Tutup Galon Tipe B</td>
                <td>150</td>
                <td>1000</td>
                <td>10</td>
                <td>135.000</td>
            </tr>
            <tr>
                <td>TG003</td>
                <td>Tutup Galon Tipe A</td>
                <td>125</td>
                <td>1000</td>
                <td>0</td>
                <td>125.000</td>
            </tr>
        </tbody>
    </table>

    <table class="detail-extra lighter-text">
        <tr>
            <td class="lighter-text">Metode Kirim</td>
            <td>&nbsp; : Ambil Sendiri</td>
        </tr>
        <tr>
            <td class="lighter-text">Jumlah Item (pcs)</td>
            <td>&nbsp; : 1000</td>
        </tr>
        <tr>
            <td class="lighter-text">Jumlah Sak</td>
            <td>&nbsp; : 5</td>
        </tr>
        <tr>
            <td class="lighter-text">Total Harga Produk (IDR)</td>
            <td>&nbsp; : 145.000</td>
        </tr>
        <tr>
            <td class="lighter-text">Ongkos Kirim (IDR)</td>
            <td>&nbsp; : 0</td>
        </tr>
        <tr>
            <td class="lighter-text">Total Bayar (IDR)</td>
            <td>&nbsp; : 145.000</td>
        </tr>
    </table>

    <table class="ttd-container">
        <tr>
            <td></td>
            <td>Hormat kami,</td>
        </tr>
        <tr>
            <td>Pelanggan,</td>
            <td>Kemiri Water Solution</td>
        </tr>
        <tr>
            <td></td>
            <td class="staf-title">Staf</td>
        </tr>

        @for ($i = 0; $i < 30; $i++)        
        <tr><td colspan="2"></td></tr>
        @endfor

        <tr>
            <td>.......................</td>
            <td>Ardian Permana</td>
        </tr>
    </table>

</body>
</html>