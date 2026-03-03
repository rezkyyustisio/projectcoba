<x-app-layout title="Pengaturan" subTitle="Website">
    <x-card-component col="12" title="Pengaturan Website">
        <div class="row">
            <div class="col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link mb-2 active bg-dark" id="v-general-tab" data-bs-toggle="pill" href="#v-general" role="tab" aria-controls="v-general" aria-selected="true">General</a>
                    <a class="nav-link mb-2" id="v-contact-tab" data-bs-toggle="pill" href="#v-contact" role="tab" aria-controls="v-contact" aria-selected="true">Contact</a>
                    <a class="nav-link mb-2" id="v-sosmed-tab" data-bs-toggle="pill" href="#v-sosmed" role="tab" aria-controls="v-sosmed" aria-selected="true">Sosmed</a>
                    <a class="nav-link mb-2" id="v-redaksi-tab" data-bs-toggle="pill" href="#v-redaksi" role="tab" aria-controls="v-redaksi" aria-selected="true">Redaksi</a>
                    <a class="nav-link mb-2" id="v-kode-tab" data-bs-toggle="pill" href="#v-kode" role="tab" aria-controls="v-kode" aria-selected="true">Kode Etik</a>
                    <a class="nav-link mb-2" id="v-pedoman-tab" data-bs-toggle="pill" href="#v-pedoman" role="tab" aria-controls="v-pedoman" aria-selected="true">Pedoman Media Siber</a>
                    <a class="nav-link mb-2" id="v-disclaimer-tab" data-bs-toggle="pill" href="#v-disclaimer" role="tab" aria-controls="v-disclaimer" aria-selected="true">Disclaimer</a>
                    <a class="nav-link mb-2" id="v-google-ads-tab" data-bs-toggle="pill" href="#v-google-ads" role="tab" aria-controls="v-google-ads" aria-selected="true">Google Ads</a>

                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                    <div class="tab-pane fade active show" id="v-general" role="tabpanel" aria-labelledby="v-general-tab">
                       <form action="{{ route('admin.setting.general') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <x-input-form-component col="6" title="Nama" id="name" value="{{ $settings['name'] ?? null }}" />
                                <x-input-form-component col="6" title="Nama Perusahaan" id="company" value="{{ $settings['company'] ?? null }}" />
                                <x-input-form-component col="6" title="Ukuran Icon" id="icon_size" value="{{ $settings['icon_size'] ?? null }}" />
                                <x-input-form-component col="6" title="Ukuran Logo" id="logo_size" value="{{ $settings['logo_size'] ?? null }}" />
                                <x-input-form-component col="6" title="Header" type="color" id="header" value="{{ $settings['header'] ?? null }}" />
                                <x-input-form-component col="6" title="Tema" type="color" id="theme" value="{{ $settings['theme'] ?? null }}" />
                                <x-input-form-component col="6" title="Logo Mobile" type="file" id="icon_light" />
                                {{-- <x-input-form-component col="6" title="Icon Dark" type="file" id="icon_dark" /> --}}
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/'.($settings['icon_light'] ?? null)) }}" height="50px" alt="">
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/'.($settings['icon_dark'] ?? null)) }}" height="50px" alt="">
                                </div> --}}

                                <x-input-form-component col="6" title="Logo Desktop" type="file" id="logo_light" />
                                {{-- <x-input-form-component col="6" title="Logo Dark" type="file" id="logo_dark" /> --}}
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/'.($settings['logo_light'] ?? null)) }}" height="50px" alt="">
                                </div>
                                {{-- <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/'.($settings['logo_dark'] ?? null)) }}" height="50px" alt="">
                                </div> --}}
                                <x-input-form-component col="6" title="Billboard" type="file" id="home_image" />
                                <div class="col-md-6 mb-3"></div>
                                <div class="col-md-6 mb-3">
                                    <img src="{{ asset('storage/'.($settings['home_image'] ?? null)) }}" height="50px" alt="">
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                       </form>
                    </div>
                    <div class="tab-pane fade" id="v-contact" role="tabpanel" aria-labelledby="v-contact-tab">
                       <form action="{{ route('admin.setting.contact') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <x-input-form-component col="6" title="Email" id="contact_email" type="email" value="{{ $settings['contact_email'] ?? null }}" />
                                <x-input-form-component col="6" title="Phone" id="contact_phone" value="{{ $settings['contact_phone'] ?? null }}" />
                                <x-input-form-component col="6" title="Address" id="contact_address" value="{{ $settings['contact_address'] ?? null }}" />
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                       </form>
                    </div>
                    <div class="tab-pane fade" id="v-sosmed" role="tabpanel" aria-labelledby="v-sosmed-tab">
                       <form action="{{ route('admin.setting.sosmed') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <x-input-form-component col="6" title="Facebook" id="sosmed_facebook" type="url" value="{{ $settings['sosmed_facebook'] ?? null }}" />
                                <x-input-form-component col="6" title="Youtube" id="sosmed_youtube" type="url" value="{{ $settings['sosmed_youtube'] ?? null }}" />
                                <x-input-form-component col="6" title="Whatsapp" id="sosmed_whatsapp" type="url" value="{{ $settings['sosmed_whatsapp'] ?? null }}" />
                                <x-input-form-component col="6" title="Instagram" id="sosmed_instagram" type="url" value="{{ $settings['sosmed_instagram'] ?? null }}" />
                                <x-input-form-component col="6" title="Tiktok" id="sosmed_tiktok" type="url" value="{{ $settings['sosmed_tiktok'] ?? null }}" />
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                       </form>
                    </div>
                    <div class="tab-pane fade" id="v-redaksi" role="tabpanel" aria-labelledby="v-redaksi-tab">
                       <form action="{{ route('admin.setting.redaksi') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <textarea id="redaksi" name="redaksi" class="form-control">{{$settings['redaksi'] ?? null}}</textarea>
                            <div class="d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                       </form>
                    </div>
                    <div class="tab-pane fade" id="v-kode" role="tabpanel" aria-labelledby="v-kode-tab">
                       <form action="{{ route('admin.setting.kode') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <textarea id="kode_etik" name="kode_etik" class="form-control">{{$settings['kode_etik'] ?? null}}</textarea>
                            <div class="d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                       </form>
                    </div>
                    <div class="tab-pane fade" id="v-pedoman" role="tabpanel" aria-labelledby="v-pedoman-tab">
                       <form action="{{ route('admin.setting.pedoman') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <textarea id="pedoman_media_siber" name="pedoman_media_siber" class="form-control">{{$settings['pedoman_media_siber'] ?? null}}</textarea>
                            <div class="d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                       </form>
                    </div>
                    <div class="tab-pane fade" id="v-disclaimer" role="tabpanel" aria-labelledby="v-disclaimer-tab">
                       <form action="{{ route('admin.setting.disclaimer') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <textarea id="disclaimer" name="disclaimer" class="form-control">{{$settings['disclaimer'] ?? null}}</textarea>
                            <div class="d-flex justify-content-end mt-2">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                       </form>
                    </div>
                    <div class="tab-pane fade" id="v-google-ads" role="tabpanel" aria-labelledby="v-google-ads-tab">
                       <form action="{{ route('admin.setting.google-ads') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <x-input-form-component col="6" title="Client ID" id="google_ads_client" max="50" value="{{ $settings['google_ads_client'] ?? null }}" />
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </x-card-component>

    @push('css')
        <style>
            .nav-link:hover{
                color: black
            }
        </style>
    @endpush
    @push('js')
        <script>
            $(document).ready(function() {
                $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
                    $('a.nav-link').removeClass('bg-dark');

                    $(e.target).addClass('bg-dark');
                });

                tinymce.init({
                    selector: "textarea#redaksi",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker table",
                    ],
                    toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | table",
                    style_formats: [
                        { title: "Bold text", inline: "b" },
                        { title: "Red text", inline: "span", styles: { color: "#ff0000" } },
                        { title: "Red header", block: "h1", styles: { color: "#ff0000" } },
                        { title: "Example 1", inline: "span", classes: "example1" },
                        { title: "Example 2", inline: "span", classes: "example2" },
                        { title: "Table styles" },
                        { title: "Table row 1", selector: "tr", classes: "tablerow1" }
                    ],
                    init_instance_callback: function (editor) {
                        editor.on('change', function () {
                            description = editor.getContent();
                        });
                    }
                });
                tinymce.init({
                    selector: "textarea#kode_etik",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker table",
                    ],
                    toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | table",
                    style_formats: [
                        { title: "Bold text", inline: "b" },
                        { title: "Red text", inline: "span", styles: { color: "#ff0000" } },
                        { title: "Red header", block: "h1", styles: { color: "#ff0000" } },
                        { title: "Example 1", inline: "span", classes: "example1" },
                        { title: "Example 2", inline: "span", classes: "example2" },
                        { title: "Table styles" },
                        { title: "Table row 1", selector: "tr", classes: "tablerow1" }
                    ],
                    init_instance_callback: function (editor) {
                        editor.on('change', function () {
                            description = editor.getContent();
                        });
                    }
                });
                tinymce.init({
                    selector: "textarea#pedoman_media_siber",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker table",
                    ],
                    toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | table",
                    style_formats: [
                        { title: "Bold text", inline: "b" },
                        { title: "Red text", inline: "span", styles: { color: "#ff0000" } },
                        { title: "Red header", block: "h1", styles: { color: "#ff0000" } },
                        { title: "Example 1", inline: "span", classes: "example1" },
                        { title: "Example 2", inline: "span", classes: "example2" },
                        { title: "Table styles" },
                        { title: "Table row 1", selector: "tr", classes: "tablerow1" }
                    ],
                    init_instance_callback: function (editor) {
                        editor.on('change', function () {
                            description = editor.getContent();
                        });
                    }
                });
                tinymce.init({
                    selector: "textarea#disclaimer",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker table",
                    ],
                    toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | table",
                    style_formats: [
                        { title: "Bold text", inline: "b" },
                        { title: "Red text", inline: "span", styles: { color: "#ff0000" } },
                        { title: "Red header", block: "h1", styles: { color: "#ff0000" } },
                        { title: "Example 1", inline: "span", classes: "example1" },
                        { title: "Example 2", inline: "span", classes: "example2" },
                        { title: "Table styles" },
                        { title: "Table row 1", selector: "tr", classes: "tablerow1" }
                    ],
                    init_instance_callback: function (editor) {
                        editor.on('change', function () {
                            description = editor.getContent();
                        });
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>
