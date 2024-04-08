<nav class="bg-white border-gray-200 shadow-lg dark:bg-gray-900 h-[4rem]">
    <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-3 mx-auto">
      <a href="{{ route('welcome') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="/img/logo_gobierno_estado.png" class="h-10" alt="Logo Gobierno del estado" />
          {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span> --}}
      </a>
      <button type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100" id="btn-navbar">
          <span class="sr-only">Open main menu</span>
          <img src="/img/bars-solid.svg" alt="icon-btn-menu">          
      </button>
      <div class="z-20 hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="flex flex-col p-4 mt-4 font-medium bg-white border border-gray-100 rounded-lg md:p-0 md:flex-row md:space-x-4 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
          <li>
            <a href="{{ route('welcome') }}" class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900 md:border-0 {{ request()->routeIs('welcome') ? 'bg-blue-700 text-white hover:bg-blue-400' : 'text-gray-900' }}">Home</a>
          </li>
          <li>
            <a href="{{ route('read') }}" class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900 md:border-0 {{ request()->routeIs('read') ? 'bg-blue-700 text-white hover:bg-blue-400' : 'text-gray-900' }}">lista de censos</a>
          </li>          
          <li>
            <a href="{{ route('Concentrado') }}" class="block px-3 py-2 rounded hover:bg-gray-100 hover:text-gray-900 md:border-0 {{ request()->routeIs('Concentrado') ? 'bg-blue-700 text-white hover:bg-blue-400' : 'text-gray-900' }}">getexcel</a>
          </li>          
        </ul>
      </div>
    </div>
</nav>
  