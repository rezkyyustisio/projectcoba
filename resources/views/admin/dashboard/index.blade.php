<x-app-layout title="Dashboard" subTitle="Dashboard">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="bg-dark bg-soft">
                <div class="row">
                    <div class="col-7">
                        <div class="text-dark p-3">
                            <h5 class="text-dark">Selamat Datang</h5>
                            <p>{{ $settings['company'] ?? null }}</p>
                        </div>
                    </div>
                    <div class="col-5 align-self-end">
                        <img src="{{ asset('assets/images/profile-img.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="avatar-md profile-user-wid mb-4">
                            <img src="{{ Auth::user()->image ? asset('storage/'.Auth::user()->image) : 'https://ui-avatars.com/api/?background=0D8ABC&color=FFF&name=' . str_replace(' ', '+', Auth::user()->name) }}" alt="" class="img-thumbnail rounded-circle" style="height: 70px; width:70px">
                        </div>
                        <h5 class="font-size-15 text-truncate">{{ auth()->user()->name }}</h5>
                        <p class="text-muted mb-0 text-truncate">{{ auth()->user()->roles()?->first()?->name }}</p>
                    </div>

                    <div class="col-sm-8 text-end">
                        <div class="pt-4">
                            <div class="mt-4">
                                <a href="{{ route('profile.edit') }}"
                                    class="btn btn-dark waves-effect waves-light btn-sm">Lihat
                                    Profil <i class="mdi mdi-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-8">
        <div class="row">
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Pengguna</p>
                                <h4 class="mb-0">{{ number_format($users->count(),0,',','.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-dark">
                                    <span class="avatar-title bg-dark">
                                        <i class="bx bx-group font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Berita</p>
                                <h4 class="mb-0">{{ number_format($beritas->count(),0,',','.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-dark">
                                    <span class="avatar-title bg-dark">
                                        <i class="bx bxs-news font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Tag</p>
                                <h4 class="mb-0">{{ number_format($tags->count(),0,',','.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-dark">
                                    <span class="avatar-title bg-dark">
                                        <i class="bx bx-tag font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mini-stats-wid">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-muted fw-medium">Kategori</p>
                                <h4 class="mb-0">{{ number_format($categories->count(),0,',','.') }}</h4>
                            </div>

                            <div class="flex-shrink-0 align-self-center">
                                <div class="mini-stat-icon avatar-sm rounded-circle bg-dark">
                                    <span class="avatar-title bg-dark">
                                        <i class="bx bx-book-content font-size-24"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-card-component col="12" title="Jumlah Berita Tahun {{ date('Y') }}">
        <div id="chart-berita"></div>
    </x-card-component>

    @push('js')
        <script>
            const bulan = @json($bulanID);
            const data = @json($beritas_per_bulan);

            var options = {
                chart: { type: 'line', height: 320, toolbar: { show: false } },
                series: [{ name: 'Jumlah Berita', data }],
                xaxis: { categories: bulan },
                stroke: { curve: 'smooth', width: 3 },
                dataLabels: { enabled: false },
                markers: { size: 4 },
                yaxis: { min: 0, forceNiceScale: true },
                colors: ['#000000'] // Menambahkan warna hitam untuk garis
            };

            new ApexCharts(document.querySelector("#chart-berita"), options).render();
            </script>
    @endpush

    @push('css')
        <style>
            .btn-secondary {
                background-color: #34383a !important;
            }

            .btn-secondary:hover {
                background-color: #37393a !important;
            }

            .btn-dark {
                background-color: #111213 !important;
            }

            .btn-dark:hover {
                background-color: #212325 !important;
            }
        </style>
    @endpush
</x-app-layout>
