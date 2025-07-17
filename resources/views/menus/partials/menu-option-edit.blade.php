@if ($menu->id !== $currentId) {{-- Prevent self as parent --}}
    <option value="{{ $menu->id }}" {{ $menu->id == $selectedId ? 'selected' : '' }}>
        {{ $prefix }}{{ $menu->title }}
    </option>
@endif

@if ($menu->children->count())
    @foreach ($menu->children as $child)
        @include('menus.partials.menu-option-edit', [
            'menu' => $child,
            'prefix' => $prefix . '── ',
            'currentId' => $currentId,
            'selectedId' => $selectedId
        ])
    @endforeach
@endif
