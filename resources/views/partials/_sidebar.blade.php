<div class="col-md-2">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100" style="width: 280px;">

        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('templates.index') }}" class="nav-link @if(request()->routeIs('templates.index')) active @else text-white  @endif" aria-current="page">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    {{ __('Templates') }}
                </a>
            </li>
            <li>
                <a href="{{ route('campaigns.index') }}" class="nav-link @if(request()->routeIs('campaigns.index')) active @else text-white @endif">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg>
                    {{ __('Campaigns') }}
                </a>
            </li>
            <li>
                <a href="{{ route('email.setting.edit') }}" class="nav-link @if(request()->routeIs('email.setting.edit')) active @else text-white @endif">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg>
                    {{ __('Email Setting') }}
                </a>
            </li>
            <li>
                <a class="nav-link text-white" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>
