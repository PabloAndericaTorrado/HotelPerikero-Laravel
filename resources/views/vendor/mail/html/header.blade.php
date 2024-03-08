@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img
                    src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcQf5nKWN_89ntmbKz2Qho7VG54WbdPfPSpIKcZoU4HhPg6Q1mfA"
                    class="logo" alt="Laravel Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
