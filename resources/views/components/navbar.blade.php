<nav
    class="mx-auto mt-5 mb-5 block w-full max-w-screen-xl rounded-xl border border-white/80 bg-white bg-opacity-80 py-2 px-4 text-white shadow-md backdrop-blur-2xl backdrop-saturate-200 lg:px-8 lg:py-4">
    <div>
        <div class="container mx-auto flex items-center justify-between text-gray-900">
            <ul class="hidden items-center gap-6 lg:flex">
                @auth()
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <a href="{{route('employee.index')}}" class="flex items-center">Home</a>
                    </li>
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <form action="{{route('login.logout')}}" method="post">
                            @csrf
                            <button class="flex items-center">
                                LOGOUT
                            </button>
                        </form>
                    </li>
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <a href="{{route('employee.create')}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">&#43; Novo Funcionário</a>
                    </li>
                @endauth
                @guest()
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <a class="flex items-center" href="{{route('login')}}">
                            Entrar
                        </a>
                    </li>
                @endguest
            </ul>
            <button
                class="middle none relative ml-auto h-6 max-h-[40px] w-6 max-w-[40px] rounded-lg text-center font-sans text-xs font-medium uppercase text-blue-gray-500 transition-all hover:bg-transparent focus:bg-transparent active:bg-transparent disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:hidden"
                data-collapse-target="navbar"
            >
        <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
          <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              stroke="currentColor"
              strokeWidth="2"
          >
            <path
                strokeLinecap="round"
                strokeLinejoin="round"
                d="M4 6h16M4 12h16M4 18h16"
            ></path>
          </svg>
        </span>
            </button>
        </div>
        <div
            class="block h-0 w-full basis-full overflow-hidden text-blue-gray-900 transition-all duration-300 ease-in lg:hidden"
            data-collapse="navbar"
        >
            <div class="container mx-auto pb-2">
                <ul class="mt-2 mb-4 flex flex-col gap-2">
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <a class="flex items-center" href="#">
                            Pages
                        </a>
                    </li>
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <a class="flex items-center" href="#">
                            Account
                        </a>
                    </li>
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <a class="flex items-center" href="#">
                            Blocks
                        </a>
                    </li>
                    <li class="block p-1 font-sans text-sm font-normal leading-normal text-inherit antialiased">
                        <a class="flex items-center" href="#">
                            Docs
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
