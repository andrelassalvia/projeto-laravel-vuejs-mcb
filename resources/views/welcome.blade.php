<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Portal MCB</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

        
        <!-- Styles -->
        <link rel="stylesheet" href="{{mix('/css/app.css')}}">

    </head>

    
    <body>
        <div class="d-flex flex-column">
            
            <!-- Header -->
            <header>
                @if (Route::has('login'))
                <div class="d-flex head">
                    @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                    <a href="{{ route('login') }}" class="d-inline-flex btn btn-action link link-login">Log in</a>
                    
                    
                    
                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="d-inline-flex btn link link-register">Register</a>
                    @endif
                    @endauth
                </div>
                @endif
            </header>
            <main>
                <div class="container mb-5">

                    <div class="row ">
                        <div class="col d-flex justify-content-center"  >
                            <img src="{{'assets/images/MCB-logo4.png'}}" alt="logotipo" class="img-fluid" id="logo" >
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row d-flex justify-content-around">
                        <div class="col-12 col-xl-5 align-self-start px-4 box mb-4">
                            <div class="d-flex mb-2 mt-2">
                                <ion-icon name="accessibility-sharp" ></ion-icon>
                                <h5 class="d-flex align-items-center px-3">Clientes e Fornecedores </h5>
                            </div>
                            <p>Gerencie as informacoes de seus clientes e fornecedores de servicos</p>
                        </div>
                        <div class="col-12 col-xl-5 align-self-end px-4 box mb-4">
                            <div class="d-flex mb-2 mt-2">
                                <ion-icon name="documents-sharp"></ion-icon>
                                <h5 class="d-flex align-items-center px-3">Controle de Ordens</h5>
                            </div>
                            <p>Inicie uma ordem de servico e monitore seu andamento</p>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-12 col-xl-5 align-self-start px-4 box mb-4">
                            <div class="d-flex mb-2 mt-2">
                                <ion-icon name="download-sharp"></ion-icon>
                                <h5 class="d-flex align-items-center px-3">Automação de tarefas</h5>
                            </div>
                            <p>Documentos pre-formatados para as demandas mais comuns</p>
                        </div>
                        <div class="col-12 col-xl-5 align-self-end px-4 box mb-4">
                            <div class="d-flex mb-2 mt-2">
                                <ion-icon name="bar-chart-sharp"></ion-icon>
                                <h5 class="d-flex align-items-center px-3">Financeiro</h5>
                            </div>
                            <p>Controle o fluxo de recebimento e pagamentos</p>
                        </div>
                    </div>
                </div>
            </main>
            <footer></footer>

            <!--
            <div class="">
                <div class="">
                    Logotipo
                </div>

                <div class="">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel.com/docs" class="underline text-gray-900 dark:text-white">Documentation</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel has wonderful, thorough documentation covering every aspect of the framework. Whether you are new to the framework or have previous experience with Laravel, we recommend reading all of the documentation from beginning to end.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laracasts.com" class="underline text-gray-900 dark:text-white">Laracasts</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laracasts offers thousands of video tutorials on Laravel, PHP, and JavaScript development. Check them out, see for yourself, and massively level up your development skills in the process.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Laravel News</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel News is a community driven portal and newsletter aggregating all of the latest and most important news in the Laravel ecosystem, including new package releases and tutorials.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Vibrant Ecosystem</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Laravel's robust library of first-party tools and libraries, such as <a href="https://forge.laravel.com" class="underline">Forge</a>, <a href="https://vapor.laravel.com" class="underline">Vapor</a>, <a href="https://nova.laravel.com" class="underline">Nova</a>, and <a href="https://envoyer.io" class="underline">Envoyer</a> help you take your projects to the next level. Pair them with powerful open source libraries like <a href="https://laravel.com/docs/billing" class="underline">Cashier</a>, <a href="https://laravel.com/docs/dusk" class="underline">Dusk</a>, <a href="https://laravel.com/docs/broadcasting" class="underline">Echo</a>, <a href="https://laravel.com/docs/horizon" class="underline">Horizon</a>, <a href="https://laravel.com/docs/sanctum" class="underline">Sanctum</a>, <a href="https://laravel.com/docs/telescope" class="underline">Telescope</a>, and more.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        -->
        </div>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </body>
</html>
