@extends('fe.base')
@section('content')

    <div class="container about d-flex justify-content-center">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-sm-4 text-center pict">
                <img src="{{ asset('img/rizki.jpeg') }}" alt="avatar-image" class="img-fluid rounded-circle mb-4" style="width: 200px;">
            </div>
            <div class="col-12 col-sm-8 text-center text-sm-start mb-5">
                <h2 class="text-center text-sm-start mb-3 display-4">Muhammad Rizki</h2>
                <p class="lead mb-3"><i class="fa-solid fa-computer fa-bounce" style="margin-right: 5px"></i> Junior Fullstack Web-Developer</p>
                <p class="lead mb-3"><i class="fa-solid fa-location-crosshairs " style="margin-right: 10px"></i> Palu, Indonesian</p>
                <div class="mb-3">
                    <span class="badge  me-2 rounded-0">html</span>
                    <span class="badge  me-2 rounded-0">css</span>
                    <span class="badge  me-2 rounded-0">javascript</span>
                    <span class="badge  me-2 rounded-0">php</span>
                    <span class="badge  me-2 rounded-0">Laravel</span>
                </div>
                <div class="mb-3 medsos ">
                    <a href="https://www.instagram.com/m_rizkii28/" target="_blank"><i class="fa-brands fa-instagram fa-2x text-secondary" style="margin-right: 5px "></i></a>
                    <a href="https://github.com/MRizki28"><i class="fa-brands fa-github fa-2x text-secondary" style="margin-right: 5px "></i></a>
                    <a href="https://www.linkedin.com/in/muhammad-rizki-442849251/"><i class="fa-brands fa-linkedin fa-2x text-secondary" style="margin-right: 5px "></i></a>
                </div>
            </div>
        </div>
    </div>
    
@endsection
