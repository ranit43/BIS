<section id="topNavBar" class="nav-wrapper navbar-solid">
	<div class="container-fluid">
		<div id="menuzord" class="menuzord red">
			<a href="{{ url('/') }}" class="menuzord-brand">
				B I S
			</a>
			<ul class="menuzord-menu">
                <!-- Authentication Links -->
                <li><a href="{{ url('/welcome_search') }}">Home</a></li>

                {{--<li>--}}
                    {{--<a href="{{ url('/search') }}">--}}
                        {{--Talent Search--}}
                        {{--<span class="glyphicon glyphicon-search"></span>--}}
                    {{--</a>--}}
                {{--</li>--}}

                <li><a href="{{ url('/about_us') }}">About Us</a></li>
                {{--<li><a href="{{ url('/post') }}">Forum</a></li>--}}

                @if (Auth::guest())
                    {{--<li><a href="{{ url('/post') }}">Posts</a></li>--}}
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                @else

                    {{--<li><a href="{{ url('/post') }}">Forum</a></li>--}}
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Posts
                            {{--<span class="caret"></span>--}}
                        </a>

                        <ul class="dropdown" role="menu">
                            {{--<li> <a href="{{ url('/edit', $authUser->id) }}">Edit</a> </li>--}}

                            <li> <a href="{{ url('/post') }}">View All</a></li>
                            <li> <a href="{{ url('/post/create') }}">Create New</a></li>
                            {{--<li> <a href="{{ url('/View All') }}">Users List</a></li>--}}
                        </ul>
                    </li>

                    @if(Auth::user()->role=='Admin' )
                        <li><a href="{{ url('/notifications') }}">
                                Notifications
                                @if( $notif_count > 0 )
                                    <span class="notify">{{$notif_count}}</span>
                                @endif
                            </a>
                        </li>

                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Users
                                {{--<span class="caret"></span>--}}
                            </a>

                            <ul class="dropdown" role="menu">
                                {{--<li> <a href="{{ url('/edit', $authUser->id) }}">Edit</a> </li>--}}

                                <li> <a href="{{ url('/user') }}">All users</a></li>
                                {{--<li> <a href="{{ url('/View All') }}">Users List</a></li>--}}
                            </ul>
                        </li>

                        {{--for Testing Menu navbar--}}
                        <li><a href="#">Skills<span class="indicator"></span></a>
                            <ul class="dropdown" style="right: auto; display: none;">
                                <li><a href="#">Professional Skills<span class="indicator">+</span></a>
                                    <ul class="dropdown dropdown-left" style="display: none;">
                                        <li><a href="{{ url('/skill') }}">View All</a></li>
                                        <li><a href="{{ url('skill/create') }}">Create New</a></li>
                                        {{--<li><a href="blog__classic_right_sidebar.html">Right Sidebar</a></li>--}}
                                        {{--<li><a href="blog__classic_both_sidebar.html">Both Sidebar</a></li>--}}
                                    </ul>
                                </li>
                                <li><a href="#">Volunteering Skills<span class="indicator">+</span></a>
                                    <ul class="dropdown dropdown-left" style="display: none;">
                                        <li><a href="{{ url('volunteeringskill') }}">View All</a></li>
                                        <li><a href="{{ url('volunteeringskill/create')}}">Create New</a></li>
                                        {{--<li><a href="blog__classic_right_sidebar.html">Right Sidebar</a></li>--}}
                                        {{--<li><a href="blog__classic_both_sidebar.html">Both Sidebar</a></li>--}}
                                    </ul>
                                </li>

                            </ul>
                        </li>

                        {{--for Testing Menu navbar--}}



                    @endif
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }}
                            {{--<span class="caret"></span>--}}
                        </a>

                        <ul class="dropdown" role="menu">
                            <li> <a href="{{ url('/edit', $authUser->id) }}">Edit</a> </li>
                            <li> <a href="{{ url('/home') }}">Profile</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
			<!-- <ul class="menuzord-menu">

				<li><a href="#">Components</a>
					<ul class="dropdown">
						<li><a href="icons.html"><i class="fa fa-heart"></i> &nbsp; Icons</a></li>
						<li><a href="typography.html"><i class="fa fa-text-height"></i> &nbsp; Typography</a></li>
						<li><a href="buttons.html"><i class="fa fa-plus-square"></i> &nbsp; Buttons</a></li>
						<li><a href="forms.html"><i class="fa fa-toggle-on"></i> &nbsp; Forms</a></li>
						<li><a href="tabs__accordions.html"><i class="fa fa-tasks"></i> &nbsp; Tabs &amp; Accordions</a></li>
						<li><a href="alerts__wells.html"><i class="fa fa-exclamation-circle"></i> &nbsp; Alerts &amp; Wells</a></li>
						<li><a href="call__to__action.html"><i class="fa fa-bell"></i> &nbsp; Call to Actions</a>
					</ul>
				</li>
				<li class="item-icon hidden-xs">
					<a id="toggelSearch" href="#">
						<i class="ion-ios-search-strong"></i>
					</a>
					<form id="searchInput" class="navbar-form" role="search">
					    <div class="input-group">
					        <input type="text" class="form-control" placeholder="TYPE &amp; HIT ENTER...">
					    </div>
					</form>
				</li>

				<li class="item-icon hidden-xs">
					<a href="#">
						<i class="ion-ios-cart"></i>
						<span class="badge">2</span>
					</a>

					<div class="megamenu megamenu-quarter-width top-cart-content">
					    <div class="top-cart-title">Shopping Cart</div>
					    <div class="top-cart-items">
					        <div class="top-cart-item clearfix">
					            <div class="top-cart-item-image">
					                <a href="#"><img src="assets/images/shop/navbar_cart/cart_1.jpg" alt="Blue Round-Neck Tshirt"></a>
					            </div>
					            <div class="top-cart-item-desc">
					                <a href="#">Georgette &amp; Net Casual Top - Blue</a>
					                <span class="top-cart-item-price">$29.99</span>
					                <span class="top-cart-item-quantity">x 3</span>
					            </div>
					        </div>
					        <div class="top-cart-item clearfix">
					            <div class="top-cart-item-image">
					                <a href="#"><img src="assets/images/shop/navbar_cart/cart_2.jpg" alt="Light Blue Denim Dress"></a>
					            </div>
					            <div class="top-cart-item-desc">
					                <a href="#">Light Blue Denim Dress</a>
					                <span class="top-cart-item-price">$324.99</span>
					                <span class="top-cart-item-quantity">x 1</span>
					            </div>
					        </div>
					    </div>
					    <div class="top-cart-action clearfix">
					        <span class="pull-left top-checkout-price">$214.95</span>
					        <a class="btn btn-cal-default pull-right" href="shop__cart.html">View Cart</a>
					    </div>
					</div>
				</li>
				<li style="height: 1px" class="scrollable-fix">
					
				</li>
			</ul> -->

		</div>
	</div>
</section><!--/nav-wrapper-->