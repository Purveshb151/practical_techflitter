<div class="col-md-3">
    <div class="card">
        <div class="card-header">{{ __('Menu Items') }}</div>

        <div class="card-body">
            <ul style="text-decoration: none;">
                <li><a href="{{ route('user.index') }}">User</a></li>
                {{-- <li><a href="{{ route('compose.inbox') }}">Inbox</a></li>
                <li><a href="{{ route('compose.sent') }}">Sent Items</a></li>
                <li><a href="{{ route('compose.create') }}">Compose</a></li> --}}
                <li><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">logout</a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </div>

    <div class="card">
        <div class="card-header">{{ __('User Detail') }}</div>
        <div class="card-body userdetail">
        </div>
    </div>
</div>