<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

<body class="text-gray-800 font-inter">

    @extends('layout.hospital-layout')

    @section('hospital-content')
        <h1 class="text-center text-5xl text-green-500 font-semibold mt-6 ">Payment Summery</h1>
        <div class="mt-12 mx-5">
            <!-- Payment Summary Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border">Payment ID</th>
                            <th class="px-4 py-2 border">Patient Name</th>
                            <th class="px-4 py-2 border">Amount</th>
                            <th class="px-4 py-2 border">Payment Date</th>
                            <th class="px-4 py-2 border">Payment Method</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border">12345</td>
                            <td class="px-4 py-2 border">John Doe</td>
                            <td class="px-4 py-2 border">$150.00</td>
                            <td class="px-4 py-2 border">2024-08-12</td>
                            <td class="px-4 py-2 border">Credit Card</td>
                            <td class="px-4 py-2 border">Completed</td>
                            <td class="px-4 py-2 border">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                                    View Details
                                </button>
                                <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 ml-2">
                                    Cancel
                                </button>
                            </td>
                        </tr>
                        <!-- Additional rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

</body>

</html>
