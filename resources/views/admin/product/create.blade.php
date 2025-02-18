{-- Composant Blade - create --}
@extends('admin.layout')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/vendors/select-live/dselect.scss') }}">
<style>
  .form-select {
    text-align: left !important;
  }

  .dropdown-menu {
    border: 1px solid #dce7f1;
  }

  .input-group-text {
    cursor: pointer;
  }
</style>
@endsection

@section('content')
<div class="card">
  <div class="card-body row">
    <div class="col-md-8 col-12">
      <form action="{{ route('producSave') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
          <label for="title">Title</label>
          <div class="input-group">
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Chicken nugget spicy" value="{{ old('title') }}" required>
            <button type="button" class="btn btn-outline-secondary" id="generate-desc">Générer la description</button>
          </div>
          @error('title')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="category">Category</label>
          <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" required>
            <option selected disabled>Select Category</option>
            @foreach (Auth::user()->shop->category as $item)
            <option value="{{ $item->id }}" {{ old('category') == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
            @endforeach
          </select>
          @error('category')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="1000" value="{{ old('price') }}" required>
          @error('price')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="stock">Stock</label>
          <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" placeholder="10" value="{{ old('stock') }}" required>
          @error('stock')
          <small class="text-danger">{{ $message }}</small>
          @enderror
        </div>

        <div class="form-group">
          <label for="desc">Description</label>
          <textarea name="desc" id="desc" cols="30" class="form-control @error('desc') is-invalid @enderror" placeholder="Homade spicy chicken nuggets with healthy chicken..." required>{{ old('desc') }}</textarea>
          @error('desc')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="product-image">Product Image</label>
          <div class="input-group mb-3">
              <button type="button" class="btn btn-outline-primary" id="generate-image">
                  Générer une image
              </button>
              <input type="file" name="image" id="product-image" class="form-control d-none">
          </div>
          <div id="image-preview" class="mt-2"></div>
      </div>

        <button type="submit" class="btn btn-primary float-end">Save</button>
      </form>
    </div>
  </div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/vendors/select-live/dselect.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
<script>
  
  document.getElementById('desc').addEventListener('keyup', function () {
    this.style.overflow = 'hidden';
    this.style.height = 0;
    this.style.height = this.scrollHeight + 'px';
  }, false);

  $('#title').keyup(function () {
    let title = this.value;
    setTimeout(() => {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content') },
        type: 'POST',
        dataType: 'json',
        data: { "_token": "{{ csrf_token() }}", title: title },
        url: '{{ route("productCheck") }}',
        success: function (data) { },
        statusCode: {
          200: () => {
            $('#title').addClass('is-invalid');
            $('#title').removeClass('is-valid');
          },
          201: () => {
            $('#title').removeClass('is-invalid');
            $('#title').addClass('is-valid');
          }
        }
      });
    }, 100);
  });

  $('#generate-desc').click(function () {
    const title = $('#title').val();
    if (!title.trim()) return alert("Veuillez d'abord remplir le titre.");

    $(this).text('Génération...').attr('disabled', true);

    $.ajax({
        url: '{{ route("generate.description") }}', 
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        data: {
            title: title
        },
        success: function (response) {
            if (response.status === 'success') {
                $('#desc').val(response.description).trigger('keyup');
            } else {
                alert('Erreur: ' + (response.error || 'Réponse inattendue de l\'API'));
            }
        },
        error: function (xhr) {
            let errorMsg = 'Erreur lors de la génération de description.';
            try {
                const response = JSON.parse(xhr.responseText);
                errorMsg = response.error || response.message || errorMsg;
            } catch (e) {}
            alert(errorMsg);
        },
        complete: function () {
            $('#generate-desc').text('Générer').attr('disabled', false);
        }
    });
});

$('#generate-image').click(function() {
    const title = $('#title').val();
    const desc = $('#desc').val();
    
    if (!title.trim() || !desc.trim()) {
        return alert("Veuillez d'abord remplir le titre et la description.");
    }

    $(this).text('Génération en cours...').attr('disabled', true);

    $.ajax({
        url: '{{ route("generate.image") }}',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        data: {
            title: title,
            desc: desc
        },
        success: function(response) {
            if (response.status === 'success') {
                
                $('#image-preview').html(`
                    <img src="${response.image_url}" class="img-thumbnail" style="max-height: 200px;">
                    <input type="hidden" name="generated_image" value="${response.image_name}">
                `);
                alert('Image générée avec succès!');
            } else {
                alert('Erreur: ' + (response.error || 'Échec de la génération'));
            }
        },
        error: function(xhr) {
            let errorMsg = 'Erreur lors de la génération de l\'image';
            try {
                const response = JSON.parse(xhr.responseText);
                errorMsg = response.error || response.message || errorMsg;
            } catch (e) {}
            alert(errorMsg);
        },
        complete: function() {
            $('#generate-image').text('Générer une image').attr('disabled', false);
        }
    });
});

  dselect(document.querySelector('#category'), {
    search: true
  });
</script>
@endsection
