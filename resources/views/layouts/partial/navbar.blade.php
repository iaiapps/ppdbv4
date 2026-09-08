    @include('landing.up')
    @php
        use App\Models\Setting;
        $contacts = Setting::where('type', 'kontak')->get();
        $primaryWa = $contacts->skip(1)->first();
        $waNumber = $primaryWa ? ltrim($primaryWa->value, '0') : '85232213939';
    @endphp
    <nav class="row py-2 gx-0 px-3 px-md-4 bg-white">
        <div class="col-6">
            @php
                $navLogo = Auth::user()->branch === 'sditharum_2' ? 'img/harum2.jpg' : 'img/logoutama.svg';
            @endphp
            <img src="{{ asset($navLogo) }}" alt="logoppdb" class="logonav" />
        </div>

        <div class="col-6 text-end align-content-center">
            <div class="d-flex justify-content-end">
                <a class="btn btn-orange text-white me-2" target="_blank" href="https://wa.me/62{{ $waNumber }}">
                    <i class="bi bi-chat-left-text"></i>
                </a>
                <div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">logout</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
