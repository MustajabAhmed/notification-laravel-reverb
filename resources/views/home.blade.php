@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Notifications') }}</div>

                    <div class="card-body">
                        <div id="notification" class="notification">
                            <div class="notification-content">
                                <strong>System Maintenance Alert:</strong> <span id="notification-message"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            window.addEventListener('DOMContentLoaded', function() {
                window.Echo.channel('system-maintenance')
                    .listen('SystemMaintenanceEvent', (event) => {
                        document.getElementById('notification-message').innerText = event.time;
                        document.getElementById('notification').classList.add('show');
                        setTimeout(() => {
                            document.getElementById('notification').classList.remove('show');
                        }, 5000);
                    });
            });
        </script>
    @endpush

    <style>
        .notification {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            padding: 15px;
            width: 100%;
            display: none;
            transition: opacity 0.5s;
            margin-bottom: 10px; /* Space between notification and other content */
        }

        .notification.show {
            display: block;
            opacity: 1;
        }
    </style>
@endsection
