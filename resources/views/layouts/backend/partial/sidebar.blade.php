<!-- Left Sidebar -->
<aside id="leftsidebar"
    class="sidebar">
    <!-- User Info -->
    <div class="user-info">
        <div class="image">
            <img src="{{ asset('storage/users/' . Auth::user()->images) }}"
                width="48"
                height="48"
                alt="User" />
        </div>
        <div class="info-container">
            <div class="name"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false">{{ Auth::user()->name }}</div>
            <div class="email">{{ Auth::user()->email }}</div>
            <div class="btn-group user-helper-dropdown">
                <i class="material-icons"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="true">keyboard_arrow_down</i>
                <ul class="dropdown-menu pull-right">
                    <li><a href="javascript:void(0);"><i class="material-icons">person</i>Profile</a></li>
                    <li role="separator"
                        class="divider"></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">group</i>Followers</a></li>
                    <li><a href="javascript:void(0);"><i class="material-icons">shopping_cart</i>Sales</a>
                    </li>
                    <li><a href="javascript:void(0);"><i class="material-icons">favorite</i>Likes</a></li>
                    <li role="separator"
                        class="divider"></li>
                    {{-- Sing Out  --}}

                    <li><a class="log-out-btn "
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                class="material-icons">input</i>Sign Out</a></li>
                    <form id="logout-form"
                        action="{{ route('logout') }}"
                        method="POST"
                        style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </ul>
            </div>
        </div>
    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">MAIN NAVIGATION</li>
            {{-- Admin Access  --}}

            @if (Request::is('admin*'))
            {{-- Dashboard Area Strat Here  --}}
            <li class="{{ Request::is('admin/dashboard') ? 'active' :'' }}">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            {{-- Tag Area Strat Here  --}}
            <li class="{{ Request::is('admin/tag*') ? 'active' :'' }}">
                <a href="{{ route('admin.tag.index') }}">
                    <i class="material-icons">tag</i>
                    <span>Tag</span>
                </a>
            </li>
            {{-- Category Area Strat Here  --}}
            <li class="{{ Request::is('admin/category*') ? 'active' :'' }}">
                <a href="{{ route('admin.category.index') }}">
                    <i class="material-icons">category</i>
                    <span>Categories</span>
                </a>
            </li>
            {{-- Posts Area Strat Here  --}}
            <li class="{{ Request::is('admin/post*') ? 'active' :'' }}">
                <a href="{{ route('admin.post.index') }}">
                    <i class="material-icons">library_books</i>
                    <span>Posts</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/subscriber*') ? 'active' :'' }}">
                <a href="{{ route('admin.subscribers.index') }}">
                    <i class="material-icons">
                        subscriptions
                    </i>
                    <span>Subscribers</span>
                </a>
            </li>


            <li class="{{ Request::is('admin/favorite*') ? 'active' :'' }}">
                <a href="{{ route('admin.favorite') }}">
                    <i class="material-icons">favorite</i>
                    <span>Favorites</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/comment*') ? 'active' :'' }}">
                <a href="{{ route('admin.comment') }}">
                    <i class="material-icons">comment</i>
                    <span>Comments</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/author*') ? 'active' :'' }}">
                <a href="{{ route('admin.author') }}">
                    <i class="material-icons">people</i>
                    <span>Authors</span>
                </a>
            </li>



            <li class="header">System</li>
            <li class="{{ Request::is('admin/setting*') ? 'active' :'' }}">
                <a href="{{ route('admin.setting.index') }}">
                    <i class="material-icons">settings</i>
                    <span>Setting</span>
                </a>
            </li>
            <li class="active"><a class="log-out-btn "
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                        class="material-icons">input</i><span>Log Out</span></a></li>
            <form id="logout-form"
                action="{{ route('logout') }}"
                method="POST"
                style="display: none;">
                {{ csrf_field() }}
            </form>
            @endif



            {{-- Author Access  --}}
            @if (Request::is('author*'))

            <li class="{{ Request::is('author/dashboard') ? 'active' :'' }}">
                <a href="{{ route('author.dashboard') }}">
                    <i class="material-icons">dashboard</i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('author/post*') ? 'active' :'' }}">
                <a href="{{ route('author.post.index') }}">
                    <i class="material-icons">library_books</i>
                    <span>Posts</span>
                </a>
            </li>


            <li class="{{ Request::is('author/favorite*') ? 'active' :'' }}">
                <a href="{{ route('author.favorite') }}">
                    <i class="material-icons">favorite</i>
                    <span>Favorites</span>
                </a>
            </li>

            <li class="{{ Request::is('author/comment*') ? 'active' :'' }}">
                <a href="{{ route('author.comment') }}">
                    <i class="material-icons">comment</i>
                    <span>Comments</span>
                </a>
            </li>

            {{-- Bottom Area Start Here  --}}
            <li class="header">System</li>
            <li class="{{ Request::is('author/setting*') ? 'active' :'' }}">
                <a href="{{ route('author.profile.index') }}">
                    <i class="material-icons">settings</i>
                    <span>Setting</span>
                </a>
            </li>

            {{-- Bottom Log Out  --}}
            <li class="active"><a class="log-out-btn "
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                        class="material-icons">input</i><span>Log Out</span></a></li>
            <form id="logout-form"
                action="{{ route('logout') }}"
                method="POST"
                style="display: none;">
                {{ csrf_field() }}
            </form>
            {{-- End Of Bottom Logout  --}}
            @endif





            {{-- End Author Access  --}}

            {{-- Bottom Log Out  --}}

            {{-- End Of Bottom Log Out System --}}
        </ul>
    </div>
    <!-- #Menu -->
    <!-- Footer -->
    <div class="legal">
        <div class="copyright">
            &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
        </div>
        <div class="version">
            <b>Version: </b> 1.0.5
        </div>
    </div>
    <!-- #Footer -->
