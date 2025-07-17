<option value="{{ $menu->id }}">
    {{ $prefix }}{{ $menu->title }}
</option>

@if ($menu->children->count())
    @foreach ($menu->children as $child)
        @include('menus.partials.menu-option', ['menu' => $child, 'prefix' => $prefix . '── '])
    @endforeach
@endif
