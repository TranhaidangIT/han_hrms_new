@props(['employeeCode', 'activeTab' => null])

@php
    $employeeCode = $employeeCode ?? 0;
    $tabConfig = config('employeetab');
@endphp

<div class="employee-tab">
    <ul class="nav nav-tabs" id="employeeTab" role="tablist">
        @foreach ($tabConfig as $tab)
            @php
                $tabUrl = '#';
                if (!empty($tab['route'])) {
                    $params = [];
                    if (isset($tab['routeParam'])) {
                        $params[$tab['routeParam']] = $employeeCode;
                    } else {
                        $params = ['employeeCode' => $employeeCode];
                    }
                    $activeClass = $tab['tabKey'] === $activeTab ? 'active' : '';
                    $tabUrl = route($tab['route'], $params);
                }
            @endphp
            <li class="nav-item" role="presentation">
                <a class="nav-link {{ $activeClass }}" id="{{ $tab['tabKey'] }}-tab" data-bs-toggle="tab" data-bs-target="#employeeTabContent"
                    role="tab" href="{{ $tabUrl }}"
                    onclick="location.href = this.href">{{ $tab['tabName'] }}</a>
            </li>
        @endforeach
    </ul>
    <div class="tab-content mt-3" id="employeeTabContent">
        <div class="tab-pane fade show active" id="employeeTabContent" role="tabpanel" aria-labelledby="personal-tab">
            {{ $slot ?? '' }}
        </div>
    </div>
</div>
