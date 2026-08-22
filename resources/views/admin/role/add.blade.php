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
              <form class="panel needs-validation" novalidate>
                <div class="panel-header"><div><h2 class="h5 mb-1 section-title"><i class="bi bi-person-plus" aria-hidden="true"></i><span>Departement's Information</span></h2><p class="text-muted mb-0">Create a departement's account with validated fields.</p></div></div>
                <div class="row g-3">
                  <div class="col-md-6"><label class="form-label" for="firstName">First name</label><input class="form-control" id="firstName" type="text" required><div class="invalid-feedback">First name is required.</div></div>
                  <div class="col-md-6"><label class="form-label" for="lastName">Last name</label><input class="form-control" id="lastName" type="text" required><div class="invalid-feedback">Last name is required.</div></div>
                  <div class="col-md-6"><label class="form-label" for="email">Email</label><input class="form-control" id="email" type="email" required><div class="invalid-feedback">Enter a valid email.</div></div>
                  <div class="col-md-6"><label class="form-label" for="phone">Phone</label><input class="form-control" id="phone" type="tel" required><div class="invalid-feedback">Phone number is required.</div></div>
                  <div class="col-md-6"><label class="form-label" for="role">Role</label><select class="form-select" id="role" required><option value="">Choose role</option><option>Admin</option><option>Manager</option><option>Editor</option><option>Viewer</option></select><div class="invalid-feedback">Choose a role.</div></div>
                  <div class="col-md-6"><label class="form-label" for="team">Team</label><select class="form-select" id="team" required><option value="">Choose team</option><option>Operations</option><option>Sales</option><option>Content</option><option>Finance</option></select><div class="invalid-feedback">Choose a team.</div></div>
                  <div class="col-12"><label class="form-label" for="notes">Notes</label><textarea class="form-control" id="notes" rows="4" placeholder="Optional onboarding notes"></textarea></div>
                </div>
                <div class="d-flex flex-wrap justify-content-end gap-2 mt-4"><a class="btn btn-outline-secondary" href="users.html">Cancel</a><button class="btn btn-primary" type="submit"><i class="bi bi-person-check" aria-hidden="true"></i> Create User</button></div>
              </form>
            </div>
          </section>
        </div>
      </main>

      <footer class="admin-footer">
        <div class="container-fluid px-3 px-lg-4">
          <span>Copyright 2026 adminHMD. <br> Developed by <a target="_blank" class="fw-bold text-success" href="https://github.com/HasanMahmudDev">Md. Hasan Mahmud</a> • Distributed by <a target="_blank" class="fw-bold text-success" href="https://themewagon.com">ThemeWagon</a> </span>
          <span>Professional dashboard template.</span>
        </div>
      </footer>
    </div>
  </div>

<script src="{{ asset('template/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/assets/js/main.js') }}"></script>

</body>
</html>
