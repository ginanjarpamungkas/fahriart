<nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li class="nav-label">Home</li>
                        <li> <a class="has-arrow  " href="{{ route('dashboard.index') }}" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <li class="nav-label">Features</li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-wpforms"></i><span class="hide-menu">Artikel </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('post.index') }}">List</a></li>
                                <li><a href="{{ route('post.create') }}">Create</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-database"></i><span class="hide-menu">Category </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('category.index') }}">List</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-gear"></i><span class="hide-menu">Setting </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('setting.web') }}">Web</a></li>
                                <li><a href="{{ route('setting.harga') }}">Harga</a></li>
                                <li><a href="{{ route('setting.akun') }}">Akun</a></li>
                            </ul>
                        </li>
                        <li class="nav-label">Website</li>
                        <li> <a target="_blank" href="{{route('site.home')}}"><i class="fa fa-globe"></i> Site</a>
                        </li>
                    </ul>
                </nav>