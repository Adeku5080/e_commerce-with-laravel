<div>
    <header class="header">

        <a href="{{route('home')}}" class="brand-name">For-men</a>

        <div id="search-bar">
            <form action="{{route('search')}}" method="GET">
                <input type="search" name="search" placeholder="Search">
            </form>
        </div>

        <div class="user-icon-container">
            <i class="far fa-user"></i>
        </div>

        {{-- authentication dropdown       --}}
        <div class="auth-dropdown">
            <div class="auth-dropdown-header">
                <div class="auth-links">Sign In | Join</div>
                <div class="close-dropdown-icon">X</div>
            </div>

            <div class="account-info">
                <li>My Account</li>
                <li>My Orders</li>
                <li> Returns Information</li>
                <li>Contact Preferences</li>

            </div>
        </div>


        <div class="cartIcon_div">
            <a href="#">
                <i class="fas fa-shopping-cart cart-icon"></i><span class="cart-item-count"></span>
            </a>
        </div>

        {{--   cart-dropdown-section  --}}
        <div class="cart-dropdown">
            <div class="cart-dropdown-header">
                <div class="drop-down-header-title-container">
                    <span class="dropdown-header-title">My Cart,</span><span>1 item</span>
                </div>

                <p>X</p>
            </div>

            <section class="dropdown-cartItems">
                {{--              <div class="dropdown-image">--}}
                {{--                  <img src="" alt="image">--}}
                {{--              </div>--}}

                {{--                <div>--}}
                {{--                    <div>--}}
                {{--                    </div>--}}
                {{--                     <div>--}}
                {{--                         <span></span>--}}
                {{--                         <span> </span>--}}
                {{--                     </div>--}}
                {{--                </div>--}}

            </section>
            <div class="sub-total-section">
                <p>Total</p>
                <p class="total_value"></p>

            </div>
            <div class="cart-and-checkout-section">

                <a href="{{route('cart.show')}}" id="view-cart">VIEW CART</a>
                <a href="{{route('checkout')}}" id="check-out">CHECKOUT</a>

            </div>
            <div class="delivery">
                <p>Free Delivery Worldwide</p>
            </div>

        </div>
    </header>


</div>
