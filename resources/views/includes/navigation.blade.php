<header>
    <div class="content-container">
        <div class="header_wrapper">
            <div class="nav-wrapper">
                <a href="{{route('index')}}" class="header_logo">
                    <img src="{{asset('/images/logo.svg')}}"/>
                </a>
                <nav class="nav">
                    <ul class="list">
                        <li class="list-item"><a class="list-item-link active" href="{{route('index')}}"><span>Home</span></a></li>
                        <li class="list-item"><a class="list-item-link" href="/history"><span>History</span></a></li>
                        <li class="list-item"><a class="list-item-link" href="/service"><span>Service</span></a></li>
                        <li class="list-item"><a class="list-item-link" href="/gallery"><span>Gallery</span></a></li>
                    </ul>
                </nav>
            </div>

            <div class="control-bar">
                <a href="/profile">
                    <img src="{{asset('/images/profile-icon.svg')}}"/>
                </a>
                <a href="#">
                    <img src="{{asset('/images/notification-icon.svg')}}"/>
                </a>
                <button type="button" class="btn btn-primary btn-lg main-button">Appointment</button>
            </div>
        </div>
    </div>
</header>
