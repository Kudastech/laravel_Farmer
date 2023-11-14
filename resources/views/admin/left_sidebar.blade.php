<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="admin/vendors/images/farmer-logo.svg" alt="" class="dark-logo" />
            <img
                src="admin/vendors/images/farmer-logo-white.svg"
                alt=""
                class="light-logo"
            />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ url('/redirect') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar4-week"></span
                        ><span class="mtext">Dashboard</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="{{ url('add_category') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar4-week"></span
                        ><span class="mtext">Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('all_category') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar4-week"></span
                        ><span class="mtext">View Category</span>
                    </a>
                </li> --}}

                <li class="dropdown">
                    <a  class="dropdown-toggle">
                        <span class="micon bi bi-archive"></span
                        ><span class="mtext"> Category </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ url('all_category') }}">All Category</a></li>
                        <li><a href="{{ url('add_category') }}">Add Category</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a  class="dropdown-toggle">
                        <span class="micon bi bi-archive"></span
                        ><span class="mtext"> Products </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ url('/view_product') }}">Add Product</a></li>
                        <li><a href="{{ url('/show_product') }}">Show Product</a></li>
                        {{-- <li><a href="ui-cards-hover.html">Cards Hover</a></li> --}}
                    </ul>
                </li>
                <li>
                    <a href="{{ url('order') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar4-week"></span
                        ><span class="mtext">Orders</span>
                    </a>
                </li>
                <li>
                    <a href="{{ url('/all_user') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-calendar4-week"></span
                        ><span class="mtext">All User</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
