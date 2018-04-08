<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{Route::is('project-list') ? 'active' : ''}}" href="{{route('project-list')}}">View projects</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Route::is('project-add') ? 'active' : ''}}" href="{{route('project-add')}}">Add project</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Archived projects</a>
    </li>
</ul>
