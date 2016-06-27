<nav>
    <div class="container">
        <div class="nav-inner">
            <!-- mobile-menu -->
            <div class="hidden-desktop" id="mobile-menu">
                <ul class="navmenu">
                    <li>
                        <div class="menutop">
                            <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                            <h2>Menu</h2>
                        </div>
                        <ul style="display:none;" class="submenu">
                            <li>
                                <ul class="topnav">


                                    <li class="level0 level-top parent">
                                        <a href="/WebsiteBanHang/Home/" class="level-top"> <span>Trang chủ</span> </a>
                                    </li>

                                    <li class="level0 level-top parent">
                                        <a href="/WebsiteBanHang/Home/Danhmuc/1" class="level-top"> <span>Nón Bảo Hiểm</span> </a>
                                    </li>
                                    
                                    <li class="level0 level-top parent">
                                        <a href="/gioi-thieu" class="level-top"> <span>Kính</span> </a>
                                    </li>
                                    
                                    <li class="level0 level-top parent">
                                        <a href="/gioi-thieu" class="level-top"> <span>Găng tay</span> </a>
                                    </li>
                                    
                                    <li class="level0 level-top parent">
                                        <a href="/gioi-thieu" class="level-top"> <span>Khẩu trang/Khăn</span> </a>
                                    </li>

                                    <li class="level0 level-top parent">
                                        <a href="/lien-he" class="level-top"> <span>Liên hệ</span> </a>
                                    </li>


                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!--navmenu-->
            </div>
            <!--End mobile-menu -->
            <a class="logo-small" title="Công nghệ số Accent" href="/"><img alt="Công nghệ số Accent" src="/WebsiteBanHang/views/Contents/images/logo1.png"></a>
            <ul id="nav" class="hidden-xs">


                <li class="level0"><a href="/WebsiteBanHang/Home/"><span>Trang chủ</span> </a>

                <li class="level0"><a href="/WebsiteBanHang/Home/Danhmuc/1"><span>Nón Bảo Hiểm</span> </a>
                    
                <li class="level0"><a href="/gioi-thieu"><span>Kính</span> </a>
                    
                <li class="level0"><a href="/gioi-thieu"><span>Găng tay</span> </a>
                    
                <li class="level0"><a href="/gioi-thieu"><span>Khẩu trang/Khăn</span> </a>

                <li class="level0"><a href="/lien-he"><span>Liên hệ</span> </a>



            </ul>
            <!--Shopping Cart-->
            <div class="top-cart-contain">
                <div class="mini-cart">
                    <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                        <a href="#">
                            <div class="cart-box"><span><strong id="cart-total">0</strong>SẢN PHẨM</span></div>
                            <script>
                                $(document).ready(function () {
                                    cartAction('', '');
                                });
                            </script>
                        </a>
                    </div>
                    <div>
                        <div class="top-cart-content arrow_box">
                            <div class="top-subtotal">Tổng tiền: <span id="price">0</span> VND</div>
                            <div class="actions">
                                <a class="btn-checkout" href="/WebsiteBanHang/Cart/Thanhtoan/"><span>Thanh toán</span></a>
                                <a class="view-cart" href="/WebsiteBanHang/Cart"><span>Giỏ hàng</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ajaxconfig_info">
                    <a href="#/"></a>
                    <input value="" type="hidden">
                    <input id="enable_module" value="1" type="hidden">
                    <input class="effect_to_cart" value="1" type="hidden">
                    <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
                </div>
            </div>
            <!--End Shopping Cart-->
        </div>
    </div>
</nav>