@extends('fe.base')
@section('content')
    <div class="container mt-5">
        <div class="row">
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>


        $(document).ready(function() {
            $.ajax({
                url: "v1/project",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    console.log(data);
                    // menampilkan semua data
                    for (var i = 0; i < data.data.length; i++) {
                        var phone = data.data[i];
                        phone.price = Number(phone.price).toLocaleString('en');
                        var card = '<div class="col-md-4 mb-4">' +
                            ' <div class="card" >' +
                              '<a href="' + phone.link + '" target="_blank">' +
                              '<h3 class="card-text text-center title" style= margin-bottom:10px;margin-top:10px;>' + phone.title + '</h3>' +
                              '</a>' +
                            '<img class="card-img-top" src="/uploads/project/' + phone.image +
                            '" alt="Card image cap" />' +
                            ' <div class="card-body">' +
                            '<p class="card-text text-center">' + phone.date + '</p>' +
                            ' <div class="d-flex justify-content-center">' +
                            '<span class="badge me-2 rounded-0">' + phone.tecnologi1 + '</span>' +
                            '<span class="badge me-2 rounded-0">' + phone.tecnologi2 + '</span>' +
                            '<span class="badge me-2 rounded-0">' + phone.tecnologi3 + '</span>' +
                        '</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                        $('.row').append(card);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection
