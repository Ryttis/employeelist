@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @guest()
                        <div
                            class="card-header">{{ __('No registration possibilities! You must know credentials') }}</div>
                    @endguest
                    @auth()
                        <div class="card-header">{{ __('Employees List') }}</div>
                        <table class="table">
                            <thead class="bg-primary text-white">
                            <tr>
                                <th scope="col">{{__('Id')}}</th>
                                <th scope="col">{{__('Name')}}</th>
                                <th scope="col">{{__('Email')}}</th>
                                <th scope="col">{{__('Phone')}}</th>
                                <th scope="col">{{__('Company')}}</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">{{__('Edit')}}</span>
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">{{__('Remove')}}</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($employees as $employee)
                                <tr>
                                    <th scope="row">{{$employee->id}}</th>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->phone}}</td>
                                    <td>{{$employee->title}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination text-dark">
                            {{$employees->links()}}
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
