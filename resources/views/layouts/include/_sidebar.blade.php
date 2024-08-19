<ul class="nav nav-secondary">

    <li class="nav-section">
        <span class="sidebar-mini-icon">
            <i class="fa fa-ellipsis-h"></i>
        </span>
        <h4 class="text-section">Menu</h4>
    </li>


    

    <li class="nav-item">
        <a href="{{ route('locais.index') }}">
            <i class="fa-solid fa-location-arrow"></i>
            <p>Meus Locais</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="{{ route('minhascompras.index')}}">
            <i class="fa-solid fa-cart-shopping"></i>
            <p>Minhas compras</p>
        </a>
    </li>

    {{-- <li class="nav-item">
        <a href="{{route('lista.index')}}">
            <i class="fa-solid fa-list-check"></i>
            <p>Listas de compras</p>
        </a>
    </li> --}}
    <li class="nav-item">
        <a href="{{ route('categorias.index') }}">
            <i class="fa-solid fa-layer-group"></i>
            <p>Categorias</p>
        </a>
    </li>

    {{-- <li class="nav-item">
        <a href="{{ route('relatorios.index')}}">
            <i class="fa-regular fa-note-sticky"></i>
            <p>Relatórios</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{route('dashboard.index')}}">
            <i class="fa-solid fa-chart-simple"></i>
            <p>Dashboard</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="">
            <i class="fa-solid fa-magnifying-glass"></i>
            <p>Buscar Melhores preços</p>
        </a>
    </li> --}}
</ul>
