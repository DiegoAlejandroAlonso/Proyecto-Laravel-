             

@if (count($errors)>0)
<div class="container alert alert-danger d-flex align-items-relative alert-dismissible fade show" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-exclamation-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
      </svg>
      <ul>
          <strong>Corrige los siguientes errores:</strong>
          @foreach ($errors->all() as $message)
              <li>{{ $message }}</li>
          @endforeach
      </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif