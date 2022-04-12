<div class="content-side content-side-full">
	@php
		if (auth()->user()->hasRole('Администратор')) {
			$allowed = true;	// TODO Разрешения в зависимости от роли пользователя
		}

		$menu = [
            ['title' => 'Главная', 'icon' => 'fa fa-home', 'route' => 'dashboard', 'pattern' => 'dashboard'],
            ['title' => 'Стажировки', 'heading' => true],
			['title' => 'История стажировок', 'icon' => 'fas fa-history', 'route' => 'history.index', 'pattern' => 'history.*'],
			['title' => 'Лица', 'heading' => true],
			['title' => 'Работодатели', 'icon' => 'fa fa-business-time', 'route' => 'employers.index', 'pattern' => 'employers.*'],
			['title' => 'Практиканты', 'icon' => 'fa fa-gear', 'route' => 'students.index', 'pattern' => 'students.*'],
			['title' => 'Настройки', 'heading' => true],
			['title' => 'Пользователи', 'icon' => 'fa fa-user-alt', 'route' => 'users.index', 'pattern' => 'users.*'],
			['title' => 'Laravel Telescope', 'icon' => 'fa fa-gears', 'route' => 'telescope', 'pattern' => 'telescope'],
		];
	@endphp
	<ul class="nav-main">
		@foreach($menu as $item)
			@if(isset($item['heading']))
				<li class="nav-main-heading">{{ $item['title'] }}</li>
			@else
				<li class="nav-main-item">
					<a class="nav-main-link{{ request()->routeIs($item['pattern']) ? ' active' : '' }}"
					   href="{{ route($item['route'], ['sid' => session()->getId()]) }}">
						<i class="nav-main-link-icon {{ $item['icon'] }}"></i>
						<span class="nav-main-link-name">{{ $item['title'] }}</span>
					</a>
				</li>
			@endif
		@endforeach
	</ul>
</div>