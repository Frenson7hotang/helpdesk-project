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
              <span class="page-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
              <div>
                <p class="eyebrow mb-1">Management</p>
                <h1 class="h3 mb-1">Add Role</h1>
                <p class="text-muted mb-0">Create a new role's.</p>
              </div>
            </div>
            <div class="heading-actions"><a class="btn btn-outline-secondary btn-sm" href="{{ route('role.dashboard') }}"><i class="bi bi-arrow-left" aria-hidden="true"></i> Back to Role's</a></div>
          </div>

          <section class="row g-3">
            <div class="col-12 col-xl-12"> 
              <form action="{{ route('simpan-role') }}" method="post" class="panel needs-validation" novalidate>
                @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="id">ID</label>
                    <input class="form-control" id="firstName" type="text" name='id' value="{{ $generatedId }}" readonly></div>
                  <div class="col-md-6">
                    <label class="form-label" for="name">Role/Posisi</label>
                    <input class="form-control" id="lastName" type="text" name='name' required>
                    <div class="invalid-feedback">Posisi harus diisi.</div>
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-end gap-2 mt-4"><a class="btn btn-outline-secondary" href="{{ route('role.dashboard') }}">Cancel</a><button class="btn btn-primary" type="submit"><i class="bi bi-person-check" aria-hidden="true"></i> Create Role</button></div>
              </form>
            </div>
          </section>
        </div>
      </main>
@include('admin.part.foot')
</body>
</html>
