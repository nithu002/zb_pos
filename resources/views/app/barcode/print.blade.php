<!DOCTYPE html>
<html>

<head>
    <title>Print Barcode</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <style>
        @media print {
            @page {
                margin: 0;
                size: auto;
                /* Adjusted to match label width */
                page-break-after: always;
                height: auto;
            }

            body {
                margin: 0;
                padding: 0;
            }

            .label-container {
                width: auto;
                height: auto;
                overflow: hidden;
            }

            .label-image {
                width: auto;
                height: auto;
                display: block;
            }
        }

        body {
            margin: 0;
            padding: 0;
            text-align: center;
        }

        .label-container {
            width: 500px;
            height: auto;
            margin: 0 auto;
        }

        .label-image {
            width: 500px;
            height: auto;
        }
    </style>
</head>

<body>
    @foreach ($images as $img)
        <div class="label-container">
            <img class="label-image" src="{{ url("$img") }}" alt="Barcode Label">
        </div>
    @endforeach


    <script>
        window.onload = function() {
            setTimeout(function() {
                window.print();
                // Wait a bit longer to ensure the print dialog is closed
                setTimeout(function() {
                    fetch("{{ route('barcode.delete') }}", {
                            method: "POST",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                                    .getAttribute('content'),
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({})
                        })
                        .then(response => {
                            window.location.href = "{{ route('barcode.index') }}";
                        })
                        .catch(error => {
                            window.location.href = "{{ route('barcode.index') }}";
                        });
                }, 100);

            }, 50);
        };
    </script>

</body>

</html>
