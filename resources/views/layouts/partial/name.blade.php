<div class="bg-white rounded p-3 mb-3">
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
        <p class="fs-4 m-0">@yield('title')</p>
        @auth
            @if (Auth::user()->branch)
                <span class="badge bg-{{ Auth::user()->branch_badge_class }} fs-6 text-wrap text-center">
                    <i class="bi bi-building me-1"></i> {{ Auth::user()->branch_label }}
                </span>
            @else
                <span class="badge bg-dark fs-6">
                    <i class="bi bi-shield-lock me-1"></i> Admin
                </span>
            @endif
        @endauth
    </div>
</div>
