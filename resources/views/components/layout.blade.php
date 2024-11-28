<!doctype html>

<title>HsLiawPortfolio</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    html {
        scroll-behavior: smooth;
    }

</style>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            {{--Homepage--}}
            <a href="/"
               class="ml-6 text-xs font-bold uppercase {{ request()->is('/') ? 'text-blue-500' : '' }}
               transform hover:scale-150
               transition-all duration-300
               hover:font-extrabold">
                Home
            </a>
            @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <button class="ml-6 text-xs font-bold uppercase
                            transform hover:scale-150
                            transition-all duration-300
                            hover:font-extrabold">
                            Dashboard
                        </button>
                    </x-slot>

                    <x-dropdown-item
                        href="/admin/posts/create"
                        :active="request()->is('admin/posts/create')"
                        class="text-xs "
                    >
                        Posts
                    </x-dropdown-item>

                    <x-dropdown-item
                        href="#"
                        x-data="{}"
                        @click.prevent="document.querySelector('#logout-form').submit()"
                        class="text-xs"
                    >
                        Log Out
                    </x-dropdown-item>

                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                    </form>
                </x-dropdown>
            @else
                <a href="/login"
                   class="ml-6 text-xs font-bold uppercase {{ request()->is('login') ? 'text-blue-500' : '' }}
                      transform hover:scale-150
                      transition-all duration-300
                      hover:font-extrabold">
                    Dashboard
                </a>
            @endauth

            {{--Contact Me--}}
            <a href="#newsletter"
               class="ml-6 text-xs font-bold uppercase {{ request()->is('#newsletter') ? 'text-blue-500' : '' }}
                      transform hover:scale-150
                      transition-all duration-300
                      hover:font-extrabold">
                Connect
            </a>

            {{--My blog--}}
            <a href="/my-blog"
               class="ml-6 text-xs font-bold uppercase {{ request()->is('my-blog') ? 'text-blue-500' : '' }}
                      transform hover:scale-150
                      transition-all duration-300
                      hover:font-extrabold">
                My Blog
            </a>

            {{--Projects--}}
            <a href="/project"
               class="ml-6 text-xs font-bold uppercase {{ request()->is('newsletter') ? 'text-blue-500' : '' }}
                      transform hover:scale-150
                      transition-all duration-300
                      hover:font-extrabold">
                Projects
            </a>
        </div>
    </nav>

    {{ $slot }}

    <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16"
    >
        <h5 class="text-3xl font-semibold">Let's Connect</h5>

        <div class="mt-8 flex justify-center space-x-6">
            <!-- LinkedIn -->
            <a href="https://www.linkedin.com/in/liaw-hang-sheng-679957232/" target="_blank"
               class="text-blue-600 hover:text-blue-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-8 w-8" viewBox="0 0 24 24">
                    <path
                        d="M22.23 0H1.77C.79 0 0 .77 0 1.74v20.52C0 23.23.79 24 1.77 24h20.46c.98 0 1.77-.77 1.77-1.74V1.74C24 .77 23.21 0 22.23 0zM7.12 20.48H3.56V9h3.56v11.48zM5.34 7.64c-1.14 0-2.06-.92-2.06-2.06 0-1.13.92-2.06 2.06-2.06s2.06.93 2.06 2.06c0 1.14-.92 2.06-2.06 2.06zm14.98 12.84h-3.56v-5.44c0-1.3-.02-2.96-1.8-2.96-1.8 0-2.08 1.41-2.08 2.86v5.54H9.32V9h3.42v1.56h.05c.48-.9 1.63-1.84 3.35-1.84 3.58 0 4.24 2.36 4.24 5.44v6.32z"/>
                </svg>
            </a>

            <!-- Instagram -->
            <a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.instagram.com%2Fhangshengg%2Fprofilecard%2F%3Figsh%3DMXJjaXltdWlsMnlhag%253D%253D%26fbclid%3DIwZXh0bgNhZW0CMTAAAR3PIWxGxtoJZguwxbxTKd3uKhj0tYVtH-Ipi94-6SyEeIeSGS5JE3UY4o0_aem_Ny33qAwtX6lD0M0_31cq_g&h=AT0qY7t1FApK8XqoRySj1UgxPjDkR1gHV1iB0ryEDWB7WMA6niumw6Nta2WQjDWewZQXJrWGqicrz7NzbdYShB4OrePl0ZMh1ccJNsHpIunPCl95CHosHzrtfHMkYLw6FU5cKFQcDUr7zuNK8QZn"
               target="_blank" class="text-pink-500 hover:text-pink-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-8 w-8" viewBox="0 0 24 24">
                    <path
                        d="M12 2.16c3.2 0 3.584.012 4.849.07 1.259.058 2.12.276 2.614.463a5.413 5.413 0 0 1 1.978 1.296 5.41 5.41 0 0 1 1.296 1.978c.187.494.405 1.355.463 2.614.058 1.265.07 1.65.07 4.849s-.012 3.584-.07 4.849c-.058 1.259-.276 2.12-.463 2.614a5.41 5.41 0 0 1-1.296 1.978 5.413 5.413 0 0 1-1.978 1.296c-.494.187-1.355.405-2.614.463-1.265.058-1.65.07-4.849.07s-3.584-.012-4.849-.07c-1.259-.058-2.12-.276-2.614-.463a5.413 5.413 0 0 1-1.978-1.296 5.41 5.41 0 0 1-1.296-1.978c-.187-.494-.405-1.355-.463-2.614C2.172 15.584 2.16 15.2 2.16 12s.012-3.584.07-4.849c.058-1.259.276-2.12.463-2.614a5.41 5.41 0 0 1 1.296-1.978A5.413 5.413 0 0 1 6.15 2.693c.494-.187 1.355-.405 2.614-.463C8.416 2.172 8.8 2.16 12 2.16zm0 1.944c-3.18 0-3.56.012-4.812.07-1.107.05-1.706.23-2.103.38a3.633 3.633 0 0 0-1.403.96 3.63 3.63 0 0 0-.96 1.403c-.15.397-.33.996-.38 2.103-.058 1.252-.07 1.632-.07 4.812s.012 3.56.07 4.812c.05 1.107.23 1.706.38 2.103a3.63 3.63 0 0 0 .96 1.403 3.633 3.633 0 0 0 1.403.96c.397.15.996.33 2.103.38 1.252.058 1.632.07 4.812.07s3.56-.012 4.812-.07c1.107-.05 1.706-.23 2.103-.38a3.633 3.633 0 0 0 1.403-.96 3.63 3.63 0 0 0 .96-1.403c.15-.397.33-.996.38-2.103.058-1.252.07-1.632.07-4.812s-.012-3.56-.07-4.812c-.05-1.107-.23-1.706-.38-2.103a3.63 3.63 0 0 0-.96-1.403 3.633 3.633 0 0 0-1.403-.96c-.397-.15-.996-.33-2.103-.38-1.252-.058-1.632-.07-4.812-.07zm0 2.4a5.445 5.445 0 1 1 0 10.89 5.445 5.445 0 0 1 0-10.89zm6.407-.75a1.425 1.425 0 1 1 0 2.85 1.425 1.425 0 0 1 0-2.85z"/>
                </svg>
            </a>

            <!-- GitHub -->
            <a href="https://github.com/hangsheng0625" target="_blank" class="text-gray-900 hover:text-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-8 w-8" viewBox="0 0 24 24">
                    <path
                        d="M12 2a10 10 0 0 0-3.16 19.49c.5.1.68-.22.68-.48v-1.71c-2.78.6-3.37-1.34-3.37-1.34a2.65 2.65 0 0 0-1.12-1.47c-.92-.64.07-.63.07-.63a2.1 2.1 0 0 1 1.54 1.03 2.15 2.15 0 0 0 2.93.84 2.14 2.14 0 0 1 .64-1.35c-2.22-.25-4.56-1.1-4.56-4.9a3.83 3.83 0 0 1 1-2.67 3.55 3.55 0 0 1 .1-2.63s.84-.27 2.76 1a9.4 9.4 0 0 1 5 0c1.92-1.31 2.76-1 2.76-1a3.55 3.55 0 0 1 .1 2.63 3.83 3.83 0 0 1 1 2.67c0 3.81-2.34 4.64-4.56 4.89a2.4 2.4 0 0 1 .68 1.85v2.74c0 .26.18.59.68.49A10 10 0 0 0 12 2z"/>
                </svg>
            </a>

            <!-- Email -->
            <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" class="text-red-600 hover:text-red-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-8 w-8" viewBox="0 0 24 24">
                    <path
                        d="M22 4H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h20a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2zm0 2v.511L12 13.298 2 6.511V6h20zm-20 12V9.727l10 6.787 10-6.787V18H2z"/>
                </svg>
            </a>
        </div>
    </footer>
</section>

<x-flash/>
</body>
