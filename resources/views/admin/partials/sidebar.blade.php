<ul class="nav nav-pills nav-sidebar flex-column dashboard" data-widget="treeview" role="menu" data-accordion="false" >
    

        <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link {{ (Request::segment(1) == 'home' )?' active-color':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('category.index')}}" class="nav-link {{ (Request::segment(1) == 'category' )?' active-color':''}}">
            <i class="nav-icon fa fa-server" aria-hidden="true"></i>
            <p>Category</p>
            </a>
        </li>
  <li class="nav-item">
    <a href="{{route('country.index')}}" class="nav-link {{ (Request::segment(1) == 'country' )?' active-color':''}}">
      
        <i class="nav-icon fa fa-globe" aria-hidden="true"></i>
        <p>Country</p>
    </a>
</li>
  <li class="nav-item">
    <a href="{{route('unit.index')}}" class="nav-link {{ (Request::segment(1) == 'unit' )?' active-color':''}}">
      <i class="nav-icon fa fa-list-alt" aria-hidden="true"></i>
        <p>Unit</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('product.index')}}" class="nav-link {{ (Request::segment(1) == 'product' )?' active-color':''}}">
       <i class="nav-icon fa fa-adjust" aria-hidden="true"></i>
        <p>Product</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('purchase.index')}}" class="nav-link {{ (Request::segment(1) == 'purchase' )?' active-color':''}}">
        <i class="nav-icon fa fa-shopping-cart" aria-hidden="true"></i>
        <p>Purchase</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('stock-in.index')}}" class="nav-link {{ (Request::segment(1) == 'stock-in' )?' active-color':''}}">
        <i class="nav-icon fa fa-database" aria-hidden="true"></i>
        <p>Stock</p>
    </a>
</li>
<li class="nav-item">
    <a href="{{route('sale.create')}}" class="nav-link {{ (Request::segment(1) == 'sale' )?' active-color':''}}">
        <i class="nav-icon fa fa-shopping-basket" aria-hidden="true"></i>
        <p>Sale</p>
    </a>
</li>
   
@if( Gate::check('User List') || Gate::check('Role List'))
<li class="nav-item has-treeview {{ ( Request::segment(1) == 'report' )?'menu-open':''}}">
    <a href="#" class="nav-link {{ ( Request::segment(1) == 'report')?'active-color':''}}">
<i class="nav-icon fa fa-info-circle" aria-hidden="true"></i>
        <p>
            Report
            <i class="fas fa-angle-left right"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="margin-left: 15px;">
        @can('User List')
        <li class="nav-item">
            <a href="{{route('purchase.report')}}" class="nav-link {{ ( Request::segment(2) == 'purchase' )?'active-color':''}}">
              <i class="fa fa-bars" aria-hidden="true"></i>
                <p>Purchase Report</p>
            </a>
        </li>
        @endcan
        @can('Role List')
        <li class="nav-item">
            <a href="{{route('sale.report')}}" class="nav-link {{ ( Request::segment(2) == 'sale' )?'active-color':''}}">
             <i class="fa fa-bars" aria-hidden="true"></i> <p>Sales Report</p>
            </a>
        </li>
        @endcan
        @can('Role List')
        <li class="nav-item">
            <a href="{{route('profit.report')}}" class="nav-link {{ ( Request::segment(2) == 'profit' )?'active-color':''}}">
                <i class="fa fa-bars" aria-hidden="true"></i>
                <p>Profit Report</p>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endif
    @if( Gate::check('User List') || Gate::check('Role List'))
        <li class="nav-item has-treeview {{ ( Request::segment(1) == 'access-control' )?'menu-open':''}}">
            <a href="#" class="nav-link {{ ( Request::segment(1) == 'access-control')?'active-color':''}}">
                <i class="nav-icon fas fa-cog"></i>
                <p>
                    Settings
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview" style="margin-left: 15px;">
                @can('User List')
                    <li class="nav-item" >
                        <a href="{{route('user.index')}}"
                           class="nav-link {{ ( Request::segment(2) == 'user' )?'active-color':''}}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <p>&nbsp; Users</p>
                        </a>
                    </li>
                @endcan
                @can('Role List')
                    <li class="nav-item">
                        <a href="{{route('role.index')}}"
                           class="nav-link {{ ( Request::segment(2) == 'role' )?'active-color':''}}">
                            <p>Role Management</p>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endif
 
</ul>

