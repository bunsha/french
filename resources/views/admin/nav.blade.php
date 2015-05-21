					<ul class="nav nav-list">
						<li>
							<a href="#">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> {{ Lang::get('navigation.admin.dashboard') }} </span>
							</a>
						</li>

						<li class="pages_menu">
							<a href="#" class="dropdown-toggle">
								<i class="icon-edit"></i>
								<span class="menu-text"> {{ Lang::get('navigation.cities') }} </span>
							</a>
							<ul class="submenu">
								<li class="pages_menu_create">
									<a href="/admin/city/create">
										<i class="icon-double-angle-right"></i>
										{{ Lang::get('navigation.addNew') }}
									</a>
								</li>

								<li class="pages_menu_all">
									<a href="/admin/city">
										<i class="icon-double-angle-right"></i>
										{{ Lang::get('navigation.showAll') }}
									</a>
								</li>
							</ul>
						</li>

						<li class="types_menu">
							<a href="#" class="dropdown-toggle">
								<i class="icon-globe"></i>
								<span class="menu-text"> {{ Lang::get('navigation.types') }} </span>
							</a>
							<ul class="submenu">
								<li class="types_menu_create">
									<a href="/admin/types/create">
										<i class="icon-double-angle-right"></i>
										{{ Lang::get('navigation.addNew') }}
									</a>
								</li>

								<li class="companies_menu_all">
									<a href="/admin/types">
										<i class="icon-double-angle-right"></i>
										{{ Lang::get('navigation.showAll') }}
									</a>
								</li>
							</ul>
						</li>

						<li class="menu_menu">
							<a href="#" class="dropdown-toggle">
								<i class="icon-list"></i>
								<span class="menu-text"> Menu </span>
							</a>
							<ul class="submenu">
								<li class="menu_menu_create">
									<a href="/admin/menu/create">
										<i class="icon-double-angle-right"></i>
										Add New
									</a>
								</li>

								<li class="menu_menu_all">
									<a href="/admin/menu">
										<i class="icon-double-angle-right"></i>
										Show All
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.nav-list -->