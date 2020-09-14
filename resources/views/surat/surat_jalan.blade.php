<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Surat Jalan | Kemiri Water Solution</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/surat-jalan.css') }}">
</head>
<body>
    <table>
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
        <h6 class="">SURAT JALAN</h6>
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

    <p class="pendahuluan">
        Kami kirimkan barang-barang tersebut dibawah ini dengan kendaraan
        <span>Pick Up</span>,
        nomor polisi
        <span>W 2275 DV</span>
    </p>

    <table class="table table-striped table-bordered detail-barang">
        <thead>
            <tr>
                <th scope="col">Kode Barang</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah (pcs)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>TG001</td>
                <td>Tutup Galon Tipe A</td>
                <td>1000</td>
            </tr>
            <tr>
                <td>TG002</td>
                <td>Tutup Galon Tipe B</td>
                <td>1000</td>
            </tr>
            <tr>
                <td>TG003</td>
                <td>Tutup Galon Tipe C</td>
                <td>1000</td>
            </tr>
        </tbody>
    </table>

    <table class="ttd-container">
        <tr>
            <td></td>
            <td>Hormat kami,</td>
        </tr>
        <tr>
            <td>Yang menerima,</td>
            <td>Kemiri Water Solution</td>
        </tr>
        <tr>
            <td></td>
            <td class="admin-gudang-title">Admin Gudang</td>
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