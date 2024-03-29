<!DOCTYPE html>
<html lang="en">

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @if (!empty($logo_image->value))
        <link rel="icon" type="image/x-icon" href="{{ asset('/storage/siteSettings/' . $logo_image->value) }}">
    @else
        <link rel="icon" href="favicon.ico" type="image/x-icon">
    @endif
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $meta_discription->value ?? '' }}@stack('meta')" />
    <title>
        @stack('title') |
        {{ $title ? $title : '' }} | {{ $site_title->value ?? config('dz.public.title') }}
        {{-- @stack('title') --}}
    </title>

    @foreach (config('dz.public.global.css') as $item)
        <link rel="stylesheet" crossorigin="anonymous" href="{{ $item }}">
    @endforeach

    {{-- <title>Home Page</title> --}}
</head>

<body class="py-0">
