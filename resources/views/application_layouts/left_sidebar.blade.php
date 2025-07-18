<div class="dashboard-bgcolor border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center b-db-color" style="font-size: 24px">
        <span class="fas fa-tachometer-alt"></span> &nbsp;<span class="text-uppercase">@yield('role_name', 'User')</span> 
    </div>
    <div class="list-group list-group-flush b-leftmenu">

    <ul id="sortable-menu">
        <li><a href='dashboard.html' class="dashboard-bgcolor b-db-color border-bottom b-newpage">Dashboard</a></li>
        <li class='sub-menu'><a href='javascript:void(0)' class="dashboard-bgcolor border-bottom b-db-color b-newpage">Charts<div class='fa fa-caret-down right'></div></a>
            <ul>
                <li><a class="b-newpage" href='barchart.html'>Bar Charts</a></li>
                <li><a class="b-newpage" href='linechart.html'>Line Charts</a></li>
                <li><a class="b-newpage" href='areachart.html'>Area Charts</a></li>
                <li class='sub-sub-menu'><a href='javascript:void(0)' class="b-newpage">Other Charts <div class='fa fa-caret-down right'></div></a>
                    <ul>
                        <li><a class="b-newpage" href='scatterchart.html'>Scatter Chart</a></li>
                        <li><a class="b-newpage" href='doughnut-piechart.html'>Doughnut &amp; Pie Charts</a></li>
                        <li><a class="b-newpage" href='polarareachart.html'>Polar Area Chart</a></li>
                    </ul>
                </li>
            </ul>
        </li>

        <li><a href='table.html' class="dashboard-bgcolor border-bottom b-newpage b-db-color">Tables</a></li>
        <li><a href='forms.html' class="dashboard-bgcolor border-bottom b-newpage b-db-color">Forms</a></li>
        <li class='sub-menu'><a href='javascript:void(0)' class="dashboard-bgcolor border-bottom b-db-color b-newpage">UI Elements<div class='fa fa-caret-down right'></div></a>
            <ul>
                <li><a href='typography.html' class="b-newpage">Typography</a></li>
                <li><a href='buttons.html' class="b-newpage">Buttons</a></li>
                <li><a href='cards.html' class="b-newpage">Cards</a></li>
                <li><a href='icons.html' class="b-newpage">Icons</a></li>
            </ul>
        </li>
        <li class='sub-menu'><a href='javascript:void(0)' class="dashboard-bgcolor border-bottom b-db-color b-newpage">Multi-level Dropdown<div class='fa fa-caret-down right'></div></a>
            <ul>
                <li><a href='javascript:void(0);' class="b-newpage">Second Level Item</a></li>
                <li><a href='javascript:void(0)' class="b-newpage">Second Level Item</a></li>
                <li class='sub-sub-menu'><a href='javascript:void(0);' class="b-newpage">Third Level <div class='fa fa-caret-down right'></div></a>
                    <ul>
                        <li><a href='javascript:void(0)' class="b-newpage">Third Level Item</a></li>
                        <li><a href='javascript:void(0);' class="b-newpage">Third Level Item</a></li>
                        <li><a href='javascript:void(0)' class="b-newpage">Third Level Item</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    </div>
</div>