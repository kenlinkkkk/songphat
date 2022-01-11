@extends('admin.layout')

@section('title')
    <title>Công nghệ & sản phẩm</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Công nghệ & sản phẩm</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Công nghệ & sản phẩm</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <div class="d-flex justify-content-between">
                        <p>Công nghệ & sản phẩm</p>
                        <a class="btn btn-sm btn-success mb-2" href="{{ route('admin.product.add') }}">Thêm mới</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Slug</th>
                            <th>Trạng thái</th>
                            <th class="text-right">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->slug }}</td>
                                @if ($item->status == 1)
                                    <td><span class="badge badge-pill badge-soft-success font-size-12">Active</span></td>
                                    <td class="text-right">
                                        <form id="form-{{ $item->id }}" method="post" action="{{ route('admin.product.update', [$item->id]) }}">
                                            @csrf
                                            <input type="hidden" name="status" value="0">
                                            <a href="{{ route('admin.product.edit', [$item->id]) }}" class="btn btn-success btn-sm">Sửa</a>
                                            <button type="submit" itemId="{{ $item->id }}" class="btn btn-danger btn-sm btn-delete">Deactive</button>
                                        </form>
                                    </td>
                                @else
                                    <td><span class="badge badge-pill badge-soft-danger font-size-12">Deactive</span></td>
                                    <td class="text-right">
                                        <form id="form-{{ $item->id }}" method="post" action="{{ route('admin.product.update', [$item->id]) }}">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <a href="{{ route('admin.product.edit', [$item->id]) }}" class="btn btn-success btn-sm">Sửa</a>
                                            <button type="submit" itemId="{{ $item->id }}" class="btn btn-success btn-sm btn-delete">Active</button>
                                        </form>
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">{{ $products->links() }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("body").on("click", ".btn-delete", function(e){
            e.preventDefault();
            let id = $(this).attr('itemId');
            swal.fire({
                title: "Bạn có chắc không?",
                text: "Bạn sẽ không thể khôi phục lại thông tin này khi đã xóa!",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Đúng! Tôi chắc chắn!",
                cancelButtonText: "Hủy",
                closeOnConfirm: false
            }).then((result) => {
                if (result.value) {
                    $('#form-' + id).submit();
                }
            });
        });
    </script>
@endsection
