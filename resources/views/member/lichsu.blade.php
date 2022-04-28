@extends('member.layout.app')
@section('content')
<div class="lsmuahang">
    <table class="order container">
        <h4 class="text-center">Lịch Sử Mua Hàng</h4>
        <thead>
            <tr>
                <th>ID</th>
                <th>Ngày Mua</th>
                <th>Trạng Thái</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $ls)
                <tr>
                    <td>{{$ls->id}}</td>
                    <td>{{$ls->created_at}}</td>
                    <td><span class="success">Đã giao</span></td>
                    <td><a href="{{ url('member/chitiet-lichsu/'.$ls->id)}}" class="view">Chi Tiết</a></td>
                </tr>
            @endforeach
            
            
        </tbody>
    </table>

</div>
    
@endsection