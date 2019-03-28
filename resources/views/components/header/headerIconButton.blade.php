
<li>
    <a href="{{ $url }}" @if(isset($class)) class="{{ $class }}" @endif @if(isset($id)) id="{{ $id }}" @endif data-close="true" data-toggle="tooltip" title="{{ $name }}" data-placement="bottom">
        <i class="material-icons">{{ $icon }}</i>
    </a>
</li>
