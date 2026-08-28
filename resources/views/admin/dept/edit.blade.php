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
                <h1 class="h3 mb-1">Edit Departement</h1>
                <p class="text-muted mb-0">Edit Departement's.</p>
              </div>
            </div>
            <div class="heading-actions">
                <a class="btn btn-outline-secondary btn-sm" href="{{ route('dept.dashboard') }}">
                <i class="bi bi-arrow-left" aria-hidden="true">
            </i> Back to Departement's</a></div>
          </div>

          <section class="row g-3"> 
              <form id="update-form-{{ $dept->id }}" action="{{ route('dept.update', $dept->id) }}" method="post" class="panel needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="id">ID</label>
                    <input class="form-control" id="firstName" type="text" name='id' value="{{ old('id', $dept->id) }}" readonly></div>
                  <div class="col-md-6">
                    <label class="form-label" for="dept">Role/Posisi</label>
                    <input class="form-control" id="lastName" type="text" name='dept' value="{{ old('dept', $dept->dept) }}" required>
                    <div class="invalid-feedback">Posisi harus diisi.</div>
                  </div>
                </div>
                <div class="d-flex flex-wrap justify-content-end gap-2 mt-4">
                    <a class="btn btn-outline-secondary" href="{{ route('dept.dashboard') }}">Cancel</a>
                    <button type="button" class="btn btn-primary" onclick="confirmUpdate('{{ $dept->id }}')">
                        <i class="bi bi-person-check" aria-hidden="true"></i>Edit Departement</button>
                </div>
              </form>
            </div>
          </section>
        </div>
      </main>

@include('admin.part.foot')

</body>
</html>
