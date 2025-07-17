<!-- ========== Left Sidebar Start ========== -->


<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div  id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title"><hr></li>
                <li>
                    <a href="/" class="waves-effect" target="blank">
                        <i class="fas fa-check-circle"></i>
                        <span style="font-size: 14px"><b>Web Status</b></span>
                    </a>
                </li>

                <li>
                    <a href="/dashboard" class="waves-effect">
                        <i class="dripicons-device-desktop"></i>
                        <span style="font-size: 14px"><b>Home</b></span>
                    </a>
                </li>




                    <style>
                        .sub-menu {
                            font-size: 12px;
                            line-height: 17px; /* Improved readability */
                        }
                    </style>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ion ion-md-people"></i>
                        <span style="font-size: 14px"> <b>Clients</b> </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/client"><span style="font-size: 14px">All Clients</a></span></li>
                        <li><a href="#"><span style="font-size: 14px">Approved Clients</a></span></li>
                        <li><a href="#"><span style="font-size: 14px">Blacklisted Clients</a></span></li>


                    </ul>

                    <style>
                        .sub-menu {
                            font-size: 12px;
                            line-height: 17px; /* Improved readability */
                        }
                    </style>

                </li>

                                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-copy"></i>
                        <span style="font-size: 14px"> <b>Loans</b> </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/loans/create"><span style="font-size: 14px">Add New</a></span></li>
                        <li><a href="/loans"><span style="font-size: 14px">Loans</a></span></li>
                        <li><a href="#"><span style="font-size: 14px">Approved Loans</a></span></li>
                        <li><a href="#"><span style="font-size: 14px">Pending Loans</a></span></li>


                    </ul>

                    <style>
                        .sub-menu {
                            font-size: 12px;
                            line-height: 17px; /* Improved readability */
                        }
                    </style>

                </li>

                                                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-credit-card"></i>
                        <span style="font-size: 14px"> <b>Repayments</b> </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/repayments/create"><span style="font-size: 14px">Add New</a></span></li>
                        <li><a href="/repayments"><span style="font-size: 14px">Repayments</a></span></li>
                    </ul>

                    <style>
                        .sub-menu {
                            font-size: 12px;
                            line-height: 17px; /* Improved readability */
                        }
                    </style>

                </li>

                    <style>
                        .sub-menu {
                            font-size: 12px;
                            line-height: 18px; /* Improved readability */
                        }
                    </style>


                @role('admin')
                <li>
                    <a href="/pages/widget" class="waves-effect">
                        <i class="ion ion-md-apps"></i>
                        <span style="font-size: 14px"><b>Website Pages</b></span>
                    </a>
                </li>

                <li>
                    <a href="/restricted/developer_dashboard" class="waves-effect">
                        <i class="dripicons-gear"></i>
                        <span style="font-size: 14px"><b>General Settings</b></span>
                    </a>
                </li>
                @endrole

<br>
<li style="background-color:#07435d; border-radius: 40px;">
    <a href="" class="waves-effect">
        {{-- <i class="dripicons-lock"></i> --}}
        <span style="font-size: 13px">
            @if(auth()->user()->image) <!-- Check if image is uploaded -->
                <img class="rounded-circle header-profile-user" src="{{ asset('users/images/' . auth()->user()->image) }}" alt="Header Avatar">
            @else
                <img class="rounded-circle header-profile-user" src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&color=7F9CF5&background=EBF4FF" alt="Header Avatar">
            @endif
            &nbsp;&nbsp;&nbsp;<b>
                <span id="user-name">{{ auth()->user()->name }}</span>

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const userNameElement = document.getElementById("user-name");
                        if (userNameElement) {
                            const fullName = userNameElement.textContent.trim();
                            const limitedName = fullName.split(" ").slice(0, 1).join(" ");
                            userNameElement.textContent = limitedName;
                        }
                    });
                </script>


            </b>
            <span style="display:inline-block; width: 8px; height: 8px; background-color: rgb(14, 196, 14); border-radius: 50%; margin-left: 5px;"></span>
        </span>

    </a>
</li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

<script>
    // Set green as the default theme when the page loads
    document.addEventListener("DOMContentLoaded", function () {
        if (!document.documentElement.hasAttribute('data-theme-mode')) {
            document.documentElement.setAttribute('data-theme-mode', 'teal');
        }
    });
</script>
