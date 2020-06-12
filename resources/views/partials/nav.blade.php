<nav class="main-menu" style="z-index: auto; position: fixed !important;">
    <ul>
      <li class="has-subnav">
        <a href="{{ route('maintenance') }}" class="{{ setActive('maintenance') }}">
          <i class="fa fa-users fa-2x"></i>
          <span class="nav-text">
            Mantenimiento
          </span>
        </a>
      </li>
      <li class="has-subnav">
        <a href="{{ route('transaction') }}" class="{{ setActive('transaction') }}">
          <i class="fa fa-usd fa-2x"></i>
          <span class="nav-text">
            Compras y Facturación
          </span>
        </a>
      </li>
      <li class="has-subnav">
        <a href="{{ route('report') }}" class="{{ setActive('report') }}">
          <i class="fa fa-file fa-2x"></i>
          <span class="nav-text">
            Reportes
          </span>
        </a>
      </li>
    </ul>
</nav>