<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Order Product</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <!-- <link rel="shortcut icon" href="assets/images/favicon.png" /> -->
    <style>
        .product-card {
            border: 1px solid #adaaaa;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 20px;
            transition: transform 0.3s;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-info {
            padding: 15px;
        }

        .product-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .quantity-input {
            width: 80px;
            padding: 5px;
            text-align: center;
            margin-right: 10px;
        }

        .order-now-button {
            margin-top: 20px;
            text-align: center;
        }

        .order-now-button button {
            display: inline-block;
            padding: 15px 30px;
            background-color: #e44d26;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .order-now-button button:hover {
            background-color: #333;
        }

        .product-image {
            height: 100% !important;
        }
    </style>
</head>

<?php include_once  "classes/order.php"; ?>
<?php include_once  "classes/db.php"; ?>

<?php
$db = new Db();
$order = new Order($db->getConnection());
$NoOfProducts = $order->product_price_to_qty($_GET["package"]);
?>

<body>
    <div class="container-scroller">
        <!-- navbar -->
        <?php include_once "partials/_navbar.php"; ?>
        <div class="container-fluid page-body-wrapper">
            <!-- sidebar -->
            <?php include_once "partials/_sidebar.php"; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body overflow-auto p-5">
                                    <div class="row mb-5">
                                        <div class="col-md-6">
                                            <h4 class="card-title">Selected Package Price: <?php echo $_GET["package"] ?>.Rs</h4>
                                        </div>
                                        <div class="col-md-6">
                                            <h4 class="card-title">Select only <?php echo $NoOfProducts ?> products</h4>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <!-- Product Card 1 -->
                                        <div class="col-lg-4 col-md-6 grid-margin stretch-card">
                                            <div class="card product-card" data-product-id="1">
                                                <img class="card-img-top product-image" src="../assets/images/products/facewash.png" alt="Product Image">
                                                <div class="card-body product-info">
                                                    <h5 class="card-title product-title">Rosewood salicylic facewash</h5>
                                                    <div class="input-group">
                                                        <label for="">Quantity: </label>
                                                        <input type="number" class="ms-3 form-control quantity-input" value="0" min="1">
                                                    </div>
                                                    <div class="form-check mt-3">
                                                        <input type="checkbox" class="form-check-input product-checkbox" id="product1">
                                                        <label class="form-check-label" for="product1">Select this product</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Product Card 2 -->
                                        <div class="col-lg-4 col-md-6 grid-margin stretch-card">
                                            <div class="card product-card" data-product-id="2">
                                                <img class="card-img-top product-image" src="../assets/images/products/handwash.png" alt="Product Image">
                                                <div class="card-body product-info">
                                                    <h5 class="card-title product-title">Brightening Hand Wash</h5>
                                                    <div class="input-group">
                                                        <label for="">Quantity: </label>
                                                        <input type="number" class="ms-3 form-control quantity-input" value="0" min="1">
                                                    </div>
                                                    <div class="form-check mt-3">
                                                        <input type="checkbox" class="form-check-input product-checkbox" id="product2">
                                                        <label class="form-check-label" for="product2">Select this product</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Product Card 3 -->
                                        <div class="col-lg-4 col-md-6 grid-margin stretch-card">
                                            <div class="card product-card" data-product-id="3">
                                                <img class="card-img-top product-image" src="../assets/images/products/shampoo.png" alt="Product Image">
                                                <div class="card-body product-info">
                                                    <h5 class="card-title product-title">Anti-Hair loss Shampoo</h5>
                                                    <div class="input-group">
                                                        <label for="">Quantity: </label>
                                                        <input type="number" class="ms-3 form-control quantity-input" value="0" min="1">
                                                    </div>
                                                    <div class="form-check mt-3">
                                                        <input type="checkbox" class="form-check-input product-checkbox" id="product3">
                                                        <label class="form-check-label" for="product3">Select this product</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Product Card 4 -->
                                        <div class="col-lg-4 col-md-6 grid-margin stretch-card">
                                            <div class="card product-card" data-product-id="4">
                                                <img class="card-img-top product-image" src="../assets/images/products/soap.png" alt="Product Image">
                                                <div class="card-body product-info">
                                                    <h5 class="card-title product-title">Brightening Lavender Soap</h5>
                                                    <div class="input-group">
                                                        <label for="">Quantity: </label>
                                                        <input type="number" class="ms-3 form-control quantity-input" value="0" min="1">
                                                    </div>
                                                    <div class="form-check mt-3">
                                                        <input type="checkbox" class="form-check-input product-checkbox" id="product4">
                                                        <label class="form-check-label" for="product4">Select this product</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Product Card 5 -->
                                        <div class="col-lg-4 col-md-6 grid-margin stretch-card">
                                            <div class="card product-card" data-product-id="5">
                                                <img class="card-img-top product-image" src="../assets/images/products/sunblock.png" alt="Product Image">
                                                <div class="card-body product-info">
                                                    <h5 class="card-title product-title">Brightening Sun Block</h5>
                                                    <div class="input-group">
                                                        <label for="">Quantity: </label>
                                                        <input type="number" class="ms-3 form-control quantity-input" value="0" min="1">
                                                    </div>
                                                    <div class="form-check mt-3">
                                                        <input type="checkbox" class="form-check-input product-checkbox" id="product5">
                                                        <label class="form-check-label" for="product5">Select this product</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 order-now-button">
                                            <button class="btn btn-success" id="order-now">Order Now</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        const maxProducts = <?php echo $NoOfProducts; ?>;

        function updateSelectedProducts() {
            let totalSelected = 0;
            $('.product-card').each(function() {
                const isChecked = $(this).find('.product-checkbox').prop('checked');
                if (isChecked) {
                    totalSelected++;
                }
            });
            return totalSelected;
        }

        $(document).ready(function() {
            $('.product-checkbox').change(function() {
                const isChecked = $(this).prop('checked');
                const quantityInput = $(this).closest('.card-body').find('.quantity-input');
                if (!isChecked) {
                    quantityInput.val(0);
                }
            });

            $('#order-now').click(function() {
                const totalSelected = updateSelectedProducts();
                let totalQuantity = 0;

                if (totalSelected === 0) {
                    alert('Please select products.');
                    return;
                }

                const selectedProductsData = [];
                $('.product-card').each(function() {
                    const isChecked = $(this).find('.product-checkbox').prop('checked');
                    if (isChecked) {
                        const quantity = parseInt($(this).find('.quantity-input').val());
                        totalQuantity += quantity;
                        const productName = $(this).find('.product-title').text().trim();
                        selectedProductsData.push({
                            productName: productName,
                            quantity: quantity
                        });
                    }
                });

                if (totalQuantity !== maxProducts) {
                    alert('Please select exactly ' + maxProducts + ' products.');
                    return;
                }

                const requestData = {
                    package: '<?php echo $_GET["package"]; ?>',
                    selectedProducts: selectedProductsData
                };

                $.ajax({
                    url: 'handlers/order-now.php',
                    type: 'POST',
                    contentType: 'application/json;charset=UTF-8',
                    data: JSON.stringify(requestData),
                    success: function(response) {
                        alert('Order placed successfully!');
                        window.location = "send-deposit-proof";
                    },
                    error: function(xhr, status, error) {
                        alert('Failed to place order. Please try again.');
                    }
                });

            });
        });
    </script>

    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>

</body>

</html>