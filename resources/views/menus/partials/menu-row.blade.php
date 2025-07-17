<tr>
    <td>{{ $prefix }}{{ $menu->title }}</td>
    <td>{{ $menu->url }}</td>
    <td>{{ $menu->parent ? $menu->parent->title : '—' }}</td>
    <td>{{ $menu->order }}</td>
    <td>
        <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-sm btn-primary">Edit</a>
        <form action="{{ route('menus.destroy', $menu->id) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
    </td>
</tr>

@if ($menu->children->count())
    @foreach ($menu->children as $child)
        @include('menus.partials.menu-row', [
            'menu' => $child,
            'prefix' => $prefix . '── '
        ])
    @endforeach
@endif
