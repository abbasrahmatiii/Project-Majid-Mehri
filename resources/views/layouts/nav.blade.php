<div class="header-nav-bar bg-primary" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'background-color': 'transparent'}" data-sticky-header-style-deactive="{'margin-right': '0'}">
  <div class="container">
    <div class="header-row">
      <div class="header-column">
        <div class="header-row justify-content-end">
          <div class="header-nav header-nav-force-light-text justify-content-start py-2 py-lg-3" data-sticky-header-style="{'minResolution': 991}" data-sticky-header-style-active="{'margin-right': '135px'}">
            <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
              <nav class="collapse">
                <ul class="nav nav-pills" id="mainNav">
                  <li class="dropdown dropdown-full-color dropdown-light">
                    <a class="dropdown-item dropdown-toggle active" href="/">
                      <i class="fas fa-home"></i> خانه
                    </a>
                  </li>
                  <li class="dropdown dropdown-full-color dropdown-light">
                    <a class="dropdown-item dropdown-toggle" href="{{ route('posts.index') }}">
                      اخبار
                    </a>
                  </li>
                  <li class="dropdown dropdown-full-color dropdown-light">
                    <a class="dropdown-item dropdown-toggle" href="{{ route('articles') }}">
                      مقالات
                    </a>
                  </li>
                  @if(auth()->check())
                  @if(auth()->user()->hasRole('مدیر کل'))
                  <li class="dropdown dropdown-full-color dropdown-light">
                    <a class="dropdown-item dropdown-toggle" href="/admin/dashboard">
                      داشبورد {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                    </a>
                  </li>
                  <li class="dropdown dropdown-full-color dropdown-light">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                    <a class="dropdown-item dropdown-toggle" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      خروج از کاربری
                    </a>
                  </li>
                  @else
                  <li class="dropdown dropdown-full-color dropdown-light">
                    <a class="dropdown-item dropdown-toggle" href="{{ route('profile') }}">
                      پروفایل {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                    </a>
                  </li>
                  <li class="dropdown dropdown-full-color dropdown-light">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                    </form>
                    <a class="dropdown-item dropdown-toggle" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      خروج از کاربری
                    </a>
                  </li>
                  @endif
                  @else
                  <li class="dropdown dropdown-full-color dropdown-light">
                    <a class="dropdown-item dropdown-toggle" href="{{ route('login') }}">
                      ورود
                    </a>
                  </li>
                  <li class="dropdown dropdown-full-color dropdown-light">
                    <a class="dropdown-item dropdown-toggle" href="{{ route('register') }}">
                      ثبت نام
                    </a>
                  </li>
                  @endif
                </ul>
              </nav>
            </div>
            <button class="btn header-btn-collapse-nav my-2" data-toggle="collapse" data-target=".header-nav-main nav">
              <i class="fas fa-bars"></i>
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style>
  ul {
    margin-top: 16px;
  }
</style>