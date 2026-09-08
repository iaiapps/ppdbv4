<div class="bg-white rounded p-3 mb-3">
    <div class="d-flex justify-content-between align-items-center">
        <p class="fs-4 m-0">@yield('title')</p>
        @auth
            <span class="badge bg-{{ Auth::user()->branch_badge_class }} fs-6">
                <i class="bi bi-building me-1"></i> {{ Auth::user()->branch_label }}
            </span>
        @endauth
    </div>
</div>
