{{-- Start Profile Modal --}}
<div class="modal fade" id="modal-profile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <a href="{{ url('/operator-mesin/edit-profil') }}" data-toggle="tooltip" data-placement="bottom" title="Edit">
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
                            @if(Auth::user()->FOTO_PROFILE == null)
                            <figure class="avatar avatar-xl">
                                <img src="{{ asset('/assets/img/avatar/avatar-1.png') }}" class="rounded-circle" alt="avatar">
                            </figure>
                            @else
                            <figure class="avatar avatar-xl">
                                <img src="{{ asset(Auth::user()->FOTO_PROFILE) }}" class="rounded-circle" alt="avatar">
                            </figure>
                            @endif
                            @php $data = Auth::user()->operator_mesin(Auth::user()->ID_USER); @endphp
                            <div class="badge badge-dark nama-user">
                                {{$data->NAMA_OPERATOR_MESIN}}
                            </div>
                        </div>

                        <div class="card-body card-body-profile">
                            <table class="profil-table">
                                <tr>
                                    <td class="label-detail">ID</td>
                                    <td>{{$data->ID_OPERATOR_MESIN}}</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Jabatan</td>
                                    <td>Operator Mesin</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Jenis Kelamin</td>
                                    <td>
                                        @if($data->JENIS_KELAMIN_OPERATOR_MESIN == 1)
                                        Pria
                                        @else
                                        Wanita
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Alamat</td>
                                    <td>{{$data->ALAMAT_OPERATOR_MESIN}}</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Kota/Kabupaten</td>
                                    <td>{{$data->NAMA_KOTA}}</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Provinsi</td>
                                    <td>{{$data->NAMA_PROVINSI}}</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Telepon</td>
                                    <td>{{$data->NO_TELP_OPERATOR_MESIN}}</td>
                                </tr>
                                <tr>
                                    <td class="label-detail">Email</td>
                                    <td>{{$data->EMAIL_OPERATOR_MESIN}}</td>
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