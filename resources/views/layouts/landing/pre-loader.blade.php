<div class="loading-container">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <ul class="list-unstyled">
            <li>
                <div class="spinner">
                    <div class="rect1" style="background: {{ $settings['theme'] ?? null }}"></div>
                    <div class="rect2" style="background: {{ $settings['theme'] ?? null }}"></div>
                    <div class="rect3" style="background: {{ $settings['theme'] ?? null }}"></div>
                    <div class="rect4" style="background: {{ $settings['theme'] ?? null }}"></div>
                    <div class="rect5" style="background: {{ $settings['theme'] ?? null }}"></div>
                </div>

            </li>
            <li>
                <p style="color: {{ $settings['theme'] ?? null }}">Loading</p>
            </li>
        </ul>
    </div>
</div>
