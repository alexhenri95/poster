<nav class="border-b py-3 sticky top-0 bg-white z-50">
    <div class="container mx-auto flex justify-between px-2 md:px-0">
        <a class="logo flex items-center" href="{{route('dashboard')}}">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
            <h1 class="font-bold text-xl">
                instaPosts
            </h1>
        </a>
        
        <div class="icons flex items-center">
            <div class="home-icon mr-2 md:mr-3">
                <a href="{{route('dashboard')}}">
                    <svg class="w-6 h-6 {{request()->routeIs('dashboard') ? 'text-blue-500':''}}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </a>
            </div>
            <div class="home-icon mr-2 md:mr-3">
                <a href="{{route('search.index')}}">
                    <svg class="w-6 h-6 {{request()->routeIs('search.index') ? 'text-blue-500':''}}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </a>
            </div>
            <div class="compas-icon mr-2 md:mr-3">
                <a href="{{route('activity.index')}}" class="cursor-pointer">
                    <svg class="w-6 h-6 {{request()->routeIs(['activity.index','post.show']) ? 'text-blue-500':''}}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </a>
            </div>
            <div class="profile-icon">
                <a href="{{route('profile.show', auth()->user())}}" class="cursor-pointer">
                    <svg class="w-6 h-6 {{request()->routeIs('profile.show') ? 'text-blue-500':''}}" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </a>
            </div>

            
        </div>
    </div>
</nav>


