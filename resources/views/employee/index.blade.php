@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-row">
                            <div class="mr-2">
                                {{ __('Employees List') }}
                            </div>
                            <div class="ml-auto">
                                <a class="btn btn-outline-primary"
                                   href="{{route('employee.create', app()->getLocale() ) }}">{{__('Create New Employee')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
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
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form class="d-flex flex-row"
                                              action={{ route('employee.destroy', [  'employee' => $employee->id, 'language' => app()->getLocale()] )  }} method="POST">
                                            @csrf @method('delete')
                                            <input type="submit" class="btn btn-danger"
                                                   value="{{__('Remove') }}">
                                            <div class="ml-2">
                                                <a href="{{route('employee.edit', [  'employee' => $employee->id, 'language' => app()->getLocale()])}}"
                                                   class="btn btn-primary">
                                                    {{__('Edit') }}</a>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination ">
                            {{$employees->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
