@include('users/commons/header')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Checkout</h2>
            <form>
                <div class="mb-3">
                    <label for="Subtotal" class="form-label">{{}}</label>
                    <input type="text" class="form-control" id="Subtotal" name="Subtotal" required>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">{{}}</label>
                    <input type="Tax" class="form-control" id="Tax" name="Tax" required>
                </div>
                <div class="mb-3">
                    <label for="total" class="form-label">{{}}</label>
                    <input type="total" class="form-control" id="total" name="total" required>
                </div>
                <button type="submit" class="btn btn-primary">Place Order</button>
            </form>
        </div>
    </div>
</div>

@include('users/commons/footer')
