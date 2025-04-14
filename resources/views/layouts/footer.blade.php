{{-- resources/views/layouts/partials/footer.blade.php --}}
<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="footer-left">
            &copy; {{ date('Y') }}
            <span class="mx-1">&bull;</span>
            {{ config('app.name', 'ClassPilot') }}
        </div>
        <div class="footer-right">
            v{{ Illuminate\Foundation\Application::VERSION }}
        </div>
    </div>
</footer>
