@extends('admin.layout')

@section('title')
    <title>Tuyển dụng</title>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Tuyển dụng</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                        <li class="breadcrumb-item active">Tuyển dụng</li>
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
                        <p>Tuyển dụng</p>
                        <a class="btn btn-sm btn-success mb-2" href="{{ route('admin.recruitment.add') }}">Thêm mới</a>
                    </div>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Vị trí tuyển dụng</th>
                            <th>Số lượng</th>
                            <th>Ngày hết hạn</th>
                            <th>Trạng thái</th>
                            <th class="text-right">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($recruitments as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->withPosition['name'] }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>{{ $item->end_date }}</td>
                                @if ($item->status == 1)
                                    <td><span class="badge badge-pill badge-soft-success font-size-12">Active</span></td>
                                    <td class="text-right">
                                        <form id="form-{{ $item->id }}" method="post" action="{{ route('admin.recruitment.update', [$item->id]) }}">
                                            @csrf
                                            <input type="hidden" name="status" value="0">
                                            <a href="{{ route('admin.recruitment.edit', [$item->id]) }}" class="btn btn-success btn-sm">Sửa</a>
                                            <button type="submit" itemId="{{ $item->id }}" class="btn btn-danger btn-sm btn-delete">Deactive</button>
                                        </form>
                                    </td>
                                @else
                                    <td><span class="badge badge-pill badge-soft-danger font-size-12">Deactive</span></td>
                                    <td class="text-right">
                                        <form id="form-{{ $item->id }}" method="post" action="{{ route('admin.recruitment.update', [$item->id]) }}">
                                            @csrf
                                            <input type="hidden" name="status" value="1">
                                            <a href="{{ route('admin.recruitment.edit', [$item->id]) }}" class="btn btn-success btn-sm">Sửa</a>
                                            <button type="submit" itemId="{{ $item->id }}" class="btn btn-success btn-sm btn-delete">Active</button>
                                        </form>
                                    </td>
                                @endif

                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="5">{{ $recruitments->links() }}</td>
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
