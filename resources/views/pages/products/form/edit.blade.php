<div class="modal fade" id="formEdit{{ $product->id }}" tabindex="-1" aria-labelledby="formDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDeleteLabel">Delete Confirmation</h5>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Product</label>
                    <input id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $product->name }}" required autocomplete="name" autofocus placeholder="Nama Produk">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Product</label>
                    <input id="description" class="form-control @error('description') is-invalid @enderror"
                        name="description" value="{{ $product->description }}" required autocomplete="description"
                        autofocus placeholder="Description">
                    @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">

                    @if ($product->image)
                        <img src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}"
                            style="width: 100px; height: 100px;">
                    @endif
                    <label for="image" class="form-label">Image</label>
                    <input type="file" id="uploadProduct" name="image" class="@error('image') is-invalid @enderror"
                        required autocomplete="image" autofocus>
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Harga</label>
                    <input id="price" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ $product->price }}" required autocomplete="price" autofocus>
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Kategori</label>
                    <select id="category" class="form-select @error('category') is-invalid @enderror" name="category"
                        value="{{ old('category') }}" required autocomplete="category" autofocus>
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
                <form action="{{ route('index.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-instagram">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
