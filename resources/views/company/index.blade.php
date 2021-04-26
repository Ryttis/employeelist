@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex flex-row">
                            <div class="mr-2">
                                {{ __('Companies List') }}
                            </div>
                            <div class="ml-auto">
                                <a  class="btn btn-outline-primary"
                                    href="{{route('company.create', app()->getLocale() ) }}">{{__('Create New Company')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                    <table class="table ">
                        <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col" >{{__('Id')}}</th>
                            <th scope="col" >{{__('Title')}}</th>
                            <th scope="col" >{{__('Email')}}</th>
                            <th scope="col" >{{__('Web Site')}}</th>
                            <th scope="col" >{{__('Image')}}</th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">{{__('Edit')}}</span>
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">{{__('Remove')}}</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="table-light">
                        @foreach ($companies as $company)
                            <tr>
                                <th scope="row">{{$company->id}}</th>
                                <td>{{$company->title}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->webSite}}</td>
                                <td><img src="{{asset('./storage/'.$company->image)}}" alt="Image" width="40"></td>
                                <td>
                                    <form class="d-flex flex-row"
                                          action={{ route('company.destroy', [  'company' => $company->id, 'language' => app()->getLocale()] )  }} method="POST">
                                        @csrf @method('delete')
                                        <input type="submit" class="btn btn-danger"
                                               value="{{__('Remove') }}">
                                        <div class="ml-2">
                                            <a href="{{route('company.edit', [  'company' => $company->id, 'language' => app()->getLocale()])}}"
                                               class="btn btn-primary">
                                                {{__('Edit') }}</a>
                                        </div>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <div>
                    {{$companies->links()}}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
