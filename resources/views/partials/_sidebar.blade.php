<div class="col-md-2">
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark h-100" style="width: 280px;">

        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('templates.index') }}" class="nav-link @if(request()->routeIs('templates.index')) active @else text-white  @endif" aria-current="page">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#home"></use>
                    </svg>
                    Templates
                </a>
            </li>
            <li>
                <a href="{{ route('campaigns.index') }}" class="nav-link @if(request()->routeIs('campaigns.index')) active @else text-white @endif">
                    <svg class="bi me-2" width="16" height="16">
                        <use xlink:href="#speedometer2"></use>
                    </svg>
                    Campaigns
                </a>
            </li>
        </ul>
    </div>
</div>
