<section class="wrapper__section p-0">
    <div class="wrapper__section__components">
        <footer>
            <div class="wrapper__footer bg__footer-dark pb-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer ">
                                    <h4 class="footer-title">
                                        Kategori
                                        <span class="fa fa-angle-down"></span>
                                    </h4>
                                </div>

                                <ul class="list-unstyled option-content is-hidden">
                                    @foreach ($providerCategories as $category)
                                        <li><a href="{{ route('category', $category->slug) }}">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        Link
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>

                                <ul class="list-unstyled option-content is-hidden">
                                    <li>
                                        <a href="{{ route('redaksi') }}">Redaksi</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kode-etik') }}">Kode Etik</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('pedoman-media-siber') }}">Pedoman Media Siber</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('disclaimer') }}">Disclaimer</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        Kontak Kami
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>
                                <ul class="list-unstyled option-content is-hidden">
                                    <li>
                                        <a href="#">{{$settings['contact_email']}}</a>
                                    </li>
                                    <li>
                                        <a href="#">{{$settings['contact_phone']}}</a>
                                    </li>
                                    <li>
                                        <a href="#">{{$settings['contact_address']}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="widget__footer">
                                <div class="dropdown-footer">
                                    <h4 class="footer-title">
                                        Sosial Media
                                        <span class="fa fa-angle-down"></span>
                                    </h4>

                                </div>

                                <ul class="list-unstyled option-content is-hidden">
                                    <li>
                                        <a href="{{ $settings['sosmed_facebook'] ?? null }}">Facebook</a>
                                    </li>
                                    <li>
                                        <a href="{{ $settings['sosmed_youtube'] ?? null }}">Youtube</a>
                                    </li>
                                    <li>
                                        <a href="{{ $settings['sosmed_whatsapp'] ?? null }}">Whatsapp</a>
                                    </li>
                                    <li>
                                        <a href="{{ $settings['sosmed_instagram'] ?? null }}">Instagram</a>
                                    </li>
                                    <li>
                                        <a href="{{ $settings['sosmed_tiktok'] ?? null }}">Tiktok</a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrapper__footer-bottom bg__footer-dark">
                <div class="container ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="border-top-1 bg__footer-bottom-section">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <span>
                                            Copyright © {{ date('Y') }} {{ $settings['company'] ?? null }} | Design by PT The Day Website
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</section>
<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
