@if (Str::startsWith($project->screenshot_site, 'https://'))
    <img class="rounded-3 card-img-top" src="{{ $project->screenshot_site }}" alt="Screenshot of the site/project"
        loading="lazy">
@elseif (!$project->screenshot_site)
    <div class="text-secondary">No image uploaded</div>
@else
    <img class="rounded-3 card-img-top" src="{{ asset('storage/' . $project->screenshot_site) }}"
        alt="Screenshot of the site/project">
@endif
