<!--begin::Aside Menu-->
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="my-4 aside-menu" data-menu-vertical="1" data-menu-scroll="1"
        data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            @if(in_array(auth()->user()->type, ['owner', 'web user']))
            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('dashboard') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        {{ svg('Layers') }}
                    </span>
                    <span class="menu-text">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        {{ svg('Gift') }}
                    </span>
                    <span class="menu-text">{{ __('Promotions') }}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">{{ __('Promotions') }}</span>
                            </span>
                        </li>
                        @canany(['Create Combo','Edit Combo','Delete Combo','Export Combo','Import Combo'])
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.combos.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Combos') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Create Coupons','Edit Coupons','Delete Coupons','Export Coupons','Import Coupons'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.coupons.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Coupons') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Create Loyalty point','Edit Loyalty point','Delete Loyalty point','Export Loyalty point','Import Loyalty point'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.loyal-points.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Loyal Points') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Create Discounts','Edit Discounts','Delete Discounts','Export Discounts','Import Discounts'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.discounts.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Discounts') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Create Temporary activities','Edit Temporary activities','Delete Temporary activities','Export Temporary activities','Import Temporary activities'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.timed-events.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Timed Events') }}</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        {{ svg('Layout-4-blocks') }}
                    </span>
                    <span class="menu-text">{{ __('Menu') }}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">{{ __('Menu') }}</span>
                            </span>
                        </li>
                        @canany(['Create Category','Edit Category','Delete Category','Export Category','Import Category'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.categories.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Categories') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Create Products','Edit Products','Delete Products','Export Products','Import Products'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.products.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Products') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Create Add ons','Edit Add ons','Delete Add ons','Export Add ons','Import Add ons'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.modifiers.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Modifiers') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Show menu'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.menu-display.categories') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Display') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Activate menu'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.menu-activation.products') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Activation') }}</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>

            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        {{ svg('Settings-1') }}
                    </span>
                    <span class="menu-text">{{ __('Settings') }}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">{{ __('Settings') }}</span>
                            </span>
                        </li>
                        @canany(['Create employee','Edit employee','Delete employee','Export employee','Import employee'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.users.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Employees') }}</span>
                            </a>
                        </li>
                        @endcan
                        @can('Restore Data')
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.settings.restores.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Restore Data') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Create Work Shift','Edit Work Shift','Delete Work Shift','Export Work Shift','Import Work Shift'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.work-shifts.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Work Shifts') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Create Delay policies','Edit Delay policies','Delete Delay policies','Export Delay policies','Import Delay policies'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.delay-policies.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Delay Policies') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Create Payment method','Edit Payment method','Delete Payment method','Export Payment method','Import Payment method'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.payment-methods.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Payment Methods') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Create Tags','Edit Tags','Delete Tags','Export Tags','Import Tags'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.tags.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Tags') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Work Information'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.settings.business-info') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Business Info') }}</span>
                            </a>
                        </li>
                        @endcan

                        @canany(['Create Financial Settings','Edit Financial Settings'])
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.financial-settings.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Financial Settings') }}</span>
                            </a>
                        </li>
                        @endcan

                        @canany(['Application Settings'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.settings.app-settings') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('App Settings') }}</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        {{ svg('Box2') }}
                    </span>
                    <span class="menu-text">{{ __('Inventory') }}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">{{ __('Inventory') }}</span>
                            </span>
                        </li>
                        @canany(['Create Item inventory','Edit Item inventory','Delete Item inventory','Export Item inventory','Import Item inventory'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.inventory-items.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Items') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Create Suppliers','Edit Suppliers','Delete Suppliers','Export Suppliers','Import Suppliers'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.suppliers.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Suppliers') }}</span>
                            </a>
                        </li>
                        @endcan
                        @canany(['Create Inventory process','Edit Inventory process','Delete Inventory process','Export Inventory process','Import Inventory process'])

                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.inventory-transactions.index') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Transactions') }}</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            @canany(['Show Reports','Export Reports'])

            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        {{ svg('Box2') }}
                    </span>
                    <span class="menu-text">{{ __('Reports') }}</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent" aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">{{ __('Reports') }}</span>
                            </span>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.reports.items') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Items') }}</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.reports.sales') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Sales') }}</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.reports.waste-items') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Waste Items') }}</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.reports.hr') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Hr') }}</span>
                            </a>
                        </li>
                        <li class="menu-item" aria-haspopup="true">
                            <a href="{{ route('dashboard.reports.till-logs') }}" class="menu-link">
                                <i class="menu-bullet menu-bullet-dot">
                                    <span></span>
                                </i>
                                <span class="menu-text">{{ __('Till Logs') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            @endcan
            @else
            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('manage.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        {{ svg('Layers') }}
                    </span>
                    <span class="menu-text">{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('manage.permissions.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        {{ svg('Lock') }}
                    </span>
                    <span class="menu-text">{{ __('Permissions') }}</span>
                </a>
            </li>
            <li class="menu-item" aria-haspopup="true">
                <a href="{{ route('manage.restaurants.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        {{ svg('KnifeAndFork2') }}
                    </span>
                    <span class="menu-text">{{ __('Restaurants') }}</span>
                </a>
            </li>
            @endif
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<!--end::Aside Menu-->