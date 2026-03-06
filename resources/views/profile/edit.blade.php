<x-app-layout title="Profil" subTitle="Profil">
    <x-card-component col="12" title="Profil">
        <div class="row">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <img src="{{ Auth::user()->image ? asset('storage/'.Auth::user()->image) : 'https://ui-avatars.com/api/?background=0D8ABC&color=FFF&name=' . str_replace(' ', '+', Auth::user()->name) }}" style="width: 100%" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" href="#profile" role="tab" aria-selected="true">
                            <span class="d-block d-sm-none"><i class="fas fa-user"></i></span>
                            <span class="d-none d-sm-block">Profile</span>
                        </a>
                    </li>

                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#password" role="tab" aria-selected="false" tabindex="-1">
                            <span class="d-block d-sm-none"><i class="fas fa-key"></i></span>
                            <span class="d-none d-sm-block">Edit Password</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active show" id="profile" role="tabpanel">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                    <div class="tab-pane" id="password" role="tabpanel">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            </div>
        </div>
    </x-card-component>
</x-app-layout>
