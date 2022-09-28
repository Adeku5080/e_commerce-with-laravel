<!Doctype html>
<html>
<head>
    <title>

    </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href={{asset('vendor/css/cart.css')}}>
</head>

<body>
<h2>Your Items</h2>
<main class="main-container">
    <div class="cart-items-details">
        @foreach($cartItems as $cartItem)
            <div class="container">

                <div class="image-container">
                    <img class="image" src="{{ asset('images/productImgs/'.$cartItem->item_file_path)}}" alt="">
                </div>
                <section class="name_size_quantity">
                    <p>{{$cartItem->item_name}}</p>
                    <div class="size_and_quantity">
                        <select name="size" id="size">
                            <option value="" selected>{{$cartItem->size}}</option>
                            <option value="Uk-6">Uk 6</option>
                            <option value="Uk-7">Uk 7</option>
                            <option value="Uk-8">UK 8</option>
                            <option value="Uk-9">UK 9</option>
                            <option value="Uk-10">UK 10</option>
                        </select>

                        <div class="quantity-bar">

                            Qty
                            <select name="quantity" id="quantity">
                                <option value=" " selected>{{ $cartItem->quantity }}</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>

                        </div>

                    </div>

                </section>

                <div class="price">
                    ${{$cartItem->item_price}}
                    <button type="button" value=" {{ $cartItem->id }} " id="delete-btn">delete</button>
                </div>


            </div>
        @endforeach

    </div>

    <div class="total-section">
        <div class="header">
            <h3>Total</h3>
        </div>
        <div class="subtotal">
            <p>sub-total</p>
            <p>$total</p>
        </div>
        <div class="button-div">
            <a href={{route('checkout')}}>
                <button class="checkout" type="button">CHECKOUT</button>
            </a>

        </div>
    </div>
</main>

{{--update cart-item quantity on-change--}}
<script>
    const selectQuantity = document.querySelector('#quantity');
    selectQuantity.addEventListener('change', async function (e) {

        const data = {
            quantity: document.querySelector("[name = 'quantity']").value
        }

        const cartItemId = {{$cartItem->id}};
        await updateProduct(data, cartItemId)
    })

    async function updateProduct(data, cartItemId) {
        try {
            const response = await fetch(`api/update-cart-item/${cartItemId}`, {
                method: "PATCH",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            if (response.ok) {
                window.location.href = '{{route('cart.show')}}'
            }
            return response.text()
        } catch (e) {
            console.log(e);
        }
    }

</script>

{{--delete cartItem --}}
<script>
    const deleteBtn = document.querySelector("#delete-btn")
    deleteBtn.addEventListener('click', async function (e) {
        e.preventDefault();

        const cartItemId = e.target.value
        await deleteProduct(cartItemId)

    });

    async function deleteProduct(cartItemId) {
        try {
            const response = await fetch(`api/delete-cart-item/${cartItemId}`, {
                method: "DELETE",
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector("meta[name='csrf-token']").getAttribute('content')
                },
            });
            if (response.ok) {
                window.location.href = '{{route('cart.show')}}'
            }
            return response.text()
        } catch (error) {
            console.log(error)
        }
    }
</script>


</body>
</html>
