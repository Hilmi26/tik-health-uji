@include('layouts.app')

<div class="container">
    <div class="card">
        <h3 class="mt-3 ms-3">Biodata Diri</h3>
        <div class="row">
            <div class="col">
                <div class="card-body">
                    <form action="{{ route('bmi.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan nama">
                        </div>
                        <div class="mb-3">
                            <label>Tinggi Badan</label>
                            <input type="number" class="form-control" name="tb"
                                placeholder="Masukkan tinggi badan /m">
                        </div>
                        <div class="mb-3">
                            <label>Berat Badan</label>
                            <input type="number" class="form-control" name="bb"
                                placeholder="Masukkan berat badan">
                        </div>
                        <div class="mb-3">
                            <label>Hobi</label>
                            <input type="text" class="form-control" name="hobi" placeholder="Masukkan hobi">
                        </div>
                        <div class="mb-3">
                            <label>Tahun Lahir</label>
                            <input type="text" class="form-control" name="tahunlahir">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <div class="mt-3">
                        @isset($data)
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Umur</th>
                                        <th scope="col">bmi</th>
                                        <th scope="col">Status Berat Badan</th>
                                        <th scope="col">Konsultasi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Umur</td>
                                        <td>{{ $data['bmi'] }}</td>
                                        <td>{{ $data['statusbb'] }}</td>
                                        <td colspan="2">{{ $data['resultkonsul'] }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')
