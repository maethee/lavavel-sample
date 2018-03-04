@extends('layouts.main')

@section('content')
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Collect Thai ID
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div>
            <form action="{{ url('form')}}" method="post" >
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="formGroupExampleInput">ชื่อ</label>
                    <input type="text" class="form-control" id="first_name" name="first_name" placeholder="ชื่อ" value="<?php echo isset($first_name) ? $first_name : '' ; ?>" >
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">นามสกุล</label>
                    <input type="text" class="form-control" id="last_name" name="last_name" placeholder="นามสกุล" value="<?php echo isset($last_name) ? $last_name : '' ; ?>" >
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">รหัสประจำตัวประชาชน</label>
                    <input type="text" class="form-control" id="thai_id" name="thai_id" placeholder=" 00xxxxxxxxxxx" value="<?php echo isset($id_card) ? $id_card : '' ; ?>" >
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">เพศ</label>
                    <?php
                        $gender =  isset($gender) ? $gender : 0 ;
                    ?>
                    <select class="form-control" id="gender" name="gender" placeholder="Another input"  >
                        <option value="0" <?php if($gender == 0){ echo "selected"; } ?> >ชาย</option>
                        <option value="1" <?php if($gender == 1){ echo "selected"; } ?>>หญิง</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">วันเกิด</label>
                    <div class="input-group date" data-provide="datepicker">
                        <input type="text" class="form-control" id="birth" name="birth">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">เบอร์มือถือ</label>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder=" 09xxxxxxxx" >
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">ที่อยู่</label>
                    <textarea type="text" class="form-control" id="address" name="address" placeholder="ที่อยู่"></textarea>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                    </label>
                </div>
            </form>
            {{--<form action="{{ url('form')}}" method="post" >--}}
                {{--{{ csrf_field() }}--}}
                {{--<div class="form-group">--}}
                    {{--<label for="formGroupExampleInput">ชื่อ</label>--}}
                    {{--<input type="text" class="form-control" id="first_name" placeholder="ชื่อ" required>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="formGroupExampleInput2">นามสกุล</label>--}}
                    {{--<input type="text" class="form-control" id="last_name" placeholder="นามสกุล" required>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="formGroupExampleInput2">รหัสประจำตัวประชาชน</label>--}}
                    {{--<input type="text" class="form-control" id="id_card" placeholder=" 00xxxxxxxxxxx" pattern="[0-9]{13}" title="กรุณากรอกหมายเลข บัตรประชาชน 13 หลัก">--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="formGroupExampleInput2">เพศ</label>--}}
                    {{--<select class="form-control" id="gender" placeholder="Another input">--}}
                        {{--<option value="0">ชาย</option>--}}
                        {{--<option value="1">หญิง</option>--}}
                    {{--</select>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="formGroupExampleInput2">วันเกิด</label>--}}
                    {{--<div class="input-group date" data-provide="datepicker">--}}
                        {{--<input type="text" class="form-control" id="birth">--}}
                        {{--<div class="input-group-addon">--}}
                            {{--<span class="glyphicon glyphicon-th"></span>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="formGroupExampleInput2">เบอร์มือถือ</label>--}}
                    {{--<input type="text" class="form-control" id="formGroupExampleInput2" placeholder=" 09xxxxxxxx" pattern="[0-9]{10}" title="กรุณากรอกหมายเลข เบอร์มือถือ 10 หลัก">--}}
                {{--</div>--}}
                {{--<div class="form-group">--}}
                    {{--<label for="formGroupExampleInput2">ที่อยู่</label>--}}
                    {{--<textarea type="text" class="form-control" id="address" placeholder="ที่อยู่"></textarea>--}}
                {{--</div>--}}
                {{--<div class="form-check">--}}
                    {{--<label class="form-check-label">--}}
                        {{--<button type="submit" class="btn btn-primary">ยืนยัน</button>--}}
                    {{--</label>--}}
                {{--</div>--}}
            {{--</form>--}}
        </div>
    </div>
@endsection


@section('javasccript')
    <script>
        jQuery( document ).ready(function() {
            $( function() {
                $( "#datepicker" ).datepicker();
            } );
        });
    </script>
@endsection