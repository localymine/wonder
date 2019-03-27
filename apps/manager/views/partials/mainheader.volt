<a href="{{ url('manager/main/index') }}" class="logo"><span class="logo-mini"><b>SMC</b></span><span
      class="logo-lg"><b>SecureMC</b></span></a>
<nav class="navbar navbar-static-top">
  <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button"><span
        class="sr-only">{{ l10n._('Toggle navigation') }}</span></a>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="dropdown user user-menu"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
              class="fa fa-cog"></i>
          <span class="hidden-xs">{{ identity['name']~' ( '~l10n._(identity['role_display']|e)~' )' }}</span></a>
        <ul class="dropdown-menu">
          <li class="user-body">

            {% if identity['role_id'] == 1 or identity['role_id'] == 3 or identity['role_demote'] == 1 %}
              {{ link_to('admin/main/index', '<i class="fa fa-wrench"></i>'~l10n._('Administrator site'), 'class':'movemgr') }}

            {% endif %}
          </li>
          <li class="user-footer">{{ link_to('manager/sessions/end', l10n._('Sign Out'), 'class':'btn btn-default btn-flat') }}</li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
