<div class="sidemenu">
  <ul class="site-menu" data-plugin="menu">
    {{-- @role('ADMIN|ACCOUNT') --}}
    <li class="site-menu-item has-sub {{ request()->is('admin/dashboard') ? 'active' : '' }}">
      <a class="animsition-link" href="{{ route('admin.dashboard') }}">
        <i class="site-menu-icon md-view-dashboard" aria-hidden="true"></i>
        <span class="site-menu-title">@lang('admin.include.dashboard')</span>
      </a>
    </li>
    {{-- @endrole --}}
    @can('dispatcher-panel')
    <li class="site-menu-item has-sub">
      <a href="{{ route('admin.dispatcher.index') }}">
        <i class="site-menu-icon md-view-compact" aria-hidden="true"></i>
        <span class="site-menu-title">@lang('admin.include.dispatcher_panel')</span>
      </a>
    </li>
    @endcan


    <li class="site-menu-item has-sub">
      @can('dispute-manager-list')
      <a href="javascript:void(0)">
        <i class="site-menu-icon icon wb-bookmark" aria-hidden="true"></i>
        <span class="site-menu-title">Dispute</span>
        <span class="site-menu-arrow"></span>
      </a>@endcan
      <ul class="site-menu-sub">
        @can('dispute-manager-list')
        <li class="site-menu-item">
          <a class="animsition-link" href="{{ route('admin.dispute-manager.index') }}">
            <span class="site-menu-title">@lang('admin.include.dispute_manager')</span>
          </a>
          {{-- <ul class="site-menu-sub">
            @can('dispute-manager-list')
            <li class="site-menu-item">
              <a class="animsition-link" href="{{ route('admin.dispute-manager.index') }}">
          <span class="site-menu-title">@lang('admin.include.dispute_manager')</span>
          </a>
        </li>
        @endcan
        @can('dispute-manager-create')
        <li class="site-menu-item">
          <a class="animsition-link" href="{{ route('admin.dispute-manager.create') }}">
            <span class="site-menu-title">@lang('admin.include.add_new_dispute_manager')</span>
          </a>
        </li>
        @endcan
      </ul> --}}
    </li>
    @endcan
    @can('dispute-list')
    <li class="site-menu-item has-sub">
      <a href="javascript:void(0)">
        <span class="site-menu-title">@lang('admin.include.dispute_panel')</span>
        <span class="site-menu-arrow"></span>
      </a>

      <ul class="site-menu-sub">

        <li class="site-menu-item">
          <a class="animsition-link" href="{{ route('admin.dispute.index') }}">
            <span class="site-menu-title">@lang('admin.include.dispute_type')</span>
          </a>
        </li>

        <li class="site-menu-item">
          <a class="animsition-link" href="{{ route('admin.userdisputes') }}">
            <span class="site-menu-title">@lang('admin.include.dispute_request')</span>
          </a>
        </li>

      </ul>

    </li>
    @endcan
  </ul>
  </li>


