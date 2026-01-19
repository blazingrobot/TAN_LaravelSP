@props(['type', 'href' => '#'])

@if ($type === 'view')
    <a href="{{ $href }}" class="btn btn-sm btn-info">
        View
    </a>
@elseif ($type === 'edit')
    <a href="{{ $href }}" class="btn btn-sm btn-warning">
        Edit
    </a>
@endif