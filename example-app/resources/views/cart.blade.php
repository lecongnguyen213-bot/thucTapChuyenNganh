@extends('layout.home')

@section('body')
<div class="container py-5">

    <h2 class="mb-4">🛒 Giỏ hàng</h2>

    {{-- ALERT --}}
    @if(session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if(empty($cart) || count($cart) == 0)
        <p>Giỏ hàng trống.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Tiếp tục mua</a>
    @else
        <table class="table align-middle">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th width="130">Số lượng</th>
                    <th>Tổng</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp

                @foreach($cart as $id => $item)
                    @php
                        $sub = $item['price'] * $item['quantity'];
                        $total += $sub;
                    @endphp
                    <tr>
                        <td width="100">
                            <img src="{{ asset($item['image']) }}"
                                 class="img-fluid rounded">
                        </td>

                        <td>{{ $item['name'] }}</td>

                        <td>{{ number_format($item['price']) }} $</td>

                        <td>
                            <form action="{{ route('cart.update', $id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number"
                                       name="quantity"
                                       value="{{ $item['quantity'] }}"
                                       min="1"
                                       class="form-control form-control-sm">

                                <button class="btn btn-outline-primary btn-sm mt-1 w-100">
                                    Cập nhật
                                </button>
                            </form>
                        </td>

                        <td>{{ number_format($sub) }} $</td>

                        <td>
                            <form action="{{ route('cart.destroy', $id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">
                                    Xóa
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-end">
            <h4>
                Tổng tiền:
                <span class="text-danger">
                    {{ number_format($total) }} $
                </span>
            </h4>

            <form action="{{ route('cart.checkout') }}" method="POST">
                @csrf
                <button class="btn btn-success mt-3 px-4">
                    Thanh toán
                </button>
            </form>
        </div>
    @endif
</div>
@endsection
