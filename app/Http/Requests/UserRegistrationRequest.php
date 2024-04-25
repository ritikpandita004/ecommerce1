<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|regex:/^[^\d]+$/|max:255',
            'email' => 'required|email|unique:users|max:255',
            'phoneNumber' => 'required|numeric|digits_between:1,10',
            'password' => 'required|string|min:8|confirmed|regex:/^(?=.*[A-Z])(?=.*[^\w\d\s])/',
            'productName' => 'required|max:255|regex:/^[^\d]+$/',
                'category' => 'required|exists:category,id',
                'brand' => 'required',
                'description' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'price' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'The email address field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'The email address has already been taken.',
            'email.max' => 'The email address may not be greater than :max characters.',
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.regex' => 'The name cannot contain numbers.',
            'phoneNumber.required' => 'The phone number field is required.',
            'phoneNumber.numeric' => 'The phone number must be numeric.',
            'phoneNumber.digits_between' => 'The phone number must be between :min and :max digits.',
            'password.confirmed' => 'The password and confirm password do not match.',
            'password.min' => 'The password must be at least :min characters.',
            'password.regex' => 'The password must contain at least one uppercase letter and one unique character.',
            'productName.required' => 'Please enter the product name.',
                'productName.regex' => 'The product name must not contain numbers.',
                'productName.max' => 'The product name must not exceed 255 characters.',
                'category.required' => 'Please select a category.',
                'category.exists' => 'The selected category is invalid.',
                'brand.required' => 'Please select a brand.',
                'description.required' => 'Please enter the product description.',
                'description.string' => 'The description must be a string.',
                'image.required' => 'Please select an image for the product.',
                'image.image' => 'The selected file must be an image.',
                'image.mimes' => 'Only JPG, PNG, JPEG, and GIF files are allowed for the image.',
                'image.max' => 'The image must not exceed 2MB in size.',
                'price.required' => 'Please enter the price of the product.',
                'price.numeric' => 'The price must be a numeric value.',

        ];
    }
}
