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
            <li class="{{ request()->is('admin') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="{{ request()->is('admin/create-projects') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('create-projects') }}">
                    <i class="material-icons">add</i>
                    <p>New Projects</p>
                </a>
            </li>
            <li class="{{ request()->is('admin/projects') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('projects') }}">
                    <i class="material-icons">filter_none</i>
                    <p>Projects</p>
                </a>
            </li>
            <li class="{{ request()->is('admin/create-workhours') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('create-workhours') }}">
                    <i class="material-icons">build</i>
                    <p>New Work Hours</p>
                </a>
            </li>
            <li class="{{ request()->is('admin/workhours') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('workhours') }}">
                    <i class="material-icons"> work</i>
                    <p>Work Hours</p>
                </a>
            </li>
            <li class="{{ request()->is('admin/create-resource') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('create-resource') }}">
                    <i class="material-icons">person_add</i>
                    <p>New Resource</p>
                </a>
            </li>
            <li class="{{ request()->is('admin/index-resource') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('index-resource') }}">
                    <i class="material-icons">person</i>
                    <p>Resource</p>
                </a>
            </li>
        </ul>
    </div>
</div>