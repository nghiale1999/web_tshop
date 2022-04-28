@extends('member.layout.app')
@section('content')
<div class="edit container my-3">
    @if (session('success'))
		<div class="alert alert-success">
		    <p>{{ session('success') }}</p>
		</div>
	@endif						
    <form method="post" enctype="multipart/form-data">
        @csrf
        
        <input type="text" name="tensp" placeholder="Nhập tên sản phẩm">
        <input type="text" name="giasp" placeholder="Giá sản phẩm">
        <input type="text" name="soluong" placeholder="Số lượng">
        <input type="text" name="loaisp" placeholder="Loại sản phẩm">
        
        <select class="id_category" name="thuonghieu">
            @foreach ($thuonghieu as $th)
                <option value="{{$th->id}}">{{$th->tenth}}</option>
            @endforeach
        </select>
        
        <select name="giamgia" id="giamgia" class="col-sm-3">
            <option id="sale" value="1">sale</option>
            <option value="0">new</option>
        </select>
        <p></p><input type="text" placeholder="100%" name="sale" id="phantram">
        
        <input type="file" name="hinh" >
        <input type="text" name="mota" placeholder="Mô Tả" value="">
        <button type="submit" name="submit" class="btn btn-default update">Thêm Sản Phẩm</button>
        <a class="btn btn-default back" href="{{url('member/sanpham')}}">Quay Về</a>
          
    </form>
    <ul class="alert text-danger">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
</div> 
    
@endsection
@section('script')

<Script>

    $(document).ready(function(){

        $('#giamgia').click(function(){
            var sale = $(this).val();
            if(sale == "1"){
                $('#phantram').show();
            }else{
                $('#phantram').hide();
            }
        })

    })

</Script>

@endsection