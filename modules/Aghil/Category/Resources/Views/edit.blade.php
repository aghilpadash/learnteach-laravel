@extends('Dashboard::master')
@section('content')
    <div class="row no-gutters">
        <div class="col-4 bg-white">
            <p class="box__title">ویرایش دسته بندی</p>
            <form action="{{ route('categories.update', $category->id) }}" method="post" class="padding-30">
                @csrf
                @method('patch')
                <input type="text" name="title" required placeholder="نام دسته بندی" class="text"
                       value="{{$category->title}}">
                <input type="text" name="slug" required placeholder="نام انگلیسی دسته بندی" class="text"
                       value="{{$category->slug}}">
                <p class="box__title margin-bottom-15">انتخاب دسته پدر</p>
                <select name="parent_id" id="parent_id">
                    <option value="">ندارد</option>
                    @foreach($categories as $categoryItem)
                        <option value="{{ $categoryItem->id }}" @if($categoryItem->id == $category->id) selected
                                @endif> {{ $categoryItem->title }}</option>
                    @endforeach
                </select>
                <button class="btn btn-learnteach_net">بروزرسانی</button>
            </form>
        </div>
    </div>
@endsection