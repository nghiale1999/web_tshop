@extends('member.layout.app')
@section('content')
<div class="lsmuahang">
    <h4 class="text-center">Chi Tiết Đơn Hàng</h4>
    <div class="row container-fluid">
        <div class="col-sm-8">
            <table class="order-detail">
                <thead>
                    <tr>
                        <th>Tên Sản Phẩm</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $ls)
                       <tr> 
                        <td>{{$ls->tensp}}</td>
                        <td>{{$ls->soluong}}</td>
                        <td>{{$ls->gia}}đ</td>
                    </tr> 
                    @endforeach
                    
                </tbody>
            </table>
    
        </div>
        @foreach ($data as $ls)
        <div class="col-sm-4">
            <div class="order-content">
                <p>Tên Người Nhận Hàng</p>
                <input type="text" value="{{$ls->tennguoinhan}}">    
            </div>
            <div class="order-content">
                <p>Địa Chỉ Giao Hàng</p>
                <input type="text" value="{{$ls->diachi}}">    
            </div>
            <div class="order-content">
                <p>Email</p>
                <input type="text" value="{{$ls->email}}">    
            </div>
            <div class="order-content">
                <p>Số Điện Thoại</p>
                <input type="text" value="{{$ls->sdt}}">    
            </div>
            <a class="btn btn-default back" href="{{ url('member/lichsu') }}">Quay Về</a>
        </div>
        @endforeach
    </div>

</div>
    
@endsection