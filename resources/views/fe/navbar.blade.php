<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" href="/">About</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/project">Project</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link">Certificate</a>
              </li>
             
              <div class="theme-switch-wrapper">
                  <label class="theme-switch" for="checkbox">
                      <input type="checkbox" id="checkbox" />
                      <div class="slider round"></div>
                  </label>
              </div>

          </ul>
      </div>
  </div>
</nav>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(function() {
      $('#checkbox').change(function() {
          if ($(this).is(':checked')) {
              $('body').addClass('dark-mode');
          } else {
              $('body').removeClass('dark-mode');
          }
      });
  });
</script>
