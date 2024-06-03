@extends('layout.main')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Thêm tài khoản</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class=" card-body">
            <a href="{{route('listAccount')}}"><button class="btn btn-primary mb-2">Danh sách tài khoản</button></a>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Thông tin <sup style="color: red;">(mục * bắt buộc nhập)</sup></th>
                            <th>Dữ liệu nhập vào</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên</th>
                            <th>Dữ liệu nhập vào</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <form action="{{route('addAccount')}}" method="POST">
                            <tr>
                                <td>Gmail<sup style="color: red;">(*)</sup></td>
                                <td><input type="text" name="gmail"><span style="color: red;">
                                        <?= $error['gmail'] ?? '' ?></span></td>
                            </tr>
                            <tr>
                                <td>Tên tài khoản<sup style="color: red;">(*)</sup></td>
                                <td><input type="text" name="username"></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu<sup style="color: red;">(*)</sup></td>
                                <td><input type="password" name="password"></td>
                            </tr>
                            <tr>
                                <td>Ngày sinh</td>
                                <td><input type="date" name="birthday"></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><input type="text" name="address"></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại</td>
                                <td><input type="number" name="phone"></td>
                            </tr>
                            <tr>
                                <td>Vai trò</td>
                                <td>
                                    <select name="role">
                                        <option value="1">admin</option>
                                        <option value="0">user</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><button class="btn btn-success" type="submit">Thêm</button></td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection