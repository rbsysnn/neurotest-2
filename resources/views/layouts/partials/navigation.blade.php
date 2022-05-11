<div class="content-side content-side-full">
	@php
		if (auth()->user()->hasRole('Администратор')) {
			$allowed = true;	// TODO Разрешения в зависимости от роли пользователя
		}

		$menu = [
            ['title' => 'Главная', 'icon' => 'fa fa-home', 'route' => 'dashboard', 'pattern' => 'dashboard'],

            ['title' => 'Клиенты', 'heading' => true],
            ['title' => 'Клиенты и контракты', 'icon' => 'fas fa-building', 'route' => 'clients.index', 'pattern' => ['clients.*', 'contracts.*']],

			['title' => 'Конструктор тестов', 'heading' => true],
			['title' => 'Вопросы тестов', 'icon' => 'fas fa-question-circle', 'route' => 'sets.index', 'pattern' => ['sets.*', 'questions.*']],
			['title' => 'Обработка результатов', 'icon' => 'fas fa-drafting-compass', 'route' => 'fmptypes.index', 'pattern' => ['fmptypes.*', 'profiles.*', 'blocks.*']],
			['title' => 'Ссылочные блоки', 'icon' => 'fas fa-link', 'route' => 'aliaslists.index', 'pattern' => ['aliaslists.*']],

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
