<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdsBannerStore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:100',
            'description' => 'max:300',
            'position' => 'required|max:100',
            'start_date' => 'required',
            'end_date' => 'required',
            'type' => 'required',
            'status' => 'required|in:-1,0,1',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'Nhập tiêu đề của quảng cáo.',
            'title.max' => 'Tiêu đề không nhập quá 100 ký tự.',
            'description.max' => 'Mô tả không nhập quá 300 ký tự.',
            'position.required' => 'Chưa nhập vị trí hiển thị quảng cáo.',
            'position.max' => 'Vị trí quảng cáo không nhập quá 100 ký tự.',
            'start_date.required' => 'Chưa nhập thời gian bắt đầu hiển thị quảng cáo.',
            'start_date.numeric' => 'Thời gian bắt đầu hiển thị quảng cáo không đúng định dạng.',
            'end_date.required' => 'Chưa nhập thời gian kết thúc hiển thị quảng cáo.',
            'end_date.numeric' => 'Thời gian kết thúc hiển thị quảng cáo không đúng định dạng.',
            'type.required' => 'Chưa chọn kiểu quảng cáo',
            'type.numeric' => 'Kiểu quảng cáo không đúng định dạng.',
            'type.max' => 'Kiểu quảng cáo không đúng định dạng.',
            'admob_type.numeric' => 'Kiểu quảng cáo ADMOB không đúng định dạng.',
            'admob_type.max' => 'Kiểu quảng cáo ADMOB không đúng định dạng.',
            'admob_type.required_if' => 'Chưa chọn kiểu quảng cáo ADMOB.',
            'admob_code.max' => 'Code ADMOB quảng cáo không nhập quá 300 ký tự.',
            'admob_code.required_if' => 'Chưa nhập Code ADMOB quảng cáo.',
            'media_type.numeric' => 'Kiểu quảng cáo MEDIA không đúng định dạng.',
            'media_type.max' => 'Kiểu quảng cáo MEDIA không đúng định dạng.',
            'media_type.required_if' => 'Chưa chọn kiểu quảng cáo MEDIA',
            'media_source.max' => 'Source Media quảng cáo không nhập quá 300 ký tự.',
            'media_source.required_if' => 'Chưa nhập Source Media quảng cáo',
            'media_landingpage.max' => 'Source Media quảng cáo không nhập quá 300 ký tự.',
            'media_landingpage.required_if' => 'Chưa nhập URL Landingpage cho quảng cáo.',
            'status.required' => 'Chưa nhập trạng thái của quảng cáo.',
            'status.in' => 'Trạng thái của quảng cáo không hợp lệ.',
        ];
    }
}
