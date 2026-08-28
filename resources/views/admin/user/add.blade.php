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
                <h1 class="h3 mb-1">Add User</h1>
                <p class="text-muted mb-0">Create a new user account with role and team assignments.</p>
              </div>
            </div>
            <div class="heading-actions">
              <a class="btn btn-outline-secondary btn-sm" href="{{ route('user.dashboard') }}">
                <i class="bi bi-arrow-left" aria-hidden="true"></i> Back to Users</a></div>
          </div>

          <section class="row g-3">
            <div class="col-12 col-xl-12">
              <form action="{{ route('simpan-user') }}" method="post" enctype="multipart/form-data" class="panel needs-validation" novalidate>
              @csrf  
                <div class="row g-3">
                   <div class="col-md-6">
                    <label class="form-label" for="id">ID User</label>
                    <input class="form-control" id="id" type="text" name="id" value="{{ $generatedId }}" readonly>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="nama">Nama Lengkap</label>
                    <input class="form-control" id="nama" type="text" name="nama" required>
                    <div class="invalid-feedback">Nama Lengkap harus diisi.</div>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="nik">NIK</label>
                    <input class="form-control" id="nik" type="text" name="nik" required>
                    <div class="invalid-feedback">NIK harus diisi.</div>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="date">Tanggal Lahir</label>
                    <input class="form-control" id="date" type="date" name="tanggal">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="role">Role</label>
                     <select id="role" name="role" class="default-select form-control wide">
                        <option selected="">Pilih...</option>
                           @foreach($role as $rl)
                            <option value = "{{ $rl -> id }}">
													{{ $rl -> role }}	
													</option>
													@endforeach
                      </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="dept">Departement</label>
                     <select id="dept" name="dept" class="default-select form-control wide">
                        <option selected="">Pilih...</option>
                           @foreach($dept as $dpt)
                            <option value = "{{ $dpt -> id }}">
													{{ $dpt -> dept }}	
													</option>
													@endforeach
                      </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" id="email" type="email" name="email" required>
                    <div class="invalid-feedback">Email harus diisi.</div>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="no_hp">No Handphone</label>
                    <input class="form-control" id="no_hp" type="text" name="no_hp" required>
                    <div class="invalid-feedback">Nomor Handphone harus diisi.</div>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" id="password" type="text" name="password" required>
                    <div class="invalid-feedback">Password harus diisi.</div>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label" for="gambar">Gambar</label>
                    <input class="form-control" id="gambar" type="file" name="gambar" accept="image/*" onchange="previewImage(event)">
                  </div>
                  <div style="margin-bottom: 15px;">
                      <img id="imagePreview" 
                           src="#" 
                           alt="Preview Gambar" 
                           style="display: none; max-width: 300px; height: auto; border-radius: 8px; border: 1px solid #ddd;">
                  </div>
                <div class="d-flex flex-wrap justify-content-end gap-2 mt-4">
                  <a class="btn btn-outline-secondary" href="users.html">Cancel</a>
                  <button class="btn btn-primary" type="submit">
                    <i class="bi bi-person-check" aria-hidden="true"></i> Create User
                  </button>
                </div>
              </form>
            </div>
          </section>
        </div>
      </main>

@include('admin.part.foot')

</body>
</html>
