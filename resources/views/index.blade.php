@extends('layouts.app')
@section('content')
    <style>
        .items {
            display: flex;
            justify-content: space-between;
        }

        .container {
            display: grid;
            grid-template-columns: 1fr;
        }
    </style>
    <div class="flex justify-center font-large">
        <h1>Log in</h1>
    </div>
    <div class="flex justify-center">
        <div class="items">
            <div class=" p-2 py-5 ">
                <a href=""
                   class=" w-2/12 bg-blue-500  text-white px-2 py-2 rounded font-medium w-full">
                    Make a transfer
                </a>
            </div>
            <div class=" p-2 py-5 ">
                <a href=""
                   class=" w-2/12 bg-blue-500   text-white px-2 py-2 rounded font-medium w-full">
                    Account transactions
                </a>
            </div>
        </div>
    </div>
    <div class="flex justify-center">
        <div class="container">
            <div class="w-8/12 bg-blue-500  text-center p-6 rounded-lg font-medium">

            </div>
        </div>
    </div>


@endsection

