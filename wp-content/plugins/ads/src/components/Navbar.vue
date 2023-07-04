<template>
  <nav
    id="sidebarMenu"
    class="col-md-2 col-lg-2 d-md-block bg-light sidebar collapse"
  >
    <div class="position-sticky">
      <ul class="nav flex-column">
        <li class="nav-item">
          <RouterLink class="nav-link active" aria-current="page" to="/">
            <span data-feather="home"></span>
            Home
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink class="nav-link" to="/about">
            <span data-feather="file"></span>
            About
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink class="nav-link" to="/contact">
            <span data-feather="shopping-cart"></span>
            Contact
          </RouterLink>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="users"></span>
            Customers
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="bar-chart-2"></span>
            Reports
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <span data-feather="layers"></span>
            Integrations
          </a>
        </li>
      </ul>

      <h6
        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted"
      >
        <span>General</span>
        <a class="link-secondary" href="#" aria-label="Add a new report">
          <span data-feather="plus-circle"></span>
        </a>
      </h6>
      <ul class="nav flex-column mb-2">
        <li class="nav-item">
          <RouterLink class="nav-link" to="/social">
            <span data-feather="file-text"></span>
            Social
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink class="nav-link" to="/header-footer">
            <span data-feather="file-text"></span>
            Header & Footer
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink class="nav-link" to="/email">
            <span data-feather="file-text"></span>
            Email
          </RouterLink>
        </li>
        <li class="nav-item">
          <RouterLink class="nav-link" to="/configs">
            <span data-feather="file-text"></span>
            Configs
          </RouterLink>
        </li>
      </ul>
    </div>
  </nav>
</template>
