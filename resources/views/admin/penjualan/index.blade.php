@extends('layouts.app')

@section('content')

<div class="dashboard-main-wrapper">
    <div class="top-navbar flex-between gap-16">

        <div class="flex-align gap-16">
            <!-- Toggle Button Start -->
            <button type="button" class="toggle-btn d-xl-none d-flex text-26 text-gray-500"><i
                    class="ph ph-list"></i></button>
            <!-- Toggle Button End -->

            <form action="#" class="w-350 d-sm-block d-none">
                <div class="position-relative">
                    <button type="submit" class="input-icon text-xl d-flex text-gray-100 pointer-event-none"><i
                            class="ph ph-magnifying-glass"></i></button>
                    <input type="text"
                        class="form-control ps-40 h-40 border-transparent focus-border-main-600 bg-main-50 rounded-pill placeholder-15"
                        placeholder="Search...">
                </div>
            </form>
        </div>

        <div class="flex-align gap-16">
            <div class="flex-align gap-8">
                <!-- Notification Start -->
                <div class="dropdown">
                    <button
                        class="dropdown-btn shaking-animation text-gray-500 w-40 h-40 bg-main-50 hover-bg-main-100 transition-2 rounded-circle text-xl flex-center"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="position-relative">
                            <i class="ph ph-bell"></i>
                            <span class="alarm-notify position-absolute end-0"></span>
                        </span>
                    </button>
                    <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                        <div class="card border border-gray-100 rounded-12 box-shadow-custom p-0 overflow-hidden">
                            <div class="card-body p-0">
                                <div class="py-8 px-24 bg-main-600">
                                    <div class="flex-between">
                                        <h5 class="text-xl fw-semibold text-white mb-0">Notifications</h5>
                                        <div class="flex-align gap-12">
                                            <button type="button"
                                                class="bg-white rounded-6 text-sm px-8 py-2 hover-text-primary-600">
                                                New </button>
                                            <button type="button"
                                                class="close-dropdown hover-scale-1 text-xl text-white"><i
                                                    class="ph ph-x"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-24 max-h-270 overflow-y-auto scroll-sm">
                                    <div class="d-flex align-items-start gap-12">
                                        <img src="assets/images/thumbs/notification-img1.png" alt=""
                                            class="w-48 h-48 rounded-circle object-fit-cover">
                                        <div class="border-bottom border-gray-100 mb-24 pb-24">
                                            <div class="flex-align gap-4">
                                                <a href="#"
                                                    class="fw-medium text-15 mb-0 text-gray-300 hover-text-main-600 text-line-2">Ashwin
                                                    Bose is requesting access to Design File - Final Project. </a>
                                                <!-- Three Dot Dropdown Start -->
                                                <div class="dropdown flex-shrink-0">
                                                    <button class="text-gray-200 rounded-4" type="button"
                                                        data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ph-fill ph-dots-three-outline"></i>
                                                    </button>
                                                    <div
                                                        class="dropdown-menu dropdown-menu--md border-0 bg-transparent p-0">
                                                        <div
                                                            class="card border border-gray-100 rounded-12 box-shadow-custom">
                                                            <div class="card-body p-12">
                                                                <div
                                                                    class="max-h-200 overflow-y-auto scroll-sm pe-8">
                                                                    <ul>
                                                                        <li class="mb-0">
                                                                            <a href="#"
                                                                                class="py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 rounded-8 fw-normal text-xs d-block">
                                                                                <span class="text">Mark as
                                                                                    read</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="mb-0">
                                                                            <a href="#"
                                                                                class="py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 rounded-8 fw-normal text-xs d-block">
                                                                                <span class="text">Delete
                                                                                    Notification</span>
                                                                            </a>
                                                                        </li>
                                                                        <li class="mb-0">
                                                                            <a href="#"
                                                                                class="py-6 text-15 px-8 hover-bg-gray-50 text-gray-300 rounded-8 fw-normal text-xs d-block">
                                                                                <span class="text">Report</span>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Three Dot Dropdown End -->
                                            </div>
                                            <div class="flex-align gap-6 mt-8">
                                                <img src="assets/images/icons/google-drive.png" alt="">
                                                <div class="flex-align gap-4">
                                                    <p class="text-gray-900 text-sm text-line-1">Design brief and
                                                        ideas.txt</p>
                                                    <span class="text-xs text-gray-200 flex-shrink-0">2.2 MB</span>
                                                </div>
                                            </div>
                                            <div class="mt-16 flex-align gap-8">
                                                <button type="button"
                                                    class="btn btn-main py-8 text-15 fw-normal px-16">Accept</button>
                                                <button type="button"
                                                    class="btn btn-outline-gray py-8 text-15 fw-normal px-16">Decline</button>
                                            </div>
                                            <span class="text-gray-200 text-13 mt-8">2 mins ago</span>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-start gap-12">
                                        <img src="assets/images/thumbs/notification-img2.png" alt=""
                                            class="w-48 h-48 rounded-circle object-fit-cover">
                                        <div class="">
                                            <a href="#"
                                                class="fw-medium text-15 mb-0 text-gray-300 hover-text-main-600 text-line-2">Patrick
                                                added a comment on Design Assets - Smart Tags file:</a>
                                            <span class="text-gray-200 text-13">2 mins ago</span>
                                        </div>
                                    </div>
                                </div>
                                <a href="#"
                                    class="py-13 px-24 fw-bold text-center d-block text-primary-600 border-top border-gray-100 hover-text-decoration-underline">
                                    View All </a>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Notification Start -->

                <!-- Language Start -->
                <div class="dropdown">
                    <button
                        class="text-gray-500 w-40 h-40 bg-main-50 hover-bg-main-100 transition-2 rounded-circle text-xl flex-center"
                        type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="ph ph-globe"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu--md border-0 bg-transparent p-0">
                        <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                            <div class="card-body">
                                <div class="max-h-270 overflow-y-auto scroll-sm pe-8">
                                    <div
                                        class="form-check form-radio d-flex align-items-center justify-content-between ps-0 mb-16">
                                        <label
                                            class="ps-0 form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="arabic">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-8">
                                                <img src="assets/images/thumbs/flag1.png" alt=""
                                                    class="w-32-px h-32-px border borde border-gray-100 rounded-circle flex-shrink-0">
                                                <span class="text-15 fw-semibold mb-0">Arabic</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="language"
                                            id="arabic">
                                    </div>
                                    <div
                                        class="form-check form-radio d-flex align-items-center justify-content-between ps-0 mb-16">
                                        <label
                                            class="ps-0 form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="germany">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-8">
                                                <img src="assets/images/thumbs/flag2.png" alt=""
                                                    class="w-32-px h-32-px border borde border-gray-100 rounded-circle flex-shrink-0">
                                                <span class="text-15 fw-semibold mb-0">Germany</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="language"
                                            id="germany">
                                    </div>
                                    <div
                                        class="form-check form-radio d-flex align-items-center justify-content-between ps-0 mb-16">
                                        <label
                                            class="ps-0 form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="english">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-8">
                                                <img src="assets/images/thumbs/flag3.png" alt=""
                                                    class="w-32-px h-32-px border borde border-gray-100 rounded-circle flex-shrink-0">
                                                <span class="text-15 fw-semibold mb-0">English</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="language"
                                            id="english">
                                    </div>
                                    <div
                                        class="form-check form-radio d-flex align-items-center justify-content-between ps-0">
                                        <label
                                            class="ps-0 form-check-label line-height-1 fw-medium text-secondary-light"
                                            for="spanish">
                                            <span
                                                class="text-black hover-bg-transparent hover-text-primary d-flex align-items-center gap-8">
                                                <img src="assets/images/thumbs/flag4.png" alt=""
                                                    class="w-32-px h-32-px border borde border-gray-100 rounded-circle flex-shrink-0">
                                                <span class="text-15 fw-semibold mb-0">Spanish</span>
                                            </span>
                                        </label>
                                        <input class="form-check-input" type="radio" name="language"
                                            id="spanish">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Language Start -->
            </div>


            <!-- User Profile Start -->
            <div class="dropdown">
                <button
                    class="users arrow-down-icon border border-gray-200 rounded-pill p-4 d-inline-block pe-40 position-relative"
                    type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="position-relative">
                        <img src="{{ asset('assets/images/thumbs/user-img.png') }}" alt="Image"
                            class="h-32 w-32 rounded-circle">
                        <span
                            class="activation-badge w-8 h-8 position-absolute inset-block-end-0 inset-inline-end-0"></span>
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu--lg border-0 bg-transparent p-0">
                    <div class="card border border-gray-100 rounded-12 box-shadow-custom">
                        <div class="card-body">
                            <div class="flex-align gap-8 mb-20 pb-20 border-bottom border-gray-100">
                                <img src="{{ asset('assets/images/thumbs/user-img.png') }}" alt=""
                                    class="w-54 h-54 rounded-circle">
                                <div class="">
                                    <h4 class="mb-0">Michel John</h4>
                                    <p class="fw-medium text-13 text-gray-200">examplemail@mail.com</p>
                                </div>
                            </div>
                            <ul class="max-h-270 overflow-y-auto scroll-sm pe-4">
                                <li class="mb-4">
                                    <a href="setting.html"
                                        class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                        <span class="text-2xl text-primary-600 d-flex"><i
                                                class="ph ph-gear"></i></span>
                                        <span class="text">Account Settings</span>
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="pricing-plan.html"
                                        class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                        <span class="text-2xl text-primary-600 d-flex"><i
                                                class="ph ph-chart-bar"></i></span>
                                        <span class="text">Upgrade Plan</span>
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="analytics.html"
                                        class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                        <span class="text-2xl text-primary-600 d-flex"><i
                                                class="ph ph-chart-line-up"></i></span>
                                        <span class="text">Daily Activity</span>
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="message.html"
                                        class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                        <span class="text-2xl text-primary-600 d-flex"><i
                                                class="ph ph-chats-teardrop"></i></span>
                                        <span class="text">Inbox</span>
                                    </a>
                                </li>
                                <li class="mb-4">
                                    <a href="email.html"
                                        class="py-12 text-15 px-20 hover-bg-gray-50 text-gray-300 rounded-8 flex-align gap-8 fw-medium text-15">
                                        <span class="text-2xl text-primary-600 d-flex"><i
                                                class="ph ph-envelope-simple"></i></span>
                                        <span class="text">Email</span>
                                    </a>
                                </li>
                                <li class="pt-8 border-top border-gray-100">
                                    <form method="POST" action="{{ route('logout') }}"
                                        class="py-12 text-15 px-20 hover-bg-danger-50 text-gray-300 hover-text-danger-600 rounded-8 flex-align gap-8 fw-medium text-15">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- User Profile Start -->

        </div>
    </div>


    <div class="dashboard-body">

        <div class="breadcrumb-with-buttons mb-24 flex-between flex-wrap gap-8">
            <!-- Breadcrumb Start -->
            <div class="breadcrumb mb-24">
                <ul class="flex-align gap-4">
                    <li><a href="{{ route('dashboard') }}" class="text-gray-200 fw-normal text-15 hover-text-main-600">Dashboard</a>
                    </li>
                    <li> <span class="text-gray-500 fw-normal d-flex"><i class="ph ph-caret-right"></i></span>
                    </li>
                    <li><span class="text-main-600 fw-normal text-15">Students</span></li>
                </ul>
            </div>
            <!-- Breadcrumb End -->

            <!-- Breadcrumb Right Start -->
            <div class="flex-align gap-8 flex-wrap">
                <div class="position-relative text-gray-500 flex-align gap-4 text-13">
                    <div
                        class="flex-align text-gray-500 text-13 border border-gray-100 rounded-4 ps-20 focus-border-main-600 bg-white">
                        <span class="text-lg"></span>
                        <button href="#tambahmodal" data-bs-toggle="modal" data-bs-target="#tambahmodal" class="ps-8 pe-20 py-16 border-0 text-inherit rounded-4 text-center">
                            <i></i>Tambah Penjualan
                        </button>
                    </div>
                    <span class="text-inherit">Sort by: </span>
                    <div
                        class="flex-align text-gray-500 text-13 border border-gray-100 rounded-4 ps-20 focus-border-main-600 bg-white">
                        <span class="text-lg"><i class="ph ph-funnel-simple"></i></span>
                        <select class="form-control ps-8 pe-20 py-16 border-0 text-inherit rounded-4 text-center">
                            <option value="1" selected>Popular</option>
                            <option value="1">Latest</option>
                            <option value="1">Trending</option>
                            <option value="1">Matches</option>
                        </select>
                    </div>
                </div>
                <div
                    class="flex-align text-gray-500 text-13 border border-gray-100 rounded-4 ps-20 focus-border-main-600 bg-white">
                    <span class="text-lg"><i class="ph ph-layout"></i></span>
                    <select class="form-control ps-8 pe-20 py-16 border-0 text-inherit rounded-4 text-center"
                        id="exportOptions">
                        <option value="" selected disabled>Export</option>
                        <option value="csv">CSV</option>
                        <option value="json">JSON</option>
                    </select>
                </div>
            </div>
            <!-- Breadcrumb Right End -->
        </div>


        <!-- modal tambah -->
        <div class="modal fade" id="tambahmodal" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog modal-dialog-centered">
                <div class="modal-content radius-16 bg-base">
                    <div
                        class="modal-header py-16 px-24 border border-top-0 border-start-0 border-end-0">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Penjualan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-24">
                        <form id="formTambahPenjualan" action="{{ route('penjualan.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-20">
                                    <label for="id_mitra" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                        Nama Pelanggan
                                    </label>
                                    <select name="id_mitra" id="id_mitra"
                                        class="form-control radius-8" required>
                                        <option value="">Pilih nama pelanggan</option>
                                        @foreach($mitra as $mitras)
                                        <option value="{{ $mitras->id_mitra }}">{{ $mitras->nama_mitra }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="tanggal_transaksi" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                        Tanggal:
                                    </label>
                                    <input type="date" name="tanggal_transaksi" id="tanggal_transaksi" class="form-control radius-8"
                                        required>
                                </div>

                                <div class="col-12 mb-20">
                                    <label for="id_sayur" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                        Sayur
                                    </label>
                                    <select name="id_sayur" id="id_sayur"
                                        class="form-control radius-8" required>
                                        <option value="">Pilih sayur yang akan dijual</option>
                                        @foreach($sayur as $sayurs)
                                        <option value="{{ $sayurs->id_sayur }}">{{ $sayurs->nama_sayur }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 mb-20">
                                    <label for="kuantitas" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                        Kuantitas (kg):
                                    </label>
                                    <input type="number" name="kuantitas" id="kuantitas"
                                        class="form-control radius-8"
                                        placeholder="Masukkan jumlah kuantitas"
                                        step="0.1" min="0.1" required>
                                </div>
                                <div class="col-6 mb-20">
                                    <label for="harga_satuan" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                        Harga Satuan (Rp):
                                    </label>
                                    <input type="number" name="harga_satuan" id="harga_satuan"
                                        class="form-control radius-8"
                                        placeholder="Masukkan harga satuan"
                                        min="0" required>
                                </div>
                                <div class="col-12 mb-20">
                                    <label for="jenis_pembayaran" class="form-label fw-semibold text-primary-light text-sm mb-8">
                                        Jenis Pembayaran:
                                    </label>
                                    <select name="jenis_pembayaran" id="jenis_pembayaran"
                                        class="form-control radius-8" required>
                                        <option value="">-- Pilih Jenis Pembayaran --</option>
                                        <option value="tunai">Tunai</option>
                                        <option value="hutang">Hutang</option>
                                    </select>
                                </div>

                                <div
                                    class="d-flex align-items-center justify-content-center gap-8 mt-24">
                                    <button type="reset"
                                        class="btn bg-danger-600 hover-bg-danger-800 border-danger-600 hover-border-danger-800 text-md px-24 py-12 radius-8">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="btn bg-main-600 hover-bg-main-800 border-main-600 hover-border-main-800 text-md px-24 py-12 radius-8">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <div class="card overflow-hidden">
            <div class="card-body p-0 overflow-x-auto">
                <table id="studentTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th class="fixed-width">
                                <div class="form-check">
                                    <input class="form-check-input border-gray-200 rounded-4" type="checkbox"
                                        id="selectAll">
                                </div>
                            </th>
                            <th class="h6 text-gray-300">Tanggal</th>
                            <th class="h6 text-gray-300">Nama Pelanggan</th>
                            <th class="h6 text-gray-300">Sayur</th>
                            <th class="h6 text-gray-300">Kuantitas(kg)</th>
                            <th class="h6 text-gray-300">Harga Satuan</th>
                            <th class="h6 text-gray-300">Total</th>
                            <th class="h6 text-gray-300">Detail</th>


                        </tr>
                    </thead>
                    <tbody>
                        {{-- askdnkajsdnkjasdnkajsndjnsad --}}
                        @foreach ($penjualan as $penjualans)
                        <tr>
                            <td class="fixed-width">
                                <div class="form-check">
                                    <input class="form-check-input border-gray-200 rounded-4" type="checkbox">
                                </div>
                            </td>
                            <td>
                                <div class="flex-align gap-8">
                                    <span class="h6 mb-0 fw-medium text-gray-300">{{ $penjualans->tanggal_transaksi }}</span>
                                </div>
                            </td>
                            <td>
                                <span class="h6 mb-0 fw-medium text-gray-300">{{ $penjualans->mitra->nama_mitra }}</span>
                            </td>
                            <td>
                                <span class="h6 mb-0 fw-medium text-gray-300">{{ $penjualans->sayur->nama_sayur }}</span>
                            </td>
                            <td>
                                <span class="h6 mb-0 fw-medium text-gray-300">{{ $penjualans->kuantitas }}</span>
                            </td>
                            <td>
                                <span class="h6 mb-0 fw-medium text-gray-300">{{ $penjualans->harga_satuan }}</span>
                            </td>
                            <td>
                                <span class="h6 mb-0 fw-medium text-gray-300">{{ $penjualans->total_transaksi }}</span>
                            </td>


                            <td>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#detailPelangganModal-{{ $penjualans->id_mitra }}"
                                    class="bg-main-50 text-main-600 py-2 px-14 rounded-pill hover-bg-main-600 hover-text-white">
                                    View More
                                </a>
                            </td>
                        </tr>




                        <!-- Modal Add Event -->

                        @endforeach
                    </tbody>
                </table>
            </div>


            <!-- Jquery js -->
            <script src="{{ asset('assets/js/jquery-3.7.1.min.js') }}"></script>
            <!-- Bootstrap Bundle Js -->
            <script src="{{ asset('assets/js/boostrap.bundle.min.js') }}"></script>
            <!-- Phosphor Js -->
            <script src="{{ asset('assets/js/phosphor-icon.js') }}"></script>
            <!-- file upload -->
            <script src="{{ asset('assets/js/file-upload.js') }}"></script>
            <!-- file upload -->
            <script src="{{ asset('assets/js/plyr.js') }}"></script>
            <!-- dataTables -->
            <script src="{{ asset('https://cdn.datatables.net/2.0.8/js/dataTables.min.js') }}"></script>
            <!-- full calendar -->
            <script src="{{ asset('assets/js/full-calendar.js') }}"></script>
            <!-- jQuery UI -->
            <script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
            <!-- jQuery UI -->
            <script src="{{ asset('assets/js/editor-quill.js') }}"></script>
            <!-- apex charts -->
            <script src="{{ asset('assets/js/apexcharts.min.js') }}"></script>
            <!-- Calendar Js -->
            <script src="{{ asset('assets/js/calendar.js') }}"></script>
            <!-- jvectormap Js -->
            <script src="{{ asset('assets/js/jquery-jvectormap-2.0.5.min.js') }}"></script>
            <!-- jvectormap world Js -->
            <script src="{{ asset('assets/js/jquery-jvectormap-world-mill-en.js') }}"></script>

            <!-- main js -->
            <script src="{{ asset('assets/js/main.js') }}"></script>



            <script>
                // ========================== Export Js Start ==============================
                document.getElementById('exportOptions').addEventListener('change', function() {
                    const format = this.value;
                    const table = document.getElementById('studentTable');
                    let data = [];
                    const headers = [];

                    // Get the table headers
                    table.querySelectorAll('thead th').forEach(th => {
                        headers.push(th.innerText.trim());
                    });

                    // Get the table rows
                    table.querySelectorAll('tbody tr').forEach(tr => {
                        const row = {};
                        tr.querySelectorAll('td').forEach((td, index) => {
                            row[headers[index]] = td.innerText.trim();
                        });
                        data.push(row);
                    });

                    if (format === 'csv') {
                        downloadCSV(data);
                    } else if (format === 'json') {
                        downloadJSON(data);
                    }
                });

                function downloadCSV(data) {
                    const csv = data.map(row => Object.values(row).join(',')).join('\n');
                    const blob = new Blob([csv], {
                        type: 'text/csv'
                    });
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'students.csv';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                }

                function downloadJSON(data) {
                    const json = JSON.stringify(data, null, 2);
                    const blob = new Blob([json], {
                        type: 'application/json'
                    });
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = 'students.json';
                    document.body.appendChild(a);
                    a.click();
                    document.body.removeChild(a);
                }
                // ========================== Export Js End ==============================

                // Table Header Checkbox checked all js Start
                $('#selectAll').on('change', function() {
                    $('.form-check .form-check-input').prop('checked', $(this).prop('checked'));
                });

                // Data Tables
                new DataTable('#studentTable', {
                    searching: false,
                    lengthChange: false,
                    info: false, // Bottom Left Text => Showing 1 to 10 of 12 entries
                    paging: false, // Pagination False
                    "columnDefs": [{
                            "orderable": false,
                            "targets": [0, 7]
                        } // Disables sorting on the 7th column (index 6)
                    ]
                });

                document.addEventListener('DOMContentLoaded', function() {
                    const kabupatenSelect = document.getElementById('id_kabupaten');
                    const kecamatanSelect = document.getElementById('id_kecamatan');

                    kabupatenSelect.addEventListener('change', function() {
                        const kabupatenId = this.value;
                        kecamatanSelect.innerHTML = '<option value="">Memuat...</option>';

                        if (kabupatenId) {
                            fetch(`/admin/get-kecamatan/${kabupatenId}`)
                                .then(response => response.json())
                                .then(data => {
                                    kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                                    data.forEach(kecamatan => {
                                        const option = document.createElement('option');
                                        option.value = kecamatan.id_kecamatan;
                                        option.textContent = kecamatan.nama_kecamatan;
                                        kecamatanSelect.appendChild(option);
                                    });
                                })
                                .catch(error => {
                                    kecamatanSelect.innerHTML = '<option value="">Gagal memuat</option>';
                                    console.error(error);
                                });
                        } else {
                            kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';
                        }
                    });
                });
            </script>

            @endsection