@can('map-menu')
  <li class="site-menu-item has-sub {{ request()->is('admin/map') || request()->is('admin/heatmap')? 'active' : '' }}">
    <a href="javascript:void(0)">
      <i class="site-menu-icon md-map" aria-hidden="true"></i>
      <span class="site-menu-title">View Map</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      @can('map-view')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.map.index') }}">
          <span class="site-menu-title">@lang('admin.include.map')</span>
        </a>
      </li>
      @endcan
      @can('heat-map')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.heatmap') }}">
          <span class="site-menu-title">@lang('admin.include.heat_map')</span>
        </a>
      </li>
      @endcan
    </ul>
  </li>
  @endcan
  @can('role-list')
  <li
    class="site-menu-item has-sub {{ request()->is('admin/role')|| request()->is('admin/role/create') || request()->is('admin/role/*/edit')  || request()->is('admin/sub-admins') || request()->is('admin/sub-admins/create') || request()->is('admin/sub-admins/*/edit')? 'active' : '' }}">
    <a href="javascript:void(0)">
      <i class="site-menu-icon wb-cloud" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.roles')</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">

      @can('role-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.role.index') }}">
          <span class="site-menu-title">@lang('admin.include.role_types')</span>

        </a>
      </li>
      @endcan
      @can('sub-admin-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.sub-admins.index') }}">
          <span class="site-menu-title">@lang('admin.include.sub_admins')</span>
        </a>
      </li>
      @endcan
    </ul>

  </li>
  @endcan
  @can('user-list')
  <li
    class="site-menu-item has-sub {{ request()->is('admin/user') || request()->is('admin/user/*/edit') || request()->is('admin/user/create')? 'active' : '' }}">
    <a href="javascript:void(0)">
      <i class="site-menu-icon md-widgets" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.users')</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      @can('user-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.user.index') }}">
          <span class="site-menu-title">@lang('admin.include.list_users')</span>
        </a>
      </li>
      @endcan
      @can('user-create')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.user.create') }}">
          <span class="site-menu-title">@lang('admin.include.add_new_user')</span>
        </a>
      </li>
      @endcan
    </ul>
  </li>
  @endcan
  @can('provider-list')
  <li class="site-menu-item has-sub {{ request()->is('admin/provider') ? 'active' : '' }}">
    <a href="javascript:void(0)">
      <i class="site-menu-icon icon wb-users" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.providers')</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      @can('provider-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.provider.index') }}">
          <span class="site-menu-title">@lang('admin.include.list_providers')</span>
        </a>
      </li>
      @endcan
      @can('provider-create')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.provider.create') }}">
          <span class="site-menu-title">@lang('admin.include.add_new_provider')</span>
        </a>
      </li>
      @endcan

    </ul>
  </li>
  @endcan
  @can('fleet-list')
  <li class="site-menu-item has-sub {{ request()->is('admin/fleet') ? 'active' : '' }}">
    <a href="javascript:void(0)">
      <i class="site-menu-icon md-format-color-fill" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.fleet_owner')</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      @can('fleet-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.fleet.index') }}">
          <span class="site-menu-title">@lang('admin.include.list_fleets')</span>
        </a>
      </li>
      @endcan
      @can('fleet-create')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.fleet.create') }}">
          <span class="site-menu-title">@lang('admin.include.add_new_fleet_owner')</span>
        </a>
      </li>
      @endcan
    </ul>
  </li>
  @endcan
  @can('dispatcher-list')
  <li class="site-menu-item has-sub {{ request()->is('admin/dispatch-manager') ? 'active' : '' }}">
    <a href="javascript:void(0)">
      <i class="site-menu-icon md-widgets" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.dispatcher')</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      @can('dispatcher-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.dispatch-manager.index') }}">
          <span class="site-menu-title">@lang('admin.include.list_dispatcher')</span>
        </a>
      </li>
      @endcan
      @can('dispatcher-create')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.dispatch-manager.create') }}">
          <span class="site-menu-title">@lang('admin.include.add_new_dispatcher')</span>
        </a>
      </li>
      @endcan
    </ul>
  </li>
  @endcan
  @can('account-manager-list')
  <li class="site-menu-item has-sub">
    <a href="javascript:void(0)">
      <i class="site-menu-icon wb-user" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.account_manager')</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      @can('account-manager-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.account-manager.index') }}">
          <span class="site-menu-title">@lang('admin.include.list_account_managers')</span>
        </a>
      </li>
      @endcan
      @can('account-manager-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.account-manager.create') }}">
          <span class="site-menu-title">@lang('admin.include.add_new_account_manager')</span>
        </a>
      </li>
      @endcan
    </ul>
  </li>
  @endcan


  @can('statements')
  <li class="site-menu-item has-sub">
    <a href="javascript:void(0)">
      <i class="site-menu-icon md-format-color-fill" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.statements')</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.ride.statement') }}">
          <span class="site-menu-title">@lang('admin.include.overall_ride_statments')</span>
        </a>
      </li>

      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.ride.statement.provider') }}">
          <span class="site-menu-title">@lang('admin.include.provider_statement')</span>
        </a>
      </li>
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.ride.statement.user') }}">
          <span class="site-menu-title">@lang('admin.include.user_statement')</span>
        </a>
      </li>
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.ride.statement.fleet') }}">
          <span class="site-menu-title">@lang('admin.include.fleet_statement')</span>
        </a>
      </li>

    </ul>
  </li>


  @endcan
  @can('settlements')
  <li class="site-menu-item has-sub">
    <a href="javascript:void(0)">
      <i class="site-menu-icon icon wb-library" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.transaction')</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.providertransfer') }}">
          <span class="site-menu-title">@lang('admin.include.provider_request')</span>
        </a>
      </li>
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.transactions') }}">
          <span class="site-menu-title">@lang('admin.include.all_transaction')</span>
        </a>
      </li>
    </ul>
  </li>
  @endcan
  @can('ratings')
  <li class="site-menu-item has-sub">
    <a href="{{ route('admin.user.review') }}">
      <i class="site-menu-icon wb-star-outline" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.ratings') &amp; @lang('admin.include.reviews')</span>
    </a>
  </li>
  @endcan

  @can('promocodes-list')
  <li class="site-menu-item has-sub">
    <a href="javascript:void(0)">
      <i class="site-menu-icon icon wb-tag" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.promocodes')</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      @can('promocodes-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.promocode.index') }}">
          <span class="site-menu-title">Promocodes</span>
        </a>
      </li>
      @endcan
      @can('promocodes-create')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.promocode.create') }}">
          <span class="site-menu-title">@lang('admin.include.add_new_promocode')</span>
        </a>
      </li>
      @endcan
    </ul>
  </li>

  @endcan
  @can('service-types-list')

  <li class="site-menu-item has-sub">
    <a href="javascript:void(0)">
      <i class="site-menu-icon wb-extension" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.service_types')</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      @can('service-types-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.service.index') }}">
          <span class="site-menu-title">@lang('admin.include.list_service_types')</span>
        </a>
      </li>
      @endcan
      @can('service-types-create')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.service.create') }}">
          <span class="site-menu-title">@lang('admin.include.add_new_service_type')</span>
        </a>
      </li>
      @endcan
      @can('peak-hour-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.peakhour.index') }}">
          <span class="site-menu-title">@lang('admin.include.peakhour')</span>
        </a>
      </li>
      @endcan
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ url('admin/geo-fencing') }}">
          <span class="site-menu-title">Geo Fencing</span>
        </a>
      </li>
      {{-- <li class="site-menu-item">
        <a class="animsition-link" href="{{ url('admin/time') }}">
          <span class="site-menu-title">Peak Time</span>
        </a>
      </li> --}}
    </ul>
  </li>
  @endcan
  @can('documents-list')
  <li class="site-menu-item has-sub">
    <a href="javascript:void(0)">
      <i class="site-menu-icon md-file" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.documents')</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      @can('documents-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.document.index') }}">
          <span class="site-menu-title">@lang('admin.include.list_documents')</span>
        </a>
      </li>
      @endcan
      @can('documents-create')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.document.create') }}">
          <span class="site-menu-title">@lang('admin.include.add_new_document')</span>
        </a>
      </li>
      @endcan
    </ul>
  </li>
  @endcan

  @can('notification-list')
  <li class="site-menu-item has-sub">
    <a href="javascript:void(0)">
      <i class="site-menu-icon wb-bell" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.notify')</span>
      <span class="site-menu-arrow"></span>
    </a>
    <ul class="site-menu-sub">
      @can('notification-list')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.notification.index') }}">
          <span class="site-menu-title">@lang('admin.include.list_notifications')</span>
        </a>
      </li>
      @endcan
      @can('notification-create')
      <li class="site-menu-item">
        <a class="animsition-link" href="{{ route('admin.notification.create') }}">
          <span class="site-menu-title">@lang('admin.include.add_new_notification')</span>
        </a>
      </li>
      @endcan
    </ul>
  </li>
