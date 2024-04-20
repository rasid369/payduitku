@extends('layouts.navbar')
@section('content')
    <div class="flex mx-10 flex-wrap gap-5">
        @foreach ($produk as $item)
            <div class="bg-slate-300 shadow-lg w-96 h-40 rounded-md p-10">
                <h3 class="text-xl">{{ $item->name }}</h3>
                <h4>Rp {{ number_format($item->harga, 0, ',', '.') }}</h4>
                <div class="flex mt-4">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2" value="{{ $item->id }}"
                        onclick="payment({{ $item->id }})">Beli</button>
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md"
                        onclick="addtocart({{ $item->id }})" value="addcart">Tambah ke Keranjang</button>
                </div>
                </form>
            </div>
        @endforeach
    </div>
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script type="text/javascript">
        function payment($id) {
            $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "POST",
                    data: {
                        produk: $id
                    },
                    url: "checkout",
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

        function addtocart(id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        data: {
            id_item: id
        },
        url: "https://l.r45id.online/addtocart",
        dataType: "json",
        success: function(response) {
            showNotification(response.message);
        },
        error: function(xhr, status, error) {
            console.error('Gagal menambahkan | error: ' + error);
        }
    });
}


        function showNotification(message) {
            var notification = document.createElement('div');
            notification.className = 'notification';
            notification.textContent = message;
            document.body.appendChild(notification);


            setTimeout(function() {
                notification.remove();
            }, 5000);
        }
    </script>
@endsection
