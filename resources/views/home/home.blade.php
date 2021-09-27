@extends('home.layout.master')
@section('content')

    <div class="form-group">
        <input type="text" name="title" id="country_name" class="form-control input-lg" placeholder="Enter Country title" />
        <div id="countryList"><br>
        </div>
    </div>
    {{ csrf_field() }}
    @foreach($posts as $post)
        <div class=" px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 ">
                <div class="col-md-10 col-lg-8 col-xl-10">
                    <div class="post-preview">
                        <a href="{{route('blog',$post->id)}}">
                            <h2 class="post-title">{{$post->title}}</h2>
                            @if(\Illuminate\Support\Facades\Auth::user()->name === $post->user->name)
                                <a href="{{route('delete.post',$post->id)}}" class="delete-post float-right btn-tool"
                                   title="Delete" data-toggle="tooltip"
                                   onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-times"></i></a>
                            @endif
                            <h3 class="post-subtitle">{{ $post->user->name }}</h3>
                        </a>
                    </div>
                    <hr class="my-4"/>
                </div>
            </div>
        </div>
    @endforeach
    <script>
        $(document).ready(function(){

            $('#country_name').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
                var query = $(this).val(); //lấy gía trị ng dùng gõ
                if(query != '') //kiểm tra khác rỗng thì thực hiện đoạn lệnh bên dưới
                {
                    var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
                    $.ajax({
                        url:"{{ route('search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
                        method:"POST", // phương thức gửi dữ liệu.
                        data:{query:query, _token:_token},
                        success:function(data){ //dữ liệu nhận về
                            $('#countryList').fadeIn();
                            $('#countryList').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
                        }
                    });
                }
            });
            $(document).on('click', 'li', function(){
                $('#country_name').val($(this).text());
                $('#countryList').fadeOut();
            });

        });
    </script>
@endsection
