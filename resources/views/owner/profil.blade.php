{{-- Start Profile Modal --}}
<div class="modal fade" id="modal-profile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <a href="{{ url('/owner/edit-profil') }}" data-toggle="tooltip" data-placement="bottom" title="Edit">
                    <i class="fas fa-pen fa-lg text-white"></i>
                </a>
                <h5 class="modal-title">Profil Saya</h5>
                <button class="close" data-dismiss="modal" aria-label="Close" data-toggle="tooltip" data-placement="bottom" title="Tutup">
                    <i class="fas fa-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="d-flex justify-content-center">

                    <div class="card card-pegawai">
                        <div class="card-img-top" style="background-image: url({{ asset('/assets/img/login-bg-3.png') }});">
                            <figure class="avatar avatar-xl">
                                <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle" alt="avatar">
                            </figure>
                            <div class="badge badge-dark nama-user">
                                Deni Ariawan Samudra
                            </div>
                        </div>

                        <div class="card-body card-body-profile">
                            <table class="profil-table">
                                <tr>
                                    <td class="label-detail">ID</td>
                                    <td>MJM001</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Jabatan</td>
                                    <td>Owner</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Jenis Kelamin</td>
                                    <td>
                                        Pria
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Alamat</td>
                                    <td>Jl. Mayjend D.I. Pandjaitan No. 72</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Kota/Kabupaten</td>
                                    <td>Semarang</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Provinsi</td>
                                    <td>Jawa Tengah</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Telepon</td>
                                    <td>085639203992</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Email</td>
                                    <td>deniariawan@gmail.com</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Profile Modal --}}