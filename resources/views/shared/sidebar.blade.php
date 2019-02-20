<div class="left-side-bar">
	<div class="brand-logo">
		<a href="index.php">
			<img src="images/deskapp-logo.png" alt="">
		</a>
	</div>
	<div class="menu-block customscroll">
		<div class="sidebar-menu">
			<ul id="accordion-menu">
				@if(Auth::user()->role == 'admin')
				<li>
					<a href="{!! route('users.index') !!}" class="dropdown-toggle no-arrow">
						<i class="fa fa-user"></i>Users  <span class="badge badge-secondary">  {!! App\User::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{!! route('projects.index') !!}" class="dropdown-toggle no-arrow">
						<i class="fa fa-bars"></i>Projects  <span class="badge badge-secondary">  {!! App\Project::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{!! route('industries.index') !!}" class="dropdown-toggle no-arrow">
						<i class="fa fa-cubes"></i>Indusry   <span class="badge badge-secondary">{!! App\Project::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{!! route('departments.index') !!}" class="dropdown-toggle no-arrow">
						<i class="fa fa-database"></i>Departments   <span class="badge badge-secondary">{!! App\Department::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{!! route('designations.index') !!}" class="dropdown-toggle no-arrow">
						<i class="fa fa-bank"></i>Designation   <span class="badge badge-secondary">{!! App\Designation::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{!! route('task_categories.index') !!}" class="dropdown-toggle no-arrow">
						<i class="fa fa-list-alt"></i>Task Categories   <span class="badge badge-secondary">{!! App\TaskCategory::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{!! route('project_categories.index') !!}" class="dropdown-toggle no-arrow">
						<i class="fa fa-list-alt"></i>Project Categories   <span class="badge badge-secondary">{!! App\ProjectCategory::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{!! route('blog_categories.index') !!}" class="dropdown-toggle no-arrow">
						<i class="fa fa-list-alt"></i>Blog Categories   <span class="badge badge-secondary">{!! App\BlogCategory::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{!! route('clients.index') !!}" class="dropdown-toggle no-arrow">
						<i class="fa fa-handshake-o"></i>Clients   <span class="badge badge-secondary">{!! App\Client::count() !!}</span>
					</a>
				</li>
				<li>
					<a href="{!! route('tasks.index') !!}" class="dropdown-toggle no-arrow">
						<i class="fa fa-tasks"></i>Tasks   <span class="badge badge-secondary">{!! App\Task::count() !!}</span>
					</a>
				</li>
				@else
				<li>
					<a href="{!! route('profile') !!}" class="dropdown-toggle no-arrow">
						<i class="fa fa-handshake-o"></i>Profile   
					</a>
				</li>
				@endif
					<li>
					<a href="{!! route('blogs.index') !!}" class="dropdown-toggle no-arrow">
						<i class="fa fa-handshake-o"></i>Blog   <span class="badge badge-secondary">{!! App\Blog::count() !!}</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>