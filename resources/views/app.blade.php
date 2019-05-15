<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/app.css ">
</head>
<body class="font-sans">
<div id="app">

    <header class="py-6  px-8 mb-8" style="background: url('/images/splash.svg') 0px 15px no-repeat;">
        <h1>
            <img alt="Assetsy" src="/images/logo.svg">
        </h1>
    </header>
    <div class="container px-8 pd-10">

        <main class="flex">
            <aside class="w-64 pt-8">
                <section class="mb-10">
                    <h5 class="uppercase font-bold mb-5 text-base">The Branch</h5>

                    <ul class="list-reset">
                        <li class="text-sm leading-loose">
                            <router-link class="text-black" to="/" exact>Logo</router-link>
                        </li>
                        <li class="text-sm leading-loose">
                            <router-link class="text-black" to="/logo-symbol">Logo Symbol</router-link>
                        </li>
                        <li class="text-sm leading-loose">
                            <router-link class="text-black" to="/colors">Colors</router-link>
                        </li>
                        <li class="text-sm leading-loose">
                            <router-link class="text-black" to="/">Typography</router-link>
                        </li>

                    </ul>
                </section>


                <section class="mb-10">
                    <h5 class="uppercase font-bold mb-5 text-base">Doodle</h5>

                    <ul class="list-reset">
                        <li class="text-sm leading-loose">
                            <router-link class="text-black" to="/mascot">Mascot</router-link>
                        </li>
                        <li class="text-sm leading-loose">
                            <router-link class="text-black" to="/illustrations">Illustrations</router-link>
                        </li>
                        <li class="text-sm leading-loose">
                            <router-link class="text-black" to="/loaders-and-animations">Loaders And Animations
                            </router-link>
                        </li>
                        <li class="text-sm leading-loose">
                            <router-link class="text-black" to="/wallpapers">Wallpapers</router-link>
                        </li>
                        <li class="text-sm leading-loose">
                            <router-link class="text-black" to="/backgrounds">Backgrounds</router-link>
                        </li>

                    </ul>
                </section>

                <section>
                    <h5 class="uppercase font-bold mb-5 text-base">Achievements</h5>

                    <ul class="list-reset">
                        <li class="text-sm leading-loose">
                            <router-link class="text-black" to="/achievements">Your Achievements</router-link>
                        </li>
                    </ul>
                </section>


            </aside>
            <div class="primary flex-1">
                <router-view></router-view>
            </div>
        </main>

    </div>

</div>

<script src="/js/app.js"></script>
</body>
</html>
