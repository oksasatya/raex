<form action="{{ route('index.store') }}" id="submitProduct" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="formProduct" tabindex="-1" aria-labelledby="formProductlabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formProductlabel">Add Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Product</label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="Nama Produk">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Product</label>
                        <input id="description" class="form-control @error('description') is-invalid @enderror"
                            name="description" value="{{ old('description') }}" required autocomplete="description"
                            autofocus placeholder="Description">
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="uploadProduct" name="image"
                            class="@error('image') is-invalid @enderror" value="{{ old('image') }}" required
                            autocomplete="image" autofocus>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input id="price" class="form-control @error('price') is-invalid @enderror" name="price"
                            value="{{ old('price') }}" required autocomplete="price" autofocus>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- get product category enum from db --}}
                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select id="category" class="form-select @error('category') is-invalid @enderror"
                            name="category" value="{{ old('category') }}" required autocomplete="category" autofocus>
                            @foreach ($category as $item)
                                <option value="{{ $item }}">{{ $item }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</form>