@can('cancel-reasons-list')
      <li class="site-menu-item has-sub">
        <a href="javascript:void(0)">
          <i class="site-menu-icon wb-bell" aria-hidden="true"></i>
          <span class="site-menu-title">@lang('admin.include.reason')</span>
          <span class="site-menu-arrow"></span>
        </a>
        <ul class="site-menu-sub">
          @can('cancel-reasons-list')
          <li class="site-menu-item">
            <a class="animsition-link" href="{{ route('admin.reason.index') }}">
              <span class="site-menu-title">@lang('admin.include.list_reasons')</span>
            </a>
          </li>
          @endcan
          @can('cancel-reasons-create')
          <li class="site-menu-item">
            <a class="animsition-link" href="{{ route('admin.reason.create') }}">
              <span class="site-menu-title">@lang('admin.include.add_new_reason')</span>
            </a>
          </li>
          @endcan
        </ul>
      </li>
      @endcan
  @endcan
  @can('custom-push')
  <li class="site-menu-item">
    <a href="{{ route('admin.push') }}">
      <i class="site-menu-icon icon wb-user" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.custom_push')</span>
    </a>
  </li>

  @endcan

  @can('lost-item-list')
  <li class="site-menu-item">
    <a href="{{ route('admin.lostitem.index') }}">
      <i class="site-menu-icon md-apps" aria-hidden="true"></i>
      <span class="site-menu-title">@lang('admin.include.lostitem')</span>
    </a>
  </li>
  @endcan
  </ul>
</div>

<form id="logout-form" action="{{ url('/admin/logout') }}" method="POST" style="display: none;">
  {{ csrf_field() }}
</form>