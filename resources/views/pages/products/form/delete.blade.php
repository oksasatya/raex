<div class="modal fade" id="formDelete{{ $product->id }}" tabindex="-1" aria-labelledby="formDeleteLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formDeleteLabel">Delete Confirmation</h5>
            </div>
            <div class="modal-body">
                are you sure want to Delete ?<br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form action="{{ route('index.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-instagram">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
