<li class="nav-item">
    <a href="{{ route('titles.index') }}"
       class="nav-link {{ Request::is('titles*') ? 'active' : '' }}">
        <p>Titles</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('titleees.index') }}"
       class="nav-link {{ Request::is('titleees*') ? 'active' : '' }}">
        <p>Titleees</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('mahasiswas.index') }}"
       class="nav-link {{ Request::is('mahasiswas*') ? 'active' : '' }}">
        <p>Mahasiswas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('petas.index') }}"
       class="nav-link {{ Request::is('petas*') ? 'active' : '' }}">
        <p>Petas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('petaas.index') }}"
       class="nav-link {{ Request::is('petaas*') ? 'active' : '' }}">
        <p>Petaas</p>
    </a>
</li>


<li class="nav-item">
    <a href="{{ route('karangAsamUlus.index') }}"
       class="nav-link {{ Request::is('karangAsamUlus*') ? 'active' : '' }}">
        <p>Karang  Asam  Ulus</p>
    </a>
</li>


