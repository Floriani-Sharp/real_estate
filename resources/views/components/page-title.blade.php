<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                @yield('page-icon')
            </div>
            <div>
                @yield('page-title')
                <div class="page-title-subheading">
                    @yield('page-description')
                </div>
            </div>
        </div>
        <div class="page-title-actions">
            @yield('page-button')
        </div>
    </div>
</div>