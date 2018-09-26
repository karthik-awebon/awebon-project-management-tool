<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Project Tools
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ request()->is('home') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('home') }}">
                <i class="material-icons">dashboard</i>
                <p>Dashboard</p>
            </a>
            </li>
            <li class="{{ request()->is('create-projects') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('create-projects') }}">
                <i class="material-icons">dashboard</i>
                <p>New Projects</p>
            </a>
            </li>
            <li class="{{ request()->is('projects') ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('projects') }}">
                <i class="material-icons">dashboard</i>
                <p>Projects</p>
            </a>
            </li>
            <li class="{{ request()->is('create-workhours') ? 'active' : '' }}">
            <a class="nav-link" href="{{ ('create-workhours') }}">
                <i class="material-icons">dashboard</i>
                <p>New Work Hours</p>
            </a>
            </li>
            <li class="{{ request()->is('workhours') ? 'active' : '' }}">
            <a class="nav-link" href="{{ ('workhours') }}">
                <i class="material-icons">dashboard</i>
                <p>Work Hours</p>
            </a>
            </li>
        </ul>
    </div>
</div>