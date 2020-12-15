@extends('layouts.app')
@section('content')
    @if (session('status'))
        <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
            {{ session('status') }}
        </div>
    @endif
    <div class="flex justify-center">
        <div class="w-8/12 bg-teal-600 text-white p-6 rounded-lg mb-15 text-center text-xl">
            Make a transfer
        </div>
    </div>
    <div class="flex justify-center">
        <div class="w-4/12 bg-gray-200 p-6 rounded-lg">
            <form action=" {{ route('transaction.store', $account) }} " method="post">
                @csrf
                Your account <p class="text-gray-500">{{$account->currency}} {{$account->balance / 100}}</p>
                <div class="mb-4">
                    <label for="payers_account" class="sr-only">Payers account</label>
                    <input type="text" name="payers_account" id="payers_account" value="{{$account->number}}"
                           class=" bg-gray-100 border-2 p-4 rounded-lg w-full">
                </div>
                Receiver account
                <div class="mb-4">
                    <label for="receiver_account" class="sr-only">Receiver account</label>
                    <input type="text" name="receiver_account" id="receiver_account"
                           value="{{ old('receiver_account') }}"
                           class="bg-gray-100 border-2 p-4 rounded-lg w-full @error('receiver_account')
                               border-red-500 @enderror">
                    @error('receiver_account')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                Amount {{$account->currency}}:
                <div class="mb-4">
                    <label for="amount" class="sr-only">Amount</label>
                    <input type="text" name="amount" id="amount" value="{{ old('amount') }}"
                           class="bg-gray-100 border-2 p-4 rounded-lg w-full @error('amount')
                               border-red-500 @enderror">
                    @error('amount')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                Description
                <div class="mb-4">
                    <label for="description" class="sr-only">Description</label>
                    <input type="text" name="description" id="description" value="{{ old('description') }}"
                           class="bg-gray-100 border-2 p-4 rounded-lg w-full @error('description')
                               border-red-500 @enderror">
                    @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-6">
                    <div class="button-section">
                        <button type="button" onclick="myFunction()" name="more"
                                class="bg-teal-600 text-white px-4 py-3 rounded font-medium w-4/12"
                        >Confirm
                        </button>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="" id="more" style="display: none">
                        <div class="mb-4 text-2xl">
                            <input
                                name="rand"
                                id="rand"
                                value="{{$rand}}"
                                class="bg-gray-200 text-center w-full"
                            />
                        </div>
                        <div class="mb-4">
                            <div class="inner-wrap">
                                <label for="check" id="check">
                                    Enter secure code here : <input type="text"
                                                                    name="check"
                                                                    id="check"
                                                                    class="bg-gray-100 text-center border-2 w-4/12 p-4 rounded-lg mb-6"/>
                                </label>
                            </div>
                            <div class="mb-4">
                                <button type="submit"
                                        class=" bg-teal-600 text-white px-4 py-3 rounded font-medium w-full"
                                >Confirm
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        function myFunction() {
            let x = document.getElementById("more");
            if (x.style.display === "none") {
                x.style.display = "block";

            } else {
                x.style.display = "none";
            }
        }
    </script>
@endsection