</aside>
<!-- #END# Left Sidebar -->
<!-- Right Sidebar -->
<aside id="rightsidebar"
    class="right-sidebar">
    <ul class="nav nav-tabs tab-nav-right"
        role="tablist">
        <li role="presentation"
            class="active"><a href="#skins"
                data-toggle="tab">SKINS</a></li>
        <li role="presentation"><a href="#settings"
                data-toggle="tab">SETTINGS</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel"
            class="tab-pane fade in active in active"
            id="skins">
            <ul class="demo-choose-skin">
                <li data-theme="red"
                    class="active">
                    <div class="red"></div>
                    <span>Red</span>
                </li>
                <li data-theme="pink">
                    <div class="pink"></div>
                    <span>Pink</span>
                </li>
                <li data-theme="purple">
                    <div class="purple"></div>
                    <span>Purple</span>
                </li>
                <li data-theme="deep-purple">
                    <div class="deep-purple"></div>
                    <span>Deep Purple</span>
                </li>
                <li data-theme="indigo">
                    <div class="indigo"></div>
                    <span>Indigo</span>
                </li>
                <li data-theme="blue">
                    <div class="blue"></div>
                    <span>Blue</span>
                </li>
                <li data-theme="light-blue">
                    <div class="light-blue"></div>
                    <span>Light Blue</span>
                </li>
                <li data-theme="cyan">
                    <div class="cyan"></div>
                    <span>Cyan</span>
                </li>
                <li data-theme="teal">
                    <div class="teal"></div>
                    <span>Teal</span>
                </li>
                <li data-theme="green">
                    <div class="green"></div>
                    <span>Green</span>
                </li>
                <li data-theme="light-green">
                    <div class="light-green"></div>
                    <span>Light Green</span>
                </li>
                <li data-theme="lime">
                    <div class="lime"></div>
                    <span>Lime</span>
                </li>
                <li data-theme="yellow">
                    <div class="yellow"></div>
                    <span>Yellow</span>
                </li>
                <li data-theme="amber">
                    <div class="amber"></div>
                    <span>Amber</span>
                </li>
                <li data-theme="orange">
                    <div class="orange"></div>
                    <span>Orange</span>
                </li>
                <li data-theme="deep-orange">
                    <div class="deep-orange"></div>
                    <span>Deep Orange</span>
                </li>
                <li data-theme="brown">
                    <div class="brown"></div>
                    <span>Brown</span>
                </li>
                <li data-theme="grey">
                    <div class="grey"></div>
                    <span>Grey</span>
                </li>
                <li data-theme="blue-grey">
                    <div class="blue-grey"></div>
                    <span>Blue Grey</span>
                </li>
                <li data-theme="black">
                    <div class="black"></div>
                    <span>Black</span>
                </li>
            </ul>
        </div>
        <div role="tabpanel"
            class="tab-pane fade"
            id="settings">
            <div class="demo-settings">
                <p>GENERAL SETTINGS</p>
                <ul class="setting-list">
                    <li>
                        <span>Report Panel Usage</span>
                        <div class="switch">
                            <label><input type="checkbox"
                                    checked><span class="lever"></span></label>
                        </div>
                    </li>
                    <li>
                        <span>Email Redirect</span>
                        <div class="switch">
                            <label><input type="checkbox"><span class="lever"></span></label>
                        </div>
                    </li>
                </ul>
                <p>SYSTEM SETTINGS</p>
                <ul class="setting-list">
                    <li>
                        <span>Notifications</span>
                        <div class="switch">
                            <label><input type="checkbox"
                                    checked><span class="lever"></span></label>
                        </div>
                    </li>
                    <li>
                        <span>Auto Updates</span>
                        <div class="switch">
                            <label><input type="checkbox"
                                    checked><span class="lever"></span></label>
                        </div>
                    </li>
                </ul>
                <p>ACCOUNT SETTINGS</p>
                <ul class="setting-list">
                    <li>
                        <span>Offline</span>
                        <div class="switch">
                            <label><input type="checkbox"><span class="lever"></span></label>
                        </div>
                    </li>
                    <li>
                        <span>Location Permission</span>
                        <div class="switch">
                            <label><input type="checkbox"
                                    checked><span class="lever"></span></label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</aside>
<!-- #END# Right Sidebar -->
