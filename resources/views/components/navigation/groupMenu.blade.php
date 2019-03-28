<li class="">
    <a href="#" class="menu-toggle">
        <i class="material-icons">{{ $icon }}</i>
        <span>{{ $groupName }}</span>
    </a>
    <ul class="ml-menu">
        @foreach ($buttons as $button)
            <li>
                <a href="{{ $button['url'] }}">{{ $button['name'] }}</a>
            </li>
        @endforeach
    </ul>
</li>
