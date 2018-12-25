<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="{{ route('home') }}" class="simple-text logo-normal">
            Project Tools
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ request()->is('create-userworkhours') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('create-userworkhours') }}">
                    <i class="material-icons"> work</i>
                    <p>New Work Hours</p>
                </a>
            </li>
            <li class="{{ request()->is('index-userworkhours') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('index-userworkhours') }}">
                    <i class="material-icons"> work</i>
                    <p>Work Hours</p>
                </a>
            </li>
        </ul>
    </div>
</div>