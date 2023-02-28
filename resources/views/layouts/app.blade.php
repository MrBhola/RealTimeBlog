<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ route('post.index')  }}">
                    All posts
                </a>
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Your posts
                </a>
                <a class="navbar-brand" href="{{ route('post.create') }}">
                    Create Post
                </a>
                <div style="color: fuchsia">Likes
                <span id="Likes" style="color: blue; font-weight: bold ">1</span>
                </div>
                <div style="margin-left: 20px; color: coral">Comments
                <span id="Comment" style="color: red; font-weight: bold ">1</span>
                </div>
                <div style="margin-left: 20px; color: teal">New Post
                <span id="NewPost"  style="color: green; font-weight: bold "></span>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
    <script>
        function showNotification() {
            const notification = new Notification("Jobins", {
                body: 'Thanks for subscribing!'
            })
        }
        if(Notification.permission !== "denied" && Notification.permission !== "granted" ) {
            Notification.requestPermission().then(permission => {
                if(permission === "granted") {
                    showNotification()
                }
            })
        }
        window.onload=function() {
            Echo.channel('posts')
                .listen('PostCreatedEvent', (e) => {
                    const newPost = document.getElementById('NewPost')
                    newPost.innerText = Number(newPost.innerText) + 1
                       console.log(e)
                    const payload = {
                    body: `${e.post.auther.name} has new post in title: ${e.post.title}`,
                    url:  '/post/' + e.post.id
                    }
                    pushNotification(payload)
                });
            Echo.private('post-liked.' +  {{ Auth::user()?->id }})
                .listen('PostLikedEvent', (e) => {
                    console.log(e.userName, e.postLink)
                    const newPost = document.getElementById('Likes')
                    newPost.innerText = Number(newPost.innerText) + 1
                    const payload = {
                        body: `${e.userName} Liked your post`,
                        url: e.postLink
                    }
                    pushNotification(payload)
                });


            function pushNotification(param) {
                if (Notification.permission === "granted") {
                    showNotification(param);
                } else if (Notification.permission !== "denied") {
                    Notification.requestPermission().then(permission => {
                        if (permission === "granted") {
                            showNotification(param)
                        }
                    })
                }
            }

            function showNotification(payload) {
                const notification = new Notification("Jobins", {
                    body: payload.body,
                    icon: "/images/jobins.png",
                    data: {
                        url: payload.url,
                    },
                });
                notification.onclick = function (event) {
                    event.preventDefault();
                    window.open(notification.data.url, "_blank");
                };
            }
        }
    </script>
</body>
</html>
