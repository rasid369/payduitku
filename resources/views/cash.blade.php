@extends('layouts.navbar')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Beli Cash
            </h2>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="amount" class="sr-only">Jumlah</label>
                    <input id="amount" name="amount" type="number" autocomplete="amount" required
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border
                                  border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md
                                  focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10
                                  sm:text-sm" min="10000" max="1000000"
                           placeholder="Rp. 100.000" autofocus>
                </div>
            </div>

            <div>
                <button type="submit" onclick="payment()"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Beli
                </button>
            </div>
    </div>
</div>
<script>

    function payment() {
        var amount = document.getElementById("amount").value;

            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: {
                        amount: amount
                    },
                    url: "cashorder",
                    dataType: "json",
                    cache: false,
                    success: function(result) {
                        console.log(result.reference);
                        console.log(result);


                    checkout.process(result.reference, {
                        successEvent: function(result) {
                            // begin your code here
                            console.log("success");
                            console.log(result);
                            alert("Payment Success");
                        },
                        pendingEvent: function(result) {
                            // begin your code here
                            console.log("pending");
                            console.log(result);
                            alert("Payment Pending");
                        },
                        errorEvent: function(result) {
                            // begin your code here
                            console.log("error");
                            console.log(result);
                            alert("Payment Error");
                        },
                        closeEvent: function(result) {
                            // begin your code here
                            console.log(
                                "customer closed the popup without finishing the payment"
                            );
                            console.log(result);
                            alert(
                                "customer closed the popup without finishing the payment"
                            );
                        },
                    });
                },
            });
        }

</script>
@endsection
