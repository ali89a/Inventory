<li class="nav-item ">
    <a href="{{ url('/home') }}" class="nav-link {{ ( strcmp(url()->current(), url('/home')) == 0 ) ? 'active' : '' }}">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>{{ trans('sidebar.dashboard')}}</p>
    </a>
</li>
<li class="nav-item ">
    <a href="{{ route('purchase.index') }}"
        class="nav-link {{ ( Request::segment(1) == 'purchase' )?' active ':''}}">
        <i class="nav-icon fa-shopping-cart"></i>
       <p>{{ trans('sidebar.purchase')}}</p>
    </a>
</li>
<li class="nav-item ">
    <a href="{{ route('sale.index') }}" class="nav-link {{ ( Request::segment(1) == 'sale' )?' active ':''}}">
        <i class="nav-icon fa-shopping-cart"></i>
        <p>{{ trans('sidebar.sale')}}</p>
    </a>
</li>

<li
    class="nav-item has-treeview {{ (Request::segment(1) == 'category' || Request::segment(1) == 'brand' || Request::segment(1) == 'product' )?' menu-open':'menu-close'}}">
    <a href="{{ url('') }}"
        class="nav-link {{ (Request::segment(1) == 'category' || Request::segment(1) == 'brand' || Request::segment(1) == 'product' )?' active ':''}}">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>
            <i class="right fas fa-angle-left"></i>
            Product
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item ">

            <a href="{{ route('category.index') }}"
                class="nav-link {{ (Request::route()->getName() == 'category.index' || Request::route()->getName() == 'category.create' || Request::route()->getName() == 'category.edit') ? ' active' : '' }}">
                <i class="fa fa-user nav-icon"></i>
                <p>Category</p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('brand.index') }}"
                class="nav-link {{ (Request::route()->getName() == 'brand.index' || Request::route()->getName() == 'brand.create' || Request::route()->getName() == 'brand.edit') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Brand</p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('product.index') }}"
                class="nav-link {{ (Request::route()->getName() == 'product.index' || Request::route()->getName() == 'product.create' || Request::route()->getName() == 'product.edit') ? ' active' : '' }}">
                <i class="fa fa-product-hunt nav-icon"></i>
                <p>Product</p>
            </a>
        </li>

    </ul>
</li>

<li
    class="nav-item has-treeview {{ (Request::segment(1) == 'user' || Request::segment(1) == 'role' || Request::segment(1) == 'permission' )?' menu-open':'menu-close'}}">
    <a href="{{ url('') }}"
        class="nav-link {{ (Request::segment(1) == 'user' || Request::segment(1) == 'role' || Request::segment(1) == 'permission' )?' active ':''}}">
        <i class="nav-icon fas fa-newspaper"></i>
        <p>
            <i class="right fas fa-angle-left"></i>
            Access Control
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item ">

            <a href="{{ route('user.index') }}"
                class="nav-link {{ (Request::route()->getName() == 'user.index' || Request::route()->getName() == 'user.create' || Request::route()->getName() == 'user.edit') ? ' active' : '' }}">
                <i class="fa fa-user nav-icon"></i>
                <p>User</p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('role.index') }}"
                class="nav-link {{ (Request::route()->getName() == 'role.index' || Request::route()->getName() == 'role.create' || Request::route()->getName() == 'role.edit') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Role</p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="{{ route('permission.index') }}"
                class="nav-link {{ (Request::route()->getName() == 'permission.index' || Request::route()->getName() == 'permission.create' || Request::route()->getName() == 'permission.edit') ? ' active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Permission</p>
            </a>
        </li>

    </ul>
</li>