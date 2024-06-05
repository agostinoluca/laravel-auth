@php
    $width = $width ?? '100%';
    $aspectRatio = $aspectRatio ?? null;

@endphp

@if (Str::startsWith($project->screenshot_site, 'https://'))
    <img class="rounded-3 card-img-top" src="{{ $project->screenshot_site }}" alt="Screenshot of the site/project"
        loading="lazy"
        style="width: {{ $width }}; @if ($aspectRatio) aspect-ratio: {{ $aspectRatio }}; @endif ">
@elseif (!$project->screenshot_site)
    <div class="text-secondary">No image uploaded</div>
@else
    <img class="rounded-3 card-img-top" src="{{ asset('storage/' . $project->screenshot_site) }}"
        alt="Screenshot of the site/project"
        style="width: {{ $width }}; @if ($aspectRatio) aspect-ratio: {{ $aspectRatio }}; @endif ">
@endif
