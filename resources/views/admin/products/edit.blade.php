
@extends('admin.layouts.app')

@section('title', 'Edit Product')

@section('content')
<h1 class="mb-4">Edit Product</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="slug" class="form-label">Product Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $product->slug) }}" required>
                <small class="text-muted">Unique identifier, e.g. 'full-cream-milk-1l'</small>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Product Type</label>
                <select class="form-select" id="type" name="type" required>
                    <option value="buy" @if(old('type', $product->type)=='buy') selected @endif>Buy Only</option>
                    <option value="subscribe" @if(old('type', $product->type)=='subscribe') selected @endif>Subscribe Only</option>
                    <option value="both" @if(old('type', $product->type)=='both') selected @endif>Both</option>
                </select>
                <small class="text-muted">Choose if this product can be bought, subscribed, or both.</small>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Short Description</label>
                <textarea class="form-control" id="description" name="description" rows="2">{{ old('description', $product->description) }}</textarea>
            </div>
            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
            <script>
                ClassicEditor.create(document.querySelector('#description'), {
                    toolbar: [
                        'heading', '|', 'bold', 'italic', 'underline', 'fontSize', 'fontColor', 'fontBackgroundColor',
                        '|', 'bulletedList', 'numberedList', 'blockQuote', '|', 'link', 'insertTable', 'undo', 'redo'
                    ]
                }).catch(error => { console.error(error); });
            </script>
            <div class="mb-3">
                <label for="details" class="form-label">Dairy Product Details</label>
                <textarea class="form-control" id="details" name="details" rows="4">{{ old('details', $product->details) }}</textarea>
                <small class="text-muted">Add more information about the product, benefits, nutrition, etc.</small>
            </div>
            <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
            <script>
                ClassicEditor.create(document.querySelector('#details'), {
                    toolbar: [
                        'heading', '|', 'bold', 'italic', 'underline', 'fontSize', 'fontColor', 'fontBackgroundColor',
                        '|', 'bulletedList', 'numberedList', 'blockQuote', '|', 'link', 'insertTable', 'undo', 'redo'
                    ]
                }).catch(error => { console.error(error); });
            </script>

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price', $product->price) }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" required>
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Main Product Image</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*" onchange="previewMainImage(this)">
                <div id="mainImagePreview" class="mt-2">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Main Image" class="img-thumbnail" style="max-width:120px;max-height:120px;object-fit:cover;">
                    @endif
                </div>
            </div>
            <script>
                function previewMainImage(input) {
                    const container = document.getElementById('mainImagePreview');
                    container.innerHTML = '';
                    if (input.files && input.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            container.innerHTML = `<img src='${e.target.result}' class='img-thumbnail' style='max-width:120px;max-height:120px;object-fit:cover;'>`;
                        };
                        reader.readAsDataURL(input.files[0]);
                    }
                }
            </script>
            <div class="mb-3">
                <label for="images" class="form-label">Additional Images</label>
                <input type="file" class="form-control" id="images" name="images[]" accept="image/*" multiple>
                <small class="text-muted">You can upload multiple images. Sub images will be scrollable below main image.</small>
                @if ($product->images && is_array($product->images))
                    <div id="editImagePreviewContainer" class="d-flex flex-row flex-wrap overflow-auto mt-2" style="gap:16px;align-items:center;">
                        @foreach ($product->images as $idx => $img)
                            <div class="position-relative d-flex flex-column align-items-center justify-content-center" style="width:90px;" data-img="{{ $img }}">
                                <img src="{{ asset('storage/' . $img) }}" alt="Sub Image" class="img-thumbnail mb-1" style="max-width:80px;max-height:80px;object-fit:cover;">
                                <button type="button" class="position-absolute" style="top:2px;right:2px;border:none;background:transparent;padding:0;z-index:2;" onclick="deleteImage({{ $idx }})">
                                    <i class="fas fa-times text-danger" style="font-size:1rem;"></i>
                                </button>
                                <input type="hidden" name="delete_images[]" id="delete_image_{{ $idx }}" value="">
                            </div>
                        @endforeach
                    </div>
                    <input type="hidden" name="images_order" id="images_order" value="">
                    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
                    <script>
                        function deleteImage(idx) {
                            document.getElementById('delete_image_' + idx).value = 'delete';
                            var imgDiv = event.target.closest('.position-relative');
                            if(imgDiv) imgDiv.style.display = 'none';
                        }
                        document.addEventListener('DOMContentLoaded', function() {
                            var sortable = Sortable.create(editImagePreviewContainer, {
                                animation: 150,
                                onSort: updateImageOrder
                            });
                            updateImageOrder();
                            // Update order before form submit
                            var form = document.querySelector('form[action*="products.update"]');
                            if(form) {
                                form.addEventListener('submit', function() {
                                    updateImageOrder();
                                });
                            }
                        });
                        function updateImageOrder() {
                            var imgs = document.querySelectorAll('#editImagePreviewContainer > .position-relative');
                            var order = [];
                            imgs.forEach(function(div) {
                                if(div.style.display !== 'none') {
                                    order.push(div.getAttribute('data-img'));
                                }
                            });
                            document.getElementById('images_order').value = JSON.stringify(order);
                        }
                    </script>
                @endif
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_active">
                        Active
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-gradient">
                <i class="fas fa-save"></i> Update Product
            </button>
            <a href="{{ route('admin.products') }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
