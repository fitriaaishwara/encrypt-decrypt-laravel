@extends('layout.app')
@section('content')

<header class="masthead">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Encryption & Decryption</h1>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">by: Fitria Aishwara</p>
                <a class="btn btn-primary btn-xl" href="#form">Learn More</a>
            </div>
        </div>
    </div>
</header>

<section class="page-section bg-primary" id="form">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 col-xl-6 text-center">
                    <h2 class="text-white mt-0">Form Encrypt</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">Silahkan Inputkan File Dengan Format Bebas</p>
                </div>
            </div>
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <form action="{{ url('/store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class=" mb-4">
                            <input type="file" name="image" class="form-control" id="chooseFile">
                        </div>
                        <div class="d-grid">
                            <button class="btn btn-light btn-xl"  type="submit" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="page-section" id="table">
    <div class="container">
        <h2 class="mb-5">Data Gambar</h2>
        <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            @foreach ($data as $index => $value)
            <tbody>
                <tr>
                    <td>{{ ($index+1) }}</td>
                    <td>
                        <a href="{{ route ('lihat-gambar', $value->id) }}">Lihat Gambar</a>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
        </div>
    </div>
</section>
@endsection
