@props(['items' => []])

@if(!empty($items))
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb bg-transparent p-0 m-0">
            @foreach($items as $i => $item)
                @php
                    // Cada item es ['Etiqueta', 'url'] o ['Etiqueta', null] si es el último
                    [$label, $url] = $item + [null, null];
                @endphp

                @if($url && $i < count($items)-1)
                    <li class="breadcrumb-item">
                        <a class="link-brand" href="{{ $url }}">{{ $label }}</a>
                    </li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $label }}</li>
                @endif
            @endforeach
        </ol>
    </nav>
@endif
