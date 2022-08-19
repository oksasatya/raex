<div class="row">
    <div class="col-md-3">
        <div class="card shadow-sm bg-primary">
            <div class="card-body">
                <h3>ORIGIN</h3>
                <hr>
                <div class="form-group mb-3">
                    <label class="fw-bolder text-white">PROVINSI ASAL</label>
                    <select class="form-control" name="province_origin" id="province">
                        <option value="0">-- pilih provinsi asal --</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bolder text-white">KOTA / KABUPATEN ASAL</label>
                    <select class="form-control" name="city_origin" id="city_origin">
                        <option value="">-- pilih kota asal --</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm bg-primary">
            <div class="card-body">
                <h3>DESTINATION</h3>
                <hr>
                <div class="form-group mb-3">
                    <label class="fw-bolder text-white">PROVINSI TUJUAN</label>
                    <select class="form-control" name="province_destination" id="province_destination">
                        <option value="0">-- pilih provinsi tujuan --</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bolder text-white">KOTA / KABUPATEN TUJUAN</label>
                    <select class="form-control kota-tujuan" name="city_destination" id="city_destination">
                        <option value="">-- pilih kota tujuan --</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card shadow-sm bg-primary">
            <div class="card-body">
                <h3>KURIR</h3>
                <hr>
                <div class="form-group mb-3">
                    <label class="fw-bold text-white">PROVINSI TUJUAN</label>
                    <select class="form-control" name="courier" id="courier">
                        <option value="0">-- pilih kurir --</option>
                        <option value="jne">JNE</option>
                        <option value="pos">POS</option>
                        <option value="tiki">TIKI</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label class="fw-bolder text-white">BERAT (GRAM)</label>
                    <input type="number" class="form-control" name="weight" id="weight"
                        placeholder="Masukkan Berat (GRAM)">
                </div>
            </div>
        </div>
    </div>
</div>
