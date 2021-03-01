<div class="header">
    <a href="/">
        <img src="{{ asset('storage/logo.png') }}" height="50px" width="50px" class="logo">
        <div class="header-text">
            PHizza Hut
        </div>
    </a>
    <div class="header-navigation">
        <ul>
            <li><a href="/view/transaction/{{\Illuminate\Support\Facades\Auth::user()->id}}">View Transaction History</a><span></span></li>
            <li><a href="/view/cart">View Cart</a><span></span></li>
            <li><a href="">{{\Illuminate\Support\Facades\Auth::user()->username}}<i class="fa fa-caret-down"></i></a>
                <div class="dropdown-menu">
                    <ul>
                        <li><a href="/logout">Logout</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>