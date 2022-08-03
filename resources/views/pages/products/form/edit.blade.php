<form action="{{ route('index.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="formEdit{{ $product->id }}" tabindex="-1" aria-labelledby="formEditLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formEdit">Update Product</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Product</label>
                        <input id="name" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ $product->name }}" required placeholder="Nama Produk">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi Product</label>
                        <input id="description" class="form-control @error('description') is-invalid @enderror"
                            name="description" value="{{ old('description', $product->description) }}" required
                            autocomplete="description" autofocus placeholder="Description">
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
                        <input type="file" id="uploadProduct" name="image"
                            class="@error('image') is-invalid @enderror" autocomplete="image" autofocus>
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Harga</label>
                        <input id="price" class="form-control @error('price') is-invalid @enderror" name="price"
                            value="{{ old('price', $product->price) }}" required autocomplete="price" autofocus>
                        @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option @selected($product->category == 'Food') value="Food">Food</option>
                            <option @selected($product->category == 'Turtle') value="Turtle">Turtle</option>
                            <option @selected($product->category == 'Other') value="Other">Other</option>
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
                    {{-- <button type="submit" class="btn btn-instagram">Submit</button> --}}

                    <input type="submit" class="btn btn-instagram" value="submit" id="submit">
                </div>
            </div>
        </div>
    </div>
</form>
