@extends('layouts.navbar')
@section('content')

<div class="bg-gray-100 h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-xl font-semibold mb-4">Item Cart</h2>
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

        <div class="space-y-4">
            @foreach ($cart as $item)

            <div class="flex items-center justify-between border-b pb-2">
                <div class="flex items-center">
                    <img src="" alt="aaaa" class="w-12 h-12 mr-4">
                    <div>
                        <h3 class="font-semibold">{{$item->item->name}}</h3>
                        <p class="text-gray-500">Rp {{ number_format($item->item->harga, 0, ',', '.') }}</p>
                    </div>
                </div>
                <form action="{{ route('hapus_item', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Hapus</button>
                </form>
            </div>
            @endforeach


        </div>
        <div class="mt-4">
            <h4 class="font-semibold">Total: Rp {{ number_format($total, 0, ',', '.') }}</h4>
                <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md w-full" onclick="payment()">Checkout</button>
        </div>
    </div>
</div><script>
    function payment() {
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    url: "https://l.r45id.online/checkoutcart",
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
