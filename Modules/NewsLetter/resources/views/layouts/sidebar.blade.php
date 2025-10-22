@canany(['newsletter-show', 'newsletter-send_bulk_mail_show'])
<li class="app-sidebar-menu-item has-dropdown">
    <a href="javascript:void(0);" class="menu-link d-flex align-items-center">
        <span class="menu-icon flex-shrink-0">
            
              <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M12.84 12.0699L1.17 7.99993C0.979586 7.9335 0.813707 7.81104 0.694137 7.64864C0.574567 7.48624 0.506894 7.29148 0.5 7.08993V5.99993C0.500824 5.79321 0.56569 5.59183 0.685674 5.42349C0.805657 5.25516 0.974861 5.12814 1.17 5.05993L12.84 0.999929C12.9149 0.97462 12.9948 0.967445 13.073 0.978991C13.1513 0.990537 13.2256 1.02048 13.29 1.06635C13.3545 1.11222 13.4071 1.17272 13.4436 1.24288C13.4801 1.31304 13.4994 1.39085 13.5 1.46993V11.5999C13.4994 11.679 13.4801 11.7568 13.4436 11.827C13.4071 11.8971 13.3545 11.9576 13.29 12.0035C13.2256 12.0494 13.1513 12.0793 13.073 12.0909C12.9948 12.1024 12.9149 12.0952 12.84 12.0699Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M8.48 10.5699C8.39581 11.2645 8.05 11.901 7.513 12.3495C6.976 12.7981 6.28819 13.0251 5.58967 12.9844C4.89114 12.9436 4.23444 12.638 3.7533 12.13C3.27216 11.622 3.00277 10.9496 3 10.2499V8.65991" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
              </svg>
        </span>
        <span class="menu-title flex-grow-1">{{ __('sidebar.newsletter') }}</span>
        <span class="menu-arrow flex-shrink-0 d-flex align-items-center justify-content-center">
            <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 9L5 5L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </span>
    </a>

    <ul class="app-sidebar-submenu">
        @can('newsletter-show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.newsletter.index') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.newsletter.index') }}">
                <span class="menu-title flex-grow-1">
                    {{ __('sidebar.subscriber_list') }}
                </span>
            </a>
        </li>
        @endcan

        @can('newsletter-send_bulk_mail_show')
        <li class="app-sidebar-menu-item">
            <a href="{{ route('admin.newsletter.send_bulk_mail') }}" class="menu-link d-flex align-items-center {{ activeRoute('admin.newsletter.send_bulk_mail') }}">
                <span class="menu-title flex-grow-1">
                    {{ __('sidebar.send_bulk_email') }}
                </span>
            </a>
        </li>
        @endcan
    </ul>
</li>
@endcanany