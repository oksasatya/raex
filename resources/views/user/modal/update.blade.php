<form action="{{ route('dashboard.update', $order->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="modal fade" id="formUpdate{{ $order->id }}" tabindex="-1" aria-labelledby="formUpdateLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formUpdate">Update pembayaran</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Bukti Pembayaran</label>
                        @foreach ($userPayments as $item)
                            <img src="{{ asset('images/payment/' . $item->image) }}" alt="{{ $item->user_id }}">
                        @endforeach
                    </div>
                    <div class="mb-3">
                        <label for="payment_status" class="form-label">Category</label>
                        <select name="payment_status" id="payment_status" class="form-control">
                            <option @selected($order->payment_status == 1) value="1">Belum Dibayar
                            </option>
                            <option @selected($order->payment_status == 2) value="2">Sudah Dibayar
                            </option>
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
