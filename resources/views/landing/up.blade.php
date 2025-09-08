@php
    // tagline
    $tagline = App\Models\Setting::where('name', 'tagline')->first();
@endphp
<div class="bg-orange">
    <p class="text-center mb-0 text-white p-2">{{ $tagline->value }}</p>
</div>
