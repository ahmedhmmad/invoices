<!-- main-sidebar -->
		<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
		<aside class="app-sidebar sidebar-scroll">
			<div class="main-sidebar-header active">
				<a class="desktop-logo logo-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo.png')}}" class="main-logo" alt="logo"></a>
				<a class="desktop-logo logo-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/logo-white.png')}}" class="main-logo dark-theme" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-light active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="logo-icon" alt="logo"></a>
				<a class="logo-icon mobile-logo icon-dark active" href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('assets/img/brand/favicon-white.png')}}" class="logo-icon dark-theme" alt="logo"></a>
			</div>
			<div class="main-sidemenu">
				<div class="app-sidebar__user clearfix">
					<div class="dropdown user-pro-body">
						<div class="">
							<img alt="user-img" class="avatar avatar-xl brround" src="{{URL::asset('assets/img/faces/6.jpg')}}"><span class="avatar-status profile-status bg-green"></span>
						</div>
						<div class="user-info">
							<h4 class="font-weight-semibold mt-3 mb-0">{{isset(\Illuminate\Support\Facades\Auth::user()->name)?\Illuminate\Support\Facades\Auth::user()->name:"user"}}</h4>
							<span class="mb-0 text-muted">{{isset(\Illuminate\Support\Facades\Auth::user()->email)? \Illuminate\Support\Facades\Auth::user()->email:"email"}}</span>
						</div>
					</div>
				</div>
				<ul class="side-menu">

                    <li class="side-item side-item-category">برنامج الفواتير</li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label">الفواتير</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{route('invoices.index')}}">قائمة الفواتير</a></li>
                            <li><a class="slide-item" href="{{ url('/' . $page='chart-flot') }}">الفواتير المدفوعة</a></li>
                            <li><a class="slide-item" href="{{ url('/' . $page='chart-chartjs') }}">الفواتير الغير مدفوعة</a></li>
                            <li><a class="slide-item" href="{{ url('/' . $page='chart-echart') }}">الفواتير المدفوعة جزئياً</a></li>
                            i>
                        </ul>
                    </li>

                    <li class="side-item side-item-category">المستخدمين</li>
					<li class="slide">
						<a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label">المستخدمين</span><i class="angle fe fe-chevron-down"></i></a>
						<ul class="slide-menu">
							<li><a class="slide-item" href="{{ url('/' . $page='mail') }}">قائمة المستخدمين</a></li>
							<li><a class="slide-item" href="{{ url('/' . $page='mail-compose') }}">صلاحيات المستخدمين</a></li>

						</ul>
					</li>

                    <li class="side-item side-item-category">الاعدادت</li>
                    <li class="slide">
                        <a class="side-menu__item" data-toggle="slide" href="{{ url('/' . $page='#') }}"><svg xmlns="http://www.w3.org/2000/svg" class="side-menu__icon" viewBox="0 0 24 24" ><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3"/><path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z"/></svg><span class="side-menu__label">الاعدادات</span><i class="angle fe fe-chevron-down"></i></a>
                        <ul class="slide-menu">
                            <li><a class="slide-item" href="{{ url('/' . $page='sections') }}">الأقسام</a></li>
                            <li><a class="slide-item" href="{{ url('/' . $page='products') }}">المنتجات</a></li>
                        </ul>
                    </li>
				</ul>
			</div>
		</aside>
<!-- main-sidebar -->
