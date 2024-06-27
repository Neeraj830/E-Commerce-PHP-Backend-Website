<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .footer {
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .footer h4 {
            margin: 0 0 10px;
            font-size: 1.2em;
            color: #343a40;
        }
        .footer p {
            margin: 5px 0;
            color: #6c757d;
            font-size: 0.9em;
        }
        .footer .address {
            margin-top: 15px;
        }
        @media (min-width: 576px) {
            .footer-content {
                padding: 0 40px;
            }
        }
        @media (min-width: 768px) {
            .footer {
                text-align: left;
            }
            .footer-content {
                flex-direction: row;
                justify-content: space-between;
                align-items: flex-start;
            }
            .footer h4, .footer p {
                text-align: left;
            }
        }
    </style>
</head>
<body>

<div class="footer">
    <div class="footer-content">
        <div class="footer-info">
            <h4>About Us</h4>
            <p>Your one-stop shop for the latest electronics.</p>
        </div>
        <div class="footer-contact">
            <h4>Contact Us</h4>
            <p>Email: support@ecommerce.com</p>
            <p>Phone: +1 (123) 456-7890</p>
            <p class="address">123 E-commerce St, Shopsville, SS 12345</p>
        </div>
    </div>
</div>

</body>
</html>
