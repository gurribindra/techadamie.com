@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Contact Info
    </div>

    <div class="card-body">
        <form action="{{ route("admin.contact.update", $contact->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="address">Address</label>
                <textarea id="address" name="address" class="form-control ">{{ old('address', isset($contact) ? $contact->address : '') }}</textarea>
            </div>
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" id="phone_number" name="phone_number" class="form-control " value="{{ old('phone_number', isset($contact) ? $contact->phone_number : '') }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" class="form-control " value="{{ old('email', isset($contact) ? $contact->email : '') }}">
            </div>
            <div class="form-group">
                <label for="facebook_link">Facebook Link</label>
                <input type="url" id="facebook_link" name="facebook_link" class="form-control " value="{{ old('facebook_link', isset($contact) ? $contact->facebook_link : '') }}">
            </div>
            <div class="form-group">
                <label for="twitter_link">Twitter Link</label>
                <input type="url" id="twitter_link" name="twitter_link" class="form-control " value="{{ old('twitter_link', isset($contact) ? $contact->twitter_link : '') }}">
            </div>
            <div class="form-group">
                <label for="instagram_link">Instagram Link</label>
                <input type="url" id="instagram_link" name="instagram_link" class="form-control " value="{{ old('instagram_link', isset($contact) ? $contact->instagram_link : '') }}">
            </div>
            <div class="form-group">
                <label for="linkedin_link">Linkedin Link</label>
                <input type="url" id="linkedin_link" name="linkedin_link" class="form-control " value="{{ old('linkedin_link', isset($contact) ? $contact->linkedin_link : '') }}">
            </div>
            <div class="form-group">
                <label for="youtube_link">Youtube Link</label>
                <input type="url" id="youtube_link" name="youtube_link" class="form-control " value="{{ old('linkedin_link', isset($contact) ? $contact->youtube_link : '') }}">
            </div>           
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.update') }}">
            </div>
        </form>


    </div>
</div>
@endsection
