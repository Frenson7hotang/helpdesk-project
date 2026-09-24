@include('admin.part.head')
<body>
  <div class="admin-shell">
    <div class="sidebar-backdrop" data-sidebar-close></div>

@include('admin.part.sidebar')

    <div class="admin-main">
      
@include('admin.part.navbar')

       <main class="dashboard-content">
        <div class="container-fluid px-3 px-lg-4 py-4">
          <div class="page-heading">
            <div class="page-heading-copy">
              <span class="page-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Management</p>
                <h1 class="h3 mb-1">Users</h1>
                <p class="text-muted mb-0">Review accounts, roles, account status, and team ownership.</p>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="tables.html"><i class="bi bi-download" aria-hidden="true"></i> Export</a><a class="btn btn-primary btn-sm" href="{{ route('user.add') }}"><i class="bi bi-person-plus" aria-hidden="true"></i> Add User</a></div>
          </div>

          <section class="panel mt-3">
            <div class="panel-header">
              <div>
                <h2 class="h5 mb-1 section-title"><i class="bi bi-table" aria-hidden="true"></i><span>User List</span></h2>
                <p class="text-muted mb-0">Search, review, and manage team member accounts.</p>
              </div>
              <div class="d-flex flex-wrap align-items-center gap-3">
                <form method="GET" action="" id="filterForm" class="d-flex align-items-center gap-2">
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control form-control-sm" placeholder="Search...">
                    <select name="perPage" class="form-select form-select-sm" style="width: 70px;" onchange="document.getElementById('filterForm').submit()">
                        <option value="5" {{ request('perPage') == 5 ? 'selected' : '' }}>5</option>
                        <option value="10" {{ request('perPage') == 10 ? 'selected' : '' }}>10</option>
                        <option value="15" {{ request('perPage') == 15 ? 'selected' : '' }}>15</option>
                        <option value="20" {{ request('perPage') == 20 ? 'selected' : '' }}>20</option>
                    </select>
                </form>
              </div>
              <div class="d-flex flex-wrap gap-2">
                <a class="btn btn-primary btn-sm" href="{{ route('user.add') }}"><i class="bi bi-person-plus" aria-hidden="true"></i> Add User</a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-middle mb-0" id="usersTable" data-searchable-table>
                <thead>
                  <tr>
                    <th scope="col">NO</th>
                    <th scope="col">User</th>
                    <th scope="col">NIK</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Role</th>
                    <th scope="col">Department</th>
                    <th scope="col" class="text-end">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($user as $key => $u)
                  <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>
                      <div class="d-flex align-items-center gap-2">
                        <img class="avatar-img avatar-sm" src="{{ $u->gambar ? asset('storage/' . $u->gambar) : asset('assets/images/avatar/avatar-1.jpg') }}" alt="{{ $u->nama }}">
                        <div>
                          <p class="fw-semibold mb-0">{{ $u->nama }}</p>
                          <p class="text-muted small mb-0">{{ $u->email }}</p>
                          <p class="text-muted small mb-0">{{ $u->no_hp }}</p>
                        </div>
                      </div>
                    </td>
                    <td>{{ $u->nik }}</td>
                    <td>{{ $u->tanggal }}</td>
                    <td>{{ $u->role }}</td>
                    <td>{{ $u->dept }}</td>
                   <td class="text-end">
                    <div class="d-flex justify-content-end gap-2">
                      <form id="delete-form-{{ $u->id }}" action="{{ route('user.delete', $u->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete('{{ $u->id }}')">
                          <i class="bi bi-trash" aria-hidden="true"></i> Hapus
                        </button>
                      </form>
                      <a class="btn btn-info btn-sm" href="{{ route('user.edit', $u->id) }}">
                        <i class="bi bi-pencil" aria-hidden="true"></i>Edit</a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="7" class="text-center text-muted">Data tidak ditemukan</td>
                  </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <div class="d-flex flex-column flex-sm-row align-items-sm-center justify-content-between gap-3 mt-3">
              <p class="text-muted small mb-0"></p>
              <nav aria-label="Users pagination">
                  {{ $user->links('pagination::bootstrap-5') }}
              </nav>
            </div>
          </section>
        </div>
      </main>

@include('admin.part.foot')

</body>
</html>
