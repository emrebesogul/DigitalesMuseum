<nav>
    <a href="/">
        <div id="logo">
            <span class="highlighted">D</span>igitales<span class="highlighted">M</span>useum
        </div>
    </a>

    <div id="search-bar">
        <span class="icon icon_search"></span>
        <input type="text" name="search_query" placeholder="Search the museum">
    </div>

    <div id="user-information">
        <span id="welcome-message">
            @if(session('userName') != null)
                Willkommen zurück, {{ session('userName') }}!
            @else
                <a href="/login">Bitte einloggen</a>
            @endif
        </span>
            @if(session('userName') != null)
                <a href="/logout" id="logout-icon">
                    <span class="icon icon_lock_alt"></span>
                </a>
            @else
                <a href="/login" id="logout-icon">
                    <span class="icon icon_lock_alt"></span>
                </a>
            @endif
    </div>
</nav>
@if(session('userIsAdmin'))
    <a href="/admin/people">
        <div id="goto-admin-banner">
            <span><span class="icon_pens"></span> Verwaltungsoberfläche aufrufen</span>
        </div>
    </a>
@endif